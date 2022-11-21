<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
class RolesController extends Controller
{

    protected $url = 'http://localhost:3000/roles';

    public function mostrar()
    {
        $rols = http::withToken(Cache::get('token'))->get($this->url.'/sel_rol');
        //return $rols;
        $rolsArr = $rols->json();
        return view('roles.roles',compact('rolsArr'));
    }

    public function actualizar( Request $req)
    {
        $usr = http::withToken(Cache::get('token'))->put($this->url.'/upd_rol',[
            
                "COD_ROL" => $req->COD_ROL,
                "ROL" => $req->ROL,
                "DES_ROL" => $req->DES_ROL
        ]);
        Session::flash("actualizado","1");
        return back();
    }

}
