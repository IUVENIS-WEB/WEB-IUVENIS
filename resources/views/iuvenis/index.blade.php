@extends('layout.site')
@section('titulo','Home')
@section('CssLink')
    <link rel="stylesheet" href="{{ URL::asset('css/style_home.css') }}" type="text/css">
@endsection
@section('conteudo')
    <main class="container">
        <div class="navbar">
        </div>
        <div class="top">
            <div class="content">
                <h1>PLATAFORMA IUVENIS</h1>
                <div id="subtitulo-top">
                    <p>A plataforma sobre Educação Sexual. Ansioso(a) para aprender mais?</p> 
                </div>
                <a href="{{ route('iuvenis.explorar') }}"><div class="botao-explorar">Explorar</div></a>
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
                    <a href="{{route('iuvenis.organizacoes')}}"><div class="plus"><img src="{{ URL::asset('images/assets/plus.png') }}"></div></a>
                </div>
            </div>    
        </div>
        <div class="bottom">
            <div class="secao um">
                <h2>O QUE É EDUCAÇÃO SEXUAL?</h2>
                <p>A educação sexual ou educação em sexualidade engloba uma série de conhecimentos sobre saúde, corpo humano, identidade, sentimentos, bem-estar, consentimento, responsabilidade, autoproteção e tipos de toques que os outros estão autorizados ou não em relação ao corpo da criança e do adolescente, como forma de prevenção à violência sexual.</p>
                <a href="{{route('iuvenis.mais')}}"><div class="saiba-mais">Saiba mais</div></a>

            </div>
            <div class="secao dois">
                <div class="conteudo-texto">
                    <h2>VÍDEOS & SERIES, TEXTOS E EVENTOS</h2>
                    <p>Esses são todos os tipos de conteúdo disponibilizados pela iuvenis. Ouça, leia e assista sobre educação sexual para diferentes idades e cenários </p>
                    <a href="{{route('iuvenis.conteudo')}}"><div class="saiba-mais">Saiba mais</div></a>
                </div>
                <img src="{{ URL::asset('images/assets/mulher.png') }}" alt="mulher">
            </div>
            <div class="secao escritores">
                <h2>CONHEÇA OS ESCRITORES</h2>
                <p>Veja quem produz todo o conteúdo por aqui ;)</p>
                <div class="cards">
                    <div class="card-escritor a">
                        <div class="imagem-card"><img src="{{ URL::asset('images/assets/tabate.png') }}" alt="foto de perfil"></div>
                        <p>Nome sobrenome</p>
                        <h6>Doutora em letras pela FUDERJ | Psicóloga pela Unesp</h6>
                        <a href="{{route('iuvenis.perfil', ['id' => 1])}}"><div class="ver-perfil">Ver perfil</div></a>
                    </div>
                    <div class="card-escritor b">
                        <div class="imagem-card"><img src="{{ URL::asset('images/assets/tabate.png') }}" alt="foto de perfil"></div>
                        <p>Nome sobrenome</p>
                        <h6>Doutora em letras pela FUDERJ | Psicóloga pela Unesp</h6>
                        <a href="{{route('iuvenis.perfil', ['id' => 1])}}"><div class="ver-perfil">Ver perfil</div></a>
                    </div>
                    <div class="card-escritor c">
                        <div class="imagem-card"><img src="{{ URL::asset('images/assets/tabate.png') }}" alt="foto de perfil"></div>
                        <p>Nome sobrenome</p>
                        <h6>Doutora em letras pela FUDERJ | Psicóloga pela Unesp</h6>
                        <a href="{{route('iuvenis.perfil', ['id' => 1])}}"><div class="ver-perfil">Ver perfil</div></a>
                    </div>
                    <div class="card-escritor d">
                        <div class="imagem-card"><img src="{{ URL::asset('images/assets/tabate.png') }}" alt="foto de perfil"></div>
                        <p>Nome sobrenome</p>
                        <h6>Doutora em letras pela FUDERJ | Psicóloga pela Unesp</h6>
                        <a href="{{route('iuvenis.perfil', ['id' => 1])}}"><div class="ver-perfil">Ver perfil</div></a>
                    </div>
                </div>
                <a href="{{route('iuvenis.perfil', ['id' => 0])}}">Ver todos</a>

            </div>
            <div class="secao quatro">
                <img src="{{ URL::asset('images/assets/secao4.png') }}" alt="mulher">
                <div class="conteudo-texto">
                    <h2>TENHA UMA EXPERIÊNCIA PERSONALIZADA</h2>
                    <p>Desmitifique a educação sexual e entenda a sua importância na formação de pessoas. Crie já uma conta para ter uma experiência personalizada e poder salvar todos os conteúdos que te interessam! </p>
                    <a href="{{route('login.index')}}"><div class="saiba-mais">Cadastro</div></a>
                </div>
            </div>
            <div class="secao app">
                <div class="app-card-esquerda">
                    <h1>Baixe o app!</h1>
                    <p>E descubra muito mais</p>
                    <div class="botoes-stores">
                        <a href="#"><div class="saiba-mais baixar"><img src="{{ URL::asset('images/assets/apple.png') }}" alt=""> <span>App Store</span></div></a>
                        <a href="#"><div class="saiba-mais baixar"><img src="{{ URL::asset('images/assets/google_play.png') }}" alt=""><span>Play Store</span> </div></a>
                    </div>
                </div>
                <div class="app-card-direita">
                    <img src="{{ URL::asset('images/assets/app_image.png') }}" alt="telas do aplicativo iuvenis">
                </div>
            </div>
        </div>
    </main>
    

</body>
</html>


@endsection
