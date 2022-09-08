<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\IPostRepository;
use App\Contracts\IEscritorRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ExplorarController extends Controller
{
    public function index(IPostRepository $postRepository){
        $posts = $postRepository->getPosts([], 8);
        return view('explorar.index', [ 'posts' => $posts]);
    }

    public function escritor(IEscritorRepository $escritorRepository, $id)
    {
        $escritores = $escritorRepository->getEscritor($id);
        $escrit = $escritores[0];
        $user = $escritores[1];
        return view('explorar.escritor', ['posts' => $escrit, 'escritor' => $user]);
    }

}
