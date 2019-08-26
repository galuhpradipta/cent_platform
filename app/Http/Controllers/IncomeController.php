<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Income;
use Carbon;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user = Auth::user();
        // $incomes = Income::where([
        //     'company_id' => $user->business->id,
        //     'is_approved' => false,
        // ])->get();

        $incomes = DB::table('incomes as inc')
                            ->join('invoices as inv', 'inc.invoice_id', '=', 'inv.id')
                            ->join('delivery_orders as do', 'inv.delivery_order_id', '=', 'do.id')
                            ->join('sales_orders as so', 'do.sales_order_id', '=', 'so.id')
                            ->join('banks as acc', 'so.account_id', '=', 'acc.id')
                            ->join('customers as cust', 'so.customer_id', '=', 'cust.id')
                            ->join('users as u', 'so.approved_by', '=', 'u.id')
                            ->join('roles as r', 'u.role', '=', 'r.role_id')
                            ->select('inc.id as id',
                                    'inc.amount as amount',
                                    'inc.income_date as income_date',
                                    'inv.id as invoice_id',
                                    'inv.invoice_date as inv_date',
                                    'inv.due_date as due_date',
                                    'do.id as delivery_order_id',
                                    'so.id as sales_order_id',
                                    'so.customer_id as customer_id',
                                    'so.order_date as so_date',
                                    'so.discount as discount',
                                    'so.down_payment as down_payment',
                                    'so.ppn as ppn',
                                    'so.total as total',
                                    'so.attachment_url as attachment_url',
                                    'so.account_id as account_id',
                                    'acc.name as account_name',
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
                            ->where('inc.is_approved', '=', false)

                            ->get();

        // dd($incomes);

        return view('income.index', compact('incomes'));
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
            'income_id' => 'required',
            'income_date' => 'required',
            'amount' => 'required',    
        ]);

        $income = Income::find(request('income_id'));
        $income->income_date = request('income_date');
        $income->amount = request('amount');
        $income->save();

        return redirect(route('income.index'))->with('success', 'Data uang masuk berhasil di update');
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
            'income_id' => 'required'
        ]);

        $user = Auth::user();

        $income = Income::find(request('income_id'));

        if ($income->amount == null || $income->income_date == null) {
            return redirect(route('income.index'))->with('error', 'Tolong lengkapi Jumlah uang masuk dan Tanggal uang masuk terlebih dahulu');
        }

        $income->approved_by = $user->id;
        $income->is_approved = true;
        $income->updated_at = Carbon::now();
        $income->save();

        return redirect(route('income.index'))->with('success', 'Invoice Penjualan berhasil di setujui');
    }
}
