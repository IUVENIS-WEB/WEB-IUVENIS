<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\IPostRepository;

class ArtigoController extends Controller
{
    public function index(IPostRepository $postRepository){
        $posts = $postRepository->getPosts([], 8, ['artigo']);
        return view('artigo.index', ['posts' => $posts]);
    }
}
