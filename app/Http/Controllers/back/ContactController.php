<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $crumbs=[
            'Əlaqə'=>route('admin.contact')
        ];
        $title='Əlaqə';
        $contacts=Contact::all();
        return view('back.contact',compact('title','contacts','crumbs'));
    }

    public function destroy($id)
    {
        $contact=Contact::find($id);

        $contact->delete();
        return redirect()
            ->route('admin.contact')
            ->with('type','success')
            ->with('mesaj','Silinmə tamamlandı');
    }
}
