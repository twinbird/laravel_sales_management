<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$customers = Customer::paginate(15);
		$params = [
			'customers' => $customers,
		];

		return view('customers.index', $params);
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
}
