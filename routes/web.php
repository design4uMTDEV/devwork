<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;

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
    return view('index');
})->name('home');


// Articles

Route::resource('article', ArticleController::class);

Route::get('/blog', [ArticleController::class, 'index'])->name('blog');

Route::get('/blog/{article}', [ArticleController::class, 'show'])->name('article_show');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article_create')->middleware('auth');

Route::post('/article/save', [ArticleController::class, 'save'])->name('article_save');

Route::patch('/blog/{article}/update', [ArticleController::class, 'update'])->name('article_update');

Route::post('/article/destroy', [ArticleController::class, 'destroy'])->name('article_destroy');

Route::resource('comment', CommentController::class);

// Books

Route::get('/books', [BookController::class, 'index'])->name('books');

