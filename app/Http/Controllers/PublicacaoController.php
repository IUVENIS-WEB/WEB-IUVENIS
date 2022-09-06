<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function form_artigo(){
        return view('publicacao.artigo');
    }
}
