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
            'name' => 'required|min:3',
            'code' => 'required'
        ]);
        
        Division::create($data);
        
        return redirect(route('division.index'));
    }

    public function destroy() {
        Division::destroy(request('id'));

        return redirect(route('division.index'));
    }   
}
