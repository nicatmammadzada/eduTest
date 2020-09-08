<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Mail\UserActivationMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crumbs=[
            'Adminlər'=>route('admin.user')
        ];
        $title='Adminlər';
        $users=User::all();
        return view('back.user.index',compact('title','crumbs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crumbs=[
            'Admin'=>route('admin.user'),
            'Yeni'=>route('admin.user.create')
        ];
        $title='Yeni Admin';
        return view('back.user.create',compact('crumbs','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'fullname'=>'required|min:5|max:55',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:5|max:15'
        ]);

        DB::transaction(function () {

            $user=User::create([
                'fullname'=>request('fullname'),
                'email'=>request('email'),
                'password'=>Hash::make(request('password')),
                'activation'=>Str::random(55),
                'is_active'=>0,
                'is_admin'=>1
            ]);

//            Mail::to(request('email'))->send(new UserActivationMail($user));
        });


        //auth()->login($user);

        return redirect()->route('admin.user.create')
            ->with('mesaj','Admin əlavə edildi')
            ->with('type','success');
    }

    public function activation($activation)
    {
        $user=User::where('activation',$activation)->firstOrFail();
        if(!is_null($user)) {
            $user->activation=null;
            $user->is_active=1;
            $user->email_verified_at=now();
            $user->save();
        }

        return redirect()
            ->route('admin.user')
            ->with('mesaj','Profiliniz aktivləşdirildi')
            ->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        $crumbs=[
            'Admin'=>route('admin.user'),
            $user->fullname=>route('admin.user.create')
        ];
        $title=$user->fullname;

        return view('back.user.edit',compact('user','crumbs','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'fullname'=>'required|min:5|max:55',
            'email'=>'required|email',
        ]);

        $data=[
            'fullname'=>$request->fullname,
            'is_active'=>$request->has('is_active') && request('is_active')=='on' ? 1 : 0,
            'email'=>$request->email
        ];

        if($request->password!='') {
            $data['password']=Hash::make($request->password);
        }
        $user=User::findOrFail($id);
        $user->update($data);

        return redirect()
            ->route('admin.user.edit',$id)
            ->with('type','success')
            ->with('mesaj',$request->fullname.' adlı istifadəçini yenilədiniz');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()
            ->route('admin.user')
            ->with('type','success')
            ->with('mesaj','Silinmə tamamlandı');
    }
}
