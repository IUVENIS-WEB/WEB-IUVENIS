<?php

namespace App\Http\Controllers;

use App\Contracts\IEscritorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BD;
use Illuminate\Database\Eloquent\Model;

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

    public function publicar(){
        if(Auth::check())
        {
            $id = Auth::user();
            $posts = DB::table('posts')
           ->join('users', 'users.id', '=', 'posts.autor_id')
           ->where([
               ['posts.excluido', '=', 0],
                ['posts.comentario', '=', 0],
                ['posts.autor_id', '=', $id->id],
           ])
            ->select('posts.autor_id',
            'users.foto',
            'users.nome',
            'users.sobrenome',
            'posts.tipo',
            'posts.titulo',
            'posts.updated_at')
            ->take(10)
            ->get();


        return view('iuvenis.publicar_artigo', ['posts'=> $posts, 'user' => $user]);
        }else
        {
            return redirect('/login');
        }
    }

}
