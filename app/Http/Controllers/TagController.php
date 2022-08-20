<?php

namespace App\Http\Controllers;

use App\Contracts\IPostRepository;
use App\Tag;

class TagController extends Controller
{
    public function index(Tag $tag, IPostRepository $postRepository){
        $posts = $postRepository->getPosts([$tag->id], 8);
        return view('tag.index', ['posts'=> $posts, 'tag' => $tag->nome]);
    }
}
