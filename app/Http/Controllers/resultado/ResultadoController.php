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
    public function mostrar()
    {
        $resultado = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
        return view("resultado.Resultado");
    }
}
