<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\IPostRepository;

class ExplorarController extends Controller
{
    public function index(IPostRepository $postRepository){
        $posts = $postRepository->getPosts([], 8);
        return view('explorar.index', [ 'posts' => $posts]);
    }
}
