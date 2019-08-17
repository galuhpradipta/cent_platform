<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user = Auth::user();
        $suppliers = Supplier::where(['company_id' => $user->business->id])->get();


        return view('supplier.index', compact('suppliers'));
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
            'id' => 'required',
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $user = Auth::user();

        $supplier = new Supplier();
        $supplier->name = request('name');
        $supplier->email = request('email');
        $supplier->phone_number = request('phone_number');
        $supplier->address = request('address');
        $supplier->company_id = $user->business->id;
        $supplier->save();

        return redirect(route('supplier.index'))->with('success', 'Supplier succesfully added');
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

        $supplier = Supplier::find(request('id'));

        $supplier->name = request('name');
        $supplier->email = request('email');
        $supplier->phone_number = request('phone_number');
        $supplier->address = request('address');
        
        $supplier->save();

        return redirect(route('supplier.index'))->with('success', 'Supplier data updated');
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
            'supplier_id' => 'required',
        ]);

        Supplier::destroy(request('supplier_id'));

        return redirect(route('supplier.index'))->with('success', 'Supplier successfully deleted');
    }

    public function getSupplier($id) {
        $supplier = Supplier::find($id);

        return response()->json($supplier);
    }
}
