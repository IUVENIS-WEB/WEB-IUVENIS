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
//Use como referência: https://www.toptal.com/laravel/restful-laravel-api-tutorial

Route::get('/post/{post}', 'PostController@show');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
