<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes;
    protected $table='projects';
    public $timestamps=true;
    protected $guarded=[];


    public function post_updated_at()
    {
        $date=\Carbon\Carbon::parse($this->created_at);
        return $date->isoFormat('MMM D YYYY');
    }

    public function previous()
    {
      return  $this::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }

    public function next()
    {
      return  $this::where('id', '>', $this->id)->orderBy('id')->first();
    }
}
