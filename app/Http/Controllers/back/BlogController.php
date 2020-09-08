<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Posts;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Posts::orderby('id', 'desc')->get();
        $crumbs = [
            'Post' => route('admin.blog'),
        ];

        $title = 'Post';
        return view('back.blog.index', compact('posts', 'title', 'crumbs'));
    }

    public function create()
    {
        $crumbs = [
            'Post' => route('admin.blog'),
            'Yeni' => route('admin.blog.create')
        ];


        $title = 'Yeni Post';
        $users = User::where('is_active', 1)->where('is_admin', 1)->get();


        return view('back.blog.create', compact('crumbs', 'title', 'users'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|unique:post',
            'small_text' => 'required',
            'description' => 'required',
        ]);


        DB::transaction(function () {
            $data = [
                'title' => request('title'),
                'small_text' => request('small_text'),
                'description' => request('description'),
                'category_id' => request('category_id'),
                'author_id' => request('author_id'),
            ];
            $data['slug'] = Str::slug(request('title'));

            if (Posts::where('slug->'.app()->getLocale(), $data['slug'])->exists()) {
                $data['slug'] = Str::slug(request('title')).'-'.time();
            }


            if (request()->hasFile('photo')) {
                $photo = request()->file('photo');
                $photoFile = time() . '.' . $photo->extension();
                request()->file('photo')->move(public_path('/uploads/post/'), $photoFile);
                $data['photo'] = $photoFile;
            }
            $post = Posts::create($data);

            if (!$post)
                return redirect()->back()->with('type', 'danger')->with('mesaj', 'Xeta bash verdi!!!!!');


                return redirect()->back()->with('type', 'success')->with('mesaj', 'Post updated!');

        });

        return redirect()
            ->route('admin.blog.create')
            ->with('type', 'success')
            ->with('mesaj', 'Yeni post əlavə edildi');
    }


    public function destroy($slug)
    {
        $post = Posts::where('slug->'.app()->getLocale(), $slug)->first();

        $last_image_path = public_path("/uploads/post/$post->photo"); // Value is not URL but directory file path
        if (File::exists($last_image_path)) {
            File::delete($last_image_path);
        }


        $post->delete();
        return redirect()
            ->route('admin.blog')
            ->with('type', 'success')
            ->with('mesaj', 'Silinmə tamamlandı');
    }

    public function edit($slug)
    {
        $users = User::where('is_active', 1)->where('is_admin', 1)->get();

        $post = Posts::where('slug->'.app()->getLocale(), $slug)->first();

        $crumbs = [
            'Post' => route('admin.blog'),
            $post->title => route('admin.blog.create')
        ];
        $title = $post->title;

        return view('back.blog.edit', compact('crumbs', 'title', 'post', 'users'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate(request(), [
            'title' => 'required',
            'small_text' => 'required',
            'description' => 'required',

        ]);

     //   dd($request);
        $post = Posts::where('slug->'.app()->getLocale(), $slug)->first();
        $post->setTranslation('title', app()->getLocale(), $request->title);
        $post->setTranslation('slug', app()->getLocale(), Str::slug($request->title,'-'));
        $post->setTranslation('description', app()->getLocale(), $request->description);
        $post->setTranslation('small_text', app()->getLocale(), $request->small_text);
        $post->author_id=$request->author_id;
        $post->save();

        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');

            if ($photo->isValid()) {
                $image = new Image();
                $path = '/uploads/post/';
                $file_name = $image->image($photo, '', '', $path);
                $image->removeImage($path . $post->photo);
                $post->photo = $file_name;
                $post->save();
            }
        }
        return redirect()
            ->route('admin.blog.edit', $post->slug)
            ->with('type', 'success')
            ->with('mesaj', 'Dəyişikliklər yerinə yetirildi');

    }














}
