<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colecao extends Model
{
    protected $fillable = ['creator_id', 'nome'];

    function salvos()
    {
        return $this->hasMany('App\Salvo');
    }
}
