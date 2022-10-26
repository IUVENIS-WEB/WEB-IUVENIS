@extends('layouts.publicarLayout')
@section('title', 'Publicar artigo')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/publicacoes_texto.css') }}">
@endsection

@section('content')
    @php
        $tipo_ortografico = $tipo == 'Video'? 'vídeo' : strtolower($tipo);    
    @endphp
    {{-- @include('layouts._sidebar_publicacao') --}}
    <div class="conteudo">
        <div class="titulo">
            <div class="titulo-top">
                <img src="{{asset('assets/'.$tipo.'_icon.svg')}}" alt="">
                <h1>Produção de {{$tipo_ortografico}}</h1>
                <h2></h2>
            </div>
            <div class="titulo-bottom">
                <div class="titulo-links">
                    <a href="#" class="pagina-atual" >{{ucfirst($tipo_ortografico)}}</a>
                    @if($tipo == 'Texto')
                    <a href="#">Editoriais</a>
                    @endif
                </div>
                <div class="line-horizontal-conteudo"></div>
            </div>
        </div>
        <div class="lista-posts">
            <a href="{{route('publicacao.'.strtolower($tipo))}}" class="publicar-novo">  
                <img src="assets/adicionar-icon.svg" alt="">
                <div>Publicar novo {{$tipo_ortografico}} </div>
            </a>

            @forelse ($user as $post)
            <div class="btn-publicacao">
                <img src="{{asset('assets/'.$tipo.'_icon.svg')}}" alt=""  height="60%" style="margin-top: 13px;margin-right: 20px">
                <a class="conteudo-btn-post" href="{{url('/posts/'.$post->id)}}">
                    <div class="titulo-post">
                        <div class="titulo-btn-publicacao">Título</div>
                        <p>{{$post->titulo}}</p>
                    </div>
                    <div class="organizacao-post">
                        <div class="titulo-btn-publicacao">Organização</div>
                        <p>{{$post->nome}}</p>
                    </div>
                    <div class="data-post">
                        <div class="titulo-btn-publicacao">Data</div>
                        <p>{{date('d/m/Y', strtotime($post->updated_at))}}</p>
                    </div>
                </a>
                <div class="dropstart">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bookmark">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                        <li><button type="button" onclick="changeId(this)" class="dropdown-item exclusao" data-post-id="{{$post->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i> Excluir</button></li>
                        <li><a class="dropdown-item" href=" {{ url('/publicar/'.strtolower($tipo).'/'. $post->id) }}"><i class="fa-solid fa-pen-clip"></i> Editar</a></li>     
                    </ul>
                </div>
            </div>

            @empty
                <small>Ops...Não há {{$tipo_ortografico}}!</small>
            @endforelse
        </div>
    </div>
    <div class="modal" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h4>Tem certeza que deseja excluir a publicação?</h4>
            <p>Essa ação é irreversível</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn cancelar" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            <form action="{{action('PublicacaoController@deletar_post')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="deleteId">
                <button type="submit" class="btn excluir">Excluir</button>
            </form>
        </div>
      </div>
    </div>
    </div>

<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
    let id = null
    function changeId(post){
        id = parseInt(post.dataset.postId)
        let input = document.getElementById('deleteId')

        input.setAttribute('value', id)
    }
</script>
@endsection
