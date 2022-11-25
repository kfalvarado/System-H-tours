<?php

namespace App\Http\Controllers\cuentas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CuentasController extends Controller
{
    
    protected $url = 'http://localhost:3000';
    public function ver()
    {
        $cuentas = http::withToken(Cache::get('token'))->get($this->url.'/cuentas');
        $personArr = $cuentas->json();
       //clasificacion
        $clasificacion = http::withToken(Cache::get('token'))->get($this->url.'/clasificacion');
        $clasificacionArr = $clasificacion->json();
        //grupos
        $grupos = http::withToken(Cache::get('token'))->get($this->url.'/grupos');
        $gruposArr = $grupos->json();

        return view('cuentas.cuentas',compact('personArr','clasificacionArr','gruposArr'));
    }

    /**
     * Metodo para insertar una cuenta
     */
    public function insertar(Request $request)
    {
        $insertar =  Http::withToken(Cache::get('token'))->post(
            $this->url . '/cuentas/insertar',
            [
                "CLASIFICACION" => $request->naturaleza,
                "NOMBRE" => $request->nombrecuenta,
                "CORRELATIVO" => $request->numerocuenta,
                "GRUPO" => $request->grupo
            ]
        );
        Session::flash('insertado', "1");
        return back();
    }

    /**
     * Metodo para actualizar una cuenta
     */
    public function actualizar(Request $request)
    {
        // return $request;
        $actualizar = Http::withToken(Cache::get('token'))->put(
            $this->url . '/cuentas/actualizar/' . $request->f,
            [
                "CLASIFICACION" => $request->naturaleza,
                "NOMBRE" => $request->numero,
                "NUM" => $request->cuenta

            ]
        );
        Session::flash('actualizado', "1");
        return back();
    }


       /**
     * Metodo para eliminar una cuenta
     */
    public function eliminar(Request $request)
    {

        $eliminar=Http::withToken(Cache::get('token'))->delete($this->url.'/cuentas/eliminar/'.$request->f,[




        ]
        );
        Session::flash('eliminado',"1");
        return back();


    }

    public function mostrarPDF()
    {
        $cuentas = http::withToken(Cache::get('token'))->get($this->url.'/cuentas');
        $cuentas = $cuentas->json();

        return view('cuentas.cuentasPDF',compact('cuentas'));
    }
}