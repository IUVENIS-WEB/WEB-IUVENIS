<?php
use Illuminate\Support\Facades\Route;
use app\Http\Middleware;


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

Route::group(['prefix' => 'posts'], function (){
    Route::get('/', 'PostController@showAll');
    Route::get('grouped', 'PostController@showAllGrouped');
    Route::get('{post}', 'PostController@show');
});

Route::get('/logar/{user?}/{senha?}', 'LoginController@Logar');

    
    Route::get('/Token/{token?}', 'LoginController@Conferir_token')->middleware('Api_token');
    

