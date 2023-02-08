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
// Route::get('/login/guest', [App\Http\Controllers\Auth\LoginController::class, 'guestLogin'])->name('/login/guest');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\ArticleController::class, 'store'])->name('store');
Route::get('/show/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('show');
Route::get('/article', [App\Http\Controllers\ArticleController::class, 'article'])->name('article');
Route::get('/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('update');
Route::post('/delete/{id}', [App\Http\Controllers\ArticleController::class, 'delete'])->name('delete');
Route::post('/upload', [App\Http\Controllers\ArticleController::class, 'upload'])->name('upload');
