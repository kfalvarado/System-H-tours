<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CheckToken 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        $token = Cache::get('token');

        // dump($token);
        $validar = Http::post('http://localhost:3000/seguridad/check',[    
            "token"=>$token
        ]);
        $validarArreglo =  $validar->json();

        
        if( $validarArreglo != null){ 
            return $next($request);
            // dump('siuuu');
        }else {
            // dump('nooo');
            return redirect()->route('acceso.denegado');
        }
    }
}
