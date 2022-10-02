<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group(['middleware' => ['cors']], function () {

    // public routes
    Route::post('/v1/login', 'Auth\ApiAuth@login')->name('login.api');
    Route::post('/v1/register', 'Auth\ApiAuth@register')->name('register.api');
});

Route::group(['middleware' => ['cors', 'auth:api']], function () {
    Route::post('/v1/logout', 'Auth\ApiAuth@logout')->name('logout.api');
    Route::post('/v1/article/create', 'ArticleController@create')->name('create.api');
    Route::get('/v1/articles', 'ArticleController@list')->name('list.api');
    Route::get('/v1/articles/list', 'ArticleController@list')->name('list.api');
    Route::get('/v1/article/{id}', 'ArticleController@show')->name('show.api');
    Route::post('/v1/article/{id}/update', 'ArticleController@update')->name('update.api');
    Route::post('/v1/article/{id}/delete', 'ArticleController@delete')->name('delete.api');
});
