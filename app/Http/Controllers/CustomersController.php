<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\CSVUploadRequest;
use SplFileObject;
use App\Imports\CustomersImport;

class CustomersController extends Controller
{
	const IMPORT_STORAGE_DIRECTORY = 'customer_import_csv_files';

	public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search_word = $request->input('search_word');
		$customers = Customer::searchWordFilter($search_word)
						->orderBy('name', 'asc')->paginate(15);
		$params = [
			'customers' => $customers,
		];

		return view('customers.index', $params)->with('search_word', $search_word);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$customer = new Customer;
		$params = ['customer' => $customer];

		return view('customers.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
		$customer = new Customer;
		$customer->fill($request->all());
		$customer->user_id = auth()->id();
		$customer->save();

		return redirect()
			->route('customers.index')
			->withInput()
			->with('message', '登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$customer = Customer::find($id);
		$params = ['customer' => $customer];

		return view('customers.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$customer = Customer::find($id);
		$params = ['customer' => $customer];

		return view('customers.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomerRequest $request, $id)
    {
		$customer = Customer::find($id);
		$customer->fill($request->all())->save();

		return redirect()
			->route('customers.show', ['id' => $id])
			->withInput()
			->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$customer = Customer::find($id);
		$customer->delete();

		return redirect()
			->route('customers.index')
			->with('message', '削除しました');
    }

	/**
	 * Show the form for specify import csv file.
	 *
     * @return \Illuminate\Http\Response
	 */
	public function import_csv_form()
	{
		return view('customers.import_csv_form');
	}

    /**
     * Store a newly created by csv file.
     *
     * @param  \App\Http\Requests\CSVUploadRequest	$request
     * @return \Illuminate\Http\Response
     */
	public function import_csv(CSVUploadRequest $request)
	{
		// CSVファイルをサーバに一時保存
		$tmp_file_path = $request->file('csv_file')->store(CustomersController::IMPORT_STORAGE_DIRECTORY);

		// CSVファイルを読み出し
		$sfo = new SplFileObject(storage_path('app/') . $tmp_file_path);
		$sfo->setFlags(SplFileObject::READ_CSV);

		$request_validator = new StoreCustomerRequest;
		$customers = [];
		$count = 1;
		foreach ($sfo as $line) {
			// 改行のみは飛ばす
			if (is_null($line[0])) {
				continue;
			}

			// モデルを作ってデータ設定
			$customer = new Customer;
			$customer->name = mb_convert_encoding($line[0], 'UTF-8', 'SJIS');
			$customer->address1 = mb_convert_encoding($line[1], 'UTF-8', 'SJIS');
			$customer->address2 = mb_convert_encoding($line[2], 'UTF-8', 'SJIS');
			$customer->tel = mb_convert_encoding($line[3], 'UTF-8', 'SJIS');
			$customer->fax = mb_convert_encoding($line[4], 'UTF-8', 'SJIS');
			$customer->payment_term = mb_convert_encoding($line[5], 'UTF-8', 'SJIS');
			$customer->user_id = Auth()->user()->id;

			// バリデーション
			// 手抜きしてリクエストバリデータを流用
			$validator = \Validator::make($customer->toArray(), $request_validator->rules(), $request_validator->messages());
			//1件エラーが見つかったらその時点で止める
			if ($validator->fails() === true) {
				$error_row_message = $count . '行目に入力ミスがあります';
				return redirect()
						->back()
						->with([
							'error_message' => $error_row_message,
							'errors' => $validator->errors(),
						]);
			}

			// 保存対象に入れてインクリメント
			$customers[] = $customer;
			$count++;
		}

		// トランザクションを使ってコミット
		DB::beginTransaction();
		try {
			foreach ($customers as $customer) {
				$customer->save();
			}

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
		}

		return redirect()
			->route('customers.index')
			->with('message', $count . '件インポートしました');
	}
}
