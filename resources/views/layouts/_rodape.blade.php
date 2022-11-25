<link rel="stylesheet" href="{{ asset('css/rodape.css') }}">
<footer>
    <div class="conteudo-rodape-esquerdo">
        <img src="{{asset('images/logoiuvenis.png')}}" width="105px">
        <p>
            Nós temos a missão de visibilizar e viabilizar o
            debate sobre a educação sexual.
        </p>
    </div>
    <div class="conteudo-rodape-direito">
        <div class="box1">  <!--1-->
            <h2>Saiba Mais</h2>
            <ul>
                <li><a href="{{ url('/sobre') }}">Sobre</a></li>
                <li><a href=" {{ route('perfil.organizacoes')}} ">Organizações</a></li>
            </ul>
        </div>
        <div class="box1">  <!--2-->
            <h2>Conteúdo</h2>
            <ul>
                <li><a href="{{ url('/explorar') }}">Explorar</a></li>
                <li><a href="{{ url('/artigo') }}">Artigos</a></li>
                <li><a href="{{ url('/video') }}">Vídeos</a></li>
                <li><a href="{{ url('/evento') }}">Eventos</a></li>
            </ul>
        </div>

        <div class="box1"> <!--3-->
            <h2>Suporte</h2>
            <ul>
                <li><a href="{{ url('/cadastro') }}">Cadastro</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/contato') }}">Contato</a></li>
            </ul>
        </div>
    </div>
   
</footer>