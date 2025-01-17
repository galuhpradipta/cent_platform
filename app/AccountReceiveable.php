<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SalesOrder;

class AccountReceiveable extends Model
{
    protected $guarded = [];

    public function salesOrder() {
        return $this->hasOne(SalesOrder::class);
    }
}
