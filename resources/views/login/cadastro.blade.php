@extends('layouts.main_layout')
@section('title', 'Cadastro')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_cadastro.css') }}">
@endsection
@section('navbar')
<span></span>
@endsection



@section('content')
    <main class="container">
        <h2>Seja bem vinda(o)!</h2>
        <h3>Crie um conta na plataforma Iuvenis</h3>
        <div class="top">
            <a href="">
                <div class="input-field">
                    <i class="fab fa-brands fa-google"></i>
                    <span>Continuar com Google</span>
                </div>
            </a>

            <div class="flex">
                <div class="line"></div>
                <h3>ou</h3>
                <div class="line"></div>
            </div>
        </div>


        <form action="{{action('LoginController@completarCadastro')}}" method="post">
            {{ csrf_field() }}
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="E-mail" required>
            </div>
            <div class="input-field"><input type="submit" value="Cadastrar"></div>
        </form>
        <div class="comando-login">
            <p>Já possui uma conta? <a href="{{action('LoginController@index')}}">Login</a></p>
        </div>
    </main>
@endsection
