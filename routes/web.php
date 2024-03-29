<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
    Criar as rotas, controllers e arquivos .balde.php
    analisar cada caso das rotas.

    //criar pasta para usuário simples e admin distintas, cada um tendo seus controladores.


*/
Route::get('/',['as'=>'iuvenis.index', 'uses'=>'IuvenisController@index']);
Route::get('/explorar',['as'=>'iuvenis.explorar', 'uses'=>'IuvenisController@explorar']);
Route::get('/texto/{filtro}',['as'=>'iuvenis.texto', 'uses'=>'IuvenisController@texto']);
Route::get('/video',['as'=>'iuvenis.video', 'uses'=>'IuvenisController@video']);
Route::get('/evento',['as'=>'iuvenis.evento', 'uses'=>'IuvenisController@evento']);
Route::get('/mais/{opcoes}',['as'=>'iuvenis.mais', 'uses'=>'IuvenisController@mais']);
Route::get('/pesquisar/{busca}',['as'=>'iuvenis.pesquisar', 'uses'=>'IuvenisController@pesquisar']);
Route::get('/login',['as'=>'iuvenis.login', 'uses'=>'IuvenisController@login']);
Route::resource('/Mail', EnvioController::class);








