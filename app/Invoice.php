<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DeliveryOrder;
use App\SalesOrder;


class Invoice extends Model
{
    protected $guarded = [];

    public function deliveryOrder() {
        return $this->belongsTo(DeliveryOrder::class);
    }

    public function salesOrder() {
        return $this->belongsTo(SalesOrder::class);
    }
}
