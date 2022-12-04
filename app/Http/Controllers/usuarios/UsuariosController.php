<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class UsuariosController extends Controller
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
                "PV_OBJ" => "USUARIOS"
            ]);

            $permisos = $search->json();
            $consultar=0;
            foreach ($permisos as $key) {
                $consultar = $key['PER_CONSULTAR'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error rol 24';
        }

        if ($consultar == '1') {
            try {
                $usr = http::withToken(Cache::get('token'))->get($this->url . '/sel_usr');
                $usr_rol = http::withToken(Cache::get('token'))->get($this->url . '/roles/sel_rol');
                //return $usr;
                $usrArr = $usr->json();
                $usr_rol_Arr = $usr_rol->json();
            } catch (\Throwable $th) {
                //throw $th;
                return 'error USUARIOS 43';
            }
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'PANTALLA USUARIOS METODO GET',
                    "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE USUARIOS',
                    "OBJETO" => 'USUARIOS'
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                return 'ERROR USUARIOS BITACORA';
            }
        } else {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'ACCESO NO AUTORIZADO USUARIOS METODO GET',
                "DES" => Cache::get('user') . ' INTENTO INGRESAR A LA PANTALLA DE USUARIOS',
                "OBJETO" => 'USUARIOS'
            ]);
            return view('Auth.no-auth');
        }





        return view('usuarios.usuarios',compact('usrArr','usr_rol_Arr'));

    }

    public function actualizar( Request $req)
    {
         /**
         * Seguridad de roles y perimisos metodo GET
         */

        try {
            //code...
            $search = Http::withToken(Cache::get('token'))->post($this->url . '/permisos/sel_per_obj', [
                "PV_ROL" => Cache::get('rol'),
                "PV_OBJ" => "USUARIOS"
            ]);

            $permisos = $search->json();
            foreach ($permisos as $key) {
                $update = $key['PER_ACTUALIZACION'];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error USUARIOS 90';
        }
        if ($update == '1') {
            try {
        $usr = http::withToken(Cache::get('token'))->put($this->url.'/upd_usr',[
            
                "USR" => $req->USUARIO,
                "NOM_USR" => $req->NOMBRE_USUARIO,
                "EST_USR" => $req->ESTADO,
                "COD_ROL" => $req->ROL,
                "CORREO" => $req->CORREO,
                "FILA" => $req->COD_USR
        ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'error USUARIOS 164';
        }


        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'PANTALLA USUARIOS METODO POST',
                "DES" => Cache::get('user') . ' ACTUALIZO UN USUARIO A '. $req->USUARIO,
                "OBJETO" => 'USUARIOS'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'ERROR USUARIOS BITACORA';
        }
        Session::flash("actualizado","1");
        } else {
            try {
                $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                    "USR" => Cache::get('user'),
                    "ACCION" => 'SIN PERMISO METODO PUT',
                    "DES" => Cache::get('user') . ' INTENTO ACTUALIZAR EL DATO ' . $req->USUARIO . ' EN LA PANTALLA DE USUARIOS',
                    "OBJETO" => 'USUARIOS'

                ]);

            Session::flash('sinpermiso', '1');
        } catch (\Throwable $th) {
            //throw $th;
            return 'Error ROLES 32';
        }
        }

            return back();
    }
    
    
   public function crearPDF()
   {
    $usr = http::withToken(Cache::get('token'))->get($this->url.'/sel_usr');
    $usrArr = $usr->json();
    return view('usuarios.usuariospdf',compact('usrArr'));
   }


}


