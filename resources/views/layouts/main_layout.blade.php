<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Aqui ficará todos os arquivos CSS necessários --}}
    <link rel="icon" href="{{ asset('images/logo-fill.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    @hasSection('css')
        @yield('css')
    @else
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @endif


</head>

<body>
    <main class="container">
        @include('layouts._navbar')
        @yield('content')
    </main>
</body>
{{-- Aqui ficará todos os arquivos JS necessários --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/7af21c135f.js" crossorigin="anonymous"></script>
<script>
    //Usar esse método sempre que precisar fazer um post pelo JS
    //é necessário usar await para receber o retorno do laravel.
    function fetchPost(resource, body) {
            let _token = document.head.querySelector("[name~=csrf-token][content]").content;
            return fetch(resource, {
                    method: 'post',
                    body: JSON.stringify(body),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": _token
                    }
                })
                .then(response => {
                    return response.json();
                })
                // .catch(e => console.log(e))
        }
</script>
</html>
