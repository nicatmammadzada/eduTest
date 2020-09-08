<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;

use App\Models\Dil;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;
use XSSCleaner;

class LL_Controller extends Controller
{
    public function index(){
        $lls = LanguageLine::orderBy('id','desc')->paginate(20);

        return view('back.translation.list',compact('lls'));
    }

    public function filter(){
        if(request()->filled('filter')){
            $filter = XSSCleaner::clean(request('filter'));
        }else{
            $filter = "";
        }

        $lls = LanguageLine::where('text->az','like',"%$filter%")
            ->orderBy('id','desc')
            ->paginate(20);
        return view('admin.language_translation_loader.list',compact('lls'));
    }

    public function new(){
        $langs = Dil::all();
        return view('back.translation.new',compact('langs'));
    }

    public function add(Request $request){
        $langs = Dil::all();
        foreach ($langs as $dil) {
            $tercume[$dil->dil] = request($dil->dil);
        }


        $tercumeler = [
            'group' => 'sozler',
            'key' => $request->key,
            'text' => $tercume,
        ];

        LanguageLine::create($tercumeler);

        return redirect()->route('ll.list');
    }

    public function edit($id){
        $langs = Dil::all();
        $ll = LanguageLine::find($id);
        return view('admin.language_translation_loader.edit',compact('langs','ll'));
    }

    public function editor($id,Request $request){
        $langs = Dil::all();
        $kelime = LanguageLine::find($id);

        foreach ($langs as $dil) {
            $tercume[$dil->dil] = request($dil->dil);
        }

        $tercumeler = [
            'group' => 'sozler',
            'key' => $request->key,
            'text' => $tercume,
        ];


        $kelime->update($tercumeler);
        return back();
    }

    public function sil($id){

    }
}
