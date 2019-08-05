<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bank;
use App\Product;
use App\Customer;
use App\SalesOrder;
use App\AccountReceiveable;
use App\DeliveryOrder;
use Auth;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $products = Product::where(['company_id' => $user->business->id ])->get();
        $customers = Customer::where(['company_id' => $user->business->id ])->get();
        $banks = Bank::where(['company_id' => $user->business->id ])->get();
        $salesOrders = SalesOrder::where([
                'company_id' => $user->business->id,
                'is_approved' => false, 
            ])->get();

        return view('sales-order.index', compact('products', 'customers', 'salesOrders', 'banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $data = request()->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'order_date' => 'required',
            'quantity' => 'required',
            'subtotal_price' =>  'required',
            'discount' => 'required',
            'down_payment' => 'required',
            'bank_id' => 'required',
            'ppn' => 'required',
            'total' => 'required',
            'attachment' =>  'required|file|max:5000',
        ]);

        $user = Auth::user();
        $customer = Customer::find(request('customer_id'));
        $product = Product::find(request('product_id'));

        $so = SalesOrder::create([
            'company_id' => $user->business->id,
            'customer_id' => request('customer_id'),
            'product_id' => request('product_id'),
            'order_date' => request('order_date'),
            'quantity' => request('quantity'),
            'subtotal_price' =>  request('subtotal_price'),
            'discount' => request('discount'),
            'down_payment' => request('down_payment'),
            'bank_id' => request('bank_id'),
            'ppn' => request('ppn'),
            'total' => request('total'),
            'attachment_url' => '',
            'status' => 1,
        ]);
        
        $file = $request->file('attachment')->store('uploads', 'public');

        $so->attachment_url  = $file;
        $so->save();


        return redirect(route('so.index'))->with('success', 'Sales Order Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function storeImage($salesOrder) {
        if(request()->has('attachment')) {

            // $so = SalesOrder::find($salesOrder->id);

            // $so->attachment_url =  request()->image->store('uploads', 'public');
            // $so->save();
            $salesOrder->update([
                'attachment_url' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    public function getSalesOrder($id) {
        $so = SalesOrder::find($id);

        return response()->json($so);
    }

    public function approve() {

        $user = Auth::user();

        $so = SalesOrder::find(request('sales_order_id'));
        $so->approved_by = $user->id;
        $so->is_approved = true;
        $so->save();

        $do = DeliveryOrder::create([
            'sales_order_id' => $so->id,
            'company_id' => $so->company_id,
        ]);

        return redirect(route('so.index'))->with('success', 'Pesanan Penjualan berhasil di setujui');

    }
}
