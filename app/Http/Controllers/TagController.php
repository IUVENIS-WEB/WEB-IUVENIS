<?php

namespace App\Http\Controllers;

use App\Contracts\IPostRepository;
use App\Tag;
use App\Post;

class TagController extends Controller
{
    public function index(Tag $tag, IPostRepository $postRepository){
        $posts = $postRepository->getPostsByTag($tag->id);
        $posts = $posts->map(function ($post){
            return Post::find($post->post_id);
        })->all();
        return view('tag.index', ['posts'=> $posts, 'tag' => $tag->nome]);
    }
}
