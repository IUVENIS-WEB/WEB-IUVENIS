<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }

    public function organizacao(){
        return $this->hasOne('App\Organizacao');
    }

    public function salvo(){
        return $this->hasMany('Appa\Salvo');
    }
}
