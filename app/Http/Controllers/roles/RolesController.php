<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
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
                "PV_OBJ" => "ROLES"
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

        if ($consultar == '1') {
            try {
                $rols = http::withToken(Cache::get('token'))->get($this->url . '/roles/sel_rol');
                //return $rols;
                $rolsArr = $rols->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error ROLES 43';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA ROLES METODO GET',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE ROLES',
                    "OBJETO" => 'ROLES'
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'ERROR ROLES BITACORA';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ACCESO NO AUTORIZADO ROLES METODO GET',
                "DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE ROLES',
                "OBJETO" => 'ROLES'
            ]);
            return view('Auth.no-auth');
        }

        return view('roles.roles', compact('rolsArr'));
    }


    public function insertar(Request $req)
    {
        /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "ROLES"
            ]);

            $permisos = $search->json();
            $insercion = 0;
            foreach ($permisos as $key) {
                $insercion = $key['PER_INSERCION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error ROLES 21';
        }
        if ($insercion == '1') {
            try {
                //return $req;
                $rols = http::withToken(Cache::get('token'))->post($this->url . '/roles/ins_rol', [

                    "ROL" => $req->ROL,
                    "DES_ROL" => $req->DES_ROL
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error ROL 99';
            }
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA METODO POST',
                    "DES" => Cache::get('user') . ' INSERTO EL DATO DE ' . $req->ROL . ' EN LA PANTALLA DE ROLES',
                    "OBJETO" => 'ROLES'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error ROLES 32';
            }
            Session::flash("insertado", "1");
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO POST',
                    "DES" => Cache::get('user') . ' INTENTO INSERTAR EL DATO ' . $req->ROL . ' EN LA PANTALLA DE ROLES',
                    "OBJETO" => 'ROLES'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error ROLES 123';
            }
        }

        return back();
    }

    public function actualizar(Request $req)
    {
        /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "ROLES"
            ]);

            $permisos = $search->json();
            $update = 0;
            foreach ($permisos as $key) {
                $update = $key['PER_ACTUALIZACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error ROLES 149';
        }
        if ($update == '1') {
            try {
                $rols = http::withToken(Cache::get('token'))->put($this->url . '/roles/upd_rol', [

                    "ROL" => $req->ROL,
                    "DES_ROL" => $req->DES_ROL,
                    "FILA" => $req->COD_ROL
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'error ROLES 164';
            }

            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'ACTUALIZO UN DATO EN PANTALLA ',
                    "DES" => Cache::get('user') . ' ACTUALIZO EL DATO DE ' . $req->ROL . ' EN LA PANTALLA DE ROLES',
                    "OBJETO" => 'ROLES'

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error ROLES 32';
            }
            Session::flash('actualizado', '1');
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO PUT',
                    "DES" => Cache::get('user') . ' INTENTO ACTUALIZAR EL DATO ' . $req->ROL . ' EN LA PANTALLA DE ROLES',
                    "OBJETO" => 'ROLES'

                ]);

                Session::flash('sinpermiso', '1');
            } catch (\Throwable $th) {
                //throw $th;
                return 'Error ROLES 32';
            }
        }
        //return $rols;

        return back();
    }

    public function pdf()
    {
        $rols = http::withToken(Cache::get('token'))->get($this->url . '/roles/sel_rol');
        //return $rols;
        $rolsArr = $rols->json();

        return view('roles.rolespdf',compact('rolsArr'));

    }
}
