<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salvo extends Model
{
    protected $fillable = ['user_id', 'post_id', 'colecao_id'];

    function colecao()
    {
        return $this->belongsTo('App\Colecao');
    }

    function post(){
        return $this->belongsTo('App\Post');
    }
}
