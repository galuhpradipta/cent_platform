<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $divisions = Division::get();
        

        return view('division.index', compact('divisions'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'code' => 'required'
        ]);
            

        Division::create($data);
        
        return redirect(route('division.index'));
    }

    public function update() {
        $data = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);

       $division = Division::find(request('id'));

       $division->name = request('name');
       $division->code = request('code');
       $division->save();
       
       return redirect(route('division.index'));
    }

    public function destroy() {
        $data = request()->validate([
            'id' => 'required',
        ]);

        Division::destroy(request('id'));

        return redirect(route('division.index'));
    }   
}
