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
                    <svg width="30" height="30" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="17.5" cy="17.5" r="17.5" fill="#C4C4C4"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 22.8699C13.2748 19.0569 21.7647 19.0377 28.5537 23.1135C26.7673 27.2685 22.6372 30.1781 17.8276 30.1781C12.9245 30.1781 8.72762 27.1543 7 22.8699Z" fill="#213042"/>
                        <circle cx="18.0537" cy="11.5" r="5.5" fill="#213042"/>
                    </svg> 
                    <h1>perfil</h1>
                </div>
                <div class="titulo-links">
                    <a href="#" class="pagina-atual" >Coleções</a>
                    <a href="#">Editar perfil</a>
                </div>
                <div class="line-horizontal-conteudo"></div>
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
                            <div class="imagem-colecao"><img src="assets/capa.png" alt=""></div>
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