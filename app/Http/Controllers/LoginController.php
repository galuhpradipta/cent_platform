<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        
        if (Auth::attempt([
            'email' => request()->email,
            'password' => request()->password
        ])) {
            $user = User::where('email', request()->email)->first();
            // if ($user->business_type == 1) {
            //     return redirect()->route('ar.so');
            // }

            if ($user->supervisor()) {
                return redirect()->route('ent-spv.index');
            }

            // if user role == 4 (admin) redirect to admin page only
            if ($user->admin()) {
                return redirect()->route('ent-admin.index');
            }
 
            


        }
        return redirect()->back();
    }
}
