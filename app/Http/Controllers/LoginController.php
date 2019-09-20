<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use App\User;
use App\Role;
use App\Subscribtion;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {

        $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ])) {
            $user = User::where([
                'email' => $data['email']
            ])->first();

            $company = Company::where([
                'subscribtion_id' => $user->company_id,
            ])->first();

            $subsTypeSME = Subscribtion::where(['name' => 'sme'])->first();

            if ($company->subscribtion_id == $subsTypeSME->subscribtion_id) {
                return redirect()->route('sme.index');
            }

            if ($user->role_id == 1) {
                return redirect()->route('home');
            }

            if ($user->role == "Supervisor") {
                return redirect()->route('home');
            }
        }

        return redirect()->back()->withErrors(['Email and Password didn\'t match or not exist']);;
    }
}
