@extends('layouts.main_layout')
@section('title', 'Explorar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/explorar.css') }}">
@endsection

@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <img src="assets/explorar-icon.png">
                    <h1>Explorar</h1>
                </div>
                <div class="line-horizontal-conteudo"></div>
            </div>
            <div class="cards">
                @forelse ($posts as $post)
                    <div class="card">
                        <a href="">
                            <div class="autoria">
                                <div class="imagem-perfil menor"><img src="{{asset('images/users/'.$post->autor->foto)}}" alt="foto de perfil"></div>
                                <p>{{$post->autor->nome.' '.$post->autor->sobrenome}}</p>
                                <div class="circulo"></div>
                                <p class="data">{{date('M, d', strtotime($post->updated_at))}}</p>
                            </div>
                        </a>
                        <a href="">
                            <div class="conteudo-card">
                                <div class="card-texto">
                                    <h2>{{$post->titulo}}</h2>
                                    <p>
                                        {{$post->resumo}}
                                    </p>
                                </div>
                                <div class="imagem-card"><img src="{{asset('images/posts/'.$post->imagem)}}"></div>
                            </div>
                        </a>
                        <div class="bottom-card">
                            <div class="direita-bottom-card">
                                @forelse ($post->tags as $tag)
                                <a href="">
                                    <div class="tag">{{$tag->nome}}</div>
                                </a>
                                @empty
                                    
                                @endforelse
                                <p>{{$post->tipo}}</p>
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
                                    <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                                        <li>
                                            <h6 class="dropdown-header">Coleções <button type="button" class="mais"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                        class="fa-solid fa-plus"></i></button></h6>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Lista de leitura</a></li>

                                    </ul>
                                </div>
                                <i class="fa-solid fa-share-from-square"></i>
                            </div>
                        </div>

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
                <form action="">
                    <div class="modal-body">
                        <div class="imagem-card imagem-colecao-modal"><img src="assets/capa.png"></div>
                        <input type="text" id="nomeColecao" class="form-control" placeholder="Nome da coleção"
                            aria-label="First name" maxlength="70">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" class="btn btn-primary" disabled>Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- validação - criação de uma nova coleção-->
    <script>
        const nomeColecao = document.getElementById("nomeColecao");
        const submit = document.getElementById("submit");

        nomeColecao.addEventListener('input', () => {
            if (nomeColecao.value === "") {
                submit.disabled = "disabled";

            } else {
                submit.removeAttribute('disabled');
            }
        });
    </script>

@endsection
