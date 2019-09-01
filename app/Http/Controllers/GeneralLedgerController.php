<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralLedger;
use DB;
use URL;

class GeneralLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $generalLedgers = DB::table('general_ledgers as gl')
                ->join('businesses as b', 'gl.company_id', '=', 'b.id')
                ->select('gl.*',
                        'b.name',
                        'b.type')
                ->get();

        // dd(URL::to('/storage'));

        return view('gl.index', compact('generalLedgers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $companies = \App\Business::all();

        return view('gl.create', compact('companies'));
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
            'company_id' => 'required',
            'date' => 'required',
            'attachment' => 'required|file|max:5000',
            'description' => 'sometimes',
        ]);

        $gl = GeneralLedger::create([
            'company_id' => $data['company_id'],
            'date' => $data['date'],
            'attachment_url' => '',
        ]);

        if (!empty(request('description'))) {
            $gl->description = request('description');
        }

        if (request()->hasFile('attachment')) {
            $file = $request->file('attachment')->store('uploads', 'public');
            $gl->attachment_url  = $file;
            $gl->save();
        }

        return redirect(route('gl.index'))->with('success', 'Laporan berhasil dibuat');
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
