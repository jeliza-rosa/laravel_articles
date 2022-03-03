<?php

use Illuminate\Support\Facades\Route;

error_reporting(E_ALL);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/', 'App\Http\Controllers\ArticlesController@main');

Route::get('/contacts', 'App\Http\Controllers\MessagesController@message');
Route::post('/contacts', 'App\Http\Controllers\MessagesController@messagePost');
Route::get('/admin/feedback', 'App\Http\Controllers\MessagesController@messageGetAll');

Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@article');
Route::post('/articles/create', 'App\Http\Controllers\ArticlesController@articlePost');
Route::get('/articles/{code}', 'App\Http\Controllers\ArticlesController@articleGet');

Route::get('/articles/{code}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::patch('/articles/{code}', 'App\Http\Controllers\ArticlesController@update');
Route::delete('/articles/{code}', 'App\Http\Controllers\ArticlesController@destroy');

