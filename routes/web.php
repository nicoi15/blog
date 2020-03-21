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


Route::get('/posts/create', 'PostsController@create')->name('create')->middleware('auth');
Route::post('/posts/categories', 'PostsController@category');
Route::put('/posts/{post}/comment', 'CommentsController@comment');


// User Route
Route::group(['prefix' => 'account'], function() {
    Route::get('/', 'AccountsController@authenticateUser')->name('authenticateUser')->middleware('auth');
    Route::get('blogs', 'PostsController@userPosts')->name('userPosts')->middleware('auth');
    Route::get('profile', 'AccountsController@profile')->name('profile')->middleware('auth');
    Route::get('changepass', 'AccountsController@changepass')->name('changepass')->middleware('auth');
    Route::put('updatepass', 'AccountsController@updatepass')->name('changepass')->middleware('auth');
    // Route::
});
// Admin Route
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () {
        return view('layouts.admin');
    })->middleware('auth');
    Route::get('user_accounts', 'AdminsController@showUserAccounts')->name('showUserAccounts')->middleware('auth');
    Route::get('blogs', 'AdminsController@showAllPosts')->name('showAllPosts')->middleware('auth');
    Route::get('tags', 'AdminsController@showAllTags')->name('showAllTags')->middleware('auth');
});

Route::resource('posts', 'PostsController');
Route::resource('tags', 'TagsController');
Route::resource('accounts', 'AccountsController');

Auth::routes();

Route::get('/', 'PostsController@index')->name('home');
