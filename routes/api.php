<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// product
Route::get('/product/{id}', 'ProductController@getProduct');


// customer
Route::get('/customer/{id}', 'CustomerController@getCustomer');

// sales order
Route::get('/sales-order/{id}', 'SalesOrderController@getSalesOrder');

// bank
Route::get('/bank/{id}', 'BankController@getBank');

// bank_categories
Route::get('bank-categories/{id}', 'BankCategoriesController@getBankCategories');
