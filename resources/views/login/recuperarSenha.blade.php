@extends('layout.siteLogin')
@section('titulo','Recuperar Senha')
@section('conteudo')
    <main class="container">
        <h3>Coloque seu email aqui para criarmos uma solicitação de recuperação de senha.</h3>
        <form method="POST" action="{{action("LoginController@confirmacaoEnvio")}}">
            {{ csrf_field() }}
            <div class="input-field">
                <input type="email" name="email" id="email"
                    placeholder="E-mail" required>
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