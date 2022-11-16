@inject('tagRepository', 'App\Contracts\ITagRepository')
@inject('postRepository', 'App\Contracts\IPostRepository')
<div class="sidebar">
    @if (isset($tipo) && $tipo == 'escritor')
        <div class="conteudo-sidebar sticky-bottom">
            <div class="perfil-escritor-sidebar">
                <div class="imagem-perfil-sidebar-escritor">@include('layouts._foto_perfil', ['user'=>$escritor])</div>
                <div class="nome-publicações">
                    <h3>{{ $escritor->nome . ' ' . $escritor->sobrenome }}</h3>
                    <p>{{$escritor->bio}}</p>
                    <p>{{ count($posts) }} Publicações</p>
                </div>
                <p> {{ $escritor->descricao }}</p>
            </div>
            <div class="conteudo-sidebar">

                <div class="escritores-recomendados">
                    <h4>Conheça os escritores</h4>
                    <div class="escritores">
                        @forelse ($postRepository->getMostViewedEscritor(4) as $post)
                            <a href="{{ url('/escritor/' . $post->autor->id) }}">
                                <div class="escritor-perfil-sidebar">
                                    <div class="imagem-perfil-sidebar">@include('layouts._foto_perfil', ['user' => $post->autor])</div>
                                    <div class="nome-descricao-escritor">
                                        <h4>{{ $post->autor->nome . ' ' . $post->autor->sobrenome }}</h4>
                                        <p>{{ $post->autor->bio }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <small>Ops...não foi possível encontrar escritores no momento.</small>
                        @endforelse
                    </div>
                    <a href="{{ url('/escritor') }}" class="ver-todos">Ver todos</a>
                </div>
                <div class="rodape-sidebar">
                    <a href="{{ url('/explorar') }}">Explorar</a>
                    <a href="{{ url('/artigos') }}">Artigos</a>
                    <a href="{{ url('/videos') }}">Vídeos</a>
                    <a href="{{ url('/eventos') }}">Eventos</a>
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/sobre') }}">Sobre</a>
                    <a href="{{ url('/contato') }}">Contato</a>
                </div>
            </div>
        @else
            <div class="conteudo-sidebar">
                <div class="topicos-recomendados">
                    <h4>Tópicos recomendados </h4>
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
                        @forelse ($postRepository->getMostViewedEscritor(4) as $post)
                            <a href="{{ url('/escritor/' . $post->autor->id) }}">
                                <div class="escritor-perfil-sidebar">
                                    <div class="imagem-perfil-sidebar">@include('layouts._foto_perfil', ['user' => $post->autor])</div>
                                    <div class="nome-descricao-escritor">
                                        <h4>{{ $post->autor->nome . ' ' . $post->autor->sobrenome }}</h4>
                                        <p>{{ $post->autor->bio }}</p>
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
                                            <div class="imagem-perfil">@include('layouts._foto_perfil', ['user' => $saved])</div>
                                            <a href="{{ url('/escritor/' . $saved->autor_id) }}">
                                                <p>{{ $saved->nome . ' ' . $saved->sobrenome }}</p>
                                            </a>
                                        </div>
                                        <h4>{{ $saved->titulo }}</h4>
                                        <div class="autoria">
                                            <p class="data">{{ date('y/m/Y', strtotime($saved->updated_at)) }}</p>
                                            <div class="circulo"></div>
                                            <p class="data">{{ $saved->tipo }}</p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <small>Ainda não há posts salvos!</small>
                            @endforelse
                        @else
                            <a href="{{ url('/login') }}">
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
                    <a href="{{ url('/artigo') }}">Artigos</a>
                    <a href="{{ url('/video') }}">Vídeos</a>
                    <a href="{{ url('/evento') }}">Eventos</a>
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/sobre') }}">Sobre</a>
                    <a href="{{ url('/contato') }}">Contato</a>
                </div>
            </div>
    @endif
</div>
