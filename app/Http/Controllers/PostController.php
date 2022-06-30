<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Post;
use Exception;
class PostController extends Controller
{
    public function show(Post $post){
        return $post->excluido ? [] : $post;
    }

    public function showAll(){
        return Post::where('excluido', false)->get();
    }

    public function showAllGrouped(){
        return collect(
            DB::table('posts')
            ->where('excluido', false)
            ->get()
        )->groupBy('tipo');
    }
}
