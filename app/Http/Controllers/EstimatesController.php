<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estimate;
use App\EstimateDetail;
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
		$estimate_details = [];
		$customers = Customer::all();
		$products = Product::all();
		$row_counts = 10;

		// dynamic add detail old inputs
		$dynamic_add_details = [];
		if (old('details')) {
			foreach (old('details') as $key => $detail) {
				if (is_numeric($key) && $key < 0) {
					$dynamic_add_details[] = $detail;
				}
			}
		}

		// set tax rate
		$estimate->tax_rate = Estimate::DEFAULT_TAX_RATE;

		return view('estimates.create', compact('estimate', 'estimate_details', 'customers', 'products', 'row_counts', 'dynamic_add_details'));
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
			$estimate->setRedundantData(auth()->user());

			$details_input = $request->get('details');
			$details = [];
			foreach ($details_input as $detail) {
				if (!$detail['is_delete']) {
					$details[] = new EstimateDetail($detail);
				}
			}
			$estimate->total_price = $estimate->calc_price($details);
			$estimate->save();
			$estimate->estimate_details()->saveMany($details);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			return back()->withInput();
		}

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
		return view('estimates.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
	 * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
		$estimate = Estimate::find($id);
		$estimate_details = $estimate->estimate_details()->get();
		$customers = Customer::all();
		$products = Product::all();

		// dynamic add detail old inputs
		$dynamic_add_details = [];
		if (old('details')) {
			foreach (old('details') as $key => $detail) {
				if (is_numeric($key) && $key < 0) {
					$dynamic_add_details[] = $detail;
				}
			}
		}

		return view('estimates.edit', compact('estimate', 'estimate_details', 'customers', 'products', 'dynamic_add_details'));
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
		DB::beginTransaction();
		try {
			$estimate = Estimate::find($id);
			$estimate->fill($request->all());
			$estimate->setRedundantData(auth()->user());

			$details_input = $request->get('details');
			$details = [];
			$delete_detail_ids = [];
			foreach ($details_input as $key => $detail_input) {
				if (is_numeric($key) === false ) {
					continue;
				}
				if ($detail_input['is_delete']) {
					$delete_detail_ids[] = $detail_input['id'];
				} else {
					$detail = EstimateDetail::firstOrNew(['id' => $detail_input['id']]);
					$detail->fill($detail_input);
					$details[] = $detail;
				}
			}

			$estimate->total_price = $estimate->calc_price($details);
			$estimate->save();
			$estimate->estimate_details()->saveMany($details);
			EstimateDetail::destroy($delete_detail_ids);
		} catch (Exception $e) {
			DB::rollback();
			return back()->withInput();
		}
		DB::commit();

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
		DB::beginTransaction();
		try {
			$estimate = Estimate::find($id);
			foreach ($estimate->estimate_details as $detail) {
				$detail->delete();
			}
			$estimate->delete();
		} catch (Exception $e) {
			DB::rollback();
			return back()->withInput();
		}
		DB::commit();

		return redirect()
				->route('estimates.index')
				->with('message', '削除しました');
    }

	/**
	 * Show the specified estimate report
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function report($id)
	{
		$estimate = Estimate::find($id);

		return view('estimates.report', compact('estimate'));
	}

}
