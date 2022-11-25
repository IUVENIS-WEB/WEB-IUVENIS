<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Request;
use \App\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Contracts\IOrganizacaoRepository;
use App\Repositories\OrganizacaoRepository;

class AdminController extends Controller
{
    protected $tagRepository;
    public function __construct(\App\Contracts\ITagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function tags()
    {
        $tags = $this->tagRepository->getAll();
        return view('admin.tags', ['tags' => $tags, 'tipo' => 'tags']);
    }

    public function deletar_tag(Request $req)
    {
        try {
            $tag = \App\Tag::find($req->id);
            if ($tag) {
                $tag->excluido = true;
                $tag->save();
            }
            return back();
        } catch (\Exception $e) {
            return redirect('/');
        }
    }

    public function publicacao_tag($id = null)
    {
        $tag = \App\Tag::find($id);
        return view('admin.publicacao_tag', ['tag' => $tag]);
    }

    public function submit_tag(Request $req)
    {
        try {
            $editing = isset($req->id);
            $tag = null;
            if ($editing) {
                $tag = \App\Tag::find($req->id);
                if (!$tag) throw new Exception('Tag não encontrada.');
                $tag->nome = $req->nome;
            } else {
                $tag = \App\Tag::create(['nome' => $req->nome]);
            }
            $tag->save();

            return redirect('/adm/tags');
        } catch (Exception $e) {

            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function denuncias(\App\Contracts\IPostRepository $iPostRepository)
    {
        //retornar todas as denúncias presentes no sistema
        $posts = $iPostRepository->postsDenunciados();
        return view('admin.denuncias', ['posts' => $posts]);
    }

    public function excluir_post(\App\Post $post){
        if(!$post->excluido || $post->denunciasContagem < 5){
            return back();
        }

        $post->denunciasContagem = 0;
        $post->save();
        return redirect('/denuncias');
    }

    public function revogar(\App\Post $post){
        $post->excluido = false;
        $post->denunciasContagem = 0;
        $post->save();
        return redirect('/denuncias');
    }

    public function organizacoes(IOrganizacaoRepository $organizacaoRepository){
        $organizacoes = $organizacaoRepository->getPublicados();
        return view('perfil.organizacoes',['tipo'=>'organizacoes', 'organizacoes' => $organizacoes]);
      
    }

    public function organizacoes_form(){
        return view('perfil.organizacoes_form',['tipo'=>'organizacoes']);
      
    }

    public function organizacoes_submit(Request $req, IOrganizacaoRepository $organizacaoRepository){
        $organizacoes = $organizacaoRepository->getPublicados();
        $fields = Input::all();
        $editing = isset($fields['id']);

        //Validação
        $rules = [
            'link' => 'required',
            'nome-organizacao' => 'required',
            'detalhes' => 'required',
            'nome-lider' => 'required',
            'assunto' => 'required',
        ];
        $organizacao = new \App\Organizacao();
        if ($editing) {
            $organizacao = \App\Organiacao::find($fields['id']);
        } else {
            $rules['imagem'] = 'required|image';
        }
        $messages = [
            'link.required' => 'O campo \'Link\' é obrigatório.',
            'link.active_url' => 'O campo \'Link\' deve receber uma URL válida.',
            'titulo.required' => 'O campo \'Título da publicação\' é obrigatório.',
            'imagem.required' => 'O campo \'Thimbnail da publicação\' é obrigatório.',
            'detalhes.required' => 'O campo \'Detalhes\' é obrigatório.',

            'imagem.image' => 'O campo \'Thimbnail da publicação\' deve receber uma imagem válida.'
        ];
        $validator = Validator::make($fields, $rules, $messages);
        if ($validator->fails() || $editing && !isset($organizacao)){
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
            if ($organizacao->imagem) Storage::delete($organizacao->imagem);
            $imageName = asset('storage/' . $req->file('imagem')->store('images/posts', 'public'));
        }
        $organizacao->nome=$req["nome-organizacao"];
        $organizacao->nome_lider=$req["nome-lider"];
        $organizacao->logo=$imageName;
        $organizacao->logo_alternativa=$imageName;
        $organizacao->publicado=false;
        $organizacao->user_id=Auth ::user()->id;
        if($req['organizacao']=='ONG')
        $organizacao->tipo_organizacaos=1;
        else if($req['organizacao']=='Outro')
        $organizacao->tipo_organizacaos=0;
        else  $organizacao->tipo_organizacaos=2;
        $organizacao->detalhes=$req["detalhes"];
        $organizacao->link=$req["link"];
        $organizacao->assunto=$req["assunto"];
        $organizacao->nome_lider=$req["nome-lider"];
        $organizacao->post_count=0;
        $organizacao->save();

        return view('perfil.organizacoes',['tipo'=>'organizacoes', 'organizacoes' => $organizacoes]);
    }
}
