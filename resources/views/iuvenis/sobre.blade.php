@extends('layouts.main_layout')
@section('title', 'Sobre')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/sobre.css') }}" type="text/css">
    

@endsection
@section('content')
 
    <main class="container">
        <div class="conteudo">
            <div class="section primeira">
                <svg width="125.65" height="100" viewBox="0 0 61 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M52.6967 15.8401C51.5461 15.6089 50.6256 14.7995 50.3955 13.6433C48.8997 8.09354 43.7221 6.82171 41.1908 6.47485C40.2704 6.35923 39.465 5.89675 39.0047 5.08741C36.8186 1.96566 33.3669 0.462595 29.9151 0.578215C26.4634 0.693836 23.0116 2.31252 20.9406 5.08741C20.3653 5.89675 19.5599 6.35923 18.6394 6.35923C12.4263 6.82171 10.5854 11.5621 10.0101 14.2214C9.77995 15.262 8.97454 16.187 7.82396 16.5338C5.06256 17.3432 0 19.6556 0 24.9741C0 30.2926 5.17762 32.2582 8.05407 33.0675C9.0896 33.2988 9.895 34.1081 10.2402 35.0331C10.5854 35.958 11.1606 37.3455 12.1962 38.8485C13.922 41.2766 17.834 42.2015 19.9051 42.5484C20.7105 42.664 21.4008 43.0109 21.8611 43.7046C23.2418 45.4389 26.4634 48.7919 30.0302 48.5606C34.1723 48.3294 37.3939 46.942 39.3499 44.0515C39.9252 43.2421 40.7306 42.7796 41.7661 42.664C46.8287 42.4328 49.5901 38.6173 50.7407 35.1487C51.0858 34.1081 51.8912 33.2988 52.9268 33.0675C56.4936 32.1426 60.6357 28.4427 60.2905 22.7773C59.8303 18.0369 55.458 16.4182 52.6967 15.8401ZM30.8356 16.9963C30.8356 15.9557 31.8711 15.0308 32.9066 15.1464C34.0572 15.1464 34.9777 16.0713 34.8626 17.2275C34.8626 17.3432 34.8626 20.1181 36.4734 20.1181C36.8186 20.1181 37.0487 20.0024 37.1638 19.8868C37.7391 19.3087 37.9692 17.9213 37.9692 17.1119C37.9692 16.0713 38.7746 15.1464 39.9252 15.0308C41.0758 15.0308 41.9962 15.8401 41.9962 16.9963C41.9962 17.3432 41.9962 20.6962 40.0403 22.6617C39.1198 23.5867 37.8541 24.0491 36.5885 24.0491C36.4734 24.0491 36.4734 24.0491 36.3584 24.0491C33.9422 23.9335 32.1012 22.5461 31.2958 20.2337C30.8356 18.615 30.8356 17.1119 30.8356 16.9963ZM19.79 15.8401C19.79 14.7995 20.7105 13.8746 21.8611 13.8746C23.0116 13.8746 23.9321 14.7995 23.9321 15.8401V22.5461C23.9321 23.5867 23.0116 24.5116 21.8611 24.5116C20.7105 24.5116 19.79 23.5867 19.79 22.5461V15.8401ZM43.0318 30.9864C39.1198 34.1081 34.5175 35.7268 30.0302 35.7268C25.1977 35.7268 20.2502 33.8769 16.2232 30.2926C15.5329 29.7145 15.3027 28.674 15.763 27.8646C16.1081 27.1709 16.7985 26.824 17.4888 26.824C18.0641 26.824 18.5244 26.9397 18.9846 27.4021C25.3128 33.0675 33.9422 33.2988 40.5005 28.0959L41.421 27.4021C42.3414 26.5928 43.8372 26.824 44.5275 27.8646C45.1028 28.674 44.7576 29.8302 43.9522 30.5239L43.0318 30.9864Z"
                        fill="#213042" />
                </svg>
                <h2>CONHEÇA A IUVENIS</h2>
                <p>A iuvenis é uma plataforma que pretende visibilizar e viabilizar o debate sobre a educação sexual. A iuvenis é uma plataforma que pretende visibilizar e viabilizar o debate sobre a educação sexual A iuvenis é uma plataforma que pretende visibilizar e viabilizar o debate sobre a educação sexual </p>
            </div>
            <div class="section dois">
                <h2>OS JEITOS DE APRENDER</h2>
                <div class="jeitos-aprender">
                <a href="{{route('artigo.index')}}">
                    <div class="caixa lendo">
                        <img src="assets/lendo.png" alt="">
                        <h4>Lendo</h4>
                        <p>Veja a nossa seleção de artigos sobre educação sexual!</p>

                    </div>
                    </a>
                    <a  href="{{route('video.index')}}">
                    <div class="caixa vendo">
                        <img src="assets/vendo.png" alt="">
                        <h4>Vendo</h4>
                        <p>A Iuvenis conta com vários vídeos sobre educação sexual. Clique aqui para saber mais :)</p>
                    </div>
                    </a>  
                    <a  href="{{route('eventos.index')}}">  
                    <div class="caixa participando">
                        <img src="assets/participando.png" alt="">
                        <h4>Participando</h4>
                        <p>Temos eventos também! Não perca nenhum.</p>
                    </div>
                    </a>
                </div>
            </div>
            <div class="escritores section">
                <h2>CONHEÇA ALGUNS ESCRITORES</h2>
                <div class="cards">
                @forelse ($escritores as $escritor)
                        <div class="card-escritor">
                            <div class="imagem-card">@include('layouts._foto_perfil', ['user' => $escritor])</div>
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
            </div>
            <div class="section quatro">
               <a href="https://gesteld.wordpress.com"><img src="assets/gesteld.png" alt=""></a> 
            </div>
        </div>
        </div>
    </div>

    @include('layouts._rodape')

    </main>

    @endsection