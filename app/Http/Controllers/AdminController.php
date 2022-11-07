<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use \App\Tag;

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
}
