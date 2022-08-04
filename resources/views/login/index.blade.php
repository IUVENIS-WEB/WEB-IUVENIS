@extends('layouts.siteLogin')
@section('title','Login')
@section('content')
    <main class="container">
        <h2>Olá novamente!</h2>
        <h3>É sempre bom tê-la(o) por aqui</h3>
        <div class="alert alert-danger">
            <ul>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach 
                @endif
                @if(session('fail.errors'))
                    @foreach (session('fail.errors') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
        <form action="{{ action('LoginController@attempt') }}" method="POST">
            {{ csrf_field() }}
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="E-mail" value="{{session('fail.email')}}" required>
            </div>
            <div class="input-field2">
                <input type="password" name="password" id="password" placeholder="Senha" maxlength="20" required>
                <i class="eye" onclick="hide()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </i>
            </div>
            <div class="input-field"><input type="submit" value="Entrar"></div>
        </form>
        <a href="{{ action('LoginController@recuperarSenha', ['email' => session('fail.email')]) }}">Recuperar senha</a>

        <div class="footer">
            <div class="flex">
                <div class="line"></div>
                <h3>ou</h3>
                <div class="line"></div>
            </div>

            <a href="">
                <div class="input-field">
                    <i class="fab fa-brands fa-google"></i>
                    <span>Continuar com Google</span>
                </div>
            </a>
            <div class="comando-cadastro">
                <p>Não possui uma conta? <a href="#">Cadastrar</a></p>
            </div>
        </div>
    </main>

    <script>
        function hide() {
            var x = document.getElementById("password")
            var y = document.getElementById("hide1")
            var z = document.getElementById("hide2")

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }

        }
    </script>
@endsection
