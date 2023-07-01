<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () { return view('welcome'); });
// LOGIN
Route::get('/', [PostController::class, 'index']);Auth::routes();
// POSTS
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
