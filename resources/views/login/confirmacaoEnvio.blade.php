<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" rel="stylesheet">


    <title>Recuperar conta</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body>
    <main class="container">
        <h2>E-mail enviado</h2>
        <h3>Caso seu usuário tenha o email digitado, uma solicitação de troca de senha terá sido criada. Verifique a sua caixa de entrada do e-mail para recuperar a sua senha</h3>
        <a href="{{route("login.index")}}"><div class="botao-ir-para-login">Ir para login</div></a>
    </main>
</body>
</html>