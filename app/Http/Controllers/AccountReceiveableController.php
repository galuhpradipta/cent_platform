<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountReceiveable;

class AccountReceiveableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function salesOrder() {
        return view('ar.sales-order');
    }
}
