<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PublicacaoController extends Controller
{
    public function form_artigo(){
        if(!Auth::check()) return redirect('/');
        return view('publicacao.artigo', ['tipo'=> 'texto']);
    }

    public function novo_artigo(Request $req){
        $fields = Input::all();
        // dd($fields);
        //Validação
        $rules = [
            'link' => 'required',
            'titulo' => 'required',
            'imagem' => 'required|image',
            'resumo' => 'required',
            'tags' => 'required',
        ];
        $messages = [
            'link.required' => 'O campo \'Link\' é obrigatório.',
            'titulo.required' => 'O campo \'Título da publicação\' é obrigatório.',
            'imagem.required' => 'O campo \'Thimbnail da publicação\' é obrigatório.',
            'resumo.required' => 'O campo \'Resumo\' é obrigatório.',
            'tags.required' => 'O campo \'Tags\' é obrigatório.',

            'link.active_url' => 'O campo \'Link\' deve receber uma URL válida.',
            'imagem.image' => 'O campo \'Thimbnail da publicação\' deve receber uma imagem válida.'
        ];
        $validator = Validator::make($fields, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $post = new \App\Post();

        //Salvando os arquivos na pasta pública
        $imageName = asset('storage/'.$req->file('imagem')->store('images/posts', 'public'));
        if(isset($fields['arquivo'])){
            $post->arquivo = asset('storage/'.$req->file('arquivo')->store('files/', 'public'));
        }

        $post->titulo = $fields['titulo'];
        $post->resumo = $fields['resumo'];
        $post->imagem = $imageName;
        $post->tipo = 'Texto';
        $post->organizacao_id = Auth::user()->organizacao->id;
        $post->autor_id = Auth::user()->id;

        $post->save();
        return redirect('/publicacoes/texto');
    }
}
