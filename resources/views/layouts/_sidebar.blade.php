@inject('tagRepository', 'App\Contracts\ITagRepository')
@inject('postRepository', 'App\Contracts\IPostRepository')
<div class="sidebar">
    <div class="conteudo-sidebar">
        <div class="topicos-recomendados">
            <h4>Tópicos recomendados</h4>
            <div class="tags-sidebar-recomendado">
                @forelse ($tagRepository->getMostViewedTags(8) as $tag)
                    <a href="{{ url('/tag/' . $tag->id) }}">
                        <div class="tag">{{ $tag->nome }}</div>
                    </a>
                @empty
                    <small>Ops...Não há tópicos para recomendar no momento, desculpa!</small>
                @endforelse
            </div>
        </div>
        <div class="escritores-recomendados">
            <h4>Conheça os escritores</h4>
            <div class="escritores">
                @forelse ($postRepository->getMostViewedEscritor(4) as $user)
                    <a href="{{ url('/escritor/' . $user->id) }}">
                        <div class="escritor-perfil-sidebar">
                            <div class="imagem-perfil-sidebar"><img src="{{ asset('images/users/' . $user->foto) }}"
                                    alt="foto de perfil"></div>
                            <div class="nome-descricao-escritor">
                                <h4>{{ $user->nome . ' ' . $user->sobrenome }}</h4>
                                <p>{{ $user->bio }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <small>Ops...não foi possível encontrar escritores no momento.</small>
                @endforelse
            </div>
            <a href="{{ url('/escritor') }}" class="ver-todos">Ver todos</a>
        </div>
        <div class="salvos-recentemente">
            <h4>Recentemente salvos</h4>
            <div class="salvos">
                @if (Auth::check())
                    @forelse ($postRepository->getLastSavedPosts(Auth::user()->id) as $saved)
                        <a href="{{ url('/posts/' . $saved->post_id) }}">
                            <div class="conteudo-salvo">
                                <div class="autoria">
                                    <div class="imagem-perfil"><img src="{{ asset('images/users/' . $saved->foto) }}"
                                            alt="foto de perfil"></div>
                                    <a href="{{ url('/escritor/' . $saved->autor_id) }}">
                                        <p>{{ $saved->nome . ' ' . $saved->sobrenome }}</p>
                                    </a>
                                </div>
                                <h4>{{ $saved->titulo }}</h4>
                                <div class="autoria">
                                    <p class="data">{{ date('M, d', strtotime($saved->updated_at)) }}</p>
                                    <div class="circulo"></div>
                                    <p class="data">{{ $saved->tipo }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <small>Ainda não há posts salvos!</small>
                    @endforelse
                @else
                    <a href="{{url('/login')}}">
                        <span class="button">
                            <h4>Faça o login para salvar publicações!</h4>
                        </span>
                    </a>
                @endif
            </div>

            <a href="{{ url('/posts') }}" class="ver-todos">Ver todos</a>
        </div>
        <div class="rodape-sidebar">
            <a href="{{ url('/explorar') }}">Explorar</a>
            <a href="{{ url('/artigos') }}">Artigos</a>
            <a href="{{ url('/videos') }}">Videos</a>
            <a href="{{ url('/eventos') }}">Eventos</a>
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/sobre') }}">Sobre</a>
            <a href="{{ url('/contato') }}">Contato</a>
        </div>
    </div>
</div>
