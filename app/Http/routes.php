<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Route for the  main pages
 */
Route::get('/', 'PagesController@getIndex');
Route::get('blog/{slug}',array('as' => 'blog.single', 'uses' => 'BlogController@getSingle'))->where('slug', '[\w\d\-\_]+');
Route::get('blog', array('as' => 'blog.index', 'uses' => 'BlogController@getIndex'));

//Used only when using xampp(because of  the  laravel server)
//Route::get('welcome', 'PagesController@getIndex');

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::resource('posts', 'PostController');
/*
 * End of the main pages Route
 */

//Authentication  routes
Route::get('auth/login', array('as' => 'login', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', array('as' => 'loguot', 'uses' => 'Auth\AuthController@getLogout'));

//registration routhes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//password reset
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//category  route
Route::resource('categories', 'CategoryController', array('except' => array('create')));
Route::resource('tags', 'TagController', array('except' => array('create')));

//comments
Route::post('comments/{post_id}', array('uses' => 'ComentsController@store', 'as' => 'comments.store'));
Route::get('comments/{id}/edit', array('uses' => 'ComentsController@edit', 'as' => 'comments.edit'));
Route::put('comments/{id}', array('uses' => 'ComentsController@update', 'as' => 'comments.update'));
Route::delete('comments/{id}', array('uses' => 'ComentsController@destroy', 'as' => 'comments.destroy'));
Route::get('comments/{id}/delete', array('uses' => 'ComentsController@delete', 'as' => 'comments.delete'));







