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

Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/services', 'App\Http\Controllers\PagesController@services');
Route::get(
    '/createProject',
    'App\Http\Controllers\PagesController@createProject'
);
Route::get('/home', 'App\Http\Controllers\PagesController@home');

Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::resource('projects', 'App\Http\Controllers\ProjectController');
Route::resource('projectTasks', 'App\Http\Controllers\ProjectTaskController');

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');
