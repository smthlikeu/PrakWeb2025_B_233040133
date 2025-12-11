<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Menggunakan with() untuk mengatasi N+1 Probelm
        $posts = Post::with(['author', 'category'])->paginate(5)->withQueryString();
        return view('pages.posts', compact('posts'));
    }

    // Route Model Blinding untuk single post page
    public function show(Post $post)
    {
        // Menggunakan with() untuk mengatasi N+1 Problem
        $post->load(['author', 'category']);
        return view('pages.post', compact('post'));
    }
}
