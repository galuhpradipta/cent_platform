<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMEController extends Controller
{
    public function index() {
        return view('sme.dashboard');
    }

    public function create() {
        return view('sme.create');
    }

    public function pendingPage() {
        return view('sme.pending');
    }
}
