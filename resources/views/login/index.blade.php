@extends('layout.siteLogin')
@section('titulo','Login')
@section('conteudo')
    <main class="container">
        <h2>Olá novamente!</h2>
        <h3>É sempre bom tê-la(o) por aqui</h3>
        <form action="">
            <div class="input-field">
                <input type="email" name="username" id="username"
                    placeholder="E-mail" required>
            </div>
            <div class="input-field2">
                <input type="password" name="password" id="password"
                    placeholder="Senha" maxlength="20" required>
                <i class="eye" onclick="hide()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>    
                </i>
            </div>
            <div class="input-field"><input type="submit" value="Entrar"></div>
        </form>
        <a href="{{route("login.recuperarSenha")}}">Recuperar senha</a>

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
            <div class="comando-cadastro"><p>Não possui uma conta? <a href="#">Cadastrar</a></p></div>
        </div>
    </main>

    <script>
        function hide(){
            var x =document.getElementById("password")
            var y =document.getElementById("hide1")
            var z =document.getElementById("hide2")

            if(x.type === 'password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }
            else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }

        }
    </script>
@endsection