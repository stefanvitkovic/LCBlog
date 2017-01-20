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

Route::get('/', 'ArticleController@welcome');

Auth::routes();


Route::get('articles/create','ArticleController@create');

Route::post('articles','ArticleController@store')->name('articles');

Route::get('articles/{id}','ArticleController@show')->name('show');

Route::get('articles/{id}/edit','ArticleController@edit');

Route::put('articles/{id}','ArticleController@update')->name('updateA');

Route::get('articles/{id}/delete','ArticleController@destroy')->name('destroyA');


Route::get('categories/create','CategoryController@create');

Route::post('categories','CategoryController@store')->name('categories');

Route::get('categories/{id}','CategoryController@show');

Route::get('categories/{id}/edit','CategoryController@edit');

Route::put('categories/{id}','CategoryController@update')->name('update');

Route::get('categories/{id}/delete','CategoryController@destroy')->name('destroyC');


Route::post('comments','CommentController@store');

Route::get('comments/{id}/edit','CommentController@edit');

Route::put('comments/{id}','CommentController@update')->name('updateComm');

Route::get('comments/{id}/delete','CommentController@destroy');

