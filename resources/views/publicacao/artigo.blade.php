@extends('layouts.publicarLayout')
@section('title', 'Publicar')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/publicar_texto.css') }}">
@endsection
@section('content')
    {{-- @include('layouts._sidebar_publicacao') --}}
    <div class="conteudo">
        <div class="titulo">
            <div class="titulo-top">
                <img src="{{asset('assets/'.$tipo.'_icon.svg')}}" alt="">
                <h1>Produção Textual</h1>
            </div>
            <div class="titulo-bottom">
                <div class="titulo-bottom-conteudo">
                    <div class="titulo-links">
                        <a href="#" class="pagina-atual">Postar artigo</a>
                    </div>
                    <div class="titulo-botoes">
                        <input type="reset" form="publicar-artigo" value="Cancelar" class="reset" />
                        <input type="submit" form="publicar-artigo" value="Publicar" />
                    </div>
                </div>

                <div class="line-horizontal-conteudo"></div>
            </div>
        </div>
        <form action="" id="publicar-artigo">
            <label for="link">Link*</label>
            <input type="text" id="link" required>
            <label for="titulo">Título da publicação*</label>
            <input type="text" id="titulo" required>
            <div class="correcao">
                <div>Thumbnail da publicação*</div>
                <input id="imagem" type="file" accept="image/png, image/jpg, image/jpeg" required><label
                    for="imagem" class="file-forms" id="imagem-label"><i
                        class="fa-solid fa-file-arrow-up"></i>Selecionar imagem</label></input>
            </div>
            <label for="resumo">Resumo*</label>
            <textarea id="resumo" required></textarea>
            <div class="correcao">
                <div>Arquivo</div>
                <input id="arquivo" type="file" accept="application/pdf" required><label for="arquivo"
                    class="file-forms" id="arquivo-label"><i class="fa-solid fa-file-arrow-up"></i>Selecionar
                    Arquivo</label></input>
            </div>
            <label for="tag">Tags*</label>
            <div class="form-flex">
                <select name="tags" id="tags" aria-placeholder="clique para selecionar" required>
                    <option value="default" class="display-none" id=>Selecione um valor</option>
                    <option value="Saab">Saab</option>
                    <option value="Opel">Opel</option>
                    <option value="Audi">Audi</option>
                    <option value="Duque">Duque</option>
                </select>
            </div>
            <span class="aviso-tags">Selecione até 3 tags. Clique numa tag selecionada para removê-la</span>
            <div class="organizacao">
                <input type="checkbox">
                <div>Publicar por "Gesteld"</div>
            </div>
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
        const file = document.querySelector('#arquivo');
        const imagem = document.getElementById("imagem")
        const labelArquivo = document.getElementById("arquivo-label")
        const labelImagem = document.getElementById("imagem-label")


        file.addEventListener('change', (e) => {
            // Get the selected file
            const [file] = e.target.files;
            // Get the file name and size
            const {
                name: fileName
            } = file;
            // Set the text content
            const fileNameAndSize = `${fileName}`;
            labelArquivo.innerHTML = '<i class="fa-solid fa-circle-check"></i>' + truncate(fileNameAndSize, 70);

            //<i class="fa-solid fa-circle-check"></i>
            labelArquivo.classList.add("file-forms-selecionado");
        });

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

        tagsSelector.onchange = () => {
            if (x <= maxvalue) {
                let tagValue = document.getElementById("tags").value;
                console.log(tagValue);
                let tagInput = tagcriada.appendChild(document.createElement("input"));
                tagInput.type = "text";
                tagInput.setAttribute("value", tagValue);
                tagInput.readOnly = true;
                tagInput.setAttribute('id', 'input-tag' + x);
                tagInput.setAttribute('onclick', 'remove(this)');
                tagInput.classList.add("tag-input");
                x++;


            }
        };

        function remove(el) {
            var element = el;
            element.remove();
            x--;
        }
    </script>
@endsection
