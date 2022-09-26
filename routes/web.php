<?php
use Illuminate\Support\Facades\Route;
use app\Http\Middleware;
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

//LISTA DE PUBLICAÇÕES
Route::get('/publicacoes/texto',['as'=>'iuvenis.publicacoes_texto', 'uses'=>'IuvenisController@publicar_artigo'])->middleware('Escritor');
Route::get('/publicacoes/video',['as'=>'iuvenis.publicacoes_video', 'uses'=>'IuvenisController@publicar_video']);
Route::get('/publicacoes/evento',['as'=>'iuvenis.publicacoes_evento', 'uses'=>'IuvenisController@publicar_evento']);

//FORM DE PUBLICAÇÕES
Route::get('/publicar/artigo/{postId?}',['as'=>'publicacao.artigo', 'uses'=>'PublicacaoController@form_artigo'])->middleware('Escritor');
Route::get('/publicar/video/{postId?}',['as'=>'publicacao.video', 'uses'=>'PublicacaoController@form_video']);
Route::get('/publicar/evento',['as'=>'publicacao.evento', 'uses'=>'PublicacaoController@form_evento']);

//ENVIO DE POST
Route::post('/publicar/texto/new',['as'=>'publicacao.new_texto', 'uses'=>'PublicacaoController@novo_artigo'])->middleware('Escritor');
Route::get('/publicar/evento/{postId?}',['as'=>'publicacao.artigo', 'uses'=>'PublicacaoController@form_evento']);
Route::post('/publicar/evento/new',['as'=>'publicacao.new_evento', 'uses'=>'PublicacaoController@novo_evento']);
Route::post('/publicar/video/new',['as'=>'publicacao.new_video', 'uses'=>'PublicacaoController@novo_video']);

//DELETAR PUBLICAÇÕES
Route::post('/publicacoes/deletar/',['as'=>'publicacao.deletar', 'uses'=>'PublicacaoController@deletar_post']);



Route::get('/texto/{filtro}',['as'=>'iuvenis.texto', 'uses'=>'IuvenisController@texto']);
Route::get('/video',['as'=>'iuvenis.video', 'uses'=>'IuvenisController@video']);
Route::get('/organizacoes',['as'=>'iuvenis.organizacoes', 'uses'=>'IuvenisController@organizacoes']);
Route::get('/pesquisar/{busca}',['as'=>'iuvenis.pesquisar', 'uses'=>'IuvenisController@pesquisar']);

//LOGIN
Route::get('/login',['as'=>'login.index', 'uses'=>'LoginController@index']);
Route::get('/cadastro',['as'=>'login.cadastro', 'uses'=>'LoginController@cadastro']);
Route::post('/completarCadastro',['as'=>'login.completarCadastro', 'uses'=>'LoginController@completarCadastro']);
Route::get('/cadastroFinal',['as'=>'login.cadastroFinal', 'uses'=>'LoginController@cadastroFinal']);
Route::get('/deslogar',['as'=>'login.deslogar', 'uses'=>'LoginController@deslogar']);
Route::get('/recuperarSenha',['as'=>'login.recuperarSenha', 'uses'=>'LoginController@recuperarSenha']);
Route::post('/confirmacaoEnvio',['as'=>'login.confirmacaoEnvio', 'uses'=>'LoginController@confirmacaoEnvio']);
Route::get('/redefinirSenha/{email}/{token}',['as'=>'login.redefinirSenha', 'uses'=>'LoginController@redefinirSenha']);
Route::put('/definirNovaSenha',['as'=>'login.definirNovaSenha', 'uses' =>'LoginController@definirNovaSenha']);
Route::post('/attempt',['as'=>'login.attempt', 'uses'=>'LoginController@attempt']);
Route::post('/cadastrar',['as'=>'login.cadastrar', 'uses'=>'LoginController@cadastrar']);

//DESCOBERTA DE CONTEÚDO
Route::get('/explorar', ['as' => 'explorar.index', 'uses' => 'ExplorarController@index']);
Route::get('/tag/{tag}', ['as' => 'tag.index', 'uses' => 'TagController@index'])
->where('tag', '\d+');
Route::get('/eventos', ['as' => 'eventos.index', 'uses' => 'EventosController@index']);


//COLEÇÕES E SALVOS
Route::get('/getColecaos', ['as' => 'colecao.getColecaos', 'uses' => 'ColecaoController@getColecaos']);
Route::post('/salvaPost', ['as' => 'colecao.salvaPost', 'uses' => 'ColecaoController@salvaPost']);
Route::post('/salvaColecao', ['as' => 'colecao.salvaColecao', 'uses' => 'ColecaoController@salvaColecao']);


Route::post('/envioContato', ['as' => 'iuvenis.envioContato.', 'uses' => 'EnvioController@envioContato']);
Route::get('/contato', ['as' => 'iuvenis.contato.', 'uses' => 'IuvenisController@contato']);

Route::get('/escritor/{id}',['as'=>'explorar.escritor', 'uses'=>'ExplorarController@escritor']);

Route::get('/posts/{post}', ['as'=>'posts.index', 'uses'=>'PostController@index']);

// ROTAS DE AUTENTIFICAÇÃO
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// ROTAS DE REGISTRO
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// USUARIO PERTENCE A UMA ORGANIZAÇÃO
Route::group(['middlewere' => ['auth', 'Verificausuario:organizacao']], function(){
    // ...
});