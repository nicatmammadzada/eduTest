<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Videos::all();
        $crumbs = [
            'Post' => route('admin.video.index'),
        ];
        $title = 'Video';
        return view('back.videos.index', compact('videos', 'title', 'crumbs'));


    }


    public function create()
    {
        $crumbs = [
            'Post' => route('admin.video.index'),
            'Yeni' => route('admin.video.create')
        ];
        $title = 'Yeni Video';
        return view('back.videos.create', compact('crumbs', 'title'));
    }


    public function store(Request $request)
    {

        $this->validate(request(), [
            'text' => 'required|string',
        ]);


        if (request()->hasFile('video')) {
            $video = request()->file('video');

            $videoFile = time() . '.' . $video->extension();
//            dd($videoFile);
            request()->file('video')->move(public_path('/uploads/videos/'), $videoFile);
            $data['video'] = $videoFile;
        }

        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');
            $photoFile = time() . '.' . $photo->extension();

            request()->file('photo')->move(public_path('/uploads/videos/'), $photoFile);
            $data['photo'] = $photoFile;
        }


        DB::transaction(function () {
            $data = [
                'text' => request('text'),
            ];
            $video = Videos::create($data);
            if (!$video)
                return redirect()->back()->with('type', 'danger')->with('mesaj', 'video yuklenerken xeta bas verdi!');
        });

        return redirect()
            ->route('admin.video.create')
            ->with('type', 'success')
            ->with('mesaj', 'Yeni video əlavə edildi');
    }


    public function destroy($slug)
    {
        $post = Posts::where('slug', $slug)->first();

        $last_image_path = public_path("/uploads/post/$post->photo"); // Value is not URL but directory file path
        if (File::exists($last_image_path)) {
            File::delete($last_image_path);
        }


        $post->delete();
        return redirect()
            ->route('admin.post')
            ->with('type', 'success')
            ->with('mesaj', 'Silinmə tamamlandı');
    }


    public function edit($id)
    {
        $video = Videos::findOrFail($id);

        $crumbs = [
            'Post' => route('admin.video.index'),
            $video->text => route('admin.video.create')
        ];
        $title = $video->text;

        return view('back.video.edit', compact('crumbs', 'title', 'post'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate(request(), [
            'title' => 'required',
            'small_text' => 'required',
            'description' => 'required'
        ]);
        $post = Posts::where('slug', $slug)->first();
        $post->update($request->all());
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
            ->route('admin.post.edit', $post->slug)
            ->with('type', 'success')
            ->with('mesaj', 'Dəyişikliklər yerinə yetirildi');

    }


}
