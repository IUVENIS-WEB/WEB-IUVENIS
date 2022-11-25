<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacao extends Model
{
    // public function users(){
    //     return $this->hasMany('App\User');
    // }

    public function posts(){
        return $this->hasMany('App\Post');
    }
    protected $guarded = [
        'nome', 'descricao', 'logo', 'logo_alternativa', 'publicado','user_id',
        'tipo_organizacaos','detalhes','link','assunto','nome_lider','post_count','id'
    ];
}
