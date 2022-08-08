@extends('layouts.main_layout')
@section('title', 'Completar cadastro')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_complete_cadastro.css') }}">
@endsection

@section('content')
    <main class="container">
        <h2>Complete o cadastro</h2>
        <h3>Preencha os campos</h3>
        @if($errors->any())
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
        <form action="{{action('LoginController@cadastrar')}}" method="post">
            {{ csrf_field() }}
            <label><span class="passText valid"></span></label>
            <label class="emailBox">
                <input type="email" id="email" name="email" placeholder="Email" value="{{session()->get('email')}}">
            </label>

            <label class="passBox">
                <input type="password" id="password" name="password" placeholder="password">
                <i class="eye" onclick="hide()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </i>
            </label>
            <input type="date" id="date" name="nascimento" required>
            <input type="submit" id="submit" value="Criar conta">
        </form>
        <div class="comando-login">
            <p><a href="{{URL::previous()}}">Voltar</a></p>
        </div>

    </main>




    <script>
        const password = document.getElementById("password");
        const submit = document.getElementById("submit");

        password.addEventListener('input', () => {
            const passBox = document.querySelector('.passBox');
            const passText = document.querySelector('.passText');
            const passPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}/;

            if (password.value.match(passPattern)) {
                passBox.classList.remove('invalid');
                passText.classList.add("valid");
                passText.innerHTML = "";
                submit.removeAttribute('disabled');

            } else {
                passBox.classList.add('invalid');
                submit.disabled = "disabled";
                passText.classList.remove("valid");
                passText.innerHTML =
                    "Sua senha deve conter 7 caracteres, pelos menos uma letra maiúscula e minúscula e um número";
            }
        });


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
