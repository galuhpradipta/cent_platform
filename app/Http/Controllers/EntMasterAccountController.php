<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Carbon;


class EntMasterAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $admin = Auth::user();
        $accounts = User::where(['registered_by' => $admin->id])->get();

        return view('ent.spv.master-account', compact('accounts'));

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
        $admin = User::where(['id'=> $request->registered_by])->first();

        request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'unencrypted_password' => $request->password,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'business_id' => $admin->business->id,
            'registered_by' => $admin->id,
        ]);

        return redirect()->back();
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;    
        $user->address = $request->address;    
        $user->phone_number = $request->phone_number;
        $user->role = $request->role; 
        $user->password = Hash::make($request->password);    
        $user->unencrypted_password = $request->password;
        $user->setUpdatedAt(Carbon::now());
        $user->save();
       
       return redirect(route('ent-spv.master-account'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = request()->validate([
            'id' => 'required',
        ]);

        User::destroy($data);

        return redirect(route('ent-spv.master-account'));
    }
}
