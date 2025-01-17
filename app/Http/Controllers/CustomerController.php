<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Business;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user = Auth::user();
        $customers = Customer::where(['company_id' => $user->business->id])->get();

        return view('customer.index', compact('customers'));
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
    
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        $user = Auth::user();

        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->phone_number = request('phone_number');
        $customer->address = request('address');
        $customer->company_id = $user->business->id;
        $customer->save();

        return redirect()->back()->with('success', 'Customer succesfully added');
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
            'id' => 'required',
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::find(request('id'));

        $customer->name = request('name');
        $customer->email = request('email');
        $customer->phone_number = request('phone_number');
        $customer->address = request('address');
        
        $customer->save();

        return redirect(route('customer.index'))->with('success', 'Customer data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        request()->validate([
            'customer_id' => 'required',
        ]);

        Customer::destroy(request('customer_id'));

        return redirect(route('customer.index'))->with('success', 'Customer successfully deleted');

    }

    public function getCustomer($id) {
        $customer = Customer::find($id);

        return response()->json($customer);
    }
}
