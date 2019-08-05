<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Income;
use Auth;
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
        $invoices = Invoice::where([
            'company_id' => $user->business->id,
            'is_approved' => false,
        ])->get();

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
