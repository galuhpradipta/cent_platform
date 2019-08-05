<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryOrder;
use App\Invoice;
use Auth;
use Carbon;


class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user = Auth::user();
        $deliveryOrders = DeliveryOrder::where([
            'company_id' => $user->business->id,
            'is_approved' => false,
        ])->get();

        return view('delivery-order.index', compact('deliveryOrders'));
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
        //
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
    public function update(Request $request)
    {
        $data = request()->validate([
            'do_id' => 'required',
            'delivery_date' => 'required',    
        ]);

        $do = DeliveryOrder::find(request('do_id'));
        $do->delivery_date = request('delivery_date');
        $do->save();

        return redirect(route('do.index'))->with('success', 'Tanggal Delivery berhasil di update');
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

    public function approve() {
        request()->validate([
            'delivery_order_id' => 'required'
        ]);

        $user = Auth::user();

        $do = DeliveryOrder::find(request('delivery_order_id'));

        if  ($do->delivery_date ==  null) {
            return redirect(route('do.index'))->with('error', 'Tolong input tanggal delivery terlebih dahulu');
        }

        $do->approved_by = $user->id;
        $do->is_approved = true;
        $do->updated_at = Carbon::now();
        $do->save();

        $inv = Invoice::create([
            'sales_order_id' => $do->salesOrder->id,
            'delivery_order_id' => $do->id,
            'company_id' => $do->company_id,
        ]);

        return redirect(route('do.index'))->with('success', 'Pesanan Delivery berhasil di setujui');
    }
}
