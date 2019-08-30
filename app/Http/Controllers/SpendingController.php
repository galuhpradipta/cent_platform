<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon;
use App\PurchaseRequest;
use App\Bank;
use App\Journal;
use App\Spending;

class SpendingController extends Controller
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
                                    'pr.order_date as so_date',
                                    'pr.discount as discount',
                                    'pr.down_payment as down_payment',
                                    'pr.ppn as ppn',
                                    'pr.total as total',
                                    'pr.attachment_url as attachment_url',
                                    'pr.account_id as account_id',
                                    'acc.name as account_name',
                                    'pr.is_approved as is_so_approved',
                                    'pr.approved_by as so_approved_by',
                                    'po.delivery_date as po_date',
                                    'po.is_approved as is_po_approved',
                                    'po.approved_by as po_approved_by',
                                    'supp.email as customer_email',
                                    'u.name as approved_by',
                                    'r.name as role'
                                )
                            ->where('po.company_id', '=', $user->business->id)
                            ->where('spd.is_approved', '=', false)

                            ->get();

        return view('spending.index', compact('spendings'));
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
            'spending_id' => 'required',
            'spending_date' => 'required',
            'amount' => 'required',    
        ]);

        $spending = Spending::find(request('spending_id'));
        $spending->spending_date = request('spending_date');
        $spending->amount = request('amount');
        $spending->save();

        return redirect(route('spending.index'))->with('success', 'Data uang keluar berhasil di update');
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
            'spending_id' => 'required'
        ]);

        $user = Auth::user();

        $spending = Spending::find(request('spending_id'));

        if ($spending->amount == null || $spending->spending_date == null) {
            return redirect(route('spending.index'))->with('error', 'Tolong lengkapi Jumlah dan Tanggal uang keluar terlebih dahulu');
        }

        $spending->approved_by = $user->id;
        $spending->is_approved = true;
        $spending->updated_at = Carbon::now();
        $spending->save();

        $pr = PurchaseRequest::find($spending->purchase_request_id);

        $bank = Bank::find($pr->account_id);
        $bank->balance = $bank->balance - $spending->amount;
        $bank->save();

        Journal::create([
            'amount' => $spending->amount,
            'date' => $spending->spending_date,
            'type' => 2,
            'sales_order_id' => $pr->id,
            'bank_id' => $bank->id,
            'company_id' => $user->business_id,
        ]);

        return redirect(route('spending.index'))->with('success', 'Uang Keluar berhasil di setujui');
    }
}
