<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Models\Category;
use App\Models\Course;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index($id)
    {
        $category = Category::where('id', $id)->with('course')->first();
        return view('back.course.index', compact('category'));
    }


    public function create()
    {
        $categorys = Category::get();
        return view('back.course.create', compact('categorys'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'price' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:500',
            'slug' => 'required|unique:course',
        ]);
        $photo = request()->file('photo');
        $photoFile = time() . '.' . $photo->extension();
        request()->file('photo')->move(public_path('/uploads/course/'), $photoFile);

        $course = new Course();
        $course->price = $request->price;
        $course->discountprice = $request->discountprice;
        $course->lectures = $request->lectures;
        $course->hours = $request->hours;
        $course->photo = $photoFile;
        $course->category_id = $request->category_id;

        $slug = Str::slug($request->slug ,'-');


        $course->setTranslation('name', app()->getLocale(), $request->name);
        $course->setTranslation('slug', app()->getLocale(), $slug);
        $course->setTranslation('description', app()->getLocale(), $request->description);
        $course->save();
        return redirect()
            ->route('admin.course.index', $request->category_id)
            ->with('type', 'success')
            ->with('id', $course->id)
            ->with('mesaj', 'Course Created');
    }


    public function destroy($id)
    {
        $course = Course::where('id', $id)->first();
        $last_image_path = public_path("/uploads/course/$course->photo"); // Value is not URL but directory file path
        if (File::exists($last_image_path)) {
            File::delete($last_image_path);
        }
        $course->delete();
        return redirect()
            ->back()
            ->with('type', 'success')
            ->with('mesaj', 'Silinmə tamamlandı');
    }


    public function edit($id)
    {
        $course = Course::where('id', $id)->first();
        $categorys = Category::all();
        return view('back.course.edit', compact('course', 'categorys'));
    }

    public function update(Request $request, $id)
    {


        $this->validate(request(), [
            'price' => 'required',
            'slug' => 'required',
            'photo' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:500',
        ]);
        $course = Course::find($id);
        $slug = Str::slug($request->slug ,'-');

        $last_image_path = public_path("/uploads/course/$course->photo"); // Value is not URL but directory file path

        $course->price = $request->price;
        $course->discountprice = $request->discountprice;
        $course->lectures = $request->lectures;
        $course->hours = $request->hours;
        $course->category_id = $request->category_id;
        $course->setTranslation('name', app()->getLocale(), $request->name);
        $course->setTranslation('slug', app()->getLocale(),$slug);
        $course->setTranslation('description', app()->getLocale(), $request->description);

        if ($request->hasFile('photo')) {
            if (File::exists($last_image_path)) {
                File::delete($last_image_path);
            }
            $image = new Image();
            $path = '/uploads/course/';
            $photoFile = $request->file('photo');
            $photo = $image->image($photoFile, '', '', $path);
            //  $image->removeImage($last_image_path);
            $course->photo = $photo;
        }
        $course->save();

        return redirect()
            ->back()
            ->with('type', 'success')
            ->with('mesaj', 'Course updated');

    }

}
