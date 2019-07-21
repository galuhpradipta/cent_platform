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

    public function salesOrder() {
        return view('sme.so');
    }

    public function deliveryOrder() {
        return view('sme.do');
    }

    public function invoice() {
        return view('sme.invoice');
    }

    public function uangMasuk() {
        return view('sme.uang-masuk');
    }

    public function history() {
        return view('sme.history');
    }
}
