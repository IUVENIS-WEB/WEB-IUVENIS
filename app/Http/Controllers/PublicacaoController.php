<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function form_texto(){
        if(!Auth::check()) return redirect('/');
        return view('publicacao.artigo', ['tipo'=> 'texto']);
    }
}
