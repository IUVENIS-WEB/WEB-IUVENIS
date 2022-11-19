@inject('tagRepository', 'App\Contracts\ITagRepository')
@php
$editing = isset($post);
@endphp

@extends('layouts.publicarLayout')
@section('title', 'Publicar')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/publicacao-videos.css') }}">
@endsection
@section('content')
    <div class="conteudo">
        <div class="titulo">
            <div class="titulo-top">
                <img src="{{ asset('assets/video_icon.svg') }}" alt="">
                <h1>Vídeos</h1>
            </div>
            <div class="titulo-bottom">
                <div class="titulo-bottom-conteudo">
                    <div class="titulo-links">
                        <a href="#" class="pagina-atual">Postar vídeo</a>
                    </div>
                    <div class="titulo-botoes">
                        <input type="reset" form="publicar-video" value="Cancelar" class="reset" />
                        <input type="submit" form="publicar-video" value="Publicar" />
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
                </ul>
            </div>
        @endif
        <form action="{{ action('PublicacaoController@novo_video') }}" method="POST" id="publicar-video"
            enctype=multipart/form-data>
            {{ csrf_field() }}
            <label for="link">Link do Embed do Youtube*</label>
            @if ($editing)
                <input type="text" name="link" id="link" required value="https://www.youtube.com/embed/{{ $post->embed }}">
            @else
                <input type="text" name="link" id="link" required>
            @endif
            <label for="titulo">Título da publicação*</label>
            @if ($editing)
                <input type="text" name="titulo" id="titulo" required value="{{ $post->titulo }}">
            @else
                <input type="text" name="titulo" id="titulo" required>
            @endif
            <div class="correcao">
                <div>Thumbnail da publicação*</div>
                @if ($editing)
                    <em>Obs.:Adicione uma imagem somente se quiser mudar a thumbnail.</em>
                @endif
                <input id="imagem" name="imagem" type="file" accept="image/png, image/jpg, image/jpeg"><label
                    for="imagem" class="file-forms" id="imagem-label"><i class="fa-solid fa-file-arrow-up"></i>Selecionar
                    imagem</label></input>
            </div>
            <label for="descricao">Descrição*</label>
            @if ($editing)
                <textarea id="resumo" name="resumo" required>{{ $post->resumo }}</textarea>
            @else
                <textarea id="resumo" name="resumo" required></textarea>
            @endif
            <label for="tag">Tags</label>
            <div class="form-flex">
                <select name="tags[]" id="tags" aria-placeholder="clique para selecionar" multiple>
                    <option value="default" class="display-none">Selecione um valor</option>
                    {{-- Busca todas as tags e constrói as opções nos seguintes termos:
                            O 'value' sempre será o Id e o texto que aparece para o usuário é o nome da tag. --}}
                    @forelse ($tagRepository->getAll() as $tag)
                        @php
                            $selected = $tags->contains($tag->id) ? 'selected="true"' : '';
                        @endphp
                        <option value="{{ $tag->id }}" {{ $selected }}>{{ $tag->nome }}</option>
                    @empty
                        Infelizmente ainda não há tags :(
                    @endforelse
                </select>
            </div>
            <span class=""><em>Dica: para selecionar mais de uma tag, segure 'Ctrl' e clique nelas.</em></span>
            @if ($editing)
                <input type="text" name="id" id="id" hidden value={{ $post->id }}>
            @endif

        </form>
    </div>
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
                    <button type="button" class="btn cancelar" data-bs-dismiss="modal" aria-label="Close">cancelar</button>
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
