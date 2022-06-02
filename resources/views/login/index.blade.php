<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css"
        rel="stylesheet">


    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <main class="container">
        <h2>Olá novamente!</h2>
        <h3>É sempre bom tê-la(o) por aqui</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ action('LoginController@attempt') }}" method="POST">
            {{ csrf_field() }}
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="E-mail" required>
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
        <a href="{{ route('login.recuperarSenha') }}">Recuperar senha</a>

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

</body>

</html>
