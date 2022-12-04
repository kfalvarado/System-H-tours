<?php

namespace App\Http\Controllers\subcuentas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;


class SubcuentasController extends Controller
{

    protected $url = 'http://localhost:3000';
    public function ver()
    {
        /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "SUBCUENTAS"
            ]);

            $permisos = $search->json();
            $consultar = 0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error SUBCUENTAS 21';
        }

        if ($consultar == '1') {
            try {
                $subcuentas = http::withToken(Cache::get('token'))->get($this->url . '/subcuentas');
                $personArr = $subcuentas->json();
                //clasificacion
                $clasificacion = http::withToken(Cache::get('token'))->get($this->url . '/clasificacion');
                $clasificacionArr = $clasificacion->json();
                //nombre de cuenta
                $nombrecuenta = http::withToken(Cache::get('token'))->get($this->url . '/cuentas');
                $nombrecuentaArr = $nombrecuenta->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error periodo 22';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA SUBCUENTAS CONSULTA',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE SUBCUENTAS',
                    "OBJETO" => 'SUBCUENTAS'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 32';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'INTENTO FALLIDO CONSULTA',
                "DES" => Cache::get('user') . 'INTENTO INGRESAR A LA PANTALLA DE SUBCUENTAS Y LEER DATOS',
                "OBJETO" => 'SUBCUENTAS'
            ]);
            return view('Auth.no-auth');
        }
        return view('subcuentas.subcuentas', compact('personArr', 'clasificacionArr', 'nombrecuentaArr'));
    }
    public function busca(Request $req)
    {
        $clasificacion = http::withToken(Cache::get('token'))->post($this->url . '/clasificacion/cuentas', [
            "NATURALEZA" => $req->NATURALEZA
        ]);

        return $clasificacion;
    }

    public function buscaedit(Request $req)
    {

        $clasificacion = http::withToken(Cache::get('token'))->post($this->url . '/clasificacion/cuentas/id', [
            "NATURALEZA" => $req->NATURALEZA
        ]);

        return $clasificacion;
    }

    /**
     * Metodo para insertar una subcuenta
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
                "PV_OBJ" => "SUBCUENTAS"
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

                $insertar =  Http::withToken(Cache::get('token'))->post(
                    $this->url . '/subcuentas/insertar',
                    [
                        "CLASIFICACION" => $request->naturaleza,
                        "NUM_SUBCUENTA" => $request->numerosubcuenta,
                        "NOM_SUBCUENTA" => $request->nombresubcuenta,
                        "NOM_CUENTA" => $request->nombrecuenta
                    ]
                );
                Session::flash('insertado', "1");
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error SUBCUENTAS 31';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA SUBCUENTAS METODO DE INSERCION',
                    "DES" => Cache::get('user') . ' INSERTO EL DATO DE ' . $request->nombrecuenta . ' EN LA PANTALLA DE SUBCUENTAS',
                    "OBJETO" => 'SUBCUENTAS'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error SUBCUENTAS 32';
            }
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO INSERCION',
                    "DES" => Cache::get('user') . ' INTENTO INSERTAR EL DATO ' . $request->nombrecuenta . ' EN LA PANTALLA DE SUBUENTAS',
                    "OBJETO" => 'SUBCUENTAS'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error SUBCUENTAS 32';
            }
        }
        return back();
    }


    /**
     * Metodo para insertar una subcuenta
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
                "PV_OBJ" => "SUBCUENTAS"
            ]);

            $permisos = $search->json();
            $update = 0;
            foreach ($permisos as $key) {
                $update = $key['PER_ACTUALIZACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error SUBCUENTAS 21';
        }
        if ($update == '1') {
            try {
                $actualizar = Http::withToken(Cache::get('token'))->put(
                    $this->url . '/subcuentas/actualizar/' . $request->f,
                    [
                        "NUM_SUBCUENTA" =>  $request->numerosubcuenta,
                        "NOM_SUBCUENTA" => $request->nombresubcuenta,
                        "NOM_CUENTA" =>  $request->nombrecuenta,


                    ]
                );
                Session::flash('actualizado', "1");
            } catch (\Throwable $th) {
                //throw $th;
                return 'error SUBCUENTAS 50';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'ACTUALIZO UN DATO EN PANTALLA ',
                    "DES" => Cache::get('user') . ' ACTUALIZO EL DATO DE ' . $request->cuenta . ' EN LA PANTALLA DE SUBCUENTAS',
                    "OBJETO" => 'SUBCUENTAS'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error SUBCUENTAS 32';
            }
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO PUT',
                    "DES" => Cache::get('user') . ' INTENTO ACTUALIZAR EL DATO ' . $request->cuenta . ' EN LA PANTALLA DE SUBCUENTAS',
                    "OBJETO" => 'SUBCUENTAS'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error SUBCUENTAS 32';
            }
        }
        return back();
    }

    public function eliminar(Request $request)
    {
        /**
         * Seguridad de roles y perimisos metodo delete
         */
        // return $request;
        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "SUBCUENTAS"
            ]);

            $permisos = $search->json();
            $eliminacion = 0;
            foreach ($permisos as $key) {
                $eliminacion = $key['PER_ELIMINACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error SUBCUENTAS 21';
        }

        if ($eliminacion == '1') {
            $respuesta = 0;
            try {
                // return $request;
                $eliminar = Http::withToken(Cache::get('token'))->delete(
                    $this->url . '/subcuentas/eliminar/' . $request->f
                );

                $respuesta = strrpos($eliminar, ' NO SE PUEDE ELIMINAR');
                if ($respuesta > 0) {
                    Session::flash('nopuedes', "1");
                    $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                        "USR" => Cache::get('user'),
                        "ACCION" => 'SE INTENTO ELIMINAR SUBCUENTAS EN USO',
                        "DES" => Cache::get('user') . ' INTENTO ELIMININAR EL DATO  con codigo' . $request->f . ' EN LA PANTALLA DE SUBCUENTAS',
                        "OBJETO" => 'SUBCUENTAS'

                    ]);
                    return back();
                }
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error SUBCUENTAS 250';
            }

            Session::flash('eliminado', "1");
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ELIMINACION DE SUBCUENTAS',
                "DES" => Cache::get('user') . '  ELIMININO EL DATO  con codigo' . $request->f . ' EN LA PANTALLA DE SUBCUENTAS',
                "OBJETO" => 'SUBCUENTAS'

            ]);
        } else {
            # code...
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO DELETE',
                    "DES" => Cache::get('user') . ' INTENTO ELIMININAR EL DATO  con codigo' . $request->f . ' EN LA PANTALLA DE SUBCUENTAS',
                    "OBJETO" => 'CUENTAS'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error periodo 268';
            }
        }
        return back();
    }

    public function pdf()
    {
        $subcuentas = http::withToken(Cache::get('token'))->get($this->url . '/catalago/subcuentas');
        $subcuenta = $subcuentas->json();
    
        return view('subcuentas.subcuentasPDF', compact('subcuenta'));
    }
}
