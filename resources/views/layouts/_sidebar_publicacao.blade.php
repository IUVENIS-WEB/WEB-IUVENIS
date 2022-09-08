<div class="sidebar">
    <div class="conteudo-sidebar">
        <div class="perfil">
            <div class="imagem-perfil"><img src=" {{asset('images/users/' . Auth::user()->foto)}}" alt="foto de perfil"></div>
            <h3>{{Auth::user()->nome}}</h3>
        </div>
        <div class="botoes">
            @if( $tipo && $tipo == 'Texto')
            <a href="{{ route('iuvenis.publicacoes_texto')}}">
                <div class="botao btn-pagina-atual">
                    <img src="{{asset('assets/texto_icon.svg')}}" alt="">
                    <h4>Textos</h4>
                </div>
            </a>
            @else
            <a href="{{ route('iuvenis.publicacoes_texto')}}">
                <div class="botao">
                    <img src="{{asset('assets/texto_icon.svg')}}" alt="">
                    <h4>Textos</h4>
                </div>
            </a>
            @endif
            @if($tipo && $tipo == 'Video')
            <a href="{{ route('iuvenis.publicacoes_video')}}">
                <div class="botao btn-pagina-atual">
                    <img src="{{asset('assets/video_icon.svg')}}" alt="">  
                    <h4>Vídeos</h4>
                </div>
            </a>
            @else
            <a href="{{ route('iuvenis.publicacoes_video')}}">
                <div class="botao">
                    <img src="{{asset('assets/video_icon.svg')}}" alt="">
                    <h4>Vídeos</h4>
                </div>
            </a>
            @endif

            @if($tipo && $tipo == 'Evento')
            <a href="{{ route('iuvenis.publicacoes_evento')}}">
                <div class="botao btn-pagina-atual">
                    <img src="{{asset('assets/evento_icon.svg')}}" alt="">
                    <h4>Eventos</h4>
                </div>
            </a>
            @else
            <a href="{{ route('iuvenis.publicacoes_evento')}}">
                <div class="botao">
                    <img src="{{asset('assets/evento_icon.svg')}}" alt="">
                    <h4>Eventos</h4>
                </div>
            </a>
            @endif
            <a href="">
                <div class="botao">
                    <img src="{{asset('assets/config_icon.svg')}}" alt="">
                    <h4>Conta</h4>
                </div>
            </a>  
        </div>
    </div>
</div>