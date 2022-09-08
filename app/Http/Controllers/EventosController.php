<?php

namespace App\Http\Controllers;

use App\Contracts\IPostRepository;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function index(IPostRepository $postRepository){
        $posts = $postRepository->getPosts([], 8, ['evento']);
        $recentEvent = $postRepository->mostRecentEvent();
        return view('eventos.index', [ 'posts' => $posts, 'recent' => $recentEvent]);
    }
}
