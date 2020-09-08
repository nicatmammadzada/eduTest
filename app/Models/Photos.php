<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table='photos';
    public $timestamps=false;
    protected $fillable=['name'];
}
