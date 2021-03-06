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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin
Route::group([ 'as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {

    Route::get('dashboard','HomeController@index')->name('dashboard');

    Route::resource('users','UsersController');

    Route::resource('posts','PostsController');

    Route::resource('category','CategoryController');

    Route::resource('media', 'MediaController');

    Route::post('media/deleteall', 'MediaController@deleteMedia')->name('media.deleteall');

    Route::resource('comments', 'PostCommentsController');

    Route::resource('replies', 'CommentRepliesController');
    
});
