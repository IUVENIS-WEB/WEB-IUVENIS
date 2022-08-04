<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IuvenisController extends Controller
{
    //index/home
    public function index()
    {
        if(Auth::check())
            return view('iuvenis.index');
        return view('login.index');
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
}
