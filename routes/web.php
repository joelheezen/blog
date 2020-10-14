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
})->name('home');

Route::get('about', 'AboutController@show')->name('about');
Route::get('profile', 'ProfileController@index')->name('profile')->middleware('auth');

Route::prefix('posts')->group(function(){
    Route::get('', 'BlogItemController@index')->name('posts');

    Route::name('posts.')->middleware('auth')->group(function(){
        Route::get('create', 'BlogItemController@create')->name('create');
        Route::post('store', 'BlogItemController@store')->name('store');
        Route::get('{id}', 'BlogItemController@show')->name('show');
    });
});

Route::post('comment.store', 'commentController@store')->name('comment.store')->middleware('auth');
Route::post('profile.update.{id}', 'ProfileController@update')->name('profile.update')->middleware('auth');
Route::post('profile.store', 'ProfileController@store')->name('profile.store')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

