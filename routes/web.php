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
    return view('auth/login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/projects', 'ProjectController@index');
Route::get('/projects/create', 'ProjectController@create');
Route::post('/projects', 'ProjectController@store')->name('projects');
Route::get('/projects/{project}', 'ProjectController@show');
Route::delete('/projects/{project}', 'ProjectController@destroy');
Route::patch('/projects/{project}', 'ProjectController@update');
Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');
Route::get('/users', 'UserController@index');


//Route::get('/api/projects', 'api\ProjectController@index');
