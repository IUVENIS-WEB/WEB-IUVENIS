<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
}
