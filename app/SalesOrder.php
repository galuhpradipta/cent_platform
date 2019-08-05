<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;
use App\Business;
use App\Product;
use App\Customer;
use App\DeliverOrder;


class SalesOrder extends Model
{
    protected $guarded = [];

    public function bank() {
        return $this->belongsTo(Bank::class);
    }

    public function business() {
        return $this->belongsTo(Business::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function deliverOrder() {
        return $this->belongsTo(DeliveryOrder::class);
    }
}
