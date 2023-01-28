<?php

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store'); 
Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/article', [App\Http\Controllers\HomeController::class, 'article'])->name('article');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
// Route::get('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::post('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::post('/upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');

