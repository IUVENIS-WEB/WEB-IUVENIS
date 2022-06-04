<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $user = DB::table('users')->where( 'email' , '=' , $req-> email ) ->get();
        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $req->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $token = DB::table('password_resets')
            ->where('email', $req->email)->get();
        if(count($user) < 1)
        {
            return view('login.index');
        }
        else
        {
            $us = (array)$user[0];
            $ts = (array)$token[0];
            Mail::to($email)->send(new MailController(["nome" => $us['nome'],
                                                       "email" => $us['email'], 
                                                       "token" => $ts['token']]));
            return view('login.confirmacaoEnvio');
        }
        $user = null;
    }
    
    public function redefinirSenha($email, $token)
    {
        $toke = DB::table('password_resets')->where( 'email' , '=' , $email ) ->get(); 
        $ts = (array)$toke[0];
        if($ts['token'] != $token)
        {
            return view('login.index');
        }
        else
        {
            
            return view('login.definirSenha', compact('email'));
        }
    }

    public function definirNovaSenha(Request $req)
    {
        DB::table('users')->where( 'email' , '=' , $req-> email ) ->update(["senha" => $req->senha]);
        return view('iuvenis.index');
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
