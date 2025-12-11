<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menggunakan user_id dari user yang sedang login
        $query = Post::where('user_id', Auth::user()?->id);

        // fitur search
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        // menampilkan 5 data per halaman dengan pagination
        $posts = $query->paginate(5)->withQueryString();

        return view('dashboard.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
        ]);

        // Generate slug dari title
        $slug = Str::slug($validated['title']);
        // Pastikan slug unik
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Generate excerpt dari body (150 characters)
        $excerpt = Str::limit(strip_tags($validated['body']), 150);

        // Tambahkan slug, excerpt dan user_id ke validated data
        $validated['slug'] = $slug;
        $validated['excerpt'] = $excerpt;
        $validated['user_id'] = Auth::user()->id;

        // Buat post baru
        Post::create($validated);

        return redirect()->route('dashboard.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Pastikan hanya author yang bisa lihat
        if ($post->user_id !== Auth::user()?->id) {
            abort(403, 'Unauthorized');
        }

        return view('dashboard.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Pastikan hanya author yang bisa edit
        if ($post->user_id !== Auth::user()?->id) {
            abort(403, 'Unauthorized');
        }

        $categories = Category::all();
        return view('dashboard.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Pastikan hanya author yang bisa update
        if ($post->user_id !== Auth::user()?->id) {
            abort(403, 'Unauthorized');
        }

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
        ]);

        // Generate excerpt dari body (150 characters)
        $excerpt = Str::limit(strip_tags($validated['body']), 150);
        $validated['excerpt'] = $excerpt;

        // Update post
        $post->update($validated);

        return redirect()->route('dashboard.show', $post->slug)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Pastikan hanya author yang bisa delete
        if ($post->user_id !== Auth::user()?->id) {
            abort(403, 'Unauthorized');
        }

        $post->delete();

        return redirect()->route('dashboard.index')->with('success', 'Post deleted successfully.');
    }
}
