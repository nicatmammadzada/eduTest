<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table='slider';
    public $timestamps=false;
    protected $fillable=['text1','text2','text3','text4','text5','text6'];
}
