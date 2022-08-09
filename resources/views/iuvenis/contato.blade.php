<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" rel="stylesheet">



    <title>Contato</title>
    <link rel="stylesheet" href="{{ URL::asset('css/contato.css') }}" type="text/css">
</head>
<body> 
    <main class="container">
        <div class="conteudo">
            <div class="conteudo-texto">
               <div class="texto">
                <h1>Vamos construir algo juntos?</h1>
                    <p>Tem perguntas, comentários ou sugestões?
                     Será um prazer atendê-lo! </p>
                </div>
                <img src="{{ URL::asset('images/assets/contato.png') }}"alt="contato" >
            </div>
            <div class="forms"> 
            	<c>Nos deixe uma mensagem</c>
                <d>Adoraríamos ouvir de você!</d>
                <form action="{{action('EnvioController@envioContato')}}" method="POST">
                {{ csrf_field() }}
                    <input type = "text" name="nome" placeholder =  " Nome " /> 
			        <input type = "email" name="email" placeholder =  " E-mail " />
			        <input type = "tel" name="tel" placeholder =  " Telefone celular " />
			        <textarea placeholder=" Seu comentário" name="comentario" maxlength="2000"></textarea>
                    
				    <input type="submit">
                </form>
			</div>
        </div>

    </main>


</body>
</html>