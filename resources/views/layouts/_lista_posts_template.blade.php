@inject('salvoRepository', 'App\Contracts\ISalvoRepository')
@php
$colecoes = $salvoRepository->getColecoes();
$loggedIn = Auth::check();
@endphp
@extends('layouts.main_layout')
@section('title', $title)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/' . $css) }}">
@endsection
@section('content')
    <style>
        .featured {
            width: 100%;
            height: fit-content;
            background-color: var(--bege);
            border-radius: 10px;
            border-style: solid;
            border-color: var(--azul-escuro);
            border-width: 3px;
            margin-bottom: 2rem;
            padding: 1rem 1rem 1rem 1rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            row-gap: 1rem;
        }

        .featured h2 {
            font-weight: var(--semibold);
        }

        .featured-bottom {
            display: flex;
            column-gap: 1rem;
        }

        .detalhes-botao-featured {
            display: flex;
            color: #575FCC;
            font-weight: var(--semibold);
            column-gap: 1rem;
            align-items: center;
        }

        .saiba-mais {
            background-color: var(--amarelo);
            border-radius: 7px;
            padding: 7px 10px 7px 10px;
            min-width: 9.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-style: solid;
            border-color: var(--azul-escuro);
            border-width: 3px;
            transition: all 0.3s ease;
            color: var(--azul-escuro);
            font-weight: var(--semibold);

        }

        .saiba-mais:hover {
            background-color: #C1B8A9;
            letter-spacing: 0.5px;
        }

        .data-featured-botao {
            position: relative;
        }

        .detalhes-botao-featured div {
            font-size: 1rem;bottom
        }
    </style>
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    @include('layouts._icon', ['icon' => $icon, 'width' => '30px', 'height'=> '30px'])
                    <h1>{{ $title }}</h1>
                </div>
                @if (isset($featured_post))
                    @include('layouts._card_featured', ['featured_post' => $featured_post])
                @endif
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
        @include('layouts._sidebar', ['tipo' =>( isset($sidebar_type)? $sidebar_type :  'default')])
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
