<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\IPostRepository;

class VideoController extends Controller
{
    public function index(IPostRepository $postRepository){
        $posts = $postRepository->getPosts([], 8, ['video']);
        return view('video.index', ['posts' => $posts]);
    }
}
