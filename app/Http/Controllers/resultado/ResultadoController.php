<?php

namespace App\Http\Controllers\Resultado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;

class ResultadoController extends Controller
{
    
    protected $url = 'http://localhost:3000';
    public function mostrar()
    {
        $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
        $periodo = $periodo->json();
        $resultado = 0;
        return view("resultado.Resultado",compact('periodo','resultado'));
    }

    public function insertar(Request $request)
    {
        //  return $request->periodo;
        $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
        $periodo = $periodo->json();
        
        $resultado = http::withToken(Cache::get('token'))->post($this->url . '/resultado',[
            "PERIODO"=> $request->periodo
        ]);
        $resultado = $resultado->json();

        return view("resultado.Resultado",compact('periodo','resultado'));
    }
}
