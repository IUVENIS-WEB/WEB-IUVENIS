@extends('layouts.main_layout')
@section('title', $post->titulo)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/visualizar-artigo.css') }}">
@endsection

@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="organizacao-publicacao">
                    <p>publicado em <a
                            href="{{ url('/organizacao/' . $post->organizacao->id) }}">{{ $post->organizacao->nome }}</a></p>
                </div>
                <div class="titulo-top">
                    <div class="nome-escritor-salvar">
                        <div class="imagem-perfil-escritor"><img src="{{ asset('images/users/' .$post->autor->foto) }}"
                                alt="foto de perfil"></div>
                        <div class="nome-escritor-direita">
                            <h5>{{ $post->autor->nome }} {{ $post->autor->sobrenome }}</h5>
                            <p>{{ date('d/m/Y', strtotime($post->updated_at)) }}</p>
                        </div>
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
                                <li>
                                    <h6 class="dropdown-header">Coleções <button type="button" class="mais"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="fa-solid fa-plus"></i></button></h6>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Lista de leitura</a></li>

                            </ul>
                        </div>
                        <i class="fa-solid fa-share-from-square"></i>
                    </div>
                </div>
            </div>
            <div class="cards">
                <img style="margin: 1em; width: 30vw" src="{{$post->imagem}}">
                <h1>{{ $post->titulo }}</h1>
                <div class="tags-artigo">
                    @forelse ($post->tags as $tag)
                        <a href="{{ url('/tag/' . $tag->id) }}">
                            <div class="tag">{{ $tag->nome }}</div>
                        </a>
                    @empty
                    @endforelse
                </div>
                <p><i class="fa-solid fa-eye"></i> {{$views}} visualizações</p>
                @if (strtolower($post->tipo) == 'video')
                    <iframe height="500" src="{{ $post->embed }}" frameborder="5"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                @endif
                <h4> Resumo<h4>
                        <p>
                            {{ $post->resumo }}
                        </p>
                        <div class="botoes">
                            @if ($post->tipo == 'artigo')
                                <a href="{{ $post->link_midia }}" target="_blank">
                                    <div class="botao-link">
                                        <i class="fa-sharp fa-solid fa-link"></i>
                                        <div>Acessar</div>
                                    </div>
                                </a>
                            @endif
                            @if ($post->tipo == 'evento')
                                <a href="{{ $post->link_evento }}" target="_blank">
                                    <div class="botao-link">
                                        <i class="fa-sharp fa-solid fa-link"></i>
                                        <div>Participar</div>
                                    </div>
                                </a>
                            @endif
                            @if ($post->arquivo)
                                <a href="{{ $post->arquivo }}" target="_blank">
                                    <div class="botao-baixar">
                                        <i class="fa-regular fa-circle-down"></i>
                                        <div>Baixar artigo</div>
                                    </div>
                                </a>
                            @endif
                        </div>
            </div>
            <div class="line-horizontal-conteudo dois"></div>
                <h5 class="subtitulo-conteudo subtitulo-comentarios">Comentários</h5>
                <div class="comentarios">
                    <form action="">
                        <textarea name="" id="textarea" class='autoExpand' placeholder="Deixe um comentário..." rows='1' data-min-rows='1' maxlength="1000"></textarea>
                        <div class="comentario-form-btns">
                            <input type="reset" id="cancelar" class="display-none" value="Cancelar">
                            <input type="submit" id="submit" value="Comentar" disabled>
                        </div>
                    </form>
                    <div class="comentario">
                        <div class="imagem-perfil-comentario"><img src="assets/tabate.png" alt="foto de perfil"></div>
                        <div class="comentario-direita">
                            <div class="comentario-direita-nome">
                                <p>Tabate Soares</p>
                                <p>22 de abril 2020</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,</p>
                            <form action="" id="form-reply">
                                <textarea name="" id="textarea-reply" class='autoExpand' placeholder="responder..." rows='1' data-min-rows='1' maxlength="1000"></textarea>
                                <div class="comentario-form-btns">
                                    <input type="reset" id="cancelar-reply" value="Cancelar">
                                    <input type="submit" id="submit-reply" value="responder" disabled>
                                </div>
                            </form>
                            <div class="actions-comentario">
                                <button class="btn btn-primary ver-respostas" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Ver respostas
                                </button>
                                <button class="btn btn-primary ver-respostas responder" id="reply-responder">Responder</button>
                                <div class="collapse" id="collapseExample">
                                    <div class="comentarios replies">
                                        <div class="comentario">
                                            <div class="imagem-perfil-comentario"><img src="assets/tabate.png" alt="foto de perfil"></div>
                                            <div class="comentario-direita">
                                                <div class="comentario-direita-nome">
                                                    <p>Tabate Soares</p>
                                                    <p>22 de abril 2020</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,</p>
                                            </div>
                                        </div>
                                        <div class="comentario">
                                            <div class="imagem-perfil-comentario"><img src="assets/tabate.png" alt="foto de perfil"></div>
                                            <div class="comentario-direita">
                                                <div class="comentario-direita-nome">
                                                    <p>Tabate Soares</p>
                                                    <p>22 de abril 2020</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,</p>
                                            </div>
                                        </div>
                                        <div class="comentario">
                                            <div class="imagem-perfil-comentario"><img src="assets/tabate.png" alt="foto de perfil"></div>
                                            <div class="comentario-direita">
                                                <div class="comentario-direita-nome">
                                                    <p>Tabate Soares</p>
                                                    <p>22 de abril 2020</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @include('layouts._sidebar', [
            ($tipo = 'user'),
            'user' => $post->autor,
            'posts' => $post->autor->posts,
        ])
    </main>

    <div class="modal" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nova coleção</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="imagem-card imagem-colecao-modal"><img src="assets/capa.png"></div>
                        <input type="text" id="nomeColecao" class="form-control" placeholder="Nome da coleção"
                            aria-label="First name" maxlength="70">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" class="btn btn-primary" disabled>Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- validação - criação de uma nova coleção-->
