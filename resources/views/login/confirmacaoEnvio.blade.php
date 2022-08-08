@extends('layouts.siteLogin')
@section('title','Email Enviado')
@section('content')
    <main class="container">
        <h2>E-mail enviado</h2>
        <h3>Caso haja um usuário com este email, uma solicitação de troca de senha será criada. Verifique a sua caixa de entrada do e-mail para recuperar a sua senha</h3>
        <a href="{{route("login.index")}}"><div class="botao-ir-para-login">Ir para login</div></a>
    </main>
@endsection