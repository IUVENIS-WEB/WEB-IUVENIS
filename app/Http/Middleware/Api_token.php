<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\classes\responsemessage;


class Api_token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $confere_token = DB::table('api_tokens')
                         ->where([
                             ['token', '=', $request->token]
                         ])
                         ->select('data_expiracao')
                         ->first();

        $data = Carbon::now();

        if($confere_token == null)
        {            
            return redirect('/Tokin/tokin');
        }

        if($confere_token != null)
        {
            $confere = Carbon::parse($confere_token->data_expiracao)->format('Y-m-d');
            if($data->format('Y-m-d') > $confere)
            {
                DB::table('api_tokens')
                     ->where([
                           ['token', '=', $request->token]
                        ])
                      ->delete();
                return redirect('/Tokin/tokin');
            }
            
            return $next($request);
        }
        
        
    }
}