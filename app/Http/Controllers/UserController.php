<?php

namespace App\Http\Controllers;

use App\Contracts\IUserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\MailController;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    //
    public function getUserById(IUserRepository $iUserRepository,$id){
        return response()->json($iUserRepository->userById($id));
    }
    public function emailRecuperarSenha(IUserRepository $iUserRepository,Request $req){
        $email = $req->input("email");
        $user = $iUserRepository->getUserByEmail($email);
        if($user)
        {
            $token = str_random(60);
            $iUserRepository->inserirResetPassword($email,$token);
            $data = ['email' => $req->email,'nome' => $user->nome,'token' => $token
            ];
            Mail::to($req->email)->send(new MailController($data, 'Redefinição de senha', 'email.message'));
        }

    }
}
