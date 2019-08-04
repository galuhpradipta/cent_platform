<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BankCategory;

class Bank extends Model
{  
    protected $guarded = [];
   
    public function bankCategory() {
        return $this->belongsTo(BankCategory::class);
    }
}
