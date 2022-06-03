<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" rel="stylesheet">


    <title>Definir Senha</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
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
</body>
</html>