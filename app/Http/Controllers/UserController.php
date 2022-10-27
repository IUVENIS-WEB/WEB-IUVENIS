<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        if(isset($foto)){
            $caminhoRelativo = $foto->store('images/users', 'public');
        }
        $user->foto = $caminhoRelativo;

        $user->save();
        return back();
    }
}
