@php
$tipo = 'tags';
@endphp
@extends('layouts.publicarLayout')
@section('title', 'Tags')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/todas-tags.css') }}">
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
                        <a href="#" class="pagina-atual">Todas as tags</a>
                        <a href="{{route('adm.publicacao_tag')}}">Nova tag</a>
                    </div>
                </div>

                <div class="line-horizontal-conteudo"></div>
            </div>
        </div>
        <div class="todas-tags">
            @forelse ($tags as $tag)
                <div class="tag-listada">
                    <span>{{ $tag->nome }}</span>
                    <div class="dropstart">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCenterBtn"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bookmark">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                            <li><button type="button" onclick="changeId(this)" data-post-id="{{$tag->id}}" class="dropdown-item exclusao" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i> Excluir</button>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('adm.publicacao_tag', ['id' => $tag->id]) }}"><i
                                        class="fa-solid fa-pen-clip"></i> Editar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @empty
                Nenhuma tag criada! <br>
            @endforelse
            <div class="criar-tag">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.1077 9.28571H12.3148C11.7548 9.28571 11.4748 9.28571 11.2609 9.17671C11.0727 9.08084 10.9197 8.92786 10.8238 8.7397C10.7148 8.52579 10.7148 8.24576 10.7148 7.68571V5.89285C10.7148 5.79464 10.6345 5.71428 10.5363 5.71428H9.46484C9.36663 5.71428 9.28627 5.79464 9.28627 5.89285V7.68571C9.28627 8.24576 9.28627 8.52579 9.17728 8.7397C9.08141 8.92786 8.92843 9.08084 8.74026 9.17671C8.52635 9.28571 8.24633 9.28571 7.68627 9.28571H5.89342C5.7952 9.28571 5.71484 9.36607 5.71484 9.46428V10.5357C5.71484 10.6339 5.7952 10.7143 5.89342 10.7143H7.68627C8.24633 10.7143 8.52635 10.7143 8.74026 10.8233C8.92843 10.9191 9.08141 11.0721 9.17728 11.2603C9.28627 11.4742 9.28627 11.7542 9.28627 12.3143V14.1071C9.28627 14.2054 9.36663 14.2857 9.46484 14.2857H10.5363C10.6345 14.2857 10.7148 14.2054 10.7148 14.1071V12.3143C10.7148 11.7542 10.7148 11.4742 10.8238 11.2603C10.9197 11.0721 11.0727 10.9191 11.2609 10.8233C11.4748 10.7143 11.7548 10.7143 12.3148 10.7143H14.1077C14.2059 10.7143 14.2863 10.6339 14.2863 10.5357V9.46428C14.2863 9.36607 14.2059 9.28571 14.1077 9.28571Z"
                        fill="#5E6368" />
                    <path
                        d="M10 0C4.47768 0 0 4.47768 0 10C0 15.5223 4.47768 20 10 20C15.5223 20 20 15.5223 20 10C20 4.47768 15.5223 0 10 0ZM10 18.3036C5.41518 18.3036 1.69643 14.5848 1.69643 10C1.69643 5.41518 5.41518 1.69643 10 1.69643C14.5848 1.69643 18.3036 5.41518 18.3036 10C18.3036 14.5848 14.5848 18.3036 10 18.3036Z"
                        fill="#5E6368" />
                </svg>
                <a href="{{route('adm.publicacao_tag')}}" style="color: inherit"><span>Criar nova tag</span></a>
            </div>
        </div>
    </div>



    <div class="modal" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h4>Tem certeza que deseja excluir essa tag?</h4>
                    <p>A ação é irreverssível e afetará todos os posts que possuem essa tag</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancelar" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <form action="{{action('AdminController@deletar_tag')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="deleteId">
                        <button type="submit" class="btn excluir">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let id = null
        function changeId(post){
            id = parseInt(post.dataset.postId)
            let input = document.getElementById('deleteId')
    
            input.setAttribute('value', id)
        }
    </script>
@endsection
