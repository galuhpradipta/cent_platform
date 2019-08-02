<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Business;
use App\Product;
use App\Customer;


class SalesOrder extends Model
{
    protected $guarded = [];

    public function business() {
        return $this->belongsTo(Business::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}