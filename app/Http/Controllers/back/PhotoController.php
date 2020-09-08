<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Models\Photos;
use App\Models\Posts;
use Illuminate\Http\Request;
use File;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photos::orderby('id','desc')->get();
        return view('back.photo.index', compact('photos'));
    }
    public function create(Request $request)
    {
        request()->validate([
            'photo.*' => 'required|mimes:jpeg,png,jpg,JPG,gif,svg,webp|max:400',
        ]);
        foreach ($request->photo as $photo) {
            $image = new Image();
            $path = '/uploads/photo/';
            $photoFile = $image->image($photo, '', '', $path);
            Photos::create(['name'=>$photoFile]);
        }
        return redirect()->back()->with('type', 'success')->with('mesaj', 'photo added');
    }
    public function remove($id)
    {
        $photo = Photos::where('id', $id)->first();

        $last_image_path = public_path("/uploads/photo/$photo->name"); // Value is not URL but directory file path
        if (File::exists($last_image_path)) {
            File::delete($last_image_path);
        }
        $photo->delete();
        return redirect()
            ->back()
            ->with('type', 'success')
            ->with('mesaj', 'Silinmə tamamlandı');
    }
    public function store(Request $request)
    {
       //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
