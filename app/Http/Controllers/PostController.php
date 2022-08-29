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
        return Post::where('excluido', false)->get();
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
}
