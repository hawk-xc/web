<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\post;
use \App\Models\category;
use \Illuminate\View\View;

class PostsController extends Controller
{
    public function index(): View
    {
        $data = [
            'title' => 'home',
            'active' => 'home'
        ];

        return view('main', $data);
    }

    public function posts(): View
    {
        // $posts = Posts::latest();

        // if (request('search')) {
        //     $posts->where('title', 'like', '%' . request('search') . '%')->orWhere('excerpt', 'like', '%' . request('search') . '%');
        // }

        $data = [
            'title' => 'posts',
            // 'posts' => $posts->get()
            'active' => 'posts',
            'posts' => post::cari(
                [
                    'search' => request('search'),
                    'category' => request('category'),
                    'author' => request('author')
                ]
            )->latest()->paginate($perPage = 11, $columns = ['*'], $pageName = 'postingan')->withQueryString()
        ];

        return view('posts', $data);
    }

    public function post(post $post): View
    {
        return view('post', [
            'title' => 'posts',
            'active' => 'posts',
            'post' => $post
        ]);
    }
}
