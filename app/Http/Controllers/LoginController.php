<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;
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
        $user = DB::table('users')->where( 'email' , '=' , $req-> email ) ->first();
        //Create Password Reset Token
        $token = str_random(60);
        if($user){
            DB::table('password_resets')->insert([
                'email' => $req->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            $data = [
                'email' => $req->email,
                'nome' => $user->nome,
                'token' => $token
            ];
            Mail::to($req->email)->send(new MailController($data, 'Redefinição de senha', 'email.message'));
        }
        return view('login.confirmacaoEnvio');
    }
    
    public function redefinirSenha($email, $token)
    {
        $toke = \App\PasswordReset::where( 'email' , '=' , $email )->get()->first(); 
        if($toke->token != $token)
        {
            return view('login.index');
        }
        else
        {
            $toke->delete();
            return view('login.definirSenha', compact('email'));
        }
    }

    public function definirNovaSenha(Request $req)
    {
        if(!$req->senha)
            return back();
        $user = User::where( 'email' , '=' , $req-> email )->get()->first();
        $user->password = Hash::make($req->senha);
        $user->save();
        Auth::login($user);
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
            return view('iuvenis.index');
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

    public function deslogar(){
        Auth::logout();
        return view('iuvenis.index');
    }
}
