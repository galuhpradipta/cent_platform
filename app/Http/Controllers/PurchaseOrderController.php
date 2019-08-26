<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon;
use App\Receipt;
use App\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $purchaseOrders = DB::table('purchase_orders as po')
                            ->join('purchase_requests as pr', 'po.purchase_request_id', '=', 'pr.id')
                            ->join('suppliers as supp', 'pr.supplier_id', '=', 'supp.id')
                            ->join('users as u', 'pr.approved_by', '=', 'u.id')
                            ->join('roles as r', 'u.role', '=', 'r.role_id')
                            ->select('po.id as id',
                                    'pr.id as purchase_request_id',
                                    'pr.supplier_id as supplier_id',
                                    'pr.order_date as pr_date',
                                    'pr.discount as discount',
                                    'pr.down_payment as down_payment',
                                    'pr.ppn as ppn',
                                    'pr.total as total',
                                    'pr.attachment_url as attachment_url',
                                    'pr.account_id as account_id',
                                    'pr.is_approved as is_pr_approved',
                                    'pr.approved_by as pr_approved_by',
                                    'po.delivery_date as delivery_date',
                                    'po.is_approved as is_po_approved',
                                    'po.approved_by as po_approved_by',
                                    'supp.email as supplier_email',
                                    'u.name as approved_by',
                                    'r.name as role'
                                )
                            ->where('po.company_id', '=', $user->business->id)
                            ->where('po.is_approved', '=', false)
                            ->get();

        return view('purchase-order.index', compact('purchaseOrders'));
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
    public function update()
    {   
        $data = request()->validate([
            'po_id' => 'required',
            'delivery_date' => 'required',    
        ]);

        $po = PurchaseOrder::find(request('po_id'));
        $po->delivery_date = request('delivery_date');
        $po->save();

        return redirect(route('po.index'))->with('success', 'Tanggal Delivery berhasil di update');
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
            'purchase_order_id' => 'required'
        ]);

        $user = Auth::user();

        $po = PurchaseOrder::find(request('purchase_order_id'));

        if  ($po->delivery_date ==  null) {
            return redirect(route('po.index'))->with('error', 'Tolong input tanggal delivery terlebih dahulu');
        }

        $po->approved_by = $user->id;
        $po->is_approved = true;
        $po->updated_at = Carbon::now();
        $po->save();

        $inv = Receipt::create([
            'purchase_request_id' => $po->purchase_request_id,
            'purchase_order_id' => $po->id,
            'company_id' => $po->company_id,
        ]);

        return redirect(route('po.index'))->with('success', 'Pengiriman Pembelian berhasil di setujui');
    }
}
