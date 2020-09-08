<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table='config';
    public $timestamps=false;
    protected $fillable=['location','email','phone','facebook','instagram','youtube','twitter','logo','logo2','reklam','lat','long','reklam2','reklam3','reklam4'];
}
