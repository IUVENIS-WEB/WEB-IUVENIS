<?php

namespace App\Repositories;

use App\Colecao;
use App\Contracts\IPostRepository;
use App\Organizacao;
use App\PostViews;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class OrganizacaoRepository extends Repository implements IOrganizacaoRepository
{
    public function getPublicados(){
        Organizacao::where('publicado', '=', true)
        ->get()
        ->all();
    }
    public function getNaoVerificados()
    {
        Organizacao::where('publicado', '=', false)
        ->get()
        ->all();
    }
}