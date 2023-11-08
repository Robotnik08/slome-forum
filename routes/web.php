<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route for displaying all posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


// Route for displaying the form for creating a new post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Route for storing a new post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Route for displaying a specific post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
