<?php

namespace App\Http\Controllers\periodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
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

    public function insertar(Request $request)
    {
        try {
            $insertar = Http::withToken(Cache::get('token'))->post($this->url . '/periodo/insertar', [
                "USR" => Cache::get('user'),
                "NOM_PERIODO" => $request->periodo,
                "FEC_INI" => $request->inicial,
                "FEC_FIN" => $request->final,
                "ESTADO" => $request->estado
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error periodo 31';
        }
        Session::flash('insertado', '1');
        return back();
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
