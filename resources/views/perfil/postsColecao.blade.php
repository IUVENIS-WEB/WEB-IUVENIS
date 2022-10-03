@extends('layouts.main_layout')
@section('title', 'Coleção')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/explorar.css') }}">
@endsection

@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <img src="{{ URL::asset('images/assets/aprendizado.png') }}">
                    <h1>{{$colecao->nome}}</h1>
                </div>
                <div class="line-horizontal-conteudo"></div>
            </div>
            <div class="cards">
                @forelse ($posts as $post)
                <div class="card">
                    <a href="">
                        <div class="autoria">
                            <div class="imagem-perfil menor"><img
                                    src="{{ asset('images/users/' . $post->foto) }}" alt="foto de perfil"></div>
                            <p>{{ $post->nome . ' ' . $post->sobrenome }}</p>
                            <div class="circulo"></div>
                            <p class="data">{{ date('y/m/Y', strtotime($post->updated_at)) }}</p>
                        </div>
                    </a>
                    <a href="">
                        <div class="conteudo-card">
                            <div class="card-texto">
                                <h2>{{ $post->titulo }}</h2>
                                <p style="">
                                    @php
                                        $resumo = strlen($post->resumo) > 100 ? substr($post->resumo,0,100)."..." : $post->resumo;
                                    @endphp
                                    {{ $resumo }}
                                </p>
                            </div>
                            <div class="imagem-card"><img src="{{$post->imagem}}"></div>
                        </div>
                    </a>
                    <div class="bottom-card">
                        <div class="direita-bottom-card">
                            
                            <p>{{ $post->tipo }}</p>
                        </div>
                        <div class="esquerda-bottom-card">
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCenterBtn"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bookmark">
                                        <i class="fa-regular fa-bookmark"></i>
                                        <i class="fa-solid fa-bookmark"></i>
                                    </i>
                                </button>
                            </div>
                            <i class="fa-solid fa-share-from-square"></i>
                        </div>
                    </div>
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