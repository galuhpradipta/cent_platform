<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\User;
use Auth;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $banks = Bank::where([
            'company_id' => $user->business->id,
        ])->get();

        return view('bank.index', compact('banks'));
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
            'name' => 'required|min:2',
            'code' => 'required|min:2',
            'category' => 'required',
            'balance' => 'required',
        ]);

        $user = Auth::user();

        Bank::create([
            'name' => request('name'),
            'code' => request('code'),
            'initial_balance' => request('balance'),
            'category' => request('category'),
            'balance' => request('balance'),
            'company_id' => $user->business->id,
        ]);

        return redirect(route('bank.index'))->with('success', 'Bank/Cash account successfully created');
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
            'code' => 'required',
        ]);

        $bank = Bank::find(request('id'));
        $bank->name = request('name');
        $bank->code = request('code');
        $bank->save();

        return redirect(route('bank.index'))->with('success', 'Bank/Cash account successfully updated');
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

    public function getBank($id) {
        $bank = Bank::find($id);

        return response()->json($bank);
    }
}
