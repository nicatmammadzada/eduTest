<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $crumbs=[
            'Abunələr'=>route('admin.subscribe')
        ];
        $title='Abunələr';
        $subscribes=Subscribe::all();
        return view('back.subscribe',compact('title','subscribes','crumbs'));
    }

    public function destroy($id)
    {
        $subscribe=Subscribe::find($id);

        $subscribe->delete();
        return redirect()
            ->route('admin.subscribe')
            ->with('type','success')
            ->with('mesaj','Silinmə tamamlandı');
    }
}
