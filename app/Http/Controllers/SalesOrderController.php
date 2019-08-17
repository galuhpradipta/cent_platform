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
        $customer = Customer::find(request('customer_id'));

        $so = SalesOrder::create([
            'company_id' => $user->business->id,
            'customer_id' => $data['customer_id'],
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
                'sales_order_id'  => $so->id,
                'product_id' => $key,
                'quantity' => $value,
            ]);
        }

        if (!empty($file)) {
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
        $so = SalesOrder::find($id);

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

        $salesOrders = DB::table('sales_orders as so')
                    // ->join('companies as comp', 'so.company_id', '=', 'comp.id')
                    ->join('customers as cust', 'so.customer_id', '=', 'cust.id')
                    ->join('banks as acc', 'so.account_id', '=', 'acc.id')
                    ->join('users as u', 'so.approved_by', '=', 'u.id')
                    ->join('roles as r', 'u.role', '=', 'r.id')

                    ->where('so.company_id', $user->business->id )
                    ->where('so.is_approved', true)
                    ->select('so.*', 
                        'cust.email as customer_email',
                        'cust.address as customer_address',
                        'cust.phone_number as customer_phone_number',
                        'acc.name as account_name',
                        'acc.code as account_code',
                        'acc.category as account_category',
                        'u.name as approval_name',
                        'r.name as approval_by_role')
                    ->get();

        $soArray[] = array('Sales Order ID', 'Order Date', 'Discount', 'Down Payment',
                    'PPN', 'Total', 'Attachment URL', 'Created At', 'Customer Email',  'Customer Address', 'Customer Phone Number',
                    'Account Name', 'Account Code', 'Account Category', 'Approved By', 'Approved By Role');
                    
        foreach ($salesOrders as $so) {
            $soArray[] = array(
                'Sales Order ID' => $so->id,
                'Order Date' => $so->order_date,
                'Discount' => $so->discount,
            );
        }

        // Excel::download/Excel::store('Sales Order Data', function($excel) use ($soArray) {
        //     $excel->setTitle('Sales Order Data');
        //     $excel->sheet('Sales Order Data', function($sheet) use ($soArray) {
        //         $sheet->fromArray($soArray, null, 'A1', false, false);
        //     })->download('xlsx');
        // });

        return Excel::download(new SalesOrderExport, 'so.xlsx');


        // dd($salesOrders);
    }
}
