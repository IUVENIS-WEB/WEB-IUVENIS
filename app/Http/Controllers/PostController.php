<?php

namespace App\Http\Controllers;

use App\Contracts\IPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Post;
use App\PostViews;
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

    public function index(\App\Post $post, IPostRepository $postRepository){
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
}
