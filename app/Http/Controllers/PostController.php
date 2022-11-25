<?php

namespace App\Http\Controllers;

use App\Contracts\IPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Post;
use App\PostViews;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function show(Post $post){
        return $post->excluido ? [] : Post::with('autor')->find($post->id);
    }

    public function showAll(){
        $posts = Post::where('excluido', false)->get();
        $response = $posts->map(function ($item){
            // $item->foto = request()->getSchemeAndHttpHost().'/images/users/'.$item->foto;
            $item->imagem = request()->getSchemeAndHttpHost().'/images/posts/'.$item->imzagem;
            return $item;
        })->all();

        return $response;
    }

    public function showAllGrouped(IPostRepository $postRepository){
        return response()->json($postRepository->postsWithTags());
    }

    public function getComentarioByIdPai(IPostRepository $postRepository, $id){
        return response()->json($postRepository->getComentarioPostbyIdPai($id));
    }
    public function index(\App\Post $post, IPostRepository $postRepository){
        $logged = Auth::check();
        if(empty($post) || $post->comentario) return back();
        if($post->excluido && !($logged && Auth::user()->adm_power)) return back();
        PostViews::createViewLog($post);
        return view('posts.index', [
            'post' => $post, 
            'views'=> $postRepository->postViewCount($post->id)
        ]);
    }
    public function getPostsByColecao($idColecao, IPostRepository $postRepository)
    {
        $postscolecao = $postRepository->getPostsByColecao($idColecao);
        $posts = $postscolecao[0];
        $colecao = $postscolecao[1];

        return view('perfil.postsColecao', ['posts' => $posts, 'colecao' => $colecao]);
    }

    public function denuncia(\App\Post $post){
        if(!$post) return back();
        $post->denunciasContagem++;
        if($post->denunciasContagem > 5){
            $post->excluido = true;
            $post->save();
            return redirect('/');
        }
        $post->save();
        return back();
    }
    


    public function getColecoesByIdUser(IPostRepository $postRepository, $id)
    {
        return response()->json($postRepository->getColecoesByUser($id));
    }
    public function getPostByIdColecoes(IPostRepository $postRepository, $id)
    {
        return response()->json($postRepository->getPostByIdColecoes($id));
    }
    public function recomendado(IPostRepository $postRepository)
    {
        return response()->json($postRepository->postRecomendado());
    }
}
