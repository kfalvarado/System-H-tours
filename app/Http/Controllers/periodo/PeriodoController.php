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
        /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post(
                $this->url . '/permisos/sel_per_obj',
                [
                    "PV_ROL" => Cache::get('rol'),
                    "PV_OBJ" => "PERIODO"
                ]
            );

            $permisos = $search->json();
            $consultar = 0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Periodo 21';
        }

        if (
            $consultar == '1'
        ) {
            try {
                //code...
                $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');

                $personArr = $periodo->json();
                $incrementable = http::withToken(Cache::get('token'))->get($this->url . '/incrementable');
                $incrementable = $incrementable->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error periodo 22';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO GET',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE PERIODO',
                    "OBJETO" => 'PERIODO'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 32';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ACCESO NO AUTORIZADO PERIODO METODO GET',
                "DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE ROLES',
                "OBJETO" => 'PERIODO'
            ]);
            return view('Auth.no-auth');
        }


        return view('periodo.periodo', compact('personArr', 'incrementable'));
    }

    /**
     * Metodo para insertar un periodo
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
                "PV_OBJ" => "PERIODO"
            ]);

            $permisos = $search->json();
            $insercion = 0;
            foreach ($permisos as $key) {
                $insercion = $key['PER_INSERCION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Periodo 21';
        }
        if ($insercion == '1') {
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
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO POST',
                    "DES" => Cache::get('user') . ' INSERTO EL DATO DE ' . $request->periodo . ' EN LA PANTALLA DE PERIODO',
                    "OBJETO" => 'PERIODO'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 32';
            }
            Session::flash('insertado', '1');
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO POST',
                    "DES" => Cache::get('user') . ' INTENTO INSERTAR EL DATO ' . $request->periodo . ' EN LA PANTALLA DE PERIODO',
                    "OBJETO" => 'PERIODO'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 32';
            }
        }




        return back();
    }

    /**
     * Metodo para actualizar un periodo
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
                "PV_OBJ" => "PERIODO"
            ]);

            $permisos = $search->json();
            $update = 0;
            foreach ($permisos as $key) {
                $update = $key['PER_ACTUALIZACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Periodo 21';
        }
        if ($update == '1') {
            try {
                //code...
              
                if ($request->estado == 'ACTIVO') {
                    # code...
                    $actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/periodo/actualizar/' . $request->f, [
                        "USUARIO" => Cache::get('user'),
                        "NOM_PERIODO" => $request->periodo,
                        "FEC_INI" => $request->inicial,
                        "FEC_FIN" => $request->final,
                        "ESTADO" => $request->estado
                    ]);
                }else {
                    # code...
                    $actualizar = Http::withToken(Cache::get('token'))->put($this->url . '/periodo/actualizar/' . $request->f, [
                        "USUARIO" => Cache::get('user'),
                        "NOM_PERIODO" => $request->periodo,
                        "FEC_INI" => $request->inicial,
                        "FEC_FIN" => $request->final,
                        "ESTADO" => 'CERRADO'
                    ]);
                }
                

            } catch (\Throwable $th) {
                //throw $th;
                return 'error periodo 50';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'ACTUALIZO UN DATO EN PANTALLA ',
                    "DES" => Cache::get('user') . ' ACTUALIZO EL DATO DE ' . $request->periodo . ' EN LA PANTALLA DE PERIODO',
                    "OBJETO" => 'PERIODO'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 32';
            }
            Session::flash('actualizado', '1');
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO PUT',
                    "DES" => Cache::get('user') . ' INTENTO ACTUALIZAR EL DATO ' . $request->periodo . ' EN LA PANTALLA DE PERIODO',
                    "OBJETO" => 'PERIODO'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 32';
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
                "PV_OBJ" => "PERIODO"
            ]);

            $permisos = $search->json();
            $eliminacion = 0;
            foreach ($permisos as $key) {
                $eliminacion = $key['PER_ELIMINACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error Periodo 21';
        }

        if ($eliminacion == '1') {


            try {
                $delete = Http::withToken(Cache::get("token"))->delete($this->url . '/periodo/eliminar/' . $request->f);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 250';
            }


            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'ELIMINO UN DATO',
                    "DES" => Cache::get('user') . ' ELIMINO EL DATO CON CODIGO ' . $request->f . ' EN LA PANTALLA DE PERIODO',
                    "OBJETO" => 'PERIODO'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 250';
            }


            Session::flash('eliminado', '1');
        } else {
            # code...
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO DELETE',
                    "DES" => Cache::get('user') . ' INTENTO ELIMININAR EL DATO  con codigo' . $request->f . ' EN LA PANTALLA DE PERIODO',
                    "OBJETO" => 'PERIODO'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 268';
            }
        }

        return back();
    }


    /*
    ======================================
    Pantalla PDF de Periodo
    ======================================
    */
    public function mostrarPDF()
    {
        $periodo = http::withToken(Cache::get('token'))->get($this->url . '/periodo');

        $periodo = $periodo->json();
        return view('periodo.periodoPDF', compact('periodo'));
    }
}
