<?php

namespace App\Exports;
use URL;
use DB;
use Auth;
use App\PurchaseRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class PurchaseRequestExport implements FromQuery, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {   
        $user = Auth::user();
        return DB::table('purchase_requests as pr')
        ->join('suppliers as supp', 'pr.supplier_id', '=', 'supp.id') 
        ->where('pr.company_id', $user->business->id )
        ->where('pr.is_approved', false)
        ->select('pr.*', 
            'supp.email as supplier_email',
            'supp.address as supplier_address',
            'supp.phone_number as supplier_phone_number')
           
        ->orderBy('created_at');
    }

    public function map($pr): array {
        $baseImageURL = URL::to('/').'/storage/';

        return [
            $pr->order_date,
            $pr->discount,
            $pr->down_payment,
            $pr->ppn,
            $pr->total,
            $baseImageURL.$pr->attachment_url,
            $pr->is_approved,
            $pr->supplier_email,
            $pr->supplier_address,
            $pr->supplier_phone_number,
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
            'supplier_email',
            'supplier_address',
            'supplier_phone_number',
            'account_name',
            'account_code',
            'account_category',
            'approval_name',
            'approval_by_role',
        ];
    }
}
