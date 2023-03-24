<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes(); 

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/all', [App\Http\Controllers\HomeController::class, 'all'])->name('home.all');

Route::resource('articles', ArticleController::class)->names('articles');

Route::resource('Categories', CategoryController::class)
->except('show')
->names('categories');

Route::resource('Comments', CommentController::class)
->only('index', 'destroy')
->names('Comments');

Route::resource('Profiles', ProfileController::class)
->only('edit', 'update')
->names('Profiles');

Route::get('Article/{articles}', [Articlecontroller::class, 'show'])->name('articles.show');

Route::get('categories/{category}', [CategoryController::class, 'detail'])->name('categories.detail');

Route::post('comment/', [CommentController::class, 'store'])->name('comment.store');


// Articles

// Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
// Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
// Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

// Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
// Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
// Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
// Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
