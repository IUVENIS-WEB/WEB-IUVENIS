<?php

namespace App\Repositories;

use App\Contracts\IUserRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use stdClass;
use Carbon\Carbon;

class UserRepository extends Repository implements IUserRepository
{
    public function userById($id)
    {
        $data = DB::table('users')
              ->where([
                ['users.id','=',$id]
              ])
              ->select(['id','foto', 'nome', 'sobrenome',
               'bio', 'nascimento', 'email', 'organizacao_id'])
              ->get()
              ->first();
        $data->foto = request()->getSchemeAndHttpHost().'/images/users/'.$data->foto;
        return $data;
    }
    public function getUserByEmail($email)
    {
      return DB::table('users')
              ->where('email', '=', $email)
              ->first();
    }
    public function inserirResetPassword($email,$token)
    {
      DB::table('password_resets')->insert([
        'email' => $email,
        'token' => $token,
        'created_at' => Carbon::now()
    ]);
    }
}