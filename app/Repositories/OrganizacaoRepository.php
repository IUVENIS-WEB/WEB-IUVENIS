<?php

namespace App\Repositories;

use App\Colecao;
use App\Contracts\IOrganizacaoRepository;
use App\Organizacao;
use App\PostViews;
use App\User;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class OrganizacaoRepository extends Repository implements IOrganizacaoRepository
{
    public function Participantes($user){
        $organizacao = User::where('organizacao_id','=', $user)
        ->get()
        ->all();
        return $organizacao;
    }
    public function getNaoVerificados(){
        $organizacao = Organizacao::where('publicado', '=', false)
        ->get()
        ->all();
        return $organizacao;
    }
}