<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Contracts\ITagRepository;
use Exception;
class PublicacaoController extends Controller
{
    public function deletar_post(Request $req){
        try{
            $post = \App\Post::find($req->id);
            if($post->autor_id == Auth::user()->id) $post->delete();
            return back();
        }
        catch(\Exception $e){
            return redirect('/');
        }
    }

    public function form_artigo($postId = null)
    {
        $post = \App\Post::find($postId);
        //Antes de retornarmos o formulário de cadastro para o usuário, é necessário
        //validar se ele está logado e se ele possui uma organização.
        if (!(Auth::user() && Auth::user()->organizacao())) return redirect('/');

        if ($post && $post->autor_id != Auth::user()->id) return back();
        $tags = [];
        if ($post) {
            $tags = $post->tags->map(function ($item, $keys) {
                return $item->id;
            });
        }
        return view('publicacao.artigo', ['tipo' => 'artigo', 'post' => $post, 'tags' => collect($tags)]);
    }

    public function novo_artigo(Request $req)
    {
        $fields = Input::all();
        // dd($fields);
        $editing = isset($fields['id']);

        //Validação
        $rules = [
            'link' => 'required|active_url',
            'titulo' => 'required',

            'resumo' => 'required',
        ];
        $post = new \App\Post();
        if ($editing) {
            $post = \App\Post::find($fields['id']);
            // dd($post);
        } else {
            $rules['imagem'] = 'required|image';
        }
        $messages = [
            'link.required' => 'O campo \'Link\' é obrigatório.',
            'titulo.required' => 'O campo \'Título da publicação\' é obrigatório.',
            'imagem.required' => 'O campo \'Thimbnail da publicação\' é obrigatório.',
            'resumo.required' => 'O campo \'Resumo\' é obrigatório.',

            'link.active_url' => 'O campo \'Link\' deve receber uma URL válida.',
            'imagem.image' => 'O campo \'Thimbnail da publicação\' deve receber uma imagem válida.'
        ];
        $validator = Validator::make($fields, $rules, $messages);
        if ($validator->fails() || $editing && !isset($post) || ($editing && $post->autor_id != Auth::user()->id)) {
            return redirect()->back()->withErrors($validator->errors());
        }


        //Salvando os arquivos na pasta pública
        //A função 'asset()' vai retornar o caminho do arquivo já com a URL, então
        //temos a URL completa para ele a partir da função guardada no banco

        //Todos os arquivos que foi feito upload podem ser encontrados
        //com '$req->file('nomedocampo')' e posteriormente podem ser guardados em public/storage/caminhoquevocecolocar
        //com '->store('caminhoquevocecolcoar')'
        $imagem = $req->file('imagem');
        $imageName = '';
        if (isset($imagem)) {
            if ($post->imagem) Storage::delete($post->imagem);
            $imageName = asset('storage/' . $req->file('imagem')->store('images/posts', 'public'));
        }

        if (isset($fields['arquivo'])) {
            if ($editing && $post->arquivo) {
                Storage::delete($post->arquivo);
            }
            $post->arquivo = asset('storage/' . $req->file('arquivo')->store('files/', 'public'));
        }

        $post->titulo = $fields['titulo'];
        $post->resumo = $fields['resumo'];
        if($imageName != '') $post->imagem = $imageName;
        $post->tipo = 'artigo';
        $post->link_midia = $fields['link'];

        //O usuário pode mudar de organização
        if (!$editing) {
            $post->organizacao_id = Auth::user()->organizacao->id;
        }
        $post->autor_id = Auth::user()->id;

        $post->save();
        if (isset($fields['tags'])) {
            if ($editing) {
                \App\PostTags::where([
                    ['post_id', '=', $post->id],
                ])
                    ->whereIn(
                        'tag_id',
                        $post->tags->map(function ($e) {
                            return $e->id;
                        })
                    )->delete();
            }
            foreach ($fields['tags'] as $tagId) {
                \App\PostTags::create(['post_id' => $post->id, 'tag_id' => $tagId]);
            }
        }

        return redirect('/publicacoes/texto');
    }
    public function form_evento(ITagRepository $iTagRepository)
    {
        if(!(Auth::user() && Auth::user()->organizacao())) return redirect('/');
        {
            $id = Auth::user();
            $tags = $iTagRepository->getAll();
            return view('publicacao.evento', ['user' => $id, 'tipo' => 'evento', 'tags' => $tags]);
        }
        
    }
    public function novo_evento(Request $req){
        $fields = Input::all();
        
        //Validação
        $rules = [
            'link' => 'required|active_url',
            'titulo' => 'required',
            'imagem' => 'required|image',
            'resumo' => 'required',
            'data' => 'required|date'
        ];
        $messages = [
            'link.required' => 'O campo \'Link\' é obrigatório.',
            'titulo.required' => 'O campo \'Título da publicação\' é obrigatório.',
            'imagem.required' => 'O campo \'Thimbnail da publicação\' é obrigatório.',
            'resumo.required' => 'O campo \'Resumo\' é obrigatório.',
            'data.required' => 'O campo \'Data\' é obrigatório.',
            'data.date' => 'O campo \'Data\' precisa estar em um formato válido.',
            'link.active_url' => 'O campo \'Link\' deve receber uma URL válida.',
            'imagem.image' => 'O campo \'Thimbnail da publicação\' deve receber uma imagem válida.'
        ];
        $validator = Validator::make($fields, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $post = new \App\Post();


        //Salvando os arquivos na pasta pública
        //A função 'asset()' vai retornar o caminho do arquivo já com a URL, então
        //temos a URL completa para ele a partir da função guardada no banco

        //Todos os arquivos que foi feito upload podem ser encontrados
        //com '$req->file('nomedocampo')' e posteriormente podem ser guardados em public/storage/caminhoquevocecolocar
        //com '->store('caminhoquevocecolcoar')'
        $imageName = asset('storage/'.$req->file('imagem')->store('images/posts', 'public'));

        if(isset($fields['arquivo'])){
            $post->arquivo = asset('storage/'.$req->file('arquivo')->store('files/', 'public'));
        }
        $post->data_evento = $fields['data'];
        $post->titulo = $fields['titulo'];
        $post->resumo = $fields['resumo'];
        $post->link_evento = $fields['link'];
        $post->imagem = $imageName;
        $post->tipo = 'evento';
        $post->organizacao_id = Auth::user()->organizacao->id;
        $post->autor_id = Auth::user()->id;

        $post->save();
        if(isset($fields['tags'])){
            foreach($fields['tags'] as $tagId){
                \App\PostTags::create(['post_id' => $post->id, 'tag_id' => $tagId]);
            }
        }

        return redirect('/publicacoes/evento');
    }
}
