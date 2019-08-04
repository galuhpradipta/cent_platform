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


Route::get("/", function() {
    redirect(route('login'));
});

// SME
// Route::get("/", 'SMEController@index');
// Route::get("/sme", 'SMEController@index');
// Route::get("/sme/create-so", 'SMEController@create');
// Route::get("/sme/pending", 'SMEController@pendingPage');
// Route::get("/sme/sales-order", 'SMEController@salesOrder')->name('sme.salesOrder');
// Route::get("/sme/delvery-order", 'SMEController@deliveryOrder')->name('sme.deliveryOrder');
// Route::get("/sme/invoice", 'SMEController@invoice')->name('sme.invoice');
// Route::get("/sme/uang-masuk", 'SMEController@uangMasuk')->name('sme.uangMasuk');
// Route::get("/sme/history", 'SMEController@history')->name('sme.history');

// Master
// Route::get("/master/division", 'DivisionController@index')->name('division.index');
// Route::post("/master/division", 'DivisionController@store')->name('division.store');
// Route::patch("/master/division", 'DivisionController@update')->name('division.update');
// Route::delete("/master/division/{id}", 'DivisionController@destroy')->name('division.destroy');


// Account Receiveable
// Route::get("/ar/sales-order", 'AccountReceiveableController@salesOrder')->name('ar.so');


// Sales Order
// Route::post("/ar/sales-order", "SalesOrderController@store")->name('sales-order.store');

Auth::routes();

// custom login
Route::post('/login/custom', 'LoginController@login')->name('login.custom');

// custom register
Route::post('/register/custom', 'RegisterController@register')->name('register.custom');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'DashboardController@index')->name('dashboard.index');

// Sales Order
Route::get('/ar/sales-order', 'SalesOrderController@index')->name('so.index');
Route::post('/ar/sales-order', 'SalesOrderController@store')->name('so.store');

// Purchase Request
Route::get('/ap/purchase-request', 'PurchaseRequestController@index')->name('pr.index');
Route::post('/ap/purchase-request', 'PurchaseRequestController@store')->name('pr.store');

// Purchase Order
Route::get('/ap/purchase-order', 'PurchaseOrderController@index')->name('po.index');
Route::post('/ap/purchase-order', 'PurchaseOrderController@store')->name('po.store');

//  Receipt
Route::get('/ap/receipt', 'ReceiptController@index')->name('receipt.index');
Route::post('/ap/receipt', 'ReceiptController@store')->name('receipt.store');


// Account
Route::get("/master/account", 'AccountController@index')->name('account.index');
Route::post('/master/account', 'AccountController@store')->name('account.store');
Route::patch('/master/account', 'AccountController@update')->name('account.update');
Route::delete('/master/account/{id}', 'AccountController@destroy')->name('account.destroy');

// Customer
Route::get('/master/customer', 'CustomerController@index')->name('customer.index');
Route::post('/master/customer', 'CustomerController@store')->name('customer.store');
Route::patch('/master/customer', 'CustomerController@update')->name('customer.update');
Route::delete('/master/customer', 'CustomerController@destroy')->name('customer.destroy');

// Product
Route::get('/master/product', 'ProductController@index')->name('product.index');
Route::post('/master/product', 'ProductController@store')->name('product.store');
Route::patch('/master/product', 'ProductController@update')->name('product.update');
Route::delete('/master/product', 'ProductController@destroy')->name('product.destroy');

// Bank

Route::get('/master/bank', 'BankController@index')->name('bank.index');
Route::post('/master/bank', 'BankController@store')->name('bank.store');
Route::patch('/master/bank', 'BankController@update')->name('bank.update');
Route::delete('/master/bank', 'BankController@destroy')->name('bank.destroy');



// Enterprise Admin
// Route::get('/ent/admin', 'EntAdminController@index')->name('ent-admin.index');

// Enterprise Supervisor Dashboard / Approval
// Route::get('/ent/spv', 'EntSpvController@index')->name('ent-spv.index');

// Enterprise Supervisor Report
// Route::get('/ent/spv/report', 'EntReportController@index')->name('ent-spv.report');



// Enterprise Admin Account Receiveable
// Route::get('/ent/admin/ar/sales-order', 'EntSalesOrderController@index')->name('ent-admin.sales-order');
// Route::get('/ent/admin/ar/delivery-order', 'EntDeliveryOrderController@index')->name('ent-admin.delivery-order');
// Route::get('/ent/admin/ar/invoice', 'EntInvoiceController@index')->name('ent-admin.invoice');
// Route::get('/ent/admin/ar/uang-masuk', 'EntUangMasukController@index')->name('ent-admin.uang-masuk');
// Route::get('/ent/admin/ar/history', 'EntHistoryController@index')->name('ent-admin.history');
