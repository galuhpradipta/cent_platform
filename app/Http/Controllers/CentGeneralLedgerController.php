<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bank;
use App\CentGeneralLedger;
use App\CentGeneralLedgerDetail;


class CentGeneralLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $accounts = Bank::where(['company_id' => $user->business_id])->get();

        return view('gl-cent.index', compact('accounts'));
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
        // dd(request());

        $data = request()->validate([
            'transaction_number' =>  'required',
            'transaction_date' =>  'required',
            'tag' => 'required',
            'total_debit' => 'required',
            'total_credit' => 'required',
            'attachment' =>  'sometimes|file|max:5000',
            'account_ids' => 'required',
            'debit_amounts' => 'required',
            'credit_amounts' => 'required',
            'descriptions' => 'required',
        ]);

        

        $user = Auth::user();
            
        $cgl = CentGeneralLedger::create([
            'company_id' => $user->business_id,
            'transaction_number' => $data['transaction_number'],
            'transaction_date' => $data['transaction_date'],
            'debit_amount' => $data['total_debit'],
            'credit_amount' => $data['total_credit'],
            'memo' => request('memo'),
            'tag' =>  $data['tag'],
            'attachment_url' => '',
        ]);

        if (request()->hasFile('attachment')) {
            $file = $request->file('attachment')->store('uploads', 'public');
            $cgl->attachment_url  = $file;
            $cgl->save();
        }

        // $gl_details = [];
        foreach ( $data['account_ids'] as $index => $account_id) {
            // $gl_detail = [
            //     'account_id' => $account_id,
            //     'debit_amount' => $data['debit_amounts'][$index],
            //     'credit_amount' => $data['credit_amounts'][$index],
            //     'description' => $data['descriptions'][$index]
            // ];

            CentGeneralLedgerDetail::create([
                'cent_general_ledger_id' => $cgl->id,
                'account_id' => $account_id,
                'debit_amount' => $data['debit_amounts'][$index],
                'credit_amount' => $data['credit_amounts'][$index],
                'description' => $data['descriptions'][$index]
            ]);

            // array_push($gl_details,  $gl_detail);
        }

        // dd($gl_details);

        return redirect(route('gl.index'));
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
