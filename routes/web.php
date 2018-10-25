<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('customers', 'CustomersController');
Route::resource('products', 'ProductsController');
Route::get('products.csv', 'ProductsController@download_csv')->name('products.download_csv');
Route::resource('profiles', 'ProfilesController', ['only' => ['edit', 'update']]);
