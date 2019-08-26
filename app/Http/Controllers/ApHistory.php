<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ApHistory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $spendings = DB::table('spendings as spd')
                    ->join('receipts as rcp', 'spd.receipt_id', '=', 'rcp.id')
                    ->join('purchase_orders as po', 'rcp.purchase_order_id', '=', 'po.id')
                    ->join('purchase_requests as pr', 'po.purchase_request_id', '=', 'pr.id')
                    ->join('banks as acc', 'pr.account_id', '=', 'acc.id')
                    ->join('suppliers as supp', 'pr.supplier_id', '=', 'supp.id')
                    ->join('users as u', 'pr.approved_by', '=', 'u.id')
                    ->join('roles as r', 'u.role', '=', 'r.role_id')
                    ->select('spd.id as id',
                            'spd.amount as amount',
                            'spd.spending_date as spending_date',
                            'rcp.id as receipt_id',
                            'rcp.invoice_date as inv_date',
                            'rcp.due_date as due_date',
                            'po.id as purchase_order_id',
                            'pr.id as purchase_request_id',
                            'pr.supplier_id as supplier_id',
                            'pr.order_date as pr_date',
                            'pr.discount as discount',
                            'pr.down_payment as down_payment',
                            'pr.ppn as ppn',
                            'pr.total as total',
                            'pr.attachment_url as attachment_url',
                            'pr.account_id as account_id',
                            'acc.name as account_name',
                            'pr.is_approved as is_so_approved',
                            'pr.approved_by as so_approved_by',
                            'po.delivery_date as do_date',
                            'po.is_approved as is_do_approved',
                            'po.approved_by as do_approved_by',
                            'supp.email as supplier_email',
                            'u.name as approved_by',
                            'r.name as role'
                        )
                    ->where('po.company_id', '=', $user->business->id)
                    ->get();
        
        return view('ap-history.index', compact('spendings'));
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
}
