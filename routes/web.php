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

Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');

Route::resource('posts','PostController',['except'=>['store']]);
Route::post('posts/{author}',['as'=>'posts.store', 'uses'=>'PostController@store']);
Route::put('posts/update_published/{published}', ['as'=>'posts.update_published', 'uses'=>'PostController@update_published']);
//Route::post('posts/{author}',['as'=>'posts.index', 'uses'=>'PostController@index']);

Route::get('blog/{slug}',['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

/**For Authentication

// Authentication Routes...*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

/**/

//For Categories
Route::resource('categories','CategoryController',['except'=>['create']]);

