@inject('salvoRepository', 'App\Contracts\ISalvoRepository')
@php
$colecoes = $salvoRepository->getColecoes();
$loggedIn = Auth::check();
@endphp

@extends('layouts.main_layout')
@section('title', 'Eventos')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">
@endsection

@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <svg width="30" height="30" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="30" cy="30" r="30" fill="#C4C4C4"/>
                        <path d="M43.7406 42.7487C44.3631 44.6852 42.9187 46.6667 40.8845 46.6667L19.1116 46.6667C17.0775 46.6667 15.6331 44.6852 16.2555 42.7487L21.8279 25.4123C22.2267 24.1717 23.3808 23.3304 24.684 23.3304L35.3122 23.3304C36.6153 23.3304 37.7695 24.1717 38.1682 25.4123L43.7406 42.7487Z" fill="#213042"/>
                        <path d="M16.2555 22.2477C15.6331 20.3112 17.0775 18.3297 19.1116 18.3297L40.8845 18.3297C42.9187 18.3297 44.3631 20.3112 43.7406 22.2477L38.1682 39.5841C37.7695 40.8247 36.6153 41.666 35.3122 41.666L24.684 41.666C23.3808 41.666 22.2267 40.8247 21.8279 39.5841L16.2555 22.2477Z" fill="#213042"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3299 14.996C18.3299 14.0754 19.0762 13.3291 19.9968 13.3291H39.9994C40.92 13.3291 41.6662 14.0754 41.6662 14.996C41.6662 15.9165 40.92 16.6628 39.9994 16.6628H19.9968C19.0762 16.6628 18.3299 15.9165 18.3299 14.996Z" fill="#213042"/>
                    </svg>      
                    <h1>Eventos</h1>
                </div>
                <div class="evento-proximo">
                    <h2 id="titulo-proximo-evento">{{$recent->titulo}}</h2>
                    <div class="evento-proximo-bottom">
                        <a href="{{$recent->link_evento}}" target="_blank"><div class="saiba-mais">Participar</div></a>
                        <div class="detalhes-botao-eventos">
                            <svg width="13" height="15.27" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.7387 20.2474C20.3611 22.184 18.9167 24.1654 16.8826 24.1654L4.11574 24.1654C2.08162 24.1654 0.637196 22.1839 1.25966 20.2474L4.58052 9.91582C4.97931 8.67516 6.13344 7.83385 7.43661 7.83385L13.5617 7.83385C14.8649 7.83385 16.019 8.67516 16.4178 9.91582L19.7387 20.2474Z" fill="#575FCC"/>
                                <path d="M1.25937 8.25226C0.636906 6.31571 2.08133 4.33423 4.11545 4.33423L16.8823 4.33423C18.9164 4.33423 20.3609 6.31571 19.7384 8.25226L16.4175 18.5838C16.0187 19.8245 14.8646 20.6658 13.5614 20.6658L7.43632 20.6658C6.13315 20.6658 4.97902 19.8245 4.58024 18.5838L1.25937 8.25226Z" fill="#575FCC"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33203 2.00114C2.33203 1.35687 2.85431 0.834595 3.49857 0.834595H17.4971C18.1413 0.834595 18.6636 1.35687 18.6636 2.00114C18.6636 2.6454 18.1413 3.16768 17.4971 3.16768H3.49857C2.85431 3.16768 2.33203 2.6454 2.33203 2.00114Z" fill="#575FCC"/>
                            </svg>
                            <div class="data-evento-botao">{{date('d/m/y', strtotime($recent->lançamento))}}</div>
                            {{-- <div class="plataforma-evento-botao">Google Meet</div> --}}
                        </div>
                    </div>
                </div>
                <div class="titulo-links">
                    <a href="#" class="pagina-atual" >Próximos</a>
                    <a href="#">Passados</a>
                </div>
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

    <script src="{{asset('js/colecao.js')}}"></script>

@endsection
