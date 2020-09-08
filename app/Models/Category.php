<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
   use HasTranslations;
    protected $table = 'category';
    public $timestamps = false;
  //  use SoftDeletes;
    public $translatable = ['name','slug'];
    protected  $guarded=[];
//    protected $fillable = ['name', 'slug', 'price', 'discountprice','lectures','hours','photo','category_id' ];




    public function course()
    {
        return $this->hasMany(Course::class, 'category_id');
    }


//    public function course_updated_at()
//    {
//                $date=\Carbon\Carbon::parse($this->created_at);
//        return $date->isoFormat('MMM D YYYY');
//    }


}
