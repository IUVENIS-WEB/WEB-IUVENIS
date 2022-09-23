<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

//class RedirectIfAuthenticated
class Verificausuario
{

public function handle($request, Closure $next, $organizacao_id)
{
     if ( !auth()->check() )
         return redirect()->route('usuariologado');
 
     $usuariologado = auth()->user()->usuariologado;
  
     if ( $usuariologado != $organizacao_id)
         return back();
  
     return $next($request); 
}

}