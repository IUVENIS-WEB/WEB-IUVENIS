@extends('layouts.main_layout')
@section('title', 'Contato')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/contato.css') }}" type="text/css">
@endsection
@section('content')
    <main class="container">
        <div class="conteudo">
            <div class="conteudo-texto">
                <div class="texto">
                    <h1>Vamos construir algo juntos?</h1>
                    <p>Tem perguntas, comentários ou sugestões?
                        Será um prazer atendê-lo! </p>
                </div>
                <img src="{{ URL::asset('images/assets/contato.png') }}"alt="contato">
            </div>
            <div class="forms">
                <c>Nos deixe uma mensagem</c>
                <d>Adoraríamos ouvir de você!</d>


                <form action="{{ action('EnvioController@envioContato') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="nome" placeholder=" Nome " />
                    <input type="email" name="email" placeholder=" E-mail " required />
                    <input type="tel" name="tel" placeholder=" Telefone celular " required />
                    <textarea placeholder=" Seu comentário" name="comentario" maxlength="2000"></textarea>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>

    </main>
@endsection
