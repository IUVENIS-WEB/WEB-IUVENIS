<?php
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('login.index');
// });

/*
    Criar as rotas, controllers e arquivos .balde.php
    analisar cada caso das rotas.

    //criar pasta para usuário simples e admin distintas, cada um tendo seus controladores.


*/
Route::get('/',['as'=>'iuvenis.index', 'uses'=>'IuvenisController@index']);
Route::get('/texto/{filtro}',['as'=>'iuvenis.texto', 'uses'=>'IuvenisController@texto']);
Route::get('/video',['as'=>'iuvenis.video', 'uses'=>'IuvenisController@video']);
Route::get('/evento',['as'=>'iuvenis.evento', 'uses'=>'IuvenisController@evento']);
Route::get('/organizacoes',['as'=>'iuvenis.organizacoes', 'uses'=>'IuvenisController@organizacoes']);
Route::get('/pesquisar/{busca}',['as'=>'iuvenis.pesquisar', 'uses'=>'IuvenisController@pesquisar']);

//LOGIN
Route::get('/login',['as'=>'login.index', 'uses'=>'LoginController@index']);
Route::get('/deslogar',['as'=>'login.deslogar', 'uses'=>'LoginController@deslogar']);
Route::get('/recuperarSenha',['as'=>'login.recuperarSenha', 'uses'=>'LoginController@recuperarSenha']);
Route::post('/confirmacaoEnvio',['as'=>'login.confirmacaoEnvio', 'uses'=>'LoginController@confirmacaoEnvio']);
Route::get('/redefinirSenha/{email}/{token}',['as'=>'login.redefinirSenha', 'uses'=>'LoginController@redefinirSenha']);
Route::put('/definirNovaSenha',['as'=>'login.definirNovaSenha', 'uses' =>'LoginController@definirNovaSenha']);
Route::post('/attempt',['as'=>'login.attempt', 'uses'=>'LoginController@attempt']);

Route::get('/explorar', ['as' => 'explorar.index', 'uses' => 'ExplorarController@index']);