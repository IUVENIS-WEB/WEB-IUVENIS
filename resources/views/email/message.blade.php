<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Email</title>
</head>
<body>
   <div style="background-color: rgb(238, 255, 153); font-family: 'Source Sans Pro', sans-serif; display: flex; flex-direction: column; padding: 1rem;width:100%">
       
   <table style="width: 50%; margin:auto; background-color: white; border-radius: 10px; padding: 15px">
      <tr>
         <img src="https://i.postimg.cc/LX2P3VW8/image.png" style="width: 4rem;"/>
         
         
      </tr>
      <tr>
         <h1 style="color: #213042; align-self: center;">Olá! {{ $data['nome']}}</h1>
      </tr>
      <tr>
         <P>Esqueceu sua senha? </P>
         <p>Não se preocupe, você pode resetar sua senha na Iuvenis clicando no link abaixo:</P>

      </tr>
      <tr>
         <strong>
            <a style="text-decoration: none;
            background: var(--azul-escuro);
            padding: 1em 1.5em;
            cursor: pointer;
            color: white;
            background-color: #213042;
            border-style: none;
            outline:none;
            border-width: 3px;
            border-radius: 100px;
            outline:none;
            " href="#">Recuperar senha</a>
         </strong>
      </tr>
   </table> 
</div> 
</body>
</html>