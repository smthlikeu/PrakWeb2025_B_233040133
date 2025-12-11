<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display public categories listing
     */
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('pages.categories', compact('categories'));
    }

    /**
     * Show admin categories list
     */
    public function adminIndex()
    {
        $categories = Category::paginate(10);
        return view('categories-admin.index', compact('categories'));
    }

    /**
     * Show form for creating new category
     */
    public function create()
    {
        return view('categories-admin.create');
    }

    /**
     * Store category in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'color' => 'required|string|regex:/^#[0-9a-f]{6}$/i',
        ]);

        // Generate slug
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $count = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $validated['slug'] = $slug;
        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show category details
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        return view('categories-admin.show', compact('category', 'posts'));
    }

    /**
     * Show form for editing category
     */
    public function edit(Category $category)
    {
        return view('categories-admin.edit', compact('category'));
    }

    /**
     * Update category in database
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'color' => 'required|string|regex:/^#[0-9a-f]{6}$/i',
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories.show', $category)->with('success', 'Category updated successfully.');
    }

    /**
     * Delete category
     */
    public function destroy(Category $category)
    {
        // Check if category has posts
        if ($category->posts()->count() > 0) {
            return back()->with('error', 'Cannot delete category with posts.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
