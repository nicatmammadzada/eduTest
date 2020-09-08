<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $table='users';
    protected $guarded=[];
    public $timestamps=true;

    public function detail()
    {
        return $this->hasOne('App\Models\UserDetail','user_id');
    }

    public function user_updated_at()
    {
        $date=\Carbon\Carbon::parse($this->updated_at);
        return $date->isoFormat('MMM D YYYY');
    }
}
