<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Mail\ContactUsMailable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


// LOGIN
Route::get('/', [HomeController::class, 'template'])->name('home.template');Auth::routes();
// HOME
Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
Route::post('/home', [HomeController::class, 'profileUpdate'])->name('home.store')->middleware('auth');
Route::post('/update', [HomeController::class, 'passwordUpdate'])->name('password-update')->middleware('auth');
// POSTS
Route::resource('/posts',PostController::class)->middleware('auth');
// SETTINGS
Route::resource('/settings', SettingsController::class)->middleware('auth');
// CATEGORY
Route::resource('/categories', CategoriesController::class)->middleware('auth');
















// MAIL
// Route:: get('contactanos', function(){
//     $correo = new ContactUsMailable(); 
//     Mail::to('jose.jdgo97@gmmail.com')->send($correo);
//     return 'Mensaje enviado';
// });       
// Route:: get('contactanos', [ContactUsController::class, 'index'])->name('contactanos.index');
// Route:: post('contactanos', [ContactUsController::class, 'store'])->name('contactanos.store');