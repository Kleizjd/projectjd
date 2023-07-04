<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () { return view('welcome'); });
// LOGIN
Route::get('/', [PostController::class, 'template']);Auth::routes();
// POSTS
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');

Route::get('/post',[PostController::class, 'index'])->name('post')->middleware('auth');
Route::post('post',[PostController::class, 'store'])->name('post')->middleware('auth');
Route::get('main',[PostController::class, 'main'])->name('main')->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/home', [HomeController::class, 'profileUpdate'])->name('home')->middleware('auth');
Route::post('/update', [HomeController::class, 'passwordUpdate'])->name('password-update')->middleware('auth');
// SETTINGS
Route::get('/settings',[SettingsController::class, 'index'])->name('settings')->middleware('auth');
Route::post('/settings',[SettingsController::class, 'store'])->name('settings.store')->middleware('auth');
// CATEGORY
Route::get('categories',[CategoriesController::class, 'index'])->name('categories')->middleware('auth');
Route::post('categories',[CategoriesController::class, 'store'])->name('categories')->middleware('auth');
Route::post('categories/{id}',[CategoriesController::class, 'show'])->name('categories-edit')->middleware('auth');
Route::patch('categories/{id}',[CategoriesController::class, 'update'])->name('categories-update')->middleware('auth');
Route::delete('categories/{id}',[CategoriesController::class, 'destroy'])->name('categories-destroy')->middleware('auth');