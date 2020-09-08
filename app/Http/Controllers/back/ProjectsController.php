<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image;
use App\Models\projects;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::all();
        $crumbs = [
            'Layihə' => route('admin.projects'),
        ];
        $title = 'Layihə';
        return view('back.projects.index', compact('projects', 'title', 'crumbs'));
    }

    public function create()
    {
        $crumbs = [
            'Layihə' => route('admin.projects'),
            'Yeni' => route('admin.projects.create')
        ];
        $title = 'Yeni Layihə';

        return view('back.projects.create', compact('crumbs', 'title'));
    }


    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|unique:projects',
            'small_text' => 'required',
            'description' => 'required'
        ]);

        DB::transaction(function () {
            $data = [
                'title' => request('title'),
                'small_text' => request('small_text'),
                'description' => request('description'),
            ];

            $data['slug'] = Str::slug(request('title'));
            if (Projects::whereSlug($data['slug'])->count() > 0) {
                return back()
                    ->withInput()
                    ->withErrors(['slug' => 'Bazada bu adda project vardır']);
            }

            if (request()->hasFile('photo')) {
                $photo = request()->file('photo');
                $photoFile = time() . '.' . $photo->extension();
                request()->file('photo')->move(public_path('/uploads/projects/'), $photoFile);
                $data['photo'] = $photoFile;
            }

            $project = projects::create($data);

        });

        return redirect()
            ->route('admin.projects.create')
            ->with('type', 'success')
            ->with('mesaj', 'Layihə əlavə edildi');
    }

    public function destroy($slug)
    {
        $project = Projects::where('slug', $slug)->first();
        $last_image_path = public_path("/uploads/projects/$project->photo"); // Value is not URL but directory file path
        if (File::exists($last_image_path)) {
            File::delete($last_image_path);
        }
        $project->delete();
        return redirect()
            ->route('admin.projects')
            ->with('type', 'success')
            ->with('mesaj', 'Silinmə tamamlandı');
    }


    public function edit($slug)
    {
        $project = projects::where('slug', $slug)->first();

        $crumbs = [
            'project' => route('admin.projects'),
            $project->title => route('admin.projects.create')
        ];
        $title = $project->title;

        return view('back.projects.edit', compact('crumbs', 'title', 'project'));
    }

    public function update($slug)
    {
        $this->validate(request(), [
            'title' => 'required',
            'small_text' => 'required',
            'description' => 'required'
        ]);

        $project = projects::where('slug', $slug)->first();

        $project->title = request('title');
        $project->small_text = request('small_text');
        $project->description = request('description');
        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');

            if ($photo->isValid()) {
                $image = new Image();
                $path = '/uploads/projects/';
                $file_name = $image->image($photo, '', '', $path);
                $image->removeImage($path . $project->photo);
                $project->photo = $file_name;
                $project->save();
            }

        }

        $project->save();

        return redirect()
            ->route('admin.projects.edit', $project->slug)
            ->with('type', 'success')
            ->with('mesaj', 'Dəyişikliklər yerinə yetirildi');

    }
}
