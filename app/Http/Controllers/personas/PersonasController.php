<?php

namespace App\Http\Controllers\personas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;



class PersonasController extends Controller
{
    protected  $url = 'http://localhost:3000';
    public function inicio()
    {
        return view('personas.personas');
    }
    public function primeracceso(Request $request)
    {  
        $token = Cache::get('token');
        $acceso = Http::withToken($token)->post($this->url . '/personas/insertar', [
            "USUARIO" => Cache::get('user') ,
            "SEX_PERSONA" => $request->genero,
            "EDA_PERSONAL" => $request->edad,
            "TIP_PERSONA" => $request->tipoPersona,
            "Num_Identidad" => $request->identidad,
            "IND_CIVIL" => $request->civil,
            "TELEFONO" => $request->telefono,
            "TIP_TELEFONO" => $request->tipotelefono
            
        ]);

        //actualizar el estado del usuario a Activo
        $estactivo = Http::withToken($token)->post($this->url . '/seguridad/estusr/actualizar', [
            "USER" => Cache::get('user')   
        ]);

        //cambiar Contraseña
        $pass = md5($request->password1); //encriptado de contraseña
        $estactivo = Http::withToken($token)->post($this->url . '/seguridad/estusr/pass', [
            "USER" => Cache::get('user'),
            "PASS"=> $pass
        ]);
        return redirect()->route('home');
    }
}
