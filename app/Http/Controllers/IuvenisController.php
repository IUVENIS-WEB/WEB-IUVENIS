<?php

namespace App\Http\Controllers;

use App\Contracts\IEscritorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BD;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\IPostRepository;

class IuvenisController extends Controller
{
    //index/home
    public function index(IEscritorRepository $escritorRepository)
    {
        $escritores = $escritorRepository->getEscritores([], 4);
        return view('iuvenis.index', ['escritores'=>$escritores]);
    }
    //explorar
    public function explorar(){
        return view('iuvenis.explorar');
    }
    //texto/{filtro}
    public function texto($filtro){
        return view('iuvenis.texto');
    }
    //video
    public function video(){
        return view('iuvenis.video');
    }
    //evento
    public function evento(){
        return view('iuvenis.evento');
    }
    //mais/{opções}
    public function mais($opcoes){
        return view('iuvenis.mais');
    }
    //pesquisar/busca
    public function pesquisar($busca){
        return view('iuvenis.pesquisa');
    }
    //login
    public function login(){
        return view('iuvenis.login');
    }
    //contato
    public function contato(){
        return view('iuvenis.contato');
    }

    public function publicar_texto(IPostRepository $postRepository){
        if(Auth::check())
        {
            $tipo = 'Texto';
        $id = Auth::user();
        $user = $postRepository->getPostsUser($id, $tipo);
        return view('iuvenis.publicar_artigo', ['user' => $user, 'id' => $id, 'tipo' => $tipo]);
        }else
        {
            return redirect('/login');
        }
    }

    public function publicar_video(IPostRepository $postRepository){
        if(Auth::check())
        {
        $tipo = 'Video';
        $id = Auth::user();
        $user = $postRepository->getPostsUser($id, $tipo);
        return view('iuvenis.publicar_artigo', ['user' => $user, 'id' => $id, 'tipo' => $tipo]);
        }else
        {
            return redirect('/login');
        }
    }

    public function publicar_evento(IPostRepository $postRepository){
        if(Auth::check())
        {
        $tipo = 'Evento';
        $id = Auth::user();
        $user = $postRepository->getPostsUser($id, 'evento');

        return view('iuvenis.publicar_artigo', ['user' => $user, 'id' => $id, 'tipo' => $tipo]);
        }else
        {
            return redirect('/login');
        }
    }

}
