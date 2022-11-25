<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function recuperarSenha(Request $req)
    {
        error_log($req->email);
        return view("login.recuperarSenha", ['email' => $req->email]);
    }

    public function confirmacaoEnvio(Request $req)
    {
        $email = $req->input("email");
        //Procurando no banco o usuário a partir do email dado
        $user = DB::table('users')->where('email', '=', $req->email)->first();
        //Create Password Reset Token
        $token = str_random(60);
        if ($user) {
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
        $toke = \App\PasswordReset::where('email', '=', $email)->get()->first();
        if(!isset($toke)){
            return back();
        }
        if ($toke->token != $token) {
            return redirect('/');
        } else {
            $toke->delete();
            return view('login.definirSenha', compact('email'));
        }
    }

    public function definirNovaSenha(Request $req)
    {
        if (!$req->senha)
            return back();
        $user = User::where('email', '=', $req->email)->get()->first();
        $user->password = Hash::make($req->senha);
        $user->save();
        Auth::login($user);
        return redirect('/');
    }

    public function attempt(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'password.required' => 'A senha é obrigatória.'
        ]);

        //Não é necessário fazer o hash da senha antes de realizar o attempt
        //pois o Auth implicitamente o faz.
        $attempt = Auth::attempt(['email' => $req->email, 'password' => $req->password]);
        if ($attempt) {
            return redirect('/');
        } else {
            return redirect('login')->with('fail', [
                'email' => $req->email,
                'errors' => [
                    'O email ou senha está invalido.'
                ]
            ]);
        }
    }

    public function deslogar()
    {
        Auth::logout();
        return redirect('/');
    }

    public function cadastro()
    {
        return view('login.cadastro');
    }

    public function completarCadastro(Request $req)
    {
        if (!$req->email) return back();
        return redirect('/cadastroFinal')->with(['email' => $req->email]);
    }

    public function cadastroFinal(){
        return view('login.completarCadastro');
    }

    public function cadastrar(Request $req)
    {
        //Validação
        $rules = [
            'email' => 'email|required|unique:users',
            'nome' => 'required',
            'sobrenome' => 'required',
            'password' => 'required|min:7',
            'confirm_password' => 'required|min:7|same:password',
        ];
        $messages = [
            'email.required' => 'O email é obrigatório.',
            'email.unique' => 'Este email já está em uso.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'nome.required' => 'O nome é obrigatório.',
            'sobrenome.required' => 'O sobrenome é obrigatório.',
            'password.min' => 'A senha deve ter no mínimo 7 (sete) caracteres.',
            'password.required' => 'A senha é um campo obrigatório.',
            'confirm_password.required' => 'A confirmação de senha é um campo obrigatório.',
            'confirm_password.min' => 'A senha deve ter no mínimo 7 (sete) caracteres.',
            'confirm_password.same' => 'A senha não é a mesma no campos \'Senha\' e \'Confirmar Senha\'.',
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
      
        $nascimento = $req->ano."-".$req->mes."-".$req->dia;
            //Criação do usuário
            try{
                
                $user = new User();
    
                  $user->email = $req->email;
                  $user->password =  Hash::make($req->password);
                  $user->nascimento = $nascimento;
                  $user->nome = $req->nome;
                  $user->sobrenome = $req->sobrenome;
                  $user->save();
                Auth::login($user);
        }
        catch(Exception $e){
            redirect()->back();
        }
        return redirect('/');
    }
}
