@inject('salvoRepository', 'App\Contracts\ISalvoRepository')
@php
$colecoes = $salvoRepository->getColecoes();
$loggedIn = Auth::check();
@endphp
@extends('layouts.main_layout')
@section('title', 'Tags')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/tag.css') }}">
@endsection

@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <img src="{{asset('images/assets/tag-icon.png')}}">
                    <h1>{{$tag}}</h1>
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
                    <button id="submit" data-bs-dismiss="modal" class="btn btn-primary" onclick="criar_colecao()"
                        disabled>Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/colecao.js') }}"></script>

@endsection
