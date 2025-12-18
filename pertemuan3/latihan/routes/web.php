<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;

// contoh route untuk menampilkan view
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});


// Route untuk memanggil method di CategoryController dan PostController
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Halaman blog (sebelumnya /posts)
Route::get('/blog', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route Model Binding dengan slug untuk single blog post
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// Route untuk register - middleware guest (hanya untuk yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Route untuk login - middleware guest (hanya untuk yang belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

// Route logout - hanya untuk yang sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk dashboard posts - hanya untuk yang sudah login
// Index - Menampilkan semua posts milik user
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');
// Create - Form untuk membuat post baru
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.create');
// Store - Menyimpan post baru
Route::post('/dashboard', [DashboardPostController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');
// Show - Menampilkan detail post berdasarkan slug
Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');
// Edit - Form untuk edit post
Route::get('/dashboard/{post:slug}/edit', [DashboardPostController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.edit');
// Update - Update post
Route::put('/dashboard/{post:slug}', [DashboardPostController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.update');
// Delete - Hapus post
Route::delete('/dashboard/{post:slug}', [DashboardPostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.destroy');

// Route untuk admin categories - hanya untuk yang sudah login
Route::prefix('admin/categories')->name('admin.categories.')->middleware(['auth', 'verified'])->group(function () {
    // Index - Menampilkan semua categories
    Route::get('/', [CategoryController::class, 'adminIndex'])->name('index');
    // Create - Form untuk membuat category baru
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    // Store - Menyimpan category baru
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    // Show - Menampilkan detail category
    Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
    // Edit - Form untuk edit category
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    // Update - Update category
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
    // Delete - Hapus category
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
});
