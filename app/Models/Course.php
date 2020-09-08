<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
   use HasTranslations;
    protected $table = 'course';
    public $timestamps = true;
    use SoftDeletes;
    public $translatable = ['name','slug','description'];
    protected  $guarded=[];
//    protected $fillable = ['name', 'slug', 'price', 'discountprice','lectures','hours','photo','category_id' ];




    public function category()
    {
        return $this->belongsTo(Course::class, 'category_id');
    }


    public function course_updated_at()
    {
                $date=\Carbon\Carbon::parse($this->created_at);
        return $date->isoFormat('MMM D YYYY');
    }


}
