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

    Route::get('/posts/new', 'PostController@new');
	Route::post('/posts/store', 'PostController@store');

	Route::get('posts/{id}/edit', 'PostController@edit')->name('edit-post');
	Route::post('posts/update', 'PostController@update');
	Route::post('posts/destroy', 'PostController@destroy');
});


Route::group(['prefix' => 'posts'], function () {
	Route::get('/', 'PostController@index');
	Route::get('/{id}', 'PostController@show')->name('show-post');
});
