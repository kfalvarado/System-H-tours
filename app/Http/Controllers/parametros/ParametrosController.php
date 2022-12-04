<?php

namespace App\Http\Controllers\parametros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ParametrosController extends Controller
{

    /*
    ======================================
    Pantalla de inicio HOME
    ======================================
    */
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
                "PV_OBJ" => "PARAMETROS"
            ]);

            $permisos = $search->json();
            $consultar = 0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Parametros 21';
        }

        if ( $consultar == '1') {
            try {
                //code...
                $parametros = http::withToken(Cache::get('token'))->get($this->url . '/parametros');

                $personArr = $parametros->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error parametros 22';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO GET',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE PARAMETROS',
                    "OBJETO" => 'PARAMETROS'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 32';
            }
        } else {
            return view('Auth.no-auth');
        }


        return view('parametro.parametros', compact('personArr'));
    }

    /**
     * Metodo para insertar un parametro
     */
    public function insertar(Request $request)
    {
        /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "PARAMETROS"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $insercion = $key['PER_INSERCION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Parametros 21';
        }
        if ( $insercion  == '1') {
            try {
                $insertar = Http::withToken(Cache::get('token'))->post($this->url . '/parametros/insertar', [

                    "PARAMETRO" => $request->parametros,
                    "VALOR" => $request->valor,
                    "USR" => Cache::get('user'),
                    "FEC_CREACION" => $request->inicial
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 31';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO POST',
                    "DES" => Cache::get('user') . ' INSERTO EL DATO DE ' . $request->parametros . ' EN LA PANTALLA DE PARAMETROS',
                    "OBJETO" => 'PARAMETROS'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 32';
            }
            Session::flash('insertado', '1');
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO POST',
                    "DES" => Cache::get('user') . ' INTENTO INSERTAR EL DATO ' . $request->parametros . ' EN LA PANTALLA DE PARAMETROS',
                    "OBJETO" => 'PARAMETROS'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 32';
            }
        }




        return back();
    }

    /**
     * Metodo para actualizar un parametro
     */

    public function actualizar(Request $request)
    {

        /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "PARAMETROS"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $update = $key['PER_ACTUALIZACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Parametro 21';
        }
        if (  $update == '1') {
            try {
                //code...
                $actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/parametros/actualizar/' . $request->f, [

                    "PARAMETRO" => $request->parametro,
                    "VALOR" => $request->valor,
                    "USR" => Cache::get('user'),
                    "FEC_CREACION" => $request->creacion,
                    "FEC_MODIFICACION" => $request->modificacio
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'error parametros 50';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'ACTUALIZO UN DATO EN PANTALLA ',
                    "DES" => Cache::get('user') . ' ACTUALIZO EL DATO DE ' . $request->parametros . ' EN LA PANTALLA DE PARAMETROS',
                    "OBJETO" => 'PARAMETROS'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 32';
            }
            Session::flash('actualizado', '1');
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO PUT',
                    "DES" => Cache::get('user') . ' INTENTO ACTUALIZAR EL DATO ' . $request->parametros . ' EN LA PANTALLA DE PARAMETROS',
                    "OBJETO" => 'PARAMETROS'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 32';
            }
        }
        return back();
    }

    public function eliminar(Request $request)
    {

        /**
         * Seguridad de roles y perimisos metodo delete
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "PARAMETROS"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $eliminacion = $key['PER_ELIMINACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Parametros 21';
        }

        if ( $eliminacion == '1') {



            $delete = Http::withToken(Cache::get("token"))->delete($this->url . '/parametros/eliminar/' . $request->f);


            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'ELIMINO UN DATO',
                    "DES" => Cache::get('user') . ' ELIMINO EL DATO CON CODIGO ' . $request->f . ' EN LA PANTALLA DE PARAMETROS',
                    "OBJETO" => 'PARAMETROS'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 250';
            }


            Session::flash('eliminado', '1');
        } else {
            # code...
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO DELETE',
                    "DES" => Cache::get('user') . ' INTENTO ELIMININAR EL DATO  con codigo' . $request->f . ' EN LA PANTALLA DE PARAMETROS',
                    "OBJETO" => 'PARAMETROS'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error parametros 268';
            }
        }

        return back();
    }


    /*
    ======================================
    Pantalla PDF de Parametros
    ======================================
    */
    public function mostrarPDF()
    {
        $parametros = http::withToken(Cache::get('token'))->get($this->url . '/parametros');

        $parametros = $parametros->json();
        return view('parametro.parametrosPDF',compact('parametros'));
    }
}
