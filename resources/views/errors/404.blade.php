@extends('layouts.main_layout')
@section('title', 'Erro')
@section('css')
<link href="{{ URL::asset('css/erro.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('navbar')
<span></span>
@endsection
@section('content')


        <main class="container">
        

            <div class="conteudo">
            
                <div class="conteudo-texto">
                    <h1>Ooops...</h1>
                    <h2>Página não encontrada</h2>
                        <p>A página que você tentou acessar está indisponível ou não existe! </p>
                        <a href={{route("iuvenis.index")}}><div class="voltar">Voltar</div></a>
                </div>
                <img src="{{ URL::asset('images/globo.png') }}" alt="globo"> 
                
            
            </div>


        </main>
@endsection
