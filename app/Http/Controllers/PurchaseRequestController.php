<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Supplier;
use App\Product;
use App\Bank;
use App\PurchaseRequest;
use App\ProductOrderDetail;

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
        // $purchaseRequests = PurchaseRequest::where(['company_id' => 1,])->get();

        return  view('purchase-request.index', compact( 'products'));
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
        
        return view('purchase-request.create', compact('suppliers', 'accounts', 'products'));
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
            'discount' => 'required',
            'down_payment' => 'required',
            'subtotal_price' =>  'required',
            'total_price' => 'required',
            'attachment' =>  'sometimes|file|max:5000',
        ]);
            
        $user = Auth::user();
        $supplier = Supplier::find(request('supplier_id'));

        $pr = PurchaseRequest::create([
            'company_id' => $user->business->id,
            'supplier_id' => $data['supplier_id'],
            'order_date' => $data['order_date'],
            'discount' => $data['discount'],
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

        if (!empty($file)) {
            $file = $request->file('attachment')->store('uploads', 'public');
            $so->attachment_url  = $file;
            $so->save();
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
}
