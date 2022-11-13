<?php

namespace App\Http\Controllers\periodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PeriodoController extends Controller
{

    /*
    ======================================
    Pantalla de inicio HOME
    ======================================
    */
    protected $url = 'http://localhost:3000';
    public function mostrar()
    {
        $periodo = http::withToken(Cache::get('token'))->get($this->url.'/periodo');

        $personArr = $periodo->json();


        return view('periodo.periodo',compact('personArr'));
    }
    
     /*
    ======================================
    Pantalla PDF de Periodo
    ======================================
    */
    public function mostrarPDF()
    {
        return view('periodo.periodoPDF'); 
    }
}
