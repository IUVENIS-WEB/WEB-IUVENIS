<?php

namespace App\Http\Controllers;

use App\Contracts\IPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Post;
use Exception;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function show(Post $post){
        return $post->excluido ? [] : $post;
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
        return response()->json($postRepository->groupedPostsByTag());
    }

    public function getComentarioByIdPai(IPostRepository $postRepository, $id){
        return response()->json($postRepository->getComentarioPostbyIdPai($id));
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
