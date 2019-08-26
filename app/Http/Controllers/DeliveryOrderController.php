<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryOrder;
use App\Invoice;
use Auth;
use DB;
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
       
        $deliveryOrders = DB::table('delivery_orders as do')
                            ->join('sales_orders as so', 'do.sales_order_id', '=', 'so.id')
                            ->join('customers as cust', 'so.customer_id', '=', 'cust.id')
                            ->join('users as u', 'so.approved_by', '=', 'u.id')
                            ->join('roles as r', 'u.role', '=', 'r.role_id')
                            ->select('do.id as id',
                                    'so.id as sales_order_id',
                                    'so.customer_id as customer_id',
                                    'so.order_date as so_date',
                                    'so.discount as discount',
                                    'so.down_payment as down_payment',
                                    'so.ppn as ppn',
                                    'so.total as total',
                                    'so.attachment_url as attachment_url',
                                    'so.account_id as account_id',
                                    'so.is_approved as is_so_approved',
                                    'so.approved_by as so_approved_by',
                                    'do.delivery_date as delivery_date',
                                    'do.is_approved as is_do_approved',
                                    'do.approved_by as do_approved_by',
                                    'cust.email as customer_email',
                                    'u.name as approved_by',
                                    'r.name as role'
                                )
                            ->where('do.company_id', '=', $user->business->id)
                            ->where('do.is_approved', '=', false)
                            ->get();


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
