<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index()
    {


        $title='Giriş';
        return view('back.login',compact('title'));
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5',
        ]);

        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
            'is_active'=>1,

        ];

        if(auth()->guard('admin')->attempt($data,request()->has('rememberme'))) {
            return redirect()->route('admin');
        } else {
           // $errors = ['Error' => 'Yanlış istifadəçi'];
            return back()->withInput()->withErrors(['email'=>'Xətalı giriş!']);
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.login');
    }
}
