<?php

use Illuminate\Support\Facades\Route;

error_reporting(E_ALL);

Route::get('/about', function () {
    return view('about');
});

Route::get('/test', function () {
    \App\Jobs\FinalReport::dispatch();
});

Route::get('/', 'App\Http\Controllers\ArticlesController@index');

Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');

Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::patch('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');
Route::delete('/articles/{article}', 'App\Http\Controllers\ArticlesController@destroy');

Route::resource('/articles', 'App\Http\Controllers\ArticlesController');

Route::get('/tags/{tag}', 'App\Http\Controllers\TagsController@index');

Route::get('/contacts', 'App\Http\Controllers\MessagesController@message');
Route::post('/contacts', 'App\Http\Controllers\MessagesController@messagePost');
Route::get('/admin/feedback', 'App\Http\Controllers\MessagesController@messageGetAll');
Route::get('/admin/allarticles', 'App\Http\Controllers\AdminController@admin');

Route::post('/articles/{article}/comment', 'App\Http\Controllers\CommentsController@store');

Auth::routes();

Route::get('/news', 'App\Http\Controllers\NewsController@index');
Route::post('/news', 'App\Http\Controllers\NewsController@store');
Route::get('/news/create', 'App\Http\Controllers\NewsController@create');
Route::get('/news/{new}/edit', 'App\Http\Controllers\NewsController@edit');
Route::patch('/news/{new}', 'App\Http\Controllers\NewsController@update');
Route::get('/news/{new}', 'App\Http\Controllers\NewsController@show');
Route::delete('/news/{new}', 'App\Http\Controllers\NewsController@destroy');
Route::post('/news/{new}/comment', 'App\Http\Controllers\NewsCommentsController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/statistics', 'App\Http\Controllers\StatisticsController@index');

Route::get('/admin/reports', 'App\Http\Controllers\ReportsController@show');
Route::get('/admin/reports/total', 'App\Http\Controllers\ReportsController@reports');
Route::post('/admin/reports/total', 'App\Http\Controllers\ReportsController@reportsPost');
