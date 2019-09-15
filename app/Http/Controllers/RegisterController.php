<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Company;
use App\User;
use App\Subscribtion;
use App\Sector;
use App\AccountCategory;
use App\Account;
use App\Role;
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
        $sectors = Sector::all();

        return view('auth.register', compact('sectors'));
    }

    public function register() {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone_number' => 'required',
            'company_name' => 'required|min:3',
            'company_sector_id' => 'required',
            'company_income' => 'required',
        ]);

        $subscribtion = Subscribtion::where([
            'name' => 'sme',
        ])->first();

        $company = Company::create([
            'subscription_id' => $subscribtion->subscribtion_id,
            'sector_id' => $data['company_sector_id'],
            'name' => $data['company_name'],
            'income' => $data['company_income'],
            'phone_number' => $data['phone_number'],
        ]);

        // get admin constant
        $roleAdmin = Role::where([
            'name' => 'admin',
        ])->first();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'unencrypted_password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'role_id' => $roleAdmin->role_id,
            'company_id' => $company->id,
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

        $accountKasBank = AccountCategory::where([
            'name' => 'kas_dan_bank'
        ])->first();

        $accountAkunPiutang = AccountCategory::where([
            'name' => 'akun_piutang'
        ])->first();

        $accountPersediaan = AccountCategory::where([
            'name' => 'persediaan'
        ])->first();

        $accountAktivaLancarLainnya = AccountCategory::where([
            'name' => 'aktiva_lancar_lainnya'
        ])->first();

        $accounts = [
            [   
                'account_category_id' => $accountKasBank->account_category_id,
                'code' => '1-10001',
                'name' => 'Kas',
                'initial_balance' => 0
            ],
            [
                'account_category_id' => $accountKasBank->account_category_id,
                'code' => '1-10002',
                'name' => 'Rekening Bank',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAkunPiutang->account_category_id,
                'code' => '1-10100',
                'name' => 'Piutang Usaha',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAkunPiutang->account_category_id,
                'code' => '1-10101',
                'name' => 'Piutang Belum Ditagih',
                'initial_balance' => 0
            ],
            [
                'account_category_id' => $accountPersediaan->account_category_id,
                'code' => '1-10200',
                'name' => 'Persediaan Barang',
                'initial_balance' => 0
            ],
            [       
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10300',
                'name' => 'Piutang Lainnya',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10301',
                'name' => 'Piutang Karyawan',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10400',
                'name' => 'Dana Belum Disetor',
                'initial_balance' => 0
            ],
            [
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10401',
                'name' => 'Aset Lancar Lainnya',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10402',
                'name' => 'Biaya Bayar Dimuka',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10403',
                'name' => 'Uang Muka',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10500',
                'name' => 'PPN Masukan',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10501',
                'name' => 'Pajak Bayar Dimuka - PPh 22',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10502',
                'name' => 'Pajak Bayar Dimuka - PPh 23',
                'initial_balance' => 0
            ],
            [   
                'account_category_id' => $accountAktivaLancarLainnya->account_category_id,
                'code' => '1-10503',
                'name' => 'Pajak Bayar Dimuka - PPh 25',
                'initial_balance' => 0
            ],
        ];

        foreach ($accounts as $account) {
            Account::create([
                'name' => $account['name'],
                'code' => $account['code'],
                'initial_balance' => 0,
                'account_category_id' => $account['account_category_id'],
                'balance' => 0,
                'company_id' => $user->company_id,
            ]);
        }
    }
}
