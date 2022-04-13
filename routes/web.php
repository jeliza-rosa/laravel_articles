<?php

use Illuminate\Support\Facades\Route;

error_reporting(E_ALL);

Route::get('/about', function () {
    return view('about');
});

Route::get('/test', function () {
    $articles = DB::table('users')
        ->join('articles', 'users.id', '=', 'article.owner_id')
        ->join('companies', 'users.id', '=', 'companies.owner_id')
        ->select('user.id', 'users.email', 'article.code', 'companies.name')
        ->get();

    dump($articles);
});

Route::get('/demo', function () {
    return view('demo');
});

Route::get('/', 'App\Http\Controllers\ArticlesController@index');

Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');

Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::patch('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');
Route::delete('/articles/{article}', 'App\Http\Controllers\ArticlesController@destroy');

Route::resource('/articles', 'App\Http\Controllers\ArticlesController');

Route::get('/articles/tags/{tag}', 'App\Http\Controllers\TagsController@index');

Route::get('/contacts', 'App\Http\Controllers\MessagesController@message');
Route::post('/contacts', 'App\Http\Controllers\MessagesController@messagePost');
Route::get('/admin/feedback', 'App\Http\Controllers\MessagesController@messageGetAll');
Route::get('/admin/allarticles', 'App\Http\Controllers\AdminController@admin');

Route::post('/articles/{article}/comment', 'App\Http\Controllers\CommentsController@store');

Auth::routes();
