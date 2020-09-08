<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourceController extends Controller
{
   public function index()
   {
     $courses=Course::orderBy('id','desc')->paginate(2);

       return view('front.cource.index',compact('courses'));
   }

   public function getCategory($slug)
   {
       $category=Category::where('slug->'.app()->getLocale(),$slug)->with('course')->first();

       return view('front.cource.index',compact('category'));
   }

   public function detail($slug)
   {
       $course=Course::where('slug->'.app()->getLocale(),$slug)->first();

       return view('front.cource.detail',compact('course'));
   }
}
