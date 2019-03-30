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
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('/articles/{article}/like', 'ArticlesController@like')->name('articles.like');
    Route::post('/articles/{article}/comment', 'ArticlesController@comment')->name('articles.comment');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
});
