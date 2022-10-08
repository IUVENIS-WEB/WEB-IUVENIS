<link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script type="text/javascript" src="navbar.js"></script>

<nav class="navbar navbar-expand">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('iuvenis.index') }}">
            <svg width="50" height="39.91" viewBox="0 0 61 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M52.6967 15.8401C51.5461 15.6089 50.6256 14.7995 50.3955 13.6433C48.8997 8.09354 43.7221 6.82171 41.1908 6.47485C40.2704 6.35923 39.465 5.89675 39.0047 5.08741C36.8186 1.96566 33.3669 0.462595 29.9151 0.578215C26.4634 0.693836 23.0116 2.31252 20.9406 5.08741C20.3653 5.89675 19.5599 6.35923 18.6394 6.35923C12.4263 6.82171 10.5854 11.5621 10.0101 14.2214C9.77995 15.262 8.97454 16.187 7.82396 16.5338C5.06256 17.3432 0 19.6556 0 24.9741C0 30.2926 5.17762 32.2582 8.05407 33.0675C9.0896 33.2988 9.895 34.1081 10.2402 35.0331C10.5854 35.958 11.1606 37.3455 12.1962 38.8485C13.922 41.2766 17.834 42.2015 19.9051 42.5484C20.7105 42.664 21.4008 43.0109 21.8611 43.7046C23.2418 45.4389 26.4634 48.7919 30.0302 48.5606C34.1723 48.3294 37.3939 46.942 39.3499 44.0515C39.9252 43.2421 40.7306 42.7796 41.7661 42.664C46.8287 42.4328 49.5901 38.6173 50.7407 35.1487C51.0858 34.1081 51.8912 33.2988 52.9268 33.0675C56.4936 32.1426 60.6357 28.4427 60.2905 22.7773C59.8303 18.0369 55.458 16.4182 52.6967 15.8401ZM30.8356 16.9963C30.8356 15.9557 31.8711 15.0308 32.9066 15.1464C34.0572 15.1464 34.9777 16.0713 34.8626 17.2275C34.8626 17.3432 34.8626 20.1181 36.4734 20.1181C36.8186 20.1181 37.0487 20.0024 37.1638 19.8868C37.7391 19.3087 37.9692 17.9213 37.9692 17.1119C37.9692 16.0713 38.7746 15.1464 39.9252 15.0308C41.0758 15.0308 41.9962 15.8401 41.9962 16.9963C41.9962 17.3432 41.9962 20.6962 40.0403 22.6617C39.1198 23.5867 37.8541 24.0491 36.5885 24.0491C36.4734 24.0491 36.4734 24.0491 36.3584 24.0491C33.9422 23.9335 32.1012 22.5461 31.2958 20.2337C30.8356 18.615 30.8356 17.1119 30.8356 16.9963ZM19.79 15.8401C19.79 14.7995 20.7105 13.8746 21.8611 13.8746C23.0116 13.8746 23.9321 14.7995 23.9321 15.8401V22.5461C23.9321 23.5867 23.0116 24.5116 21.8611 24.5116C20.7105 24.5116 19.79 23.5867 19.79 22.5461V15.8401ZM43.0318 30.9864C39.1198 34.1081 34.5175 35.7268 30.0302 35.7268C25.1977 35.7268 20.2502 33.8769 16.2232 30.2926C15.5329 29.7145 15.3027 28.674 15.763 27.8646C16.1081 27.1709 16.7985 26.824 17.4888 26.824C18.0641 26.824 18.5244 26.9397 18.9846 27.4021C25.3128 33.0675 33.9422 33.2988 40.5005 28.0959L41.421 27.4021C42.3414 26.5928 43.8372 26.824 44.5275 27.8646C45.1028 28.674 44.7576 29.8302 43.9522 30.5239L43.0318 30.9864Z"
                    fill="#213042" />
            </svg>
        </a>
        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mr-auto">
                <li class="nav-item explorar">
                    <a class="nav-link active" aria-current="page" href="{{ route('explorar.index') }}">Explorar</a>
                </li>
                <li class="nav-item dropdown texto">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Texto
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/texto/Artigos') }}">Artigos</a></li>
                        <li><a class="dropdown-item" href="{{ url('/texto/Editoriais') }}">Editoriais</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown videos">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Videos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/video/videos') }}">Videos</a></li>
                        <li><a class="dropdown-item" href="{{ url('/video/webserie') }}">Webséries</a></li>
                    </ul>
                </li>
                <li class="nav-item eventos">
                    <a class="nav-link active" aria-current="page" href="{{ route('eventos.index') }}">Eventos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Mais
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/sobre') }}">Sobre</a></li>
                        <li><a class="dropdown-item" href="{{ url('/contato') }}">Contato</a></li>
                        <li id="divider">
                            <hr class="dropdown-divider">
                        </li>
                        <li id="eventos-mais"><a class="dropdown-item" href="#">Eventos</a></li>
                        <li id="videos-mais"><a class="dropdown-item" href="#">Videos</a></li>
                        <li id="texto-mais"><a class="dropdown-item" href="#">Texto</a></li>
                        <li id="explorar-mais"><a class="dropdown-item" href="#">Explorar</a></li>
                        <li id="divider2">
                            <hr class="dropdown-divider">
                        </li>
                        <li id="fazer-login-mais"><a class="dropdown-item" href="#">Fazer login</a></li>
                    </ul>
                </li>
                @if(Auth::user() && Auth::user()->organizacao)
                  <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="{{ route('iuvenis.publicacoes_texto') }}">Criar</a>
                  </li>
                @endif
            </ul>
        </div>
        @if (Auth::check())
            <div class="pesquisa-login  mr-auto ">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                </form>
            </div>

            @php
                $id = Auth::user();
            @endphp
            <div class="dropstart">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCenterBtn"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="imagem-perfil-navbar"><img src="{{ asset('images/users/' . $id->foto) }}"
                            alt="foto de perfil"></div>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn" id="dropdown-perfil">

                    <li><a class="dropdown-item" href="#">
                            <svg width="19" height="15" viewBox="0 0 14 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 2V13.9663C0 15.6415 1.93638 16.5744 3.24649 15.5303L6.02574 13.3153C6.78263 12.7121 7.86286 12.7375 8.59065 13.3755L10.6816 15.2085C11.9743 16.3418 14 15.4238 14 13.7046V2C14 0.895431 13.1046 0 12 0H2C0.895431 0 0 0.895427 0 2Z"
                                    fill="#253042" />
                            </svg>
                            Coleções</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{URL("user/colecaos")}}"> <svg width="23" height="23"
                                viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5197 1.50937C12.926 -0.503125 10.074 -0.503125 9.48031 1.50937L9.33656 1.99812C9.24786 2.29942 9.09284 2.57703 8.88288 2.81062C8.67291 3.0442 8.41333 3.22783 8.12316 3.34803C7.83299 3.46823 7.5196 3.52196 7.20597 3.50528C6.89233 3.4886 6.5864 3.40193 6.31062 3.25163L5.865 3.00725C4.02069 2.00387 2.00387 4.02069 3.00869 5.86356L3.25163 6.31062C3.89275 7.48937 3.28469 8.95706 1.99812 9.33656L1.50937 9.48031C-0.503125 10.074 -0.503125 12.926 1.50937 13.5197L1.99812 13.6634C2.29942 13.7521 2.57703 13.9072 2.81062 14.1171C3.0442 14.3271 3.22783 14.5867 3.34803 14.8768C3.46823 15.167 3.52196 15.4804 3.50528 15.794C3.4886 16.1077 3.40193 16.4136 3.25163 16.6894L3.00725 17.135C2.00387 18.9793 4.02069 20.9961 5.86356 19.9913L6.31062 19.7484C6.5864 19.5981 6.89233 19.5114 7.20597 19.4947C7.5196 19.478 7.83299 19.5318 8.12316 19.652C8.41333 19.7722 8.67291 19.9558 8.88288 20.1894C9.09284 20.423 9.24786 20.7006 9.33656 21.0019L9.48031 21.4906C10.074 23.5031 12.926 23.5031 13.5197 21.4906L13.6634 21.0019C13.7521 20.7006 13.9072 20.423 14.1171 20.1894C14.3271 19.9558 14.5867 19.7722 14.8768 19.652C15.167 19.5318 15.4804 19.478 15.794 19.4947C16.1077 19.5114 16.4136 19.5981 16.6894 19.7484L17.135 19.9927C18.9793 20.9961 20.9961 18.9793 19.9913 17.1364L19.7484 16.6894C19.5981 16.4136 19.5114 16.1077 19.4947 15.794C19.478 15.4804 19.5318 15.167 19.652 14.8768C19.7722 14.5867 19.9558 14.3271 20.1894 14.1171C20.423 13.9072 20.7006 13.7521 21.0019 13.6634L21.4906 13.5197C23.5031 12.926 23.5031 10.074 21.4906 9.48031L21.0019 9.33656C20.7006 9.24786 20.423 9.09284 20.1894 8.88288C19.9558 8.67291 19.7722 8.41333 19.652 8.12316C19.5318 7.83299 19.478 7.5196 19.4947 7.20597C19.5114 6.89233 19.5981 6.5864 19.7484 6.31062L19.9927 5.865C20.9961 4.02069 18.9793 2.00387 17.1364 3.00869L16.6894 3.25163C16.4136 3.40193 16.1077 3.4886 15.794 3.50528C15.4804 3.52196 15.167 3.46823 14.8768 3.34803C14.5867 3.22783 14.3271 3.0442 14.1171 2.81062C13.9072 2.57703 13.7521 2.29942 13.6634 1.99812L13.5197 1.50937V1.50937ZM11.5 15.7119C10.3829 15.7119 9.31163 15.2681 8.52175 14.4782C7.73188 13.6884 7.28813 12.6171 7.28813 11.5C7.28813 10.3829 7.73188 9.31163 8.52175 8.52175C9.31163 7.73188 10.3829 7.28813 11.5 7.28813C12.6167 7.28813 13.6876 7.73172 14.4772 8.52133C15.2668 9.31094 15.7104 10.3819 15.7104 11.4986C15.7104 12.6152 15.2668 13.6862 14.4772 14.4758C13.6876 15.2654 12.6167 15.709 11.5 15.709V15.7119Z"
                                    fill="#213042" />
                            </svg> Conta</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ action('LoginController@deslogar') }}"><i
                                class="fa-solid fa-right-to-bracket"></i> Sair</a></li>
                </ul>
            </div>
        @else
            <div class="pesquisa-login flex mr-auto navbar-brand">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                </form>
                <a href="{{ route('login.index') }}"> <button type="button" class="btn btn-fazer-login"> Fazer
                        login</button> </a>
            </div>
        @endif
    </div>
    </div>
</nav>
