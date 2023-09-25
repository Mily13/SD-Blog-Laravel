<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\PostController@listAllPost')->name('posts');
Route::get('/add-post', 'App\Http\Controllers\PostController@newform')->name('add-post');
Route::post('/add-post', 'App\Http\Controllers\PostController@insert')->name('store-post');
Route::post('/posts/delete/{id}', 'App\Http\Controllers\PostController@delete')->name('delete-post');
Route::get('/posts/edit/{id}', 'App\Http\Controllers\PostController@edit')->name('edit-post');
Route::post('/posts/update/{id}', 'App\Http\Controllers\PostController@update')->name('update-post');
Route::get('/posts/{id}', 'App\Http\Controllers\PostController@showPost')->name('show-post');
Route::get('/filter-posts', 'App\Http\Controllers\PostController@filterPost')->name('filter-post');





