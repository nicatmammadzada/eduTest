<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function index()
  {
      $blogs=Blog::orderBy('id','desc')->paginate(2);

      return view('front.blog.index',compact('blogs'));
  }
}
