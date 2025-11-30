<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// contoh route untuk menampilkan view
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});


// Route untuk memanggil method di CategoryController dan PostController
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
