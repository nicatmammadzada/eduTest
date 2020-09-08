<?php

namespace App\Http\Controllers;

use App\Dil;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class DilController extends Controller
{
    public function index(){
        $diller = Dil::all();
        return view('admin.dil.list',compact('diller'));
    }

    public function edit($id){
        $dil = Dil::where('id',$id)->firstOrFail();
        return view('admin.dil.edit',compact('dil'));
    }

    public function editor($id){


        $validate = [
            'dil' => 'required|unique:dil,dil',
        ];
        $messages = [
            'dil.required' => 'Dil boş ola bilməz!',
            'dil.unique' => 'Dil artıq əlavə olunub!',
        ];
        $this->validate(request(),$validate,$messages);


        $dil = Dil::find($id);
        $dil->dil = strtolower(strval(request('dil')));
        $dil->save();
        return back();
    }

    public function new(){
        return view('admin.dil.new');
    }

    public function add(){

        $validate = [
            'dil' => 'required|unique:dil,dil',
        ];
        $messages = [
            'dil.required' => 'Dil boş ola bilməz!',
            'dil.unique' => 'Dil artıq əlavə olunub!',
        ];
        $this->validate(request(),$validate,$messages);

        $dil = new Dil();
        $dil->dil = strtolower(strval(request('dil')));
        $dil->save();

        return redirect()->route('dil.list');
    }

    public function sil($id)
    {
        $dil = Dil::find($id);
        $dil->delete();
        return back();
    }
}
