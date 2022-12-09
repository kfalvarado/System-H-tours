<?php

namespace App\Http\Controllers\bitacoras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class BitacoraController extends Controller
{

    protected $url = 'http://localhost:3000';

    public function mostrar()
    {
        /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "BITACORAS"
            ]);
         
            $permisos = $search->json();
            $consultar = 0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error rol 24';
        }
        if ( $consultar == '1') {
            try {

                $bitacora = http::withToken(Cache::get('token'))->get($this->url . '/seguridad/sel_bitacora');
                //return $bitacora;
                $bitacoraArr = $bitacora->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error ROLES 43';
            }




            try {
                // $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                //     "USR" => Cache::get('user'),
                //     "ACCION" => 'PANTALLA ROLES METODO GET',
                //     "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE BITACORAS',
                //     "OBJETO" => 'BITACORAS'
                // ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'ERROR  BITACORA';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ACCESO NO AUTORIZADO ROLES METODO GET',
                "DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE BITACORAS',
                "OBJETO" => 'BITACORAS'
            ]);
            return view('Auth.no-auth');
        }
        return view('Bitacoras.bitacoras', compact('bitacoraArr'));
    }
    public function pdf()
    {
        $bitacora = http::withToken(Cache::get('token'))->get($this->url . '/seguridad/sel_bitacora');
        //return $bitacora;
        $bitacoraArr = $bitacora->json();

        return view('Bitacoras.bitacoraspdf', compact('bitacoraArr'));
    }
}
