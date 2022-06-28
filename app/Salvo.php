<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salvo extends Model
{
    public function post(){
        return $this->hasOne('App\Post');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
