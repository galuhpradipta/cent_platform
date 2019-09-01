<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Auth;
use DB;
use Carbon;
use App\Supplier;
use App\Product;
use App\Bank;
use App\PurchaseRequest;
use App\PurchaseOrder;
use App\ProductOrderDetail;
use App\Journal;
use App\Exports\PurchaseRequestExport;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $user = Auth::user();

        $products = Product::where(['company_id' => 1,])->get();
        
        $purchaseRequests = DB::table('purchase_requests as pr')
                        ->join('customers as cust', 'pr.supplier_id', '=', 'cust.id')                      
                        ->where('pr.company_id', $user->business->id )
                        ->where('pr.is_approved', false)
                        ->select('pr.*',
                            'cust.id as customer_id', 
                            'cust.name as customer_name',
                            'cust.email as customer_email',
                            'cust.address as customer_address',
                            'cust.phone_number as customer_phone_number')                    
                        ->get();
        
        return  view('purchase-request.index', compact( 'products', 'purchaseRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        
        $suppliers = Supplier::where(['company_id' => $user->business->id ])->get();
        $accounts = Bank::where(['company_id' => $user->business->id ])->get();
        $products = Product::where(['company_id' => $user->business->id ])->get();
        $purchaseRequests = PurchaseRequest::where([
            'company_id' => $user->business->id,
            'is_approved' => false,
        ])->get();
        
        return view('purchase-request.create', compact('suppliers', 'accounts', 'products', 'purchaseRequests'));
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
            'supplier_id' => 'required',
            'account_id' => 'required',
            'order_date' => 'required',
            'product_ids' => 'required',
            'quantities' => 'required',
            'invoice_number' => 'required',
            'discount' => 'sometimes',
            'down_payment' => 'sometimes',
            'subtotal_price' =>  'required',
            'total_price' => 'required',
            'attachment' =>  'sometimes|file|max:5000',
        ]);

        if (request('discount') == null) {
            $data['discount'] = 0;
        }

        if (request('down_payment') == null) {
            $data['down_payment'] = 0;
        }
            
        $user = Auth::user();
        $supplier = Supplier::find(request('supplier_id'));

        $pr = PurchaseRequest::create([
            'company_id' => $user->business->id,
            'supplier_id' => $data['supplier_id'],
            'order_date' => $data['order_date'],
            'discount' => $data['discount'],
            'invoice_number' => $data['invoice_number'],
            'down_payment' => $data['down_payment'],
            'account_id' => $data['account_id'],
            'total' => $data['total_price'],
            'attachment_url' => '',
            'ppn' => 0,
        ]);

        $products = array_combine($data['product_ids'], $data['quantities']);
        foreach ($products as $key => $value) {
            ProductOrderDetail::create([
                'purchase_request_id'  => $pr->id,
                'product_id' => $key,
                'quantity' => $value,
            ]);
        }

        if (request()->hasFile('attachment')) {
            $file = $request->file('attachment')->store('uploads', 'public');
            $pr->attachment_url  = $file;
            $pr->save();
        }

        if (request('down_payment') != null ) {
            $bank = Bank::find(request('account_id'));
            $bank->balance = $bank->balance - request('down_payment');
            $bank->save();

            Journal::create([
                'amount' => $data['down_payment'],
                'date' => $data['order_date'],
                'type' => 2,
                'purchase_request_id' => $pr->id,
                'bank_id' => $data['account_id'],
                'company_id' => $user->business_id,
            ]);
        }
        
        return redirect(route('pr.index'))->with('success', 'Purchase Request successfully created');
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

    public function approve() {

        $user = Auth::user();

        $pr = PurchaseRequest::find(request('purchase_request_id'));
        $pr->approved_by = $user->id;
        $pr->is_approved = true;
        $pr->updated_at = Carbon::now();
        $pr->save();

        $do = PurchaseOrder::create([
            'purchase_request_id' => $pr->id,
            'company_id' => $pr->company_id,
        ]);

        return redirect(route('pr.index'))->with('success', 'Pengiriman Penjualan berhasil di setujui');

    }

    public function exportExcel() {
        return Excel::download(new PurchaseRequestExport, 'pr.csv');
    }
}
