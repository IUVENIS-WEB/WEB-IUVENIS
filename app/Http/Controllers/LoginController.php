<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function recuperarSenha(Request $req){
        error_log($req->email);
        return view("login.recuperarSenha", [ 'email' => $req->email]);
    }

    public function confirmacaoEnvio(Request $req){
        $email = $req->input("email");
        //Procurando no banco o usuário a partir do email dado
        $user = null;


        //Enviar email aqui CASO O USUÁRIO EXISTA, senão apenas retornar para a view
        Mail::to($email)->send(new MailController(["nome" => "NOME DO USUÁRIO"]));
        return view('login.confirmacaoEnvio');
    }

    public function attempt(Request $req){
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'password.required' => 'A senha é obrigatória.'
        ]);

        //Não é necessário fazer o hash da senha antes de realizar o attempt
        //pois o Auth implicitamente o faz.
        $attempt = Auth::attempt(['email' => $req->email, 'password' => $req->password]);
        if($attempt){
            return view('welcome');
        }
        else{
            return redirect('login')->with('fail', [
                'email' => $req->email,
                'errors' => [
                    'O email ou senha está invalido.'
                ]
            ]);
        }
    }
}
