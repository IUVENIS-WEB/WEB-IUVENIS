<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Contato</title>
</head>
<body>
   <div style="background-color: rgb(238, 255, 153); font-family: 'Source Sans Pro', sans-serif; display: flex; flex-direction: column; padding: 1rem;width:100%">
       
   <table style="width: 50%; margin:auto; background-color: white; border-radius: 10px; padding: 15px">
      <tr>
         <img src="https://i.postimg.cc/LX2P3VW8/image.png" style="width: 4rem;"/>
         
         
      </tr>
      <tr>
         <h1 style="color: #213042; align-self: center;">{{ $data['nome']}}</h1>
      </tr>
      <tr>
         
         <p>Email: {{ $data['email']}}</P> <br>
         <p>Telefone: {{ $data['tel']}}</P> <br>
         <p>Comentario: {{ $data['comentario']}}</P>

      </tr>
   </table> 
</div> 
</body>
</html>