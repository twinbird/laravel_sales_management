<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estimate;
use App\Customer;
use App\Product;
use App\Http\Requests\StoreEstimateRequest;
use Illuminate\Support\Facades\DB;

class EstimatesController extends Controller
{

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
		$estimates = Estimate::searchWordFilter($search_word)->orderBy('created_at', 'desc')->paginate(15);

		return view('estimates.index', compact('estimates'))->with('search_word', $search_word);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$estimate = new Estimate;
		$customers = Customer::all();
		$products = Product::all();

		return view('estimates.create', compact('estimate', 'customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstimateRequest $request)
    {
		DB::beginTransaction();
		try {
			$estimate = new Estimate;
			$estimate->fill($request->all());
			$estimate->user_id = auth()->id();
			$estimate->save();
			$estimate->estimate_details()->createMany($request->get('details', []));

		} catch (Exception $e) {
			DB::rollback();
			return back()->withInput();
		}
		DB::commit();

		return redirect()
				->route('estimates.index')
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
		return view('estimates.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$estimate = Estimate::find($id);
		$customers = Customer::all();
		$products = Product::all();

		return view('estimates.edit', compact('estimate', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEstimateRequest $request, $id)
    {
		$estimate = Estimate::find($id);
		$estimate->fill($request->all());
		$estimate->user_id = auth()->id();
		$estimate->save();

		return redirect()
				->route('estimates.index')
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
		$estimate = Estimate::find($id);
		$estimate->delete();

		return redirect()
				->route('estimates.index')
				->with('message', '削除しました');
    }
}
