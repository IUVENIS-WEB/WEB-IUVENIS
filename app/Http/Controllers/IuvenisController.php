<?php

namespace App\Http\Controllers;

use App\Contracts\IEscritorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('iuvenis.publicar_artigo');
        }else
        {
            return redirect('/login');
        }
    }

}
