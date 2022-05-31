<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function recuperarSenha(){
        return view("login.recuperarSenha");
    }

    public function confirmacaoEnvio(Request $req){
        $email = $req->input("email");
        //Procurando no banco o usuário a partir do email dado
        $user = null;
        //Enviar email aqui CASO O USUÁRIO EXISTA, senão apenas retornar para a view
        return view('login.confirmacaoEnvio');
    }
}
