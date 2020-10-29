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
    return view('home');
})->name('home');


Route::get('profile', 'ProfileController@index')->name('profile')->middleware('auth');

Route::prefix('posts')->group(function(){
    Route::get('', 'BlogItemController@index')->name('posts');

    Route::name('posts.')->middleware('auth')->group(function(){
        Route::get('create', 'BlogItemController@create')->name('create');
        Route::post('store', 'BlogItemController@store')->name('store');
        Route::get('{id}', 'BlogItemController@show')->name('show');
        Route::post('update/{id}', 'BlogItemController@update')->name('update');
        Route::get('edit/{id}', 'BlogItemController@edit')->name('edit');
        Route::delete('destroy.{id}', 'BlogItemController@destroy')->name('destroy');
        Route::post('hide.{id}', 'BlogItemController@hide')->name('hide');
        Route::post('unhide.{id}', 'BlogItemController@unhide')->name('unhide');
    });
});

Route::post('comment.store', 'commentController@store')->name('comment.store')->middleware('auth');
Route::delete('comment.destroy.{id}', 'commentController@destroy')->name('comment.destroy')->middleware('auth');
Route::post('comment.update.{id}', 'commentController@update')->name('comment.update')->middleware('auth');
Route::post('profile.update.{id}', 'ProfileController@update')->name('profile.update')->middleware('auth');
Route::post('profile.store', 'ProfileController@store')->name('profile.store')->middleware('auth');
Route::post('views.count' , 'ViewCounterController@count')->name('views.count')->middleware('auth');

Auth::routes();


