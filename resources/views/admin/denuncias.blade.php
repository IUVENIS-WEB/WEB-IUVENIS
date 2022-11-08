@php
    $tipo = 'denuncia';
@endphp
@extends('layouts.publicarLayout')
@section('title', 'Denúncias')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/denuncias.css') }}">
@endsection
@section('content')
    <div class="conteudo">
        <div class="titulo">
            <div class="titulo-top">
                @include('layouts._icon', ['icon' => 'denuncia-icon-fill.svg'])
                <h1>@yield('title')</h1>
            </div>
            <div class="titulo-bottom">
                <div class="titulo-bottom-conteudo">
                    <div class="titulo-links">
                        <a href="#" class="pagina-atual">Todas as denúncias</a>
                    </div>
                </div>
                <div class="line-horizontal-conteudo"></div>
            </div>
        </div>
        <div class="lista-posts">
            @forelse ($posts as $post)
                <div class="btn-publicacao">
                    <a class="conteudo-btn-post" href="{{route('posts.index', ['post' => $post])}}">
                        <div class="titulo-post">
                            <div class="titulo-btn-publicacao publicacao-titulo">Título</div>
                            <div class="titulo-denuncia">{{$post->titulo }}</div>
                        </div>
                        <div class="organizacao-post">
                            <div class="titulo-btn-publicacao">tipo</div>
                            <p>{{$post->comentario ? "Comentário" : "Post"}}</p>
                        </div>
                        <div class="data-post">
                            <div class="titulo-btn-publicacao">Data</div>
                            <p>{{date('d/m/Y', strtotime($post->updated_at))}}</p>
                        </div>
                    </a>
                </div>
            @empty
                Que bom! Não há mais nenhum post bloqueado.
            @endforelse
        </div>
    </div>
@endsection
