<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Business;
use App\User;
use App\Bank;
use Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register() {



        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone_number' => 'required',
            'company_name' => 'required|min:3',
            'company_type' => 'required',
            'company_income' => 'required',
        ]);


        $business = Business::create([
            'name' => $data['company_name'],
            'type' => $data['company_type'],
            'income' => $data['company_income'],
            'phone_number' => $data['phone_number'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'unencrypted_password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'role' => 4,
            'business_id' => $business->id,
        ]);

        $this->createCompanyAccount($user);



        return redirect('login')->with('success', 'Account successfully registered !');
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
        //
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

    private function createCompanyAccount($user) {
        
        $accounts = [
            [
                'code' => '1-10001',
                'name' => 'Kas',
                'category' => 'Kas & Bank',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10002',
                'name' => 'Rekening Bank',
                'category' => 'Kas & Bank',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10100',
                'name' => 'Piutang Usaha',
                'category' => 'Akun Piutang',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10101',
                'name' => 'Piutang Belum Ditagih',
                'category' => 'Akun Piutang',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10200',
                'name' => 'Persediaan Barang',
                'category' => 'Persediaan',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10300',
                'name' => 'Piutang Lainnya',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10301',
                'name' => 'Piutang Karyawan',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10400',
                'name' => 'Dana Belum Disetor',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10401',
                'name' => 'Aset Lancar Lainnya',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10402',
                'name' => 'Biaya Bayar Dimuka',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10403',
                'name' => 'Uang Muka',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10500',
                'name' => 'PPN Masukan',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10501',
                'name' => 'Pajak Bayar Dimuka - PPh 22',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10502',
                'name' => 'Pajak Bayar Dimuka - PPh 23',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
            [
                'code' => '1-10503',
                'name' => 'Pajak Bayar Dimuka - PPh 25',
                'category' => 'Aktiva Lancar Lainnya',
                'initial_balance' => 0
            ],
        ];

        foreach ($accounts as $account) {
            Bank::create([
                'name' => $account['name'],
                'code' => $account['code'],
                'initial_balance' => 0,
                'category' => $account['category'],
                'balance' => 0,
                'company_id' => $user->business_id,
            ]);
        }

        // Bank::create([
        //     'name' => request('name'),
        //     'code' => request('code'),
        //     'initial_balance' => request('balance'),
        //     'category' => request('category'),
        //     'balance' => request('balance'),
        //     'company_id' => $user->business->id,
        // ]);
    }
}
