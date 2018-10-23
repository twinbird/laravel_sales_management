<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\StoreProductRequest;
use App\Facades\CSV;

class ProductsController extends Controller
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
		$search_max_standard_price = $request->input('search_max_standard_price');
		$search_min_standard_price = $request->input('search_min_standard_price');

		$products = Product::nameFilter($search_word)
					->maxStandardPriceFilter($search_max_standard_price)
					->minStandardPriceFilter($search_min_standard_price)
					->orderBy('name', 'asc')
					->paginate(15);

		return view('products.index', compact('products'))
				->with('search_word', $search_word)
				->with('search_max_standard_price', $search_max_standard_price)
				->with('search_min_standard_price', $search_min_standard_price);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$product = new Product;
		return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
		$product = new Product;
		$product->fill($request->all());
		$product->user_id = auth()->id();
		$product->save();

		return redirect()
			->route('products.index')
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
		$product = Product::find($id);

		return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$product = Product::find($id);
		
		return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
		$product = Product::find($id);
		$product->fill($request->all());
		$product->save();

		return redirect()
				->route('products.index')
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
		$product = Product::find($id);
		$product->delete();

		return redirect()
				->route('products.index')
				->with('message', '削除しました');
    }

    /**
     * Download a listing of the resource by CSV.
     *
     * @return \Illuminate\Http\Response
     */
	public function download_csv()
	{
		$products = Product::orderBy('name', 'asc')
			->get(['name', 'standard_price'])
			->toArray();
		$headers = ['商品名', '標準単価'];

		return CSV::download($products, $headers, 'products_list.csv');
	}
}
