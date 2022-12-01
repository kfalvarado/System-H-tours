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
        $ajustes = http::withToken(Cache::get('token'))->post($this->url.'/personas/usuarios',[
               
            "USER"=>Cache::get('user')
            
        ]);
        //return $ajustes;
        $ajustesArr = $ajustes->json();

        try {
            $bitacora = Http::withToken(Cache::get('token'))->post($this->url . '/seguridad/bitacora/insertar', [
                "USR" => Cache::get('user'),
                "ACCION" => 'PANTALLA AJUSTES METODO GET',
                "DES" => Cache::get('user') . ' INGRESO A LA PANTALLA DE AJUSTES',
                "OBJETO" => 'AJUSTES'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return 'ERROR AJUSTES BITACORA';
        }

       return view('config.ajustes',compact('ajustesArr'));
    }

    
    
    public function actualizar_usr( Request $req)
    {
        //return $req;
        $nom_usr = http::withToken(Cache::get('token'))->put($this->url.'/upd_nom_usr',[
            "COD" => $req->COD,
            "NOM_USR" => $req->NOM_USR
        ]);
        
          
        $ajustes = http::withToken(Cache::get('token'))->put($this->url.'/personas/actualizar/'.$req->COD_PERSONA,[
               
            "USUARIO"=> Cache::get('user'),
            "SEX_PERSONA"=>$req->SEX_PERSONA,
            "EDA_PERSONAL"=> $req->EDA_PERSONAL,
            "TIP_PERSONA"=>$req->TIP_PERSONA,
            "Num_Identidad"=>$req->NUM_IDENTIDAD,
            "IND_CIVIL"=>$req->IND_CIVIL,
            "TELEFONO"=>$req->TELEFONO,
            "TIP_TELEFONO"=>$req->TIP_TELEFONO

        ]);


        $correo_usr = http::withToken(Cache::get('token'))->put($this->url.'/upd_correo_usr',[
            "COD" => $req->COD,
            "CORREO" => $req->CORREO
        ]);


        //return $ajustes;
        Session::flash("actualizado_usr","1");
        return back();
    }



    public function actualizar( Request $req ){
       
        $mod_contra = http::withToken(Cache::get('token'))->put($this->url.'/mod_contra_usr',[
           
            "CONTRA_ACTUAL" => md5($req->CONTRA_ACTUAL),
            "CONTRASEGNA" => md5($req->CONTRASEGNA),
            "USR"=>Cache::get('user')
        ]);
        //return $mod_contra;
        $CONTRA_INCORRECTA = strrpos($mod_contra, "INCORRECTA");
        if ($CONTRA_INCORRECTA > 0 ){
            Session::flash("contra_actual_incorrecta","1");
            return back();
        }
    Session::flash("actualizado_contra","1");
    return back();
    }



}
