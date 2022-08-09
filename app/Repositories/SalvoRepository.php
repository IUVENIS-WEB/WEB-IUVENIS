<?php

namespace App\Repositories;

use App\Contracts\ISalvoRepository;
use App\Colecao;
use Exception;
use Illuminate\Support\Facades\Auth;

class SalvoRepository extends Repository implements ISalvoRepository
{
        function getColecoes()
        {
                try {
                        $user_id = Auth::user()->id;

                        return Colecao::where([
                                ['creator_id', '=', $user_id],
                        ])
                                ->get()
                                ->all();
                } catch (Exception $e) {
                        return [];
                }
        }
}
