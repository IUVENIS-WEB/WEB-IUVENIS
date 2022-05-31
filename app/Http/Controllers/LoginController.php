<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailController;
use Illuminate\Support\Facades\Mail;

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
        Mail::to($email)->send(new MailController(["nome" => "NOME DO USUÁRIO"]));
        return view('login.confirmacaoEnvio');
    }
}
