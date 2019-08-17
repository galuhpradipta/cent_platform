<?php

namespace App\Exports;
use URL;
use DB;
use Auth;
use App\SalesOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class SalesOrderExport implements FromQuery, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {   
        $user = Auth::user();
      
        return  DB::table('sales_orders as so')
        ->join('customers as cust', 'so.customer_id', '=', 'cust.id')
        ->join('banks as acc', 'so.account_id', '=', 'acc.id')
        ->join('users as u', 'so.approved_by', '=', 'u.id')
        ->join('roles as r', 'u.role', '=', 'r.id')

        ->where('so.company_id', $user->business->id )
        ->where('so.is_approved', false)
        ->select('so.*', 
            'cust.email as customer_email',
            'cust.address as customer_address',
            'cust.phone_number as customer_phone_number',
            'acc.name as account_name',
            'acc.code as account_code',
            'acc.category as account_category',
            'u.name as approval_name',
            'r.name as approval_by_role')
        ->orderBy('created_at');
    }

    public function map($so): array {
       
 
        $baseImageURL = URL::to('/').'/storage/';

        return [
            $so->order_date,
            $so->discount,
            $so->down_payment,
            $so->ppn,
            $so->total,
            $baseImageURL.$so->attachment_url,
            $so->is_approved,
            $so->customer_email,
            $so->customer_address,
            $so->customer_phone_number,
            $so->account_name,
            $so->account_code,
            $so->account_category,
            $so->approval_name,
            $so->approval_by_role,
        ];
    }

    public function headings(): array {
        return [
            'order_date',
            'discount',
            'down_payment',
            'ppn',
            'total',
            'attachment_url',
            'is_approved',
            'customer_email',
            'customer_address',
            'customer_phone_number',
            'account_name',
            'account_code',
            'account_category',
            'approval_name',
            'approval_by_role',
        ];
    }
}
