<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;

class BankCategory extends Model
{
    protected $guarded = [];

    public function bank() {
        return $this->hasMany(Bank::class);
    } 

}
