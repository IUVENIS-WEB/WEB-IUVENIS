@extends('layouts.main_layout')
@section('title', 'Home')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/style_home.css') }}" type="text/css">
@endsection
@section('content')
    <main class="container">
        <h1>
            @if (Auth::check())
                Tá logado fi
                <a href="{{ action('LoginController@deslogar') }}">tira tira alek</a>
            @else
                Não tá logado, tá ligado?
                <a href="{{ route('login.index') }}">vai logar</a>
            @endif
        </h1>
        <div class="navbar">
        </div>
        <div class="top">
            <div class="content">
                <h1>PLATAFORMA IUVENIS</h1>
                <div id="subtitulo-top">
                    <p>A plataforma sobre Educação Sexual. Ansioso(a) para aprender mais?</p>
                </div>
                <a href="{{ route('explorar.index') }}">
                    <div class="botao-explorar">Explorar</div>
                </a>
                <img src="{{ URL::asset('images/assets/aprendizado.png') }}" id="aprendizado">
                <img src="{{ URL::asset('images/assets/mão amor.png') }}" id="mao">
                <img src="{{ URL::asset('images/assets/resistencia.png') }}" id="resistencia">
                <img src="{{ URL::asset('images/assets/mudanca.png') }}" id="mudanca">
                <img src="{{ URL::asset('images/assets/seta.png') }}" id="seta">

            </div>
        </div>
        <div class="faixa-organizacoes">
            <div class="conteudo-faixa">
                <div class="texto">
                    <p>Todo conteúdo é disponibilizado por organizações especializadas e certificadas </p>
                </div>
                <div class="imagens">
                    <img src="{{ URL::asset('images/assets/gesteld.png') }}"alt="logo gesteld" id="gesteld">
                    <img src="{{ URL::asset('images/assets/educacross.png') }}" alt=" logo educacross" id="educacross">
                    <a href="{{ route('iuvenis.organizacoes') }}">
                        <div class="plus"><img src="{{ URL::asset('images/assets/plus.png') }}"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="secao um">
                <h2>O QUE É EDUCAÇÃO SEXUAL?</h2>
                <p>A educação sexual ou educação em sexualidade engloba uma série de conhecimentos sobre saúde, corpo
                    humano, identidade, sentimentos, bem-estar, consentimento, responsabilidade, autoproteção e tipos de
                    toques que os outros estão autorizados ou não em relação ao corpo da criança e do adolescente, como
                    forma de prevenção à violência sexual.</p>
                <a href="#">
                    <div class="saiba-mais">Saiba mais</div>
                </a>

            </div>
            <div class="secao dois">
                <div class="conteudo-texto">
                    <h2>VÍDEOS & SERIES, TEXTOS E EVENTOS</h2>
                    <p>Esses são todos os tipos de conteúdo disponibilizados pela iuvenis. Ouça, leia e assista sobre
                        educação sexual para diferentes idades e cenários </p>
                    <a href="#">
                        <div class="saiba-mais">Saiba mais</div>
                    </a>
                </div>
                <img src="{{ URL::asset('images/assets/mulher.png') }}" alt="mulher">
            </div>
            <div class="secao escritores">
                <h2>CONHEÇA OS ESCRITORES</h2>
                <p>Veja quem produz todo o conteúdo por aqui ;)</p>
                <div class="cards">
                    @forelse ($escritores as $escritor)
                        <div class="card-escritor a">
                            <div class="imagem-card"><img src="{{ URL::asset('images/users/'.$escritor->foto) }}"
                                    alt="foto de perfil"></div>
                            <p>{{$escritor->nome.' '.$escritor->sobrenome}}</p>
                            <h6>{{$escritor->bio}}</h6>
                            <a href="{{ url('/escritor/'.$escritor->id) }}">
                                <div class="ver-perfil">Ver perfil</div>
                            </a>
                        </div>
                    @empty
                        <h6>Infelizmente não conseguimos encontrar essa informação para você neste momento ;(</h6>
                    @endforelse
                </div>
                <a href="{{url('/escritor')}}">Ver todos</a>

            </div>
            <div class="secao quatro">
                <img src="{{ URL::asset('images/assets/secao4.png') }}" alt="mulher">
                <div class="conteudo-texto">
                    <h2>TENHA UMA EXPERIÊNCIA PERSONALIZADA</h2>
                    <p>Desmitifique a educação sexual e entenda a sua importância na formação de pessoas. Crie já uma conta
                        para ter uma experiência personalizada e poder salvar todos os conteúdos que te interessam! </p>
                    <a href="{{ route('login.index') }}">
                        <div class="saiba-mais">Cadastro</div>
                    </a>
                </div>
            </div>
            <div class="secao app">
                <div class="app-card-esquerda">
                    <h1>Baixe o app!</h1>
                    <p>E descubra muito mais</p>
                    <div class="botoes-stores">
                        <a href="#">
                            <div class="saiba-mais baixar"><img src="{{ URL::asset('images/assets/apple.png') }}"
                                    alt=""> <span>App Store</span></div>
                        </a>
                        <a href="#">
                            <div class="saiba-mais baixar"><img src="{{ URL::asset('images/assets/google_play.png') }}"
                                    alt=""><span>Play Store</span> </div>
                        </a>
                    </div>
                </div>
                <div class="app-card-direita">
                    <img src="{{ URL::asset('images/assets/app_image.png') }}" alt="telas do aplicativo iuvenis">
                </div>
            </div>
        </div>
        @include('layouts._rodape')
    </main>


    </body>

    </html>


@endsection
