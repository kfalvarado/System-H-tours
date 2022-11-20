<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class ConfigsController extends Controller
{

    protected $url = 'http://localhost:3000';

    public function mostrar()
    {
       return view('config.ajustes');
    }

    public function actualizar( Request $req ){
       
        $mod_contra = http::withToken(Cache::get('token'))->put($this->url.'/mod_contra_usr',[
           
            "CONTRA_ACTUAL" => md5($req->CONTRA_ACTUAL),
            "CONTRASEGNA" => md5($req->CONTRASEGNA),
            "USR"=>Cache::get('user')
    ]);
    $CONTRA_INCORRECTA = strrpos($mod_contra, "CONTRASEÑA INCORRECTA");
    if ($CONTRA_INCORRECTA > 0 ){
        Session::flash("contra_actual_incorrecta","1");
        return back();
    }
    Session::flash("actualizado","1");
    return back();
    }



}
