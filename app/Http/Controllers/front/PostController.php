<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
      $posts=Posts::orderBy('id','desc')->paginate(2);

      return view('front.post.index',compact('posts'));
  }

  public function detail($slug)
  {
      $post=Posts::orderBy('id','desc')->where('slug->'.app()->getLocale(),$slug)->first();
      return view('front.post.detail',compact('post'));
  }
}
