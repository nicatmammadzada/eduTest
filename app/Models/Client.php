<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Comment;

class Client extends Authenticatable
{ protected $table='client';
    protected $guard = 'client';
    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'client_id');
    }



}
