<?php

namespace App\Http\Controllers;

use \App\Models\category;
use App\Models\post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardPostResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = [
            'title' => 'manage post',
            'posts' => \App\Models\post::paginate(5)
        ];

        return view('dashboardContent.mypost.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'create new post',
            'categories' => \App\Models\category::all()
        ];

        return view('dashboardContent.mypost.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255',
            'category_id' => 'required|integer',
            'excerpt' => 'required|min:5',
            'body' => 'required|min:5',
            'image' => 'image|file|max:5120'
        ]);

        $validate['user_id'] = auth()->user()->id;

        if ($request->file('image')) {
            $validate['image'] = $request->file('image')->store('posts_image');
        }

        if ($validate) {
            if (post::create($validate)) {
                session('message', 'successfull create!');
            } else {
                session('message', 'failure add post!');
            }
        }

        return redirect()->to('/dashboard/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $data = [
            'title' => 'edit postingan',
            'categories' => category::all(),
            'post' => $post
        ];

        return view('dashboardContent.mypost.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $rules = [
            'category_id' => 'required|integer',
            'title' => 'required|min:5',
            'excerpt' => 'required|min:4',
            'body' => 'required|min:5',
            'image' => 'image|file|max:5120'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|min:5|unique:posts';
        } else {
            $rules['slug'] = 'required|min:5';
        }

        $validate = $request->validate($rules);

        $validate['user_id'] = auth()->user()->id;

        if ($request->file('image')) {
            Storage::delete($post->image);
            $validate['image'] = $request->file('image')->store('posts_image');
        }

        if ($validate) {
            if (post::where('id', $post->id)->update($validate)) {
                session()->flash('message', 'data updated!');
            } else {
                session()->flash('message', 'data failure update!');
            }
        }

        return redirect()->to('/dashboard/posts/' . $request->slug . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
            $run = \App\Models\post::find($post->id)->delete();
        } else {
            $run = \App\Models\post::find($post->id)->delete();
        }

        if ($run) {
            session()->flash('message', 'successfull delete!');
        } else {
            session()->flash('message', 'failure delete!');
        }

        return redirect()->to('/dashboard/posts');
    }
}
