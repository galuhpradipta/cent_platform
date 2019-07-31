<?php

namespace App;

use App\User;
use App\SalesOrder;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    } 

    public function salesOrder() {
        return $this->hasMany(SalesOrder::class);
    } 
}
