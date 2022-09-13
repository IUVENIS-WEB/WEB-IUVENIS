@extends('layouts.main_layout')
@php
$loggedIn = Auth::check();
@endphp
@section('title', 'Escritor')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/perfil-escritor.css') }}">

@endsection
@section('content')

    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <svg width="30" height="30" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="17.5" cy="17.5" r="17.5" fill="#C4C4C4"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 22.8699C13.2748 19.0569 21.7647 19.0377 28.5537 23.1135C26.7673 27.2685 22.6372 30.1781 17.8276 30.1781C12.9245 30.1781 8.72762 27.1543 7 22.8699Z" fill="#213042"/>
                        <circle cx="18.0537" cy="11.5" r="5.5" fill="#213042"/>
                    </svg>    
                    <h1>{{$escritor->nome . ' ' . $escritor->sobrenome }}</h1>
                </div>
                <div class="titulo-links">
                    <a class="pagina-atual" onclick="trocaPosts()">Posts</a>
                    <a class="pagina-atual" onclick="trocaSobre()">Sobre</a>
                </div>
                <div class="line-horizontal-conteudo"></div>
            </div>
            <div id="minhadivfavorita" class="cards_sobre">
                {{$escritor->bio}}
            </div>

            <div id="minhadivnaofavorita" class="cards">
                @forelse($posts as $post)
                <div class="card">
    <a href="">
        <div class="autoria">
            <div class="circulo"></div>
            <p class="data">{{ date('M, d', strtotime($post->posts_updated_at)) }}</p>
        </div>
    </a>
    <a href="">
        <div class="conteudo-card">
            <div class="card-texto">
                <h2>{{ $post->posts_titulo }}</h2>
                <p>
                    {{ $post->posts_resumo }}
                </p>
            </div>
            <div class="imagem-card"><img src="{{ asset('images/posts/' . $post->posts_imagem) }} "></div>
        </div>
    </a>
    <div class="bottom-card">
        <div class="direita-bottom-card">
            
                <a href="{{ url('/tag/' . $post->tags_id) }}">
                    <div class="tag">{{ $post->tags_nome }}</div>
                </a>
           
            <p>{{ $post->posts_tipo }}</p>
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
                    @if ($loggedIn)
                        <li>
                            <h6 class="dropdown-header">Coleções <button type="button" class="mais"
                                    data-bs-toggle="modal"
                                    onclick="inputPostValue({{ $post->posts_id }})"
                                    data-bs-target="#exampleModal"><i
                                        class="fa-solid fa-plus"></i></button></h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endif
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="salvaPost({{ $post->posts_id }}, {{ $post->colecaos_id }})">
                                {{ $post->colecaos_nome }}
                            </a>
                        </li>
                        <li> <a style="margin-left: 5%" href="{{ route('login.index') }}">Entre para
                                salvar.</a></li>
                </ul>
            </div>
            <i class="fa-solid fa-share-from-square"></i>
        </div>
    </div>

</div>
<div class="line-horizontal-conteudo"></div>

            @empty
            <small>Não há posts no momento :(</small>           
            @endforelse
            </div>
        </div>
       
        @include('layouts._sidebar', [$tipo = 'user', 'user' => $escritor, 'posts' => $posts])

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

<script>
function trocaPosts() {
  var x = document.getElementById('minhadivnaofavorita');
  if (x.style.display == 'none') {
    x.style.display = 'block';
  } else {
    x.style.display = 'none';
  }

  var y = document.getElementById('minhadivfavorita');
    
  if (y.style.display == 'block') {
    y.style.display = 'none';
  } else {
    y.style.display = 'block';
  }
}

function trocaSobre(){

 var y = document.getElementById('minhadivnaofavorita');
  if (y.style.display == 'block') {
    y.style.display = 'none';
  } else {
    y.style.display = 'block';
  }


    var x = document.getElementById('minhadivfavorita');
    
  if (x.style.display == 'none') {
    x.style.display = 'block';
  } else {
    x.style.display = 'none';
  }
}
</script>

