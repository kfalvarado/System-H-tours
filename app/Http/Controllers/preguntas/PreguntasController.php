<?php

namespace App\Http\Controllers\preguntas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use PhpParser\Builder\Function_;

class PreguntasController extends Controller
{

    protected $url = 'http://localhost:3000';

    public function mostrar()
    {

        if(Cache::get('rol')=='Administrador'){
            $preg = http::withToken(Cache::get('token'))->get($this->url.'/sel_preg');
            //return Cache::get('rol');
            $pregArr = $preg->json();
        }else{
            $preg = http::withToken(Cache::get('token'))->post($this->url.'/sel_usr_preg',[
                
                    "USR" => Cache::get('user')
                 
            ]);
            //return Cache::get('rol');
            $pregArr = $preg->json();
        }

        return view('preguntas.preguntas',compact('pregArr'));
    }


    public function actualizar( Request $req ){
       
        $usr = http::withToken(Cache::get('token'))->put($this->url.'/upd_preg_res',[
           
            "PREGUNTA" => $req->PREGUNTA,
            "RESPUESTA" => $req->RESPUESTA,
            "FILA" => $req->COD_USR
    ]);
    Session::flash("actualizado","1");
    return back();
    }

}
