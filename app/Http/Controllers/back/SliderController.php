<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function edit()
    {
        $slider = Slider::findOrFail(1);
        $crumbs = [
            'Slider' => route('admin.slider.edit'),
        ];
        $title = 'Slider';
        return view('back.slider.edit', compact('slider', 'title', 'crumbs'));
    }




    public function store(Request $request)
    {
        $this->validate(request(), [
            'text1' => 'required|string',
            'text2' => 'required|string',
            'text3' => 'required|string',
            'text4' => 'required|string',
            'text5' => 'required|string',
            'text6' => 'required|string',
        ]);

        DB::transaction(function () {
         \request()->request->add(['slug'=>Str::slug(request('title'))]);
            $slider = Slider::findOrFail(1);
            $slider->update(\request()->all());
        });

        return redirect()
            ->route('admin.slider.edit')
            ->with('type', 'success')
            ->with('mesaj', 'updated');
    }


}
