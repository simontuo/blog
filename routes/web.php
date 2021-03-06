<?php

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

Auth::routes(['verify' => true]);
Route::get('/', 'PagesController@index')->name('index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/comment/sort', 'ArticlesController@commentSort')->name('articles.comment.sort');
Route::get('/search}', 'ArticlesController@search')->name('articles.search');
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('/articles/{article}/like', 'ArticlesController@like')->name('articles.like');
    Route::post('/articles/{article}/collect', 'ArticlesController@collect')->name('articles.collect');
    Route::post('/articles/{article}/comment', 'ArticlesController@comment')->name('articles.comment');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
    Route::post('/comments/{comment}/like', 'CommentController@like')->name('comments.like');

});
