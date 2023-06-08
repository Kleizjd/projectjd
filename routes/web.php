<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('home', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('home')->middleware('auth');
Route::post('update', [App\Http\Controllers\HomeController::class, 'passwordUpdate'])->name('password-update')->middleware('auth');
// SETTINGS
Route::get('settings',[SettingsController::class, 'index'])->name('settings')->middleware('auth');
Route::post('settings',[SettingsController::class, 'store'])->name('settings.store')->middleware('auth');
//
