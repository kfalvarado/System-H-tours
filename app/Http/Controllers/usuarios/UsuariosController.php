<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;


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
        return view('usuarios.usuarios',compact('usrArr','usr_rol_Arr'));
    }


  /*   public function insertar( Request $req)
    {
        return $req;
    } */

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
        return back();
    }

}
