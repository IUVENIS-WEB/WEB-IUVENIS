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
    //retorna os posts de uma coleção pelo seu id
    Route::get('colecoes/{id}', 'PostController@getPostByIdColecoes');
    //retorna o post com maior número de visualizações
    Route::get('recomendado', 'PostController@recomendado');
    Route::get('/', 'PostController@showAll');
    Route::get('grouped', 'PostController@showAllGrouped');
    Route::get('{post}', 'PostController@show');
    //retorna as coleções de um usuário pelo seu id
    Route::get('colecoes/usuario/{id}', 'PostController@getColecoesByIdUser');
});

Route::get('/logar/{user?}/{senha?}', 'LoginController@Logar');

    
    Route::get('/Token/{token?}', 'LoginController@Conferir_token')->middleware('Api_token');
    


Route::group(['prefix' => 'login'], function(){
    Route::post('/register', 'LoginController@register');
});
Route::group(['prefix' => 'comentarios'], function(){
    Route::get('{id}', 'PostController@getComentarioByIdPai');
});
Route::group(['prefix' => 'users'], function(){
    Route::get('{id}', 'UserController@getUserById');
    Route::post('/recuperarSenha','USerController@emailRecuperarSenha');
});

