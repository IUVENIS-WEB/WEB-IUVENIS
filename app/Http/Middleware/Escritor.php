<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Contracts\IEscritorRepository;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BD;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\IPostRepository;

//class RedirectIfAuthenticated
class Escritor
{

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $escritor = Auth::user();
            if ($escritor->organizacao_id == null) {
                if($escritor->adm_power){
                    return redirect('adm/tags');
                }
                return back();
            }
            return $next($request);
        } else {
            return back();
        }
    }
}
