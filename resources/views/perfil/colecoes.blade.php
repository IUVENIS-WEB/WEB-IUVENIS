@extends('layouts.main_layout')
@section('title', 'Coleções')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/perfil-usuario.css') }}" type="text/css">
    

@endsection
   @section("content")
   <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    @include('layouts._icon', ['icon' => 'configuracoes_icon.svg'])
                    <h1>Configurações</h1>
                </div>
                <div class="titulo-bottom">
                    <div class="titulo-bottom-conteudo">
                        <div class="titulo-links">
                            <a href="{{route('conta.index')}}">Perfil público</a>
                            <a href="{{route('conta.privada')}}">Informações pessoais</a>
                            <a href="{{route('colecao.user')}}" class="pagina-atual">Coleções</a>
                        </div>
                    </div>
    
                    <div class="line-horizontal-conteudo"></div>
                </div>
            </div>
            <div class="cards">
                @forelse ($colecoes as $dado)
                    <a class="linkPost" href="{{Route('colecao.posts', ['id' => $dado->id])}}">
                        <div class="card">
                            <div class="texto-colecao">
                                @php
                                    $resumo = strlen($dado->nome) > 100 ? substr($dado->nome,0,100)."..." : $dado->nome;
                                @endphp
                            <h2>{{ $resumo }}</h2>
                                <p>{{ date('y/m/Y', strtotime($dado->updated_at)) }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    
                @endforelse
            </div>
        </div>
        @include('layouts._sidebar')
    </main>

    <div class="modal" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nova coleção</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="imagem-card imagem-colecao-modal"><img src="assets/capa.png"></div>
                    <input type="text" id="nomeColecao" class="form-control" placeholder="Nome da coleção" aria-label="First name" maxlength="70">
                </div>
                <div class="modal-footer">
                  <button type="submit" id="submit" class="btn btn-primary" disabled>Salvar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection