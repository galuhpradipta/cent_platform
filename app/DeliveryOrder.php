<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SalesOrder;

class DeliveryOrder extends Model
{
    protected $guarded = [];

    public function salesOrder() {
        return $this->belongsTo(SalesOrder::class);
    }
}
