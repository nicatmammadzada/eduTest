<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Models\About;
use App\Models\Pandemia;
use File;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $crumbs = [
            'Haqqımda' => route('admin.about')
        ];
        $title = 'Haqqımda';
        $about = About::first();
        return view('back.about', compact('title', 'crumbs', 'about'));
    }

    public function update(Request $request)
    {
        $about = About::first();
        $oldPhoto = $about->photo;
        $about->update($request->all());

        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');
            $photoFile = time() . '.' . $photo->extension();
            $path = '/uploads/about/';
            request()->file('photo')->move(public_path($path), $photoFile);
            $image = new Image();
            $image->removeImage($path . $oldPhoto);
            $about->photo = $photoFile;
            $about->save();
        }

        return redirect()
            ->route('admin.about')
            ->with('type', 'success')
            ->with('mesaj', 'Dəyişikliklər yerinə yetirildi');
    }


    public function pandemia()
    {

        $crumbs = [
            'Pandemia' => route('admin.pandemia')
        ];
        $title = 'Pandemia';
        $pandemia = Pandemia::first();

        return view('back.pandemia', compact('title', 'crumbs', 'pandemia'));
    }

    public function pandemiaUpdate(Request $request)
    {
        $pandemia = Pandemia::first();
        $pandemia->update($request->all());
        return redirect()
            ->route('admin.pandemia')
            ->with('type', 'success')
            ->with('mesaj', 'Dəyişikliklər yerinə yetirildi');
    }
}
