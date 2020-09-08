<?php

namespace App\Http\Controllers\Front;

use App\Mail\UserConfirmedMail;
use App\Models\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public $clienta='n@h.com';

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');

        $this->middleware('guest:client')->except('logout');
    }

    public function login(Request $request)
    {

        if (Auth::guard('client')->check()) {
            return redirect()->to('/');
        }
        $data = [
            'email' => request('email'),
            'password' => request('password'),
            'is_active' => 1
        ];

        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::guard('client')->attempt($data, request()->has('rememberme'))) {
            request()->session()->regenerate();//bununla requestin session bilgilerini yeniliyirik
            return redirect()->back();
        }
        else {
            $errors = ['email' => 'Xetalı giriş'];
            return back()->withErrors($errors);
        }

    }



    public function register_form()
    {
        return view('front.auth.register');
    }

    public function register(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|min:4|max:55',
            'email' => 'required|email|unique:client',
            'phone' => 'required|min:5|max:13',
            'location' => 'required',
            'street' => 'required',
            'home' => 'required',
            'content' => 'required',
            'password' => 'required|confirmed|min:5|max:15'
        ]);
        DB::transaction(function () {

            $client = Client::create([
                'fullname' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'activation' => Str::random(55),
                'is_active' => 0,
                'street' => request('street'),
                'location' => request('location'),
                'home' => request('home'),
                'content' => request('content'),
                'phone' => request('phone'),
            ]);



            Mail::to(request('email'))->send(new UserConfirmedMail($client));


            return redirect(route('login'));
        });


        return redirect()->route('register')
            ->with('mesaj', 'Mailinizi testiq edin')
            ->with('type', 'success');

    }

    public function activation($activation)
    {

        $user = Client::where('activation', $activation)->first();


        if (!is_null($user)) {
            $user->activation = null;
            $user->is_active = 1;
            $user->save();
            //auth()->login($user);
            return redirect()
                ->route('home')
                ->with('mesaj', 'Qeydiyyatiniz aktivlewdirildi')//with redirect ile yonlendirdiymiz sehifeye flash session deyerler gondermeye xidmet edir
                ->with('type', 'success');
        } else {
            return redirect()
                ->to('/')
                ->with('mesaj', 'Qeydiyyatiniz aktivlewdirilmedi')//with redirect ile yonlendirdiymiz sehifeye flash session deyerler gondermeye xidmet edir
                ->with('type', 'danger');
        }
    }


    public function logout()
    {

        Auth::guard('client')->logout();
        return redirect("/");


    }


    public function foget(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'   => 'email|required',
        ]);

        if($validator->fails())
            return back()->withInput($request->only('email'))->withErrors(["login_error" => "email required"]);


        $client=Client::where('email',$request->email)->first();
        if (!$client)
            return back()->withInput($request->only('email'))->withErrors(["login_error" => "email not found"]);

        $str=Str::random('20');
        $str1=Str::random('15');
        $token=$client->id.time().$str.random_int(100,999999).time().rand(8,99999999).$str1;

        $client->token=$token;
        $client->save();

        $this->clienta=$client;

        Mail::send('emails.password-update', ['client' => $client, 'mesaj' => 'It was not paid! Please try again'], function ($message) {
            $message->from('info@yourcompanyinazerbaijan.com', 'Register');
            $message->to($this->clienta->email);
            //  $message->to('nicatmemmedzade@hotmail.com');
        });

        return redirect()->intended('/en')->withErrors(["login_error" => "Please verify password in your email"]);

    }


    public function fogetPassword(Request $request, $token)
    {
        $client=Client::where('token',$token)->first();

        return view('front.layouts.partials.update-password',compact('client'));


    }

    public function fogetPasswordEmail(Request $request,$token)
    {

        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        // $validator = Validator::make($request->all(),[
        //     'password' => 'required|min:6'
        // ]);


        //   $request=\request(['password'=>Hash::make($request->password)]);

        $client=Client::where('token',$token)->first();

        $client->password=Hash::make($request->password);


        $client->save();

        return redirect()->intended('/en')->withErrors(["login_error" => "password updated"]);
    }





}
