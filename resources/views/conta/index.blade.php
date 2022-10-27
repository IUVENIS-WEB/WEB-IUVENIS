@extends('layouts.main_layout')
@section('title', 'Conta')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/configuracao.css') }}" type="text/css">
@endsection
@section('content')
    <div class="conteudo">
        <div class="titulo">
            <div class="titulo-top">
                @include('layouts._icon', ['icon' => 'configuracoes_icon.svg'])
                <h1>Configurações</h1>
            </div>
            <div class="titulo-bottom">
                <div class="titulo-bottom-conteudo">
                    <div class="titulo-links">
                        <a href="#" class="pagina-atual">Perfil público</a>
                        <a href="#">Informações pessoais</a>
                    </div>
                    <div class="titulo-botoes">
                        <input type="reset" form="salvar" value="Cancelar" class="reset" />
                        <input type="submit" form="salvar_form" id="salvar" value="Salvar" />
                    </div>
                </div>

                <div class="line-horizontal-conteudo"></div>
            </div>
        </div>
        @include('layouts._error_list')
        <form action="{{route('conta.edit')}}" method="POST" enctype= multipart/form-data id="salvar_form">
            {{ csrf_field() }}
            <div class="correcao">
                <div>Foto</div>
                <input type="file" accept="image/png, image/kpg, image/jpeg" id="imagem" name="foto"><label class= "imagem-perfil"  for="imagem" id ="display-image"></label> </input>
            </div>


            <div class="nomes">
                <div class="nome-nome">
                    <label for="titulo">Nome</label>
                    <input type="text" id="nome" name="nome" required value="{{$user->nome}}">
                </div>
                <div class="nome-sobrenome">
                    <label for="titulo">Sobrenome</label>
                    <input type="text" id="sobrenome" name="sobrenome" required value="{{$user->sobrenome}}">
                </div>
            </div>
            <label for="resumo">Sobre</label>
            <textarea id="resumo" placeholder="Seu comentário" name="bio" >{{$user->bio}}</textarea>
            
               
        </form>

        <script>
            const image_input = document.querySelector("#imagem");
            const display_image = document.querySelector("#display-image");

            //adicionando a foto atual
            if('{{$user->foto}}'){
                display_image.style.backgroundImage = 'url({{Storage::url($user->foto)}})';
            }
            else{
                display_image.style.backgroundImage = 'url({{asset('images/users/sem_foto_perfil.jpg')}})';
            }

            image_input.addEventListener("change", function() {
                const reader = new FileReader();
                reader.addEventListener("load", () => {
                const uploaded_image = reader.result;
                display_image.style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);
            });
        </script>
    @endsection
