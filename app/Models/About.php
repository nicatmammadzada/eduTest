<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table='about';
    public $timestamps=false;
    protected $fillable=['photo','text1','text2','text3','title'];
}
