<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon;
use App\Spending;
use App\Receipt;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $receipts = DB::table('receipts as rcp')
                            ->join('purchase_orders as po', 'rcp.purchase_order_id', '=', 'po.id')
                            ->join('purchase_requests as pr', 'po.purchase_request_id', '=', 'pr.id')
                            ->join('suppliers as supp', 'pr.supplier_id', '=', 'supp.id')
                            ->join('users as u', 'pr.approved_by', '=', 'u.id')
                            ->join('roles as r', 'u.role', '=', 'r.role_id')
                            ->select('rcp.id as id',
                                    'rcp.invoice_date as invoice_date',
                                    'rcp.due_date as due_date',
                                    'po.id as delivery_order_id',
                                    'pr.id as sales_order_id',
                                    'pr.supplier_id as supplier_id',
                                    'pr.invoice_number as invoice_number',
                                    'pr.order_date as pr_date',
                                    'pr.discount as discount',
                                    'pr.down_payment as down_payment',
                                    'pr.ppn as ppn',
                                    'pr.total as total',
                                    'pr.attachment_url as attachment_url',
                                    'pr.account_id as account_id',
                                    'pr.is_approved as is_so_approved',
                                    'pr.approved_by as so_approved_by',
                                    'po.delivery_date as po_date',
                                    'po.is_approved as is_po_approved',
                                    'po.approved_by as po_approved_by',
                                    'supp.email as supplier_email',
                                    'u.name as approved_by',
                                    'r.name as role'
                                )
                            ->where('po.company_id', '=', $user->business->id)
                            ->where('rcp.is_approved', '=', false)

                            ->get();

        return view('receipt.index', compact('receipts'));
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
            'invoice_date' => 'required',
            'due_date' => 'required',   
            'receipt_id' => 'required', 
        ]);

        $rcp = Receipt::find(request('receipt_id'));
        $rcp->invoice_date = request('invoice_date');
        $rcp->due_date = request('due_date');
        $rcp->save();

        return redirect(route('receipt.index'))->with('success', 'Tanggal Invoice berhasil di update');
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
            'receipt_id' => 'required'
        ]);

        $user = Auth::user();
        $rcp = Receipt::find(request('receipt_id'));
        
        if ($rcp->invoice_date ==  null || $rcp->due_date == null) {
            return redirect(route('receipt.index'))->with('error', 'Tolong lengkapi data tanggal invoice dan jatuh tempo terlebih dahulu');
        }

        $rcp->approved_by = $user->id;
        $rcp->is_approved = true;
        $rcp->updated_at = Carbon::now();
        $rcp->save();

        $income = Spending::create([
            'purchase_request_id' =>  $rcp->purchase_request_id,
            'purchase_order_id' => $rcp->purchase_order_id,
            'receipt_id' =>  $rcp->id,
            'company_id' => $user->business->id,
        ]);
    
        return redirect(route('receipt.index'))->with('success', 'Invoice Penjualan berhasil di setujui');
    }
}
