<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects', 'api\ProjectController@index');
Route::get('project/{id}', 'api\ProjectController@show');
Route::put('project', 'api\ProjectController@store');
Route::post('project', 'api\ProjectController@store');
Route::delete('project/{id}', 'api\ProjectController@destroy');
