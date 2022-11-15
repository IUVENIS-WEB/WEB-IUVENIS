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
        return $post->excluido ? [] : $post;
    }

    public function showAll(){
        return Post::where('excluido', false)->get();
    }

    public function showAllGrouped(IPostRepository $postRepository){
        return response()->json($postRepository->groupedPostsByTag());
    }

    public function index(\App\Post $post, IPostRepository $postRepository){
        $logged = Auth::check();
        if(empty($post) || $post->comentario) return back();
        if($post->excluido && !($logged && Auth::user()->adm_power)) return back();
        //PostViews::createViewLog($post);
        return view('posts.index', [
            'post' => $post, 
            'views'=> $postRepository->postViewCount($post->id)
        ]);
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
}
