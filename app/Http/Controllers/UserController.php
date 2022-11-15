<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Contracts\IUserRepository;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\MailController;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index()
    {
        return view('conta.index', ['user' => Auth::user()]);
    }

    public function edit(Request $req)
    {
        //Validação
        $rules = [
            'nome' => 'required',
            'sobrenome' => 'required',
            'foto' => 'image'
        ];
        $messages = [
            'nome.required' => 'O campo \'Nome\' é obrigatório.',
            'sobrenome.required' => 'O campo \'Sobrenome\' é obrigatório.',
            'foto.image' => 'O campo \'Foto\' deve receber uma imagem válida.'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = Auth::user();
        $user->nome = $req->nome;
        $user->sobrenome = $req->sobrenome;
        $user->bio = $req->bio;

        //Tratamento do arquivo
        $foto = $req->file('foto');
        $caminhoRelativo = $user->foto;
        if (isset($foto)) {
            $caminhoRelativo = $foto->store('images/users', 'public');
        }
        $user->foto = '/'.$caminhoRelativo;

        $user->save();
        return back();
    }

    public function conta_privada()
    {
        return view('conta.privada', ['user' => Auth::user()]);
    }

    public function privada_edit(Request $req)
    {
        //Validação
        $rules = [
            'email' => 'email|required',
        ];
        $messages = [
            'email.required' => 'O campo \'Email\' é obrigatório.',
            'email.email' => 'O campo \'Email\' deve ser um email válido.',
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = Auth::user();
        $user->email = $req->email;

        $user->save();
        return back();
    }

    public function getUserById(IUserRepository $iUserRepository,$id){
        return response()->json($iUserRepository->userById($id));
    }
    public function emailRecuperarSenha(IUserRepository $iUserRepository,Request $req){
        $email = $req->input("email");
        $user = $iUserRepository->getUserByEmail($email);
        if($user)
        {
            $token = str_random(60);
            $iUserRepository->inserirResetPassword($email,$token);
            $data = ['email' => $req->email,'nome' => $user->nome,'token' => $token
            ];
            Mail::to($req->email)->send(new MailController($data, 'Redefinição de senha', 'email.message'));
        }

    }
}
