@extends('layout.site')
@section('name','NotFoundPage')
@section('conteudo')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" rel="stylesheet">



        <title>Erro</title>
        <link href="{{ URL::asset('css/erro.css') }}" rel="stylesheet" type="text/css">
        
    </head>

    <body> 
        <main class="container">
        

            <div class="conteudo">
            
                <div class="conteudo-texto">
                    <h1>Ooops...</h1>
                    <h2>Página não encontrada</h2>
                        <p>A página que você tentou acessar está indisponível ou não existe! </p>
                        <a href={{route("iuvenis.index")}}><div class="voltar">Voltar</div></a>
                </div>
                <img src="{{ URL::asset('images/globo.png') }}" alt="globo"> 
                
            
            </div>


        </main>


    </body>
    </html> 
@endsection
