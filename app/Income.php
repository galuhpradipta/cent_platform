<?php

namespace App;
use App\Invoice;
use App\DeliveryOrder;
use App\SalesOrder;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

    public function deliveryOrder() {
        return $this->belongsTo(DeliveryOrder::class);
    }

    public function salesOrder() {
        return $this->belongsTo(SalesOrder::class);
    }

}
