<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Carbon;
use App\User;
use App\Account;
use App\AccountCategory;


class AccountController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {          
        $accounts = DB::table('accounts as a')
            ->select('a.name as account_name',
                'a.code as account_code',
                'ac.name as category_name',
                'ac.description as category_description')
            ->join('account_categories as ac', 'a.account_category_id', '=', 'ac.account_category_id')
            ->where('company_id', Auth::user()->company_id)
            ->get();

        $categories = AccountCategory::all();

        return view('account.index', compact('accounts', 'categories'));
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
        $data = request()->validate([
            'account_name' => 'required|min:3',
            'account_code' => 'required|min:3',
            'account_category_id' => 'required'
        ]);

        $user = Auth::user();

        $account = Account::create([
            'name' => $data['account_name'],
            'code' => $data['account_code'],
            'account_category_id' => $data['account_category_id'],
            'company_id' => $user->company_id,
            'initial_balance' => 0,
            'balance' => 0,
        ]);

        return redirect(route('account.index'))->with('success', 'berhasil membuat akun baru');        
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
    public function update(Request $request)
    {
        $data = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;    
        $user->address = $request->address;    
        $user->phone_number = $request->phone_number;
        $user->role = $request->role; 
        $user->password = Hash::make($request->password);    
        $user->unencrypted_password = $request->password;
        $user->setUpdatedAt(Carbon::now());
        $user->save();
       
       return redirect(route('account.index'))->with('success', 'Akun Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = request()->validate([
            'id' => 'required',
        ]);

        User::destroy($data);

        return redirect(route('ent-spv.master-account'));
    }
}
