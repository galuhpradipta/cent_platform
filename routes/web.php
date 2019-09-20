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
Route::get('/register', 'RegisterController@index')->name('register.index');
Route::post('/register/custom', 'RegisterController@register')->name('register.custom');

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
Route::get('/', 'DashboardController@index')->middleware('auth')->name('dashboard.index');

// Sales Order
Route::get('/ar/sales-order', 'SalesOrderController@index')->middleware('auth')->name('so.index');
Route::get('/ar/sales-order/create', 'SalesOrderController@create')->middleware('auth')->name('so.create');
Route::get('/ar/sales-order/export/excel', 'SalesOrderController@exportExcel')->middleware('auth')->name('so.export-excel');
Route::post('/ar/sales-order', 'SalesOrderController@store')->middleware('auth')->name('so.store');
Route::post('/ar/sales-order/approve', 'SalesOrderController@approve')->middleware('auth')->name('so.approve');

// Deliver Order
Route::get('/ar/delivery-order', 'DeliveryOrderController@index')->middleware('auth')->name('do.index');
Route::patch('/ar/delivery-order', 'DeliveryOrderController@update')->middleware('auth')->name('do.update');
Route::post('/ar/delivery-order/approve', 'DeliveryOrderController@approve')->middleware('auth')->name('do.approve');

// Invoice
Route::get('/ar/invoice', 'InvoiceController@index')->middleware('auth')->name('invoice.index');
Route::patch('/ar/invoice', 'InvoiceController@update')->middleware('auth')->name('invoice.update');
Route::post('/ar/invoice/approve', 'InvoiceController@approve')->middleware('auth')->name('invoice.approve');

// Income
Route::get('/ar/income', 'IncomeController@index')->middleware('auth')->name('income.index');
Route::patch('/ar/income', 'IncomeController@update')->middleware('auth')->name('income.update');
Route::post('/ar/income/approve', 'IncomeController@approve')->middleware('auth')->name('income.approve');

// History Uang Masuk
Route::get('/ar/history', 'ArHistory@index')->middleware('auth')->name('ar-history.index');


// Purchase Request
Route::get('/ap/purchase-request', 'PurchaseRequestController@index')->middleware('auth')->name('pr.index');
Route::get('/ap/purchase-request/create', 'PurchaseRequestController@create')->middleware('auth')->name('pr.create');
Route::get('/ap/purchase-request/export/excel', 'PurchaseRequestController@exportExcel')->middleware('auth')->name('pr.export-excel');
Route::post('/ap/purchase-request', 'PurchaseRequestController@store')->middleware('auth')->name('pr.store');
Route::post('/ap/purchase-request/approve', 'PurchaseRequestController@approve')->middleware('auth')->name('pr.approve');


// Purchase Order
Route::get('/ap/purchase-order', 'PurchaseOrderController@index')->middleware('auth')->name('po.index');
Route::patch('/ap/purchase-order', 'PurchaseOrderController@update')->middleware('auth')->name('po.update');
Route::post('/ap/purchase-order/approve', 'PurchaseOrderController@approve')->middleware('auth')->name('po.approve');

//  Receipt
Route::get('/ap/receipt', 'ReceiptController@index')->middleware('auth')->name('receipt.index');
Route::patch('/ap/receipt', 'ReceiptController@update')->middleware('auth')->name('receipt.update');
Route::post('/ap/receipt/approve', 'ReceiptController@approve')->middleware('auth')->name('receipt.approve');


// Uang Keluar (spending)
Route::get('/ap/spending', 'SpendingController@index')->middleware('auth')->name('spending.index');
Route::patch('/ap/spending', 'SpendingController@update')->middleware('auth')->name('spending.update');
Route::post('/ap/spending/approve', 'SpendingController@approve')->middleware('auth')->name('spending.approve');


// History Uang Keluar
Route::get('/ap/history', 'ApHistory@index')->middleware('auth')->name('ap-history.index');

// Jurnal
Route::get('/journal', 'JournalController@index')->middleware('auth')->name('journal.index');

// General Ledger
Route::get('/general-ledger', 'GeneralLedgerController@index')->middleware('auth')->name('gl.index');
Route::get('/general-ledger/new', 'GeneralLedgerController@create')->middleware('auth')->name('gl.create');
Route::post('/general-ledger', 'GeneralLedgerController@store')->middleware('auth')->name('gl.store');

// Cent General Ledger
Route::get('/cent/general-ledger', 'CentGeneralLedgerController@index')->middleware('auth')->name('gl-cent.index');
Route::post('/cent/general-ledger', 'CentGeneralLedgerController@store')->middleware('auth')->name('gl-cent.store');



// Account
Route::get("/accounts", 'AccountController@index')->middleware('auth')->name('account.index');
Route::post('/accounts', 'AccountController@store')->middleware('auth')->name('account.store');
Route::patch('/accounts', 'AccountController@update')->middleware('auth')->name('account.update');
Route::delete('/accounts/{id}', 'AccountController@destroy')->middleware('auth')->name('account.destroy');

// Customer
Route::get('/master/customer', 'CustomerController@index')->middleware('auth')->name('customer.index');
Route::post('/master/customer', 'CustomerController@store')->middleware('auth')->name('customer.store');
Route::patch('/master/customer', 'CustomerController@update')->middleware('auth')->name('customer.update');
Route::delete('/master/customer', 'CustomerController@destroy')->middleware('auth')->name('customer.destroy');

// Supplier
Route::get('/master/supplier', 'SupplierController@index')->middleware('auth')->name('supplier.index');
Route::post('/master/supplier', 'SupplierController@store')->middleware('auth')->name('supplier.store');
Route::patch('/master/supplier', 'SupplierController@update')->middleware('auth')->name('supplier.update');
Route::delete('/master/supplier', 'SupplierController@destroy')->middleware('auth')->name('supplier.destroy');

// Product
Route::get('/master/product', 'ProductController@index')->middleware('auth')->name('product.index');
Route::post('/master/product', 'ProductController@store')->middleware('auth')->name('product.store');
Route::patch('/master/product', 'ProductController@update')->middleware('auth')->name('product.update');
Route::delete('/master/product', 'ProductController@destroy')->middleware('auth')->name('product.destroy');

// Bank
Route::get('/master/bank', 'BankController@index')->middleware('auth')->name('bank.index');
Route::post('/master/bank', 'BankController@store')->middleware('auth')->name('bank.store');
Route::patch('/master/bank', 'BankController@update')->middleware('auth')->name('bank.update');
Route::delete('/master/bank', 'BankController@destroy')->middleware('auth')->name('bank.destroy');

//  ---------------------

// SME
Route::get('/sme', 'SMEController@index')->middleware('auth')->name('sme.index');

// SME Invoice 
Route::get('/sme/ar/invoice', 'SMEInvoiceController@index')->middleware('auth')->name('sme-invoice.index');
Route::get('/sme/ar/invoice/new', 'SMEInvoiceController@create')->middleware('auth')->name('sme-invoice.create');