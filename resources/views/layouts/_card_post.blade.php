<div class="card">
    <a href="">
        <div class="autoria">
            <div class="imagem-perfil menor"><img
                    src="{{ asset('images/users/' . $post->autor->foto) }}" alt="foto de perfil"></div>
            <p>{{ $post->autor->nome . ' ' . $post->autor->sobrenome }}</p>
            <div class="circulo"></div>
            <p class="data">{{ date('y/m/Y', strtotime($post->updated_at)) }}</p>
        </div>
    </a>
    <a href="{{ url('/posts/' . $post->id) }}">
        <div class="conteudo-card">
            <div class="card-texto">
                <h2>{{ $post->titulo }}</h2>
                <p style="">
                    @php
                        $resumo = strlen($post->resumo) > 100 ? substr($post->resumo,0,100)."..." : $post->resumo;
                    @endphp
                    {{ $resumo }}
                </p>
            </div>
            <div class="imagem-card"><img src="{{$post->imagem}}"></div>
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
                    @else
                        <li> <a style="margin-left: 5%" href="{{ route('login.index') }}">Entre para
                        salvar.</a></li>
                    @endif
                    @forelse ($colecoes as $colecao)
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="salvaPost({{ $post->id }}, {{ $colecao->id }})">
                                {{ $colecao->nome }}
                            </a>
                        </li>
                    @empty
                        <li>Clique em 'mais' para criar uma coleção.</li>
                    @endforelse
                </ul>
            </div>
            <i class="fa-solid fa-share-from-square"></i>
        </div>
    </div>
