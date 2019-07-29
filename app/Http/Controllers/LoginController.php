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


            if ($user->role == "Admin") {
                return redirect()->route('home');
            }

            if ($user->role == "Supervisor") {
                return redirect()->route('home');
            }
            
        }

        return redirect()->back()->withErrors(['Email and Password didn\'t match or not exist']);;
    }
}
