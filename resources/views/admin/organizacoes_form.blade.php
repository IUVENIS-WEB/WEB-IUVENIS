    @extends('layouts.publicarLayout')
    @section('title', 'Organizações')
    @section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/organizacao-criar.css') }}">
    @endsection
    @section('content')

        
    <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="17.5" cy="17.5" r="17.5" fill="#C4C4C4"/>
                        <path d="M12.6125 11C12.6125 12.1036 11.7105 13 10.6 13C9.48953 13 8.5875 12.1036 8.5875 11C8.5875 9.89643 9.48953 9 10.6 9C11.7105 9 12.6125 9.89643 12.6125 11ZM8.3 16.6321C7.94062 17.0322 7.725 17.5643 7.725 18.1429C7.725 18.7214 7.94062 19.2535 8.3 19.6536V16.6321ZM13.4894 14.8714C12.422 15.8107 11.75 17.1857 11.75 18.7143C11.75 19.9393 12.1812 21.0643 12.9 21.9464V22.7143C12.9 23.3464 12.3861 23.8571 11.75 23.8571H9.45C8.8139 23.8571 8.3 23.3464 8.3 22.7143V21.7571C6.94156 21.1143 6 19.7393 6 18.1429C6 15.9321 7.80047 14.1429 10.025 14.1429H11.175C12.0375 14.1429 12.8353 14.4107 13.4894 14.8679V14.8714ZM22.1 22.7143V21.9464C22.8187 21.0643 23.25 19.9393 23.25 18.7143C23.25 17.1857 22.578 15.8107 21.5106 14.8679C22.1647 14.4107 22.9625 14.1429 23.825 14.1429H24.975C27.1995 14.1429 29 15.9321 29 18.1429C29 19.7393 28.0585 21.1143 26.7 21.7571V22.7143C26.7 23.3464 26.1861 23.8571 25.55 23.8571H23.25C22.6139 23.8571 22.1 23.3464 22.1 22.7143ZM26.4125 11C26.4125 12.1036 25.5105 13 24.4 13C23.2895 13 22.3875 12.1036 22.3875 11C22.3875 9.89643 23.2895 9 24.4 9C25.5105 9 26.4125 9.89643 26.4125 11ZM26.7 16.6321V19.6571C27.0594 19.2535 27.275 18.725 27.275 18.1464C27.275 17.5679 27.0594 17.0357 26.7 16.6357V16.6321ZM17.5 13.5714C16.2314 13.5714 15.2 12.5464 15.2 11.2857C15.2 10.025 16.2314 9 17.5 9C18.7686 9 19.8 10.025 19.8 11.2857C19.8 12.5464 18.7686 13.5714 17.5 13.5714ZM14.625 18.7143C14.625 19.2928 14.8406 19.8214 15.2 20.225V17.2036C14.8406 17.6072 14.625 18.1357 14.625 18.7143ZM19.8 17.2036V20.2286C20.1594 19.825 20.375 19.2964 20.375 18.7178C20.375 18.1393 20.1594 17.6072 19.8 17.2072V17.2036ZM22.1 18.7143C22.1 20.3107 21.1585 21.6857 19.8 22.3286V23.8571C19.8 24.4893 19.2861 25 18.65 25H16.35C15.7139 25 15.2 24.4893 15.2 23.8571V22.3286C13.8415 21.6857 12.9 20.3107 12.9 18.7143C12.9 16.5036 14.7005 14.7143 16.925 14.7143H18.075C20.2995 14.7143 22.1 16.5036 22.1 18.7143Z" fill="#213042"/>
                    </svg>
                    <h1>Organizações</h1>
                </div>
                <div class="titulo-bottom">
                    <div class="titulo-bottom-conteudo">
                        <div class="titulo-links">
                            <a href="{{route('adm.organizacoes')}}">Todas as organizações</a>
                            <a href="{{route('adm.organizacaos_form')}}" class="pagina-atual">Criar organização</a>
                        </div>
                        <div class="titulo-botoes">
                            <input type="reset" form="publicar-artigo" value="Cancelar" class="reset" />
                            <input type="submit" form="publicar-artigo" value="Enviar Pedido" />
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
            <form action="{{route('adm.organizacoes_submit')}}" method="POST" id="publicar-artigo" 
                enctype=multipart/form-data>
                {{ csrf_field() }}
                <label for="nome-organizacao">Nome da organização*</label>
                <input type="text" id="nome-organizacao" name="nome-organizacao" required>
                <label for="nome-linder">Nome do lider*</label>
                <input type="text" id="nome-lider" name="nome-lider" required> 
                <label for="assunto">Assunto*</label>
                <input type="text" id="assunto" name="assunto" required placeholder="Sexualidade, Diversidade ...">
                <label for="link">Link*</label>
                <input type="text" id="link" name="link" required>
                <span class="aviso-tags">Insira um link que comprove a atividade da organização, como o link para o Diretório dos Grupo de Pesquisa no Brasil Lattes ou website da organização</span>
                <label>Thumbnail da publicação*</label>
                <input id="imagem" name="imagem" type="file" accept="image/png, image/jpg, image/jpeg"><label
                    for="imagem" class="file-forms" id="imagem-label"><i class="fa-solid fa-file-arrow-up"></i>Selecionar
                    imagem</label></input>
                <label for="detalhes">Detalhes</label>
                <textarea id="resumo" name="detalhes" required></textarea>
                <label>Tipo de organização*</label>
                <div class="organizacao">
                    <div>
                        <input type="radio" id="grupo" name="organizacao" value="Grupo de pesquisa certificado pelo CNPq" checked>
                        <label for="grupo">Grupo de pesquisa certificado pelo CNPq</label>
                    </div>
                    <div>
                        <input type="radio" id="ong" name="organizacao" value="ONG">
                        <label for="ong">ONG</label>
                    </div>
                    <div>
                        <input type="radio" id="outro" name="organizacao" value="Outro">
                        <label for="outro">Outro</label>
                    </div>
                </div>
            </form>
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