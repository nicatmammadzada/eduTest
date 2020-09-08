<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Models\Config;
use File;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $crumbs = [
            'Parametrlər' => route('admin.config')
        ];
        $title = 'Parametrlər';
        $config = Config::first();
        return view('back.config', compact('title', 'crumbs', 'config'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,jpg,webp|max:450',
            'reklam' => 'mimes:jpeg,png,webp|max:450',
            'reklam2' => 'mimes:jpeg,png,webp|max:450',
            'reklam3' => 'mimes:jpeg,png,webp|max:450',
            'reklam4' => 'mimes:jpeg,png,webp|max:450',
        ]);

        $config = Config::first();
        $oldLogo = $config->logo;
        $oldReklam = $config->reklam;


        $config->update($request->all());


        if (request()->hasFile('logo')) {
            $logo = request()->file('logo');
            $logoFile = time() . '.' . $logo->extension();
            $path = '/uploads/photo/';
            request()->file('logo')->move(public_path($path), $logoFile);
            $image = new Image();
            $image->removeImage($path . $oldLogo);
            $config->logo = $logoFile;
            $config->save();
        }


        if (request()->hasFile('reklam')) {
            $reklam = request()->file('reklam');
            $reklamFile = time() . '.' . $reklam->extension();
            $path = '/uploads/photo/';
            request()->file('reklam')->move(public_path($path), $reklamFile);
            $image = new Image();
            $image->removeImage($path . $oldReklam);
            $config->reklam = $reklamFile;
            $config->save();
        }


        if (request()->hasFile('reklam2')) {
            $reklam = request()->file('reklam2');
            $reklamFile = time() . '.' . $reklam->extension();
            $path = '/uploads/photo/';
            request()->file('reklam2')->move(public_path($path), $reklamFile);
            $image = new Image();
            $image->removeImage($path . $oldReklam);
            $config->reklam2 = $reklamFile;
            $config->save();
        }

        if (request()->hasFile('reklam3')) {
            $reklam = request()->file('reklam3');
            $reklamFile = time() . '.' . $reklam->extension();
            $path = '/uploads/photo/';
            request()->file('reklam3')->move(public_path($path), $reklamFile);
            $image = new Image();
            $image->removeImage($path . $oldReklam);
            $config->reklam3 = $reklamFile;
            $config->save();
        }

        if (request()->hasFile('reklam4')) {
            $reklam = request()->file('reklam4');
            $reklamFile = time() . '.' . $reklam->extension();
            $path = '/uploads/photo/';
            request()->file('reklam4')->move(public_path($path), $reklamFile);
            $image = new Image();
            $image->removeImage($path . $oldReklam);
            $config->reklam4 = $reklamFile;
            $config->save();
        }


        return redirect()
            ->route('admin.config')
            ->with('type', 'success')
            ->with('mesaj', 'Dəyişikliklər yerinə yetirildi');
    }
}
