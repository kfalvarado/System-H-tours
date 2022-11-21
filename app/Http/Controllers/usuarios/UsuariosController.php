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
        $usr = http::withToken(Cache::get('token'))->get($this->url.'/sel_usr');
        $usr_rol = http::withToken(Cache::get('token'))->get($this->url.'/roles/sel_rol');
        //return $usr;
        $usrArr = $usr->json();
        $usr_rol_Arr = $usr_rol->json();
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


        return view('usuarios.usuarios',compact('usrArr','usr_rol_Arr'));

    }


  
    public function actualizar( Request $req)
    {
        $usr = http::withToken(Cache::get('token'))->put($this->url.'/upd_usr',[
            
                "USR" => $req->USUARIO,
                "NOM_USR" => $req->NOMBRE_USUARIO,
                "EST_USR" => $req->ESTADO,
                "COD_ROL" => $req->ROL,
                "CORREO" => $req->CORREO,
                "FILA" => $req->COD_USR
        ]);
        Session::flash("actualizado","1");
        return back();
    }

}
