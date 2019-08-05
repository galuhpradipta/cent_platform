<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Income;
use Carbon;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $user = Auth::user();
        $incomes = Income::where([
            'company_id' => $user->business->id,
            'is_approved' => false,
        ])->get();

        // dd($incomes);

        return view('income.index', compact('incomes'));
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
    public function update(Request $request)
    {   
        $data = request()->validate([
            'income_id' => 'required',
            'income_date' => 'required',
            'amount' => 'required',    
        ]);

        $income = Income::find(request('income_id'));
        $income->income_date = request('income_date');
        $income->amount = request('amount');
        $income->save();

        return redirect(route('income.index'))->with('success', 'Data uang masuk berhasil di update');
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
            'income_id' => 'required'
        ]);

        $user = Auth::user();

        $income = Income::find(request('income_id'));

        if ($income->amount == null || $income->income_date == null) {
            return redirect(route('income.index'))->with('error', 'Tolong lengkapi Jumlah uang masuk dan Tanggal uang masuk terlebih dahulu');
        }

        $income->approved_by = $user->id;
        $income->is_approved = true;
        $income->updated_at = Carbon::now();
        $income->save();

        return redirect(route('income.index'))->with('success', 'Invoice Penjualan berhasil di setujui');
    }
}
