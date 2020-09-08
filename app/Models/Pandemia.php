<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pandemia extends Model
{
    protected $table='pandemia';
    public $timestamps=true;
    protected $fillable=['photo','text','title'];


    public function post_updated_at()
    {
        $date=\Carbon\Carbon::parse($this->updated_at);
        return $date->isoFormat('MMM D YYYY');
    }
}
