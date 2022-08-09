@inject('salvoRepository', 'App\Contracts\ISalvoRepository')
@php
$colecoes = $salvoRepository->getColecoes();
$loggedIn = Auth::check();
@endphp

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
                                <div class="imagem-perfil menor"><img
                                        src="{{ asset('images/users/' . $post->autor->foto) }}" alt="foto de perfil"></div>
                                <p>{{ $post->autor->nome . ' ' . $post->autor->sobrenome }}</p>
                                <div class="circulo"></div>
                                <p class="data">{{ date('M, d', strtotime($post->updated_at)) }}</p>
                            </div>
                        </a>
                        <a href="">
                            <div class="conteudo-card">
                                <div class="card-texto">
                                    <h2>{{ $post->titulo }}</h2>
                                    <p>
                                        {{ $post->resumo }}
                                    </p>
                                </div>
                                <div class="imagem-card"><img src="{{ asset('images/posts/' . $post->imagem) }}"></div>
                            </div>
                        </a>
                        <div class="bottom-card">
                            <div class="direita-bottom-card">
                                @forelse ($post->tags as $tag)
                                    <a href="{{ url('/tag/' . $tag->id) }}">
                                        <div class="tag">{{ $tag->nome }}</div>
                                    </a>
                                @empty
                                @endforelse
                                <p>{{ $post->tipo }}</p>
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
                                                        onclick="inputPostValue({{ $post->id }})"
                                                        data-bs-target="#exampleModal"><i
                                                            class="fa-solid fa-plus"></i></button></h6>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                        @endif
                                        @forelse ($colecoes as $colecao)
                                            <li>
                                                <a class="dropdown-item" href="#"
                                                    onclick="salvaPost({{ $post->id }}, {{ $colecao->id }})">
                                                    {{ $colecao->nome }}
                                                </a>
                                            </li>
                                        @empty
                                            <li> <a style="margin-left: 5%" href="{{ route('login.index') }}">Entre para
                                                    salvar.</a></li>
                                        @endforelse
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
                <div class="modal-body">
                    {{-- <div class="imagem-card imagem-colecao-modal"><img src="assets/capa.png"></div> --}}
                    <input type="text" id="nomeColecao" class="form-control" placeholder="Nome da coleção"
                        aria-label="First name" maxlength="70">
                    <input type="number" id="post_id" hidden class="form-control">
                </div>
                <div class="modal-footer">
                    <button id="submit" data-bs-dismiss="modal" class="btn btn-primary" onclick="criar_colecao()" disabled>Salvar</button>
                </div>
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
        })

        function getLists() {
            return document.querySelectorAll('.bookmark')
        }

        function enableClickEventsOnList(list) {
            list.addEventListener('click', async function() {
                let colecoes = await getColecoes()
                colecoes.forEach(element => {
                    list.appendChild(criaItemColecao(element))
                });
            })

        }

        function getColecoes() {
            return fetch('{{ URL::to('/getColecaos') }}', {
                    method: 'GET',
                    mode: 'same-origin',
                })
                .then(
                    response => response.json()
                )
        }
        async function salvaPost(postId, colecaoId) {
            let response = await fetchPost('/salvaPost', {
                post_id: postId,
                colecao_id: colecaoId
            })
            if (response.success) {
                alert('Post salvo com sucesso.')
            } else {
                alert(response.message)
            }
        }

        async function salvaColecao(nome) {
            let response = await fetchPost('/salvaColecao', {
                nome: nome
            })
            if (response.success) {
                alert('Coleção salva com sucesso.')
            } else {
                alert(response.message)
            }
            return response
        }

        async function criar_colecao(){
            let nome = document.getElementById('nomeColecao').value
            let post_id = document.getElementById('post_id').value

            let colecaoResponse = await salvaColecao(nome)
            if(colecaoResponse.success){
                salvaPost(post_id, colecaoResponse.data.id)

            }
        }

        function criaItemColecao(item) {
            let li = document.createElement('li')
            let a = document.createElement('a')
            a.classList.add('dropdown-item')
            a.setAttribute('href', "{{ URL::to('/colecao') }}" + '/' + item.id)
            a.textContent = item.nome

            li.appendChild(a)

            return li
        }

        function inputPostValue(e) {
            let input = document.getElementById('post_id')
            input.value = e
        }
    </script>

@endsection
