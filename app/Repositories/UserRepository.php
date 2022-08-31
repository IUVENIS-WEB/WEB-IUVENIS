<?php

namespace App\Repositories;

use App\Contracts\IUserRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class UserRepository extends Repository implements IUserRepository
{
    public function userById($id)
    {
        return $data = DB::table('users')
              ->where([
                ['users.id','=',$id]
              ])
              ->get()
              ->all();
    }
}