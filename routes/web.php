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

Route::get('/users/{name}', 'UserController@showuser')->name('userpage');
Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/', 'PostsController@indexper')->name('home');
	Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show']]);
	Route::post('/search', 'UserController@search')->name('searchresult');
	Route::get('/users/{user}/follow', 'UserController@follow')->name('user.follow');
	Route::get('/users/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');
	Route::post('/like', 'LikeController@likePosts')->name('like');
	Route::post('/unlike', 'LikeController@unLikePost')->name('unlike');
});
	