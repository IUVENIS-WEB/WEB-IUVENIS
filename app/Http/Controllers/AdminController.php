<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Organizacao;
use Exception;
use Illuminate\Http\Request;
use \App\Tag;
use Illuminate\Support\Facades\DB;
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
        $user = Auth::user();
        $organizacoes = $organizacaoRepository->Participantes(($user->organizacao_id));
        return view('perfil.organizacoes',['tipo'=>'organizacoes', 'organizacoes' => $organizacoes]);
      
    }

    public function organizacoes_form(){
        return view('perfil.organizacoes_form',['tipo'=>'organizacoes']);
      
    }

    public function organizacao_user($id,IOrganizacaoRepository $organizacaoRepository){
        $user = Auth::user();
        $organizacoes = $organizacaoRepository->Participantes(($user->organizacao_id));
        $usuario=User::find($id);
        $usuario->organizacao_id=null;
        $usuario->save();
        return back();  
    }


    public function organizacao_informacoes(){
        $adm=Auth::user();
        $organizacao=DB::table('organizacaos')
        ->where('id','=',$adm->organizacao_id)
        ->get()->first();
        return view('perfil.organizacao_informacao',['tipo'=>'organizacoes','organizacao'=>$organizacao]);
    }

    public function organizacao_update(Request $req,IOrganizacaoRepository $organizacaoRepository){
        $user = Auth::user();
        $organizacoes = $organizacaoRepository->Participantes(($user->organizacao_id));
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
        
        $organizacao =\App\Organizacao::find($user->organizacao_id);
        if ($editing) {
            $organizacao =\App\Organizacao::find($fields['id']);}
        $messages = [
            'link.required' => 'O campo \'Link\' é obrigatório.',
            'link.active_url' => 'O campo \'Link\' deve receber uma URL válida.',
            'titulo.required' => 'O campo \'Título da publicação\' é obrigatório.',
            
            'detalhes.required' => 'O campo \'Detalhes\' é obrigatório.',
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
        $organizacao->nome=$req["nome-organizacao"];
        $organizacao->nome_lider=$req["nome-lider"];
        $organizacao->logo=' ';
        $organizacao->logo_alternativa=' ';
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

    public function organizacao_adicionar(Request $req){
        $adm=Auth::user();
        $user=DB::table('users')->where([['email','=',$req->email],['organizacao_id','=',null]])->first();
        if(isset($user)){
        $usuario=User::find($user->id);
        $usuario->organizacao_id=$adm->organizacao_id;
        $usuario->save();}
        return back();
    }

    public function organizacao_autorizar(IOrganizacaoRepository $organizacaoRepository){
        $organizacoes = $organizacaoRepository->getNaoVerificados();
        return view('admin.aprovar_organizacao',['tipo'=>'organizacao', 'organizacoes' => $organizacoes]);
    }

    public function organizacoes_submit(Request $req, IOrganizacaoRepository $organizacaoRepository){
        $user = Auth::user();
        $organizacoes = $organizacaoRepository->Participantes(($user->organizacao_id));
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
            $organizacao = \App\Organizacao::find($fields['id']);
        } 
        $messages = [
            'link.required' => 'O campo \'Link\' é obrigatório.',
            'link.active_url' => 'O campo \'Link\' deve receber uma URL válida.',
            'titulo.required' => 'O campo \'Título da publicação\' é obrigatório.',
            
            'detalhes.required' => 'O campo \'Detalhes\' é obrigatório.',

            
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
        $organizacao->nome=$req["nome-organizacao"];
        $organizacao->nome_lider=$req["nome-lider"];
        $organizacao->logo=' ';
        $organizacao->logo_alternativa=' ';
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
    public function analizar($id)
    {
        $organizacao =DB::table('organizacaos')
        ->where('id','=',$id)->get()->first();
        return view('admin.avaliar',['tipo'=>'organizacao','organizacao'=>$organizacao]);
    }
    public function delete($id){
       DB::update('update users set organizacao_id = null where organizacao_id = ?', [$id]);
       Organizacao::find($id)->delete();
        return back();
    }
    public function salvar($id){
        $org = \App\Organizacao::find($id);
        $org->publicado = true;
        $org->save();
        return redirect('/adm/autorizar_organizacao');
    }
}
