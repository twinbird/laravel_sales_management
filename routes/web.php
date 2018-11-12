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

Route::get('/', 'StaticPagesController@rootPage');

Auth::routes();
Route::get('customers/import_csv_form', 'CustomersController@import_csv_form')->name('customers.import_csv_form');
Route::post('customers/import_csv', 'CustomersController@import_csv')->name('customers.import_csv');
Route::resource('customers', 'CustomersController');
Route::resource('products', 'ProductsController');
Route::resource('profiles', 'ProfilesController', ['only' => ['edit', 'update']]);
Route::resource('estimates', 'EstimatesController');
Route::get('estimates/{id}/report', 'EstimatesController@report')->name('estimates.report');
