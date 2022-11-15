@extends('layouts.main_layout')
@section('title', 'Coleção')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/explorar.css') }}">
@endsection
@inject('salvoRepository', 'App\Contracts\ISalvoRepository')
@php
$colecoes = $salvoRepository->getColecoes();
$loggedIn = Auth::check();
@endphp

@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <svg width="50" height="50" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="17.5" cy="17.5" r="17.5" fill="#C4C4C4"/>
                        <path d="M12 11V24.6677C12 25.5468 13.0527 25.9981 13.6894 25.3921L17.0388 22.2043C17.4384 21.824 18.0704 21.8391 18.4514 22.238L21.2769 25.196C21.8999 25.8483 23 25.4073 23 24.5053V11C23 10.4477 22.5523 10 22 10H13C12.4477 10 12 10.4477 12 11Z" fill="#253042" stroke="#253042" stroke-width="2"/>
                        </svg>
                    <h1>{{$colecao->nome}}</h1>
                </div>
                <div class="line-horizontal-conteudo"></div>
            </div>
            <div class="cards">
                @forelse ($posts as $post)
                
                    @include('layouts._card_post', ['post' => $post])
                    <div class="line-horizontal-conteudo"></div>
                    </div>
                @empty
                    <small>Não há posts no momento :(</small>
                @endforelse
            </div>
        </div>
        @include('layouts._sidebar')
        
    </main>

    <div class="modal" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nova coleção</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="imagem-card imagem-colecao-modal"><img src="assets/capa.png"></div> --}}
                    <input type="text" id="nomeColecao" class="form-control" placeholder="Nome da coleção"
                        aria-label="First name" maxlength="70">
                    <input type="number" id="post_id" hidden class="form-control">
                </div>
                <div class="modal-footer">
                    <button id="submit" data-bs-dismiss="modal" class="btn btn-primary" onclick="criar_colecao()" disabled>Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/colecao.js')}}"></script>

@endsection