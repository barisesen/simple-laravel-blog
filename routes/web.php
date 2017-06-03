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

Route::get('/', 'PostController@index');

Auth::routes();

// Sadece admin rolune sahıp olan kullanıcılar erısebılır
Route::group(['middleware' => 'auth', 'middleware' => 'admin' ], function () {
	Route::group(['prefix' => 'posts'], function() {
		Route::get('/new', 'PostController@new');
		Route::post('/store', 'PostController@store');
		Route::get('/{id}/edit', 'PostController@edit')->name('edit-post');
		Route::post('/update', 'PostController@update');
		Route::post('/destroy', 'PostController@destroy');
	});
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('posts/comment/store', 'CommentController@store');
	Route::post('posts/comment/destroy', 'CommentController@destroy');
});

Route::group(['prefix' => 'posts'], function () {
	Route::get('/', 'PostController@index');
	Route::get('/{id}', 'PostController@show')->name('show-post');
});

Route::get('/about', function() {
   return view('about');
});