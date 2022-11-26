@extends('layouts.main_layout')
@section('title', 'Informações Pessoais')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/info_pessoais.css') }}" type="text/css">
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
                        <a href="{{route('conta.index')}}">Perfil público</a>
                        <a href="{{route('conta.privada')}}" class="pagina-atual">Informações pessoais</a>
                        <a href="{{route('colecao.user')}}">Coleções</a>
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
        <div class="info-pessoais">
            <p>Essas informações são privadas e não aparecerão no seu perfil público</p>
            <form action="{{ route('conta.privada_edit') }}" method="POST" id="salvar_form">
                {{ csrf_field() }}
                <label for="titulo">Email</label>
                <input type="text" id="email" name="email" required value="{{ $user->email }}">
            </form>
            <div class="buttons">
                <a href="{{route('login.recuperarSenha', ['email' => $user->email])}}" class="button">Reconfigurar senha</a>
                @if (!$user->organizacao_id)
                    <a href="{{route('perfil.organizacaos_form')}}" class="button">Criar Organização</a>
                @endif
                <!-- <a href="#" class="button">Excluir conta</a> -->
            </div>
            {{-- 
            <p class="titulo-email">E-mail</p>
            <div class="input-email">sara_brandaodoamaral@hotmail.com</div> --}}

        </div>

    </div>
@endsection
