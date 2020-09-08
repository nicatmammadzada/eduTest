<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseTranslation;
use App\Models\Jobs;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        return view('back.category.index', compact('categorys'));
    }


    public function create()
    {

        return view('back.course.create');
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required|unique:course',
        ]);
//        $photo = request()->file('photo');
//        $photoFile = time() . '.' . $photo->extension();
//        request()->file('photo')->move(public_path('/uploads/category/'), $photoFile);

        $category = new Category();
        $slug = Str::slug($request->slug ,'-');

        $category->setTranslation('name', app()->getLocale(), $request->name);
        $category->setTranslation('slug', app()->getLocale(), $slug);
        $category->save();
        return redirect()
            ->route('admin.category.index')
            ->with('type', 'success')
            ->with('id', $category->id)
            ->with('mesaj', 'Category Created');
    }


    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
//        $last_image_path = public_path("/uploads/course/$category->photo"); // Value is not URL but directory file path
//        if (File::exists($last_image_path)) {
//            File::delete($last_image_path);
//        }
        $category->delete();
        return redirect()
            ->back()
            ->with('type', 'success')
            ->with('mesaj', 'Silinmə tamamlandı');
    }


    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('back.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {


        $this->validate(request(), [
            'slug' => 'required',
            'name' => 'required',
           // 'photo' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:500',
        ]);
        $category = Category::find($id);
        $slug = Str::slug($request->slug ,'-');

        $category->setTranslation('name', app()->getLocale(), $request->name);
        $category->setTranslation('slug', app()->getLocale(), $slug);
        $category->save();

        return redirect()
            ->back()
            ->with('type', 'success')
            ->with('mesaj', 'Category updated');

    }

}
