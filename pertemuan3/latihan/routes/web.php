<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route untuk menampilkan view 
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

// route untuk memanggil method di PostController
Route::get('/posts', [PostController::class, 'index']);
// route untuk memanggil method di CategoryController
Route::get('/categories', [CategoryController::class, 'index']);
