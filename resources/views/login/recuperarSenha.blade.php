<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" rel="stylesheet">


    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
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
</body>
</html>