@inject('tagRepository', 'App\Contracts\ITagRepository')
@extends('layouts.publicarLayout')
@section('title', 'Publicar')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/publicacao_eventos.css')}}">
@endsection
@section('content')
    
    <main class="container">
        <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <img src="{{asset('assets/'.$tipo.'_icon.svg')}}">
                    <h1>Eventos</h1>
                </div>
                <div class="titulo-bottom">
                    <div class="titulo-bottom-conteudo">
                        <div class="titulo-links">
                            <a href="#" class="pagina-atual">Postar evento</a>
                        </div>
                        <div class="titulo-botoes">
                            <input type="reset" form="publicar-evento" value="Cancelar" class="reset" />
                            <input type="submit" form="publicar-evento" value="Publicar" />
                        </div>
                    </div>

                    <div class="line-horizontal-conteudo"></div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach 
                        @if(session('fail.errors'))
                        @foreach (session('fail.errors') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            @endif
            <form action="{{action('PublicacaoController@novo_evento')}}" method="POST" id="publicar-evento" enctype= multipart/form-data>
                {{ csrf_field() }}
                <label for="link">Link*</label>
                <input type="text" id="link" name="link" required>
                <span class="aviso-tags">Coloque um link da live do Youtube ou de outra plataforma em que o evento será realizado, ou ainda o formulário de inscrição.</span>

                <label for="titulo">Título da publicação*</label>
                <input type="text" id="titulo" name="titulo" required>
                <label for="data">Data do Evento*</label>
                <input type="date" id="data" name="data" required>
                <div class="correcao">
                    <div>Thumbnail da publicação*</div>
                    <input id="imagem" name="imagem"  type="file" accept="image/png, image/jpg, image/jpeg"><label
                        for="imagem" class="file-forms" id="imagem-label"><i
                            class="fa-solid fa-file-arrow-up"></i>Selecionar imagem</label></input>
                </div>
                <label for="resumo">Descrição*</label>
                <textarea id="resumo" name='resumo' required></textarea>
                <label for="tag">Tags*</label>
            <div class="form-flex">
                {{-- Foi necessário mudar um pouco a lógica do select:
                    Agora o nome dele precisa ter '[]' para a request entender que podem ser
                    múltiplos valores. Também é necessário colocar o atributo 'multiple' em <select>.
                    Dica: para selecionar mais de um valor para a tag, segura 'Ctrl' e clique nelas.
                    
                    Para tanto, o Javascript foi somente comentado. Basta comentar a parte que está contida
                    por 'onchange' lá em baixo dentro da tag <script> (exemplo na atual linha 173).
                    --}}
                <select name="tags[]" id="tags" aria-placeholder="clique para selecionar"  multiple>
                    <option value="default" class="display-none" id=>Selecione um valor</option>
                    {{-- Busca todas as tags e constrói as opções nos seguintes termos:
                        O 'value' sempre será o Id e o texto que aparece para o usuário é o nome da tag. --}}
                    @forelse ($tagRepository->getAll() as $tag)
                    <option value="{{$tag->id}}">{{$tag->nome}}</option>
                    @empty
                        Infelizmente ainda não há tags :(
                    @endforelse
                </select>
            </div>
            <span class=""><em>Dica: para selecionar mais de uma tag, segure 'Ctrl' e clique nelas.</em></span>
                <span class="aviso-tags">Selecione até 3 tags. Clique numa tag selecionada para removê-la</span>
            </form>
        </div>

    </main>

    <div class="modal" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h4>Tem certeza que deseja excluir esse?</h4>
                    <p>Caso mude de ideia, basta adicionar a mesma tag novamente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancelar" data-bs-dismiss="modal"
                        aria-label="Close">cancelar</button>
                    <button type="button" class="btn excluir">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script>
        const imagem = document.getElementById("imagem")
        const labelArquivo = document.getElementById("arquivo-label")
        const labelImagem = document.getElementById("imagem-label")


        imagem.addEventListener('change', (f) => {
            // Get the selected file
            const [imagem] = f.target.files;
            // Get the file name and size
            const {
                name: fileName
            } = imagem;
            // Set the text content
            const fileNameAndSize = `${fileName}`;
            labelImagem.innerHTML = '<i class="fa-solid fa-circle-check"></i>' + truncate(fileNameAndSize, 70);

            //<i class="fa-solid fa-circle-check"></i>
            labelImagem.classList.add("file-forms-selecionado");
        });

        const truncate = (str, n) => {
            return (str.length > n) ? str.substr(0, n - 1) + '...' : str;
        };



        let tagsSelector = document.getElementById("tags");
        let clearBtn = document.querySelector("#exclusao");
        let tagcriada = document.querySelector(".form-flex");
        const maxvalue = 3;
        let x = 1;


        function handleTags(select){
            if(x >= maxvalue) return

            let tagInput = tagcriada.appendChild(document.createElement("input"));
            tagInput.type = "text";
            tagInput.setAttribute("value", select.options[select.selectedIndex].text);
            tagInput.readOnly = true;
            tagInput.setAttribute('id', );
            tagInput.setAttribute('onclick', 'remove(this)');
            tagInput.classList.add("tag-input");
            x++;
        }
        // tagsSelector.onchange = () => {
        //     if (x <= maxvalue) {
        //         let tagValue = document.getElementById("tags").value;
        //         console.log(tagValue);
        //         let tagInput = tagcriada.appendChild(document.createElement("input"));
        //         tagInput.type = "text";
        //         tagInput.setAttribute("value", tagValue);
        //         tagInput.readOnly = true;
        //         tagInput.setAttribute('id', 'input-tag' + x);
        //         tagInput.setAttribute('onclick', 'remove(this)');
        //         tagInput.classList.add("tag-input");
        //         x++;


        //     }
        // };

        function remove(el) {
            var element = el;
            element.remove();
            x--;
        }
    </script>
@endsection