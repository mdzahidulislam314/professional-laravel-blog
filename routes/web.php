<?php

use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index')->name('home');
Auth::routes();

Route::post('subscribers','SubscriberController@store')->name('subscriber.store');
Route::resource('contact','ContactController');

Route::get('post/{slug}','PostController@details')->name('post.details');

//post by tag & category
Route::get('category/{slug}','PostController@postByCategory')->name('post.category');
Route::get('tag/{slug}','PostController@postByTag')->name('post.tag');


Route::group(['middleware' => 'auth'], function () {

    // Route::post('favorite/{post}/add', 'FavoriteController@add')->name('favorite.post');
    Route::post('comment/{id}', 'CommentController@store')->name('comment.store');

});

Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::get('all/category', 'CategoryController@data')->name('all.category');

    //Comment
    Route::get('comments', 'CommentController@index')->name('comment.index');
    Route::delete('comments/{id}', 'CommentController@destroy')->name('comment.destroy');
    Route::resource('contact','ContactController');
    //Author
    Route::get('authors','AuthorController@index')->name('author.index');
    Route::delete('author/{id}','AuthorController@destroy')->name('author.destroy');

    Route::resource('post', 'PostController');
    Route::resource('subscribers','SubscriberController');

    //Profile setting
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@ProfileUpdate')->name('update.profile');
    Route::put('password-update', 'SettingsController@updatePassword')->name('update.password');
    //Post approved Route
    Route::get('/pending/post', 'PostController@pending')->name('post.pending');
    Route::put('/post/{id}/approve', 'PostController@approval')->name('post.approve');

});


Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'User','middleware'=>['auth','user']], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('posts','PostController');
    
    //comment system Route
    Route::get('comments', 'CommentController@index')->name('comment.index');
    Route::delete('comments/{id}', 'CommentController@destroy')->name('comment.destroy');
    //Profile setting
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@ProfileUpdate')->name('update.profile');
    Route::put('password-update', 'SettingsController@updatePassword')->name('update.password');
});
