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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', 'AboutController@show')->name('about');
Route::get('posts', 'BlogItemController@index')->name('posts');
Route::get('posts/create', 'BlogItemController@create')->name('posts.create');
Route::post('posts/store', 'BlogItemController@store')->name('posts.store');
Route::get('posts/{id}', 'BlogItemController@show')->name('posts.show');
