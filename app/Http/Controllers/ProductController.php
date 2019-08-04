<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;


class ProductController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user = Auth::user();
        $products = Product::where(['company_id' => $user->business->id])->get();

        return view('product.index', compact('products'));
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
        $user = Auth()->user();  

        $data = request()->validate([
            'name' => 'required',
            'code' => 'required',
            'unit' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();

        $product->name = request('name');
        $product->code = request('code');
        $product->unit = request('unit');
        $product->price = request('price');
        $product->company_id = $user->business->id;
        $product->save();


        return redirect(route('product.index'))->with('success', 'Product successfully created');
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
            'product_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find(request('product_id'));
        
        $product->name = request('name');
        $product->code = request('code');
        $product->price = request('price');
        
        $product->save();

        return redirect(route('product.index'))->with('success', 'Product successfully updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $data = request()->validate([
            'product_id' => 'required'
        ]);

        Product::destroy(request('product_id'));

        return redirect(route('product.index'))->with('success', 'Product successfully deleted');
    }

    public function getProduct($id) {
        $product = Product::find($id);

        return response()->json($product);
    }
}
