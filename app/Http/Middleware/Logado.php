<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Logado
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
        if ( !auth()->check() )
         return redirect()->route('usuariologado');

     $usuariologado = auth()->user()->usuariologado;

     if ( $usuariologado )
         return back();

        return $next($request);
        if( Auth::check() == true)
        {
            return $next($request); 
        }
        else{
            return back();
        }
    }

}
