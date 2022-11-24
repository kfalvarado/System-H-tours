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
        $rols = http::withToken(Cache::get('token'))->get($this->url.'/roles/sel_rol');
        //return $rols;
        $rolsArr = $rols->json();

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

        return view('roles.roles',compact('rolsArr'));
    }


    public function insertar( Request $req)
    {
        //return $req;
        $rols = http::withToken(Cache::get('token'))->post($this->url.'/roles/ins_rol',[
               
                "ROL" => $req->ROL,
                "DES_ROL" => $req->DES_ROL
        ]);
        //return $rols;
        Session::flash("insertado","1");
        return back();
    }

    public function actualizar( Request $req)
    {
        $rols = http::withToken(Cache::get('token'))->put($this->url.'/roles/upd_rol',[
               
                "ROL" => $req->ROL,
                "DES_ROL" => $req->DES_ROL,
                "FILA" => $req->COD_ROL
        ]);
        //return $rols;
        Session::flash("actualizado","1");
        return back();
    }

}
