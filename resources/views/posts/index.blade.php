@extends('layouts.main_layout')
@section('title', $post->titulo)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/visualizar-artigo.css') }}">
@endsection

@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                @if ($post->excluido && $post->denunciasContagem >= 5)
                    <div class="titulo-botoes mb-5">
                        <a class="btn btn-primary text-white" href="{{ route('adm.revogar', ['post' => $post]) }}">Revogar
                            post</a>
                        <a class="btn btn-danger text-white" href="{{ route('adm.excluir_post', ['post' => $post]) }}">Excluir
                            post</a>
                    </div>
                @endif
                <div class="organizacao-publicacao">
                    <p>publicado em <a
                            href="{{ url('/organizacao/' . $post->organizacao->id) }}">{{ $post->organizacao->nome }}</a>
                    </p>
                </div>
                <div class="titulo-top">
                    <div class="nome-escritor-salvar">
                        <div class="imagem-perfil-escritor">@include('layouts._foto_perfil', ['user' => $post->autor])</div>
                        <div class="nome-escritor-direita">
                            <h5>{{ $post->autor->nome }} {{ $post->autor->sobrenome }}</h5>
                            <p>{{ date('d/m/Y', strtotime($post->updated_at)) }}</p>
                        </div>
                    </div>
                    <div class="esquerda-bottom-card">
                        @if (Auth::check())
                            <button type="button" class="mais" data-bs-toggle="modal" data-bs-target="#denuncia">
                                @include('layouts._icon', [
                                    'icon' => 'denuncia-icon-fill.svg',
                                    'width' => '28px',
                                ])
                            </button>
                        @endif
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
            </div>
            <div class="cards">
                <img style="margin: 1em; width: 30vw" src="{{asset( $post->imagem)}}">
                <h1>{{ $post->titulo }}</h1>
                <div class="tags-artigo">
                    @forelse ($post->tags as $tag)
                        <a href="{{ url('/tag/' . $tag->id) }}">
                            <div class="tag">{{ $tag->nome }}</div>
                        </a>
                    @empty
                    @endforelse
                </div>
                <p><i class="fa-solid fa-eye"></i> {{ $views }} visualizações</p>
                @if (strtolower($post->tipo) == 'video')
                    <iframe height="500" src="{{ $post->embed }}" frameborder="5"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                @endif
                <h4> Resumo<h4>
                        <p>
                            {{ $post->resumo }}
                        </p>
                        <div class="botoes">
                            @if ($post->tipo == 'artigo')
                                <a href="{{ $post->link_midia }}" target="_blank">
                                    <div class="botao-link">
                                        <i class="fa-sharp fa-solid fa-link"></i>
                                        <div>Acessar</div>
                                    </div>
                                </a>
                            @endif
                            @if ($post->tipo == 'evento')
                                <a href="{{ $post->link_evento }}" target="_blank">
                                    <div class="botao-link">
                                        <i class="fa-sharp fa-solid fa-link"></i>
                                        <div>Participar</div>
                                    </div>
                                </a>
                            @endif
                            @if ($post->arquivo)
                                <a href="{{ $post->arquivo }}" target="_blank">
                                    <div class="botao-baixar">
                                        <i class="fa-regular fa-circle-down"></i>
                                        <div>Baixar artigo</div>
                                    </div>
                                </a>
                            @endif
                        </div>
            </div>
        </div>
        @include('layouts._sidebar', [
            ($tipo = 'user'),
            'user' => $post->autor,
            'posts' => $post->autor->posts,
        ])
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
    <div class="modal" tabindex="-1" id="denuncia" tabindex="-1" aria-labelledby="denuncia" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Denúncia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja mesmo denunciar este post?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="submit" class="btn btn-danger"><a class="text-white"
                            href="{{ route('posts.denuncia', ['post' => $post]) }}">Denunciar</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
