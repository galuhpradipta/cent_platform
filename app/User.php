<?php

namespace App;

use App\Business;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSupervisor($query) {
        return $query->where(['role' => 1]);
    }

    public function scopeAdmin($query) {
        return $query->where(['role' => 4]);
    }

    public function business() {
        return $this->belongsTo(Business::class);
    }

    public function getRoleAttribute($attribute) {
        return $this->roleOptions()[$attribute];
    }

    public function roleOptions() {
        return [           
            0 => 'Supervisor',
            1 => 'Admin',
        ];
    }
}