<script>

    //javascript para fazer um comentário 
    const textarea = document.getElementById("textarea");
    const submit = document.getElementById("submit");
    const cancelar = document.getElementById("cancelar");


    textarea.addEventListener('input',()=>{
			if(textarea.value === ""){
                submit.disabled = "disabled";
                cancelar.disabled ="desabled";
                cancelar.classList.remove("display-block");
                cancelar.classList.add("display-none");
			}else{
                submit.removeAttribute('disabled');
                cancelar.removeAttribute("disabled")
                cancelar.classList.remove("display-none");
                cancelar.classList.add("display-block");
			}
            
		});

    cancelar.addEventListener("click", function() {
            submit.disabled = "disabled";
            cancelar.disabled ="desabled";
            cancelar.classList.remove("display-block");
            cancelar.classList.add("display-none");
            textarea.rows="1";
            textarea.value = "";
        });





        //javascript para responder um comentário
        const textareaReply = document.getElementById("textarea-reply");
        const submitReply = document.getElementById("submit-reply");
        const cancelarReply = document.getElementById("cancelar-reply");
        const formReply = document.getElementById("form-reply");
        const replyresponder = document.getElementById("reply-responder")

        textareaReply.addEventListener('input',()=>{
			if(textareaReply.value === ""){
                submitReply.disabled = "disabled";
			}else{
                submitReply.removeAttribute('disabled');
			}
            
		});
        cancelarReply.addEventListener("click", function() {
            textareaReply.rows="1";
            textareaReply.value = "";
            formReply.style.display="none";
        });

        replyresponder.addEventListener("click", function(){
            formReply.style.display="flex"
        });





        //javascript que funciona para os dois tipo de comentário
        //serve para a textbox aumentar conforme o usuario escreve e quebra a linha 
        function getScrollHeight(elm){
        var savedValue = elm.value
        elm.value = ''
        elm._baseScrollHeight = elm.scrollHeight
        elm.value = savedValue
        }

        function onExpandableTextareaInput({ target:elm }){
        // make sure the input event originated from a textarea and it's desired to be auto-expandable
        if( !elm.classList.contains('autoExpand') || !elm.nodeName == 'TEXTAREA' ) return
        
        var minRows = elm.getAttribute('data-min-rows')|0, rows;
        !elm._baseScrollHeight && getScrollHeight(elm)

        elm.rows = minRows
        rows = Math.ceil((elm.scrollHeight - elm._baseScrollHeight) / 25)
        elm.rows = minRows + rows
        }
        // global delegated event listener
        document.addEventListener('input', onExpandableTextareaInput)


        //javascript para a validacao do nome da colecao 
        const nomeColecao = document.getElementById("nomeColecao");
        const submitColecao = document.getElementById("submitColecao");

        nomeColecao.addEventListener('input',()=>{
			if(nomeColecao.value === ""){
                submitColecao.disabled = "disabled";

			}else{
                submitColecao.removeAttribute('disabled');
			}
		});

</script>
@endsection
