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


Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/', 'PostsController@index')->name('home');
	Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show']]);
	Route::post('/search', 'UserController@search')->name('searchresult');
});
