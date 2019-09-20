<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    
    public function users() {
        return $this->hasMany(User::class);
    }
}
