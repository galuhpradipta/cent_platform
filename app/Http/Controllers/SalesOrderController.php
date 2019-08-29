<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Auth;
use Carbon;
use App\User;
use App\Bank;
use App\Product;
use App\Customer;
use App\SalesOrder;
use App\AccountReceiveable;
use App\DeliveryOrder;
use App\ProductOrderDetail;
use App\Exports\SalesOrderExport;


class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $products = Product::where(['company_id' => $user->business->id ])->get();
        $customers = Customer::where(['company_id' => $user->business->id ])->get();
        $banks = Bank::where(['company_id' => $user->business->id ])->get();
        $salesOrders = SalesOrder::where([
                'company_id' => $user->business->id,
                'is_approved' => false, 
            ])->get();

        return view('sales-order.index', compact('products', 'customers', 'salesOrders', 'banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user();
        
        $customers = Customer::where(['company_id' => $user->business->id ])->get();
        $accounts = Bank::where(['company_id' => $user->business->id ])->get();
        $products = Product::where(['company_id' => $user->business->id ])->get();
        
        return view('sales-order.create', compact('customers', 'accounts', 'products'));
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
            'customer_id' => 'required',
            'account_id' => 'required',
            'invoice_number' => 'required',
            'order_date' => 'required',
            'product_ids' => 'required',
            'quantities' => 'required',
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
        $customer = Customer::find(request('customer_id'));

        $so = SalesOrder::create([
            'company_id' => $user->business->id,
            'customer_id' => $data['customer_id'],
            'order_date' => $data['order_date'],
            'discount' => $data['discount'],
            'invoice_number' => $data['invoice_number'],
            'down_payment' => $data['down_payment'],
            'account_id' => $data['account_id'],
            'total' => $data['total_price'],
            'attachment_url' => '',
            'ppn' => 0,
        ]);


        $products = [];
        foreach( $data['product_ids'] as $index => $product_id ) {
            $product = [
                'id' => $product_id,
                'quantity' => $data['quantities'][$index] 
            ];
            array_push($products, $product);    
        }

        foreach ($products as $product) {
            ProductOrderDetail::create([
                'sales_order_id'  => $so->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
            ]);
        }   
                 
        if (request()->hasFile('attachment')) {
            $file = $request->file('attachment')->store('uploads', 'public');
            $so->attachment_url  = $file;
            $so->save();
        }
        
        return redirect(route('so.index'))->with('success', 'Sales Order Successfully created');
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

    private function storeImage($salesOrder) {
        if(request()->has('attachment')) {

            // $so = SalesOrder::find($salesOrder->id);

            // $so->attachment_url =  request()->image->store('uploads', 'public');
            // $so->save();
            $salesOrder->update([
                'attachment_url' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    public function getSalesOrder($id) {
        // $so = SalesOrder::find($id);

        $so = DB::table('sales_orders as so')
            ->join('customers as cust', 'so.customer_id', '=', 'cust.id')
            ->where('so.id', '=', $id)
            ->select('so.*',
                'cust.id as customer_id',
                'cust.email as customer_email',
                'cust.name as customer_name',
                'cust.address as customer_address')
            ->get();

        return response()->json($so);
    }

    public function approve() {

        $user = Auth::user();

        $so = SalesOrder::find(request('sales_order_id'));
        $so->approved_by = $user->id;
        $so->is_approved = true;
        $so->updated_at = Carbon::now();
        $so->save();

        $do = DeliveryOrder::create([
            'sales_order_id' => $so->id,
            'company_id' => $so->company_id,
        ]);

        return redirect(route('so.index'))->with('success', 'Pesanan Penjualan berhasil di setujui');

    }

    public function exportExcel() {
        $user = Auth::user();

        return Excel::download(new SalesOrderExport, 'so.csv');
    }

    public function getProducts($salesOrderID) {

        $products = DB::table('product_order_details as pod')
                ->join('products as p', 'pod.product_id', '=', 'p.id')
                ->where('pod.sales_order_id', '=', $salesOrderID)
                ->get()->toArray();

        
        return response()->json($products);
    }

    private function array_combine_($keys, $values){
        $result = array();
    
        foreach ($keys as $i => $k) {
         $result[$k][] = $values[$i];
         }
    
        array_walk($result, function(&$v){
         $v = (count($v) == 1) ? array_pop($v): $v;
         });
    
        return $result;
    }
}
