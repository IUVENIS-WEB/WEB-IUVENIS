@extends('layouts.siteLogin')
@section('title', 'Definir Senha')
@section('content')
    <main class="container">
        <h3>Defina aqui a sua nova senha.</h3>
        <form method="POST" action="{{action("LoginController@definirNovaSenha")}}">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="email" id="email" value="{{$email}}">
            <div class="input-field">
                <input type="password" name="senha" id="senha"
                    placeholder="Nova Senha ..." required>
            </div>
            <div class="input-field"><input type="submit" value="Enviar"></div>
        </form>
        <a href="{{route("login.index")}}">Voltar ao login</a>

            <div class="comando-cadastro">
                <p>Não possui uma conta? <a href="#">Cadastrar</a></p>
            </div>
        </div>
    </main>
@endsection