<?php

namespace App\Http\Controllers;

use App\Contracts\IUserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    //
    public function getUserById(IUserRepository $iUserRepository,$id){
        return response()->json($iUserRepository->userById($id));
    }
}
