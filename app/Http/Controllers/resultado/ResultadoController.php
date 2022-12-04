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
        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "RESULTADOS"
            ]);

            $permisos = $search->json();
            $consultar = 0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error RESULTADOS 19';
        }

        if ( $consultar == '1') {
            try {
                $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
                $periodo = $periodo->json();
                $resultado = [];
            } catch (\Throwable $th) {
                //throw $th;
                return 'error RESULTADOS 41';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA RESULTADOS METODO GET',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE RESULTADOS',
                    "OBJETO" => 'RESULTADOS'
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'ERROR RESULTADOS ';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ACCESO NO AUTORIZADO RESULTADOS METODO GET',
                "DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE RESULTADOS',
                "OBJETO" => 'RESULTADOS'
            ]);
            return view('Auth.no-auth');
        }
        return view("resultado.Resultado", compact('periodo', 'resultado'));
    }

    public function insertar(Request $request)
    {
        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "RESULTADOS"
            ]);

            $permisos = $search->json();
            $consultar = 0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error RESULTADOS 19';
        }

        if ( $consultar == '1') {
            try {
                //  return $request->periodo;
                $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
                $periodo = $periodo->json();

                $resultado = http::withToken(Cache::get('token'))->post($this->url . '/resultado', [
                    "PERIODO" => $request->periodo
                ]);
                $resultado = $resultado->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error RESULTADOS 41';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA RESULTADOS METODO GET',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE RESULTADOS',
                    "OBJETO" => 'RESULTADOS'
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'ERROR RESULTADOS ';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ACCESO NO AUTORIZADO RESULTADOS METODO GET',
                "DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE RESULTADOS',
                "OBJETO" => 'RESULTADOS'
            ]);
            return view('Auth.no-auth');
        }
        $pdf =  $request->periodo;
        return view("resultado.Resultado", compact('periodo', 'resultado','pdf'));
    }

    public function pdf(Request $request)
    {
      
        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "RESULTADOS"
            ]);

            $permisos = $search->json();
            $consultar = 0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error RESULTADOS 19';
        }

        if ( $consultar == '1') {
            try {
                //  return $request->periodo;
                $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');
                $periodo = $periodo->json();
           

                $resultado = http::withToken(Cache::get('token'))->post($this->url . '/resultado', [
                    "PERIODO" => $request->periodo
                ]);
                $resultado = $resultado->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error RESULTADOS 41';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA RESULTADOS METODO GET',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE RESULTADOS',
                    "OBJETO" => 'RESULTADOS'
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'ERROR RESULTADOS ';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ACCESO NO AUTORIZADO RESULTADOS METODO GET',
                "DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE RESULTADOS',
                "OBJETO" => 'RESULTADOS'
            ]);
            return view('Auth.no-auth');
        }
        return view("resultado.resultadoPDF", compact('periodo', 'resultado'));
    }
}
