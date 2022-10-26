@php
    $tipo = 'artigo';
@endphp
@extends('layouts.publicarLayout')
@section('title', 'Tags')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/publicar-tags.css') }}">
@endsection
@section('content')
    <div class="conteudo">
        <div class="titulo">
            <div class="titulo-top">
                @include('layouts._icon', ['icon' => 'tag-icon.png', 'height' => 35])
                <h1>Tags</h1>
            </div>
            <div class="titulo-bottom">
                <div class="titulo-bottom-conteudo">
                    <div class="titulo-links">
                        <a href="{{route('adm.tags')}}" class="">Todas as tags</a>
                        <a href="{{$tag ? route('adm.publicacao_tag', ['id' => $tag->id]) : route('adm.publicacao_tag')}}" class="pagina-atual">{{ $tag ? 'Alterar tag' : 'Nova tag' }}</a>
                    </div>
                    <div class="titulo-botoes">
                        <input type="reset" onclick="history.back()" form="publicar-artigo" value="Cancelar" class="reset" />
                        <input type="submit" form="publicar-artigo" value="Publicar" />
                    </div>
                </div>

                <div class="line-horizontal-conteudo"></div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @if (session('fail.errors'))
                        @foreach (session('fail.errors') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        @endif
        <form action="{{ route('adm.submit_tag') }}" id="publicar-artigo" method="POST">
            {{ csrf_field() }}
            <label for="nome">Nome da tag</label>
            <span class="aviso-tags">Lembre-se que essa ação irá afetar todos os posts que possuem essa tag</span>

            @if ($tag)
                <input type="text" name="id" id="id" hidden value={{ $tag->id }}>
            @endif
            <input type="text" id="nome-tag" name="nome" required maxlength="20"
                value="{{ $tag ? $tag->nome : null }}">
        </form>
    </div>
@endsection
