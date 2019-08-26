<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Income;
use Auth;
use DB;
use Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $invoices = DB::table('invoices as inv')
                            ->join('delivery_orders as do', 'inv.delivery_order_id', '=', 'do.id')
                            ->join('sales_orders as so', 'do.sales_order_id', '=', 'so.id')
                            ->join('customers as cust', 'so.customer_id', '=', 'cust.id')
                            ->join('users as u', 'so.approved_by', '=', 'u.id')
                            ->join('roles as r', 'u.role', '=', 'r.role_id')
                            ->select('inv.id as id',
                                    'inv.invoice_date as inv_date',
                                    'inv.due_date as due_date',
                                    'do.id as delivery_order_id',
                                    'so.id as sales_order_id',
                                    'so.customer_id as customer_id',
                                    'so.invoice_number as invoice_number',
                                    'so.order_date as so_date',
                                    'so.discount as discount',
                                    'so.down_payment as down_payment',
                                    'so.ppn as ppn',
                                    'so.total as total',
                                    'so.attachment_url as attachment_url',
                                    'so.account_id as account_id',
                                    'so.is_approved as is_so_approved',
                                    'so.approved_by as so_approved_by',
                                    'do.delivery_date as do_date',
                                    'do.is_approved as is_do_approved',
                                    'do.approved_by as do_approved_by',
                                    'cust.email as customer_email',
                                    'u.name as approved_by',
                                    'r.name as role'
                                )
                            ->where('do.company_id', '=', $user->business->id)
                            ->where('do.is_approved', '=', false)

                            ->get();

        return view('invoice.index', compact('invoices'));
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
            'invoice_date' => 'required',
            'due_date' => 'required',    
        ]);

        $inv = Invoice::find(request('invoice_id'));
        $inv->invoice_date = request('invoice_date');
        $inv->due_date = request('due_date');
        $inv->save();

        return redirect(route('invoice.index'))->with('success', 'Tanggal Invoice berhasil di update');
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
            'invoice_id' => 'required'
        ]);

        $user = Auth::user();

        $inv = Invoice::find(request('invoice_id'));
        
        if ($inv->invoice_date ==  null || $inv->due_date == null) {
            return redirect(route('invoice.index'))->with('error', 'Tolong lengkapi data tanggal invoice dan jatuh tempo terlebih dahulu');
        }

        $inv->approved_by = $user->id;
        $inv->is_approved = true;
        $inv->updated_at = Carbon::now();
        $inv->save();

        $income = Income::create([
            'sales_order_id' =>  $inv->sales_order_id,
            'delivery_order_id' => $inv->delivery_order_id,
            'invoice_id' =>  $inv->id,
            'company_id' => $user->business->id,
        ]);
    
        return redirect(route('invoice.index'))->with('success', 'Invoice Penjualan berhasil di setujui');
    }
}
