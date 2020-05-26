<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/{id}', 'UserController@show')->name('user');
Route::get('/users/{id}/posts', 'UserController@posts')->name('user_posts');

Route::get('/posts/{id}/comments', 'PostController@comments')->name('post_comments');
