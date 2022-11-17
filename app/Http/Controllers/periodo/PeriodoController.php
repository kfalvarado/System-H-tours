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
        try {
            //code...
            $periodo = http::withToken(Cache::get('token'))->get($this->url.'/periodo');
            
            $personArr = $periodo->json();
        } catch (\Throwable $th) {
            //throw $th;
            return 'error periodo 22';
        }

        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url.'/seguridad/bitacora/insertar',[
                "USR"=> Cache::get('user'),
                "ACCION"=> 'PANTALLA METODO GET',
                "DES"=> Cache::get('user').' INGRESO A LA PANTALLA DE PERIODO',
                "OBJETO"=> 'PERIODO'

            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error periodo 32';
        }
      

        return view('periodo.periodo',compact('personArr'));
    }

    /**
     * Metodo para insertar un periodo
     */
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

        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url.'/seguridad/bitacora/insertar',[
                "USR"=> Cache::get('user'),
                "ACCION"=> 'PANTALLA METODO POST',
                "DES"=> Cache::get('user').' INSERTO EL DATO DE '.$request->periodo.' EN LA PANTALLA DE PERIODO',
                "OBJETO"=> 'PERIODO'

            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error periodo 32';
        }
      


        Session::flash('insertado', '1');
        return back();
    }

    /**
     * Metodo para actualizar un periodo
     */

    public function actualizar(Request $request)
    {
        try {
            //code...
            $actualizar = Http::withToken(Cache::get('token'))->put($this->url.'/periodo/actualizar/'.$request->f,[
                "USUARIO" => Cache::get('user'),
                "NOM_PERIODO" => $request->periodo,
                "FEC_INI" => $request->inicial,
                "FEC_FIN" => $request->final,
                "ESTADO" => $request->estado
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'error periodo 50';
        }

        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url.'/seguridad/bitacora/insertar',[
                "USR"=> Cache::get('user'),
                "ACCION"=> 'ACTUALIZO UN DATO EN PANTALLA ',
                "DES"=> Cache::get('user').' ACTUALIZO EL DATO DE '.$request->periodo.' EN LA PANTALLA DE PERIODO',
                "OBJETO"=> 'PERIODO'

            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error periodo 32';
        }
      


        Session::flash('actualizado','1');
        return back();
    }

    public function eliminar(Request $request)
    {
        $delete = Http::withToken(Cache::get("token"))->delete($this->url.'/periodo/eliminar/'.$request->f);


        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url.'/seguridad/bitacora/insertar',[
                "USR"=> Cache::get('user'),
                "ACCION"=> 'ELIMINO UN DATO',
                "DES"=> Cache::get('user').' ELIMINO EL DATO CON CODIGO '.$request->f.' EN LA PANTALLA DE PERIODO',
                "OBJETO"=> 'PERIODO'

            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error periodo 32';
        }
      

        Session::flash('eliminado','1');
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
