<?php

namespace App\Repositories;

use App\Contracts\IEscritorRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class EscritorRepository extends Repository implements IEscritorRepository
{
        function getEscritores($ids = [], $take = 10){
                return User::where([
                        ['organizacao_id', '!=', null],
                ])
                ->when($ids != null, function($q) use($ids){
                        $q->whereIn('id', $ids);
                })
                ->take($take)
                ->get()
                ->all();
        }
}
