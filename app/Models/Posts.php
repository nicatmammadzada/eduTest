<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Posts extends Model
{
    use HasTranslations;
    use SoftDeletes;
    protected $table='post';
    public $timestamps=true;
    public $translatable = ['title','name','slug','description','small_text'];
    protected  $guarded=[];

//    protected $fillable=['title','small_text','description1','description2','photo','slug','category_id',];


    public function post_updated_at()
    {
        $date=\Carbon\Carbon::parse($this->created_at);
        return $date->isoFormat('MMM D YYYY');
    }

    public function category()
    {
      return  $this::belongsToMany(Category::class,'category_post','posts_id','category_id');
    }

    public function oneCategory()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function next()
    {
      return  $this::where('id', '>', $this->id)->orderBy('id')->first();
    }


    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }


}
