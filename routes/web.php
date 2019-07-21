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


// SME
Route::get("/", 'SMEController@index');
Route::get("/sme", 'SMEController@index');
Route::get("/sme/create-so", 'SMEController@create');
Route::get("/sme/pending", 'SMEController@pendingPage');
Route::get("/sme/sales-order", 'SMEController@salesOrder')->name('sme.salesOrder');
Route::get("/sme/delvery-order", 'SMEController@deliveryOrder')->name('sme.deliveryOrder');
Route::get("/sme/invoice", 'SMEController@invoice')->name('sme.invoice');
Route::get("/sme/uang-masuk", 'SMEController@uangMasuk')->name('sme.uangMasuk');
Route::get("/sme/history", 'SMEController@history')->name('sme.history');

// Master
Route::get("/master/division", 'DivisionController@index')->name('division.index');
Route::post("/master/division", 'DivisionController@store')->name('division.store');
Route::patch("/master/division", 'DivisionController@update')->name('division.update');
Route::delete("/master/division/{id}", 'DivisionController@destroy')->name('division.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
