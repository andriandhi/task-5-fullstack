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
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'showArticles'])->name('articles');
Route::get('/articles/list', [App\Http\Controllers\ArticleController::class, 'showArticles'])->name('articles');
Route::get('/article/create', [App\Http\Controllers\ArticleController::class, 'createArticles'])->name('createArticles');
Route::post('/article/create', [App\Http\Controllers\ArticleController::class, 'createArticlesSubmit'])->name('createArticlesSubmit');
Route::get('/article/{id}', [App\Http\Controllers\ArticleController::class, 'detailArticle'])->name('detailArticle');
Route::get('/article/{id}/update', [App\Http\Controllers\ArticleController::class, 'updateArticle'])->name('updateArticle');
Route::post('/article/{id}/update', [App\Http\Controllers\ArticleController::class, 'updateArticleSubmit'])->name('updateArticleSubmit');
Route::get('/article/{id}/delete', [App\Http\Controllers\ArticleController::class, 'deleteArticle'])->name('deleteArticle');
Route::post('/article/{id}/delete', [App\Http\Controllers\ArticleController::class, 'deleteArticleSubmit'])->name('deleteArticleSubmit');
