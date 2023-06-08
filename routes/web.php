<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\NewsController::class, 'index']);

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('home', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('home')->middleware('auth');
// Route::post('update', [App\Http\Controllers\HomeController::class, 'passwordUpdate'])->name('password-update')->middleware('auth');
// SETTINGS
Route::get('settings',[SettingsController::class, 'index'])->name('settings')->middleware('auth');
Route::post('settings',[SettingsController::class, 'store'])->name('settings.store')->middleware('auth');
// NEWS
Route::get('news',[NewsController::class, 'index'])->name('news')->middleware('auth');
Route::post('news',[NewsController::class, 'store'])->name('news')->middleware('auth');
Route::get('main',[NewsController::class, 'main'])->name('main')->middleware('auth');
// CATEGORY
Route::get('categories',[CategoriesController::class, 'index'])->name('categories')->middleware('auth');
Route::post('categories',[CategoriesController::class, 'store'])->name('categories')->middleware('auth');
Route::post('categories/{id}',[CategoriesController::class, 'show'])->name('categories-edit')->middleware('auth');
Route::patch('categories/{id}',[CategoriesController::class, 'update'])->name('categories-update')->middleware('auth');
Route::delete('categories/{id}',[CategoriesController::class, 'destroy'])->name('categories-destroy')->middleware('auth');
