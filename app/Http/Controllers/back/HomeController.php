<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\Subscribe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $crumbs=[];
        $title='Əsas Səhifə';
        $posts=Posts::all();
        $contacts=Contact::all();
        $users=User::all();
        $subscribes=Subscribe::all();
        return view('back.index',compact('crumbs','title','posts','contacts','users','subscribes'));
    }

    public function lang($lang){
//        app()->setLocale($lang);
//dd(app()->getLocale());
        Session::put('applocale',$lang);

        return redirect()->back();
    }
}
