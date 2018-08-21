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
//project routes
Route::get('/projects', 'ProjectController@index');
Route::get('/projects/create', 'ProjectController@create');
Route::post('/projects', 'ProjectController@store')->name('projects');
Route::get('/projects/{project}', 'ProjectController@show');
Route::delete('/projects/delete/{project}', 'ProjectController@destroy');
Route::patch('/projects/{project}', 'ProjectController@update');
Route::patch('/projects/undelete/{project}', 'ProjectController@undelete');

//category routes
Route::get('/categories', 'CategoryController@index');
Route::get('/category/{category}', 'CategoryController@show');
Route::patch('/category/{category}', 'CategoryController@update');
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::delete('/category/delete/{category}', 'CategoryController@destroy');

//user routes
Route::get('/users', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/users', 'UserController@store')->name('users');
Route::get('/users/{user}', 'UserController@show')->name('user');
Route::delete('/users/delete/{user}', 'UserController@destroy');
Route::patch('/users/undelete/{user}', 'UserController@undelete');

//profile routes
Route::get('/profile/{profile}', 'ProfileController@show');
Route::get('/profile/create', 'ProfileController@create');
Route::post('/profile', 'ProfileController@store');
Route::patch('/profile/{profile}', 'ProfileController@update');

//Admin routes
Route::get('/admins', 'AdminController@index');
Route::get('/admins/{admin}', 'AdminController@show');
Route::patch('/admins/{admin}', 'AdminController@update');
Route::delete('/admins/delete/{admin}', 'AdminController@destroy');