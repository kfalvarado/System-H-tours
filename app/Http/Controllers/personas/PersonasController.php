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

        $personas = Http::withToken(Cache::get('token'))->get($this->url.'/personas');

        $personasArray = $personas->json();
    
        return view('personas.personas',compact('personasArray'));
    }

    /**
     * Funcion de primer accrso aqui se va a cambiar la contraseña y se cambiar el estado
     * a activo
     */
    public function primeracceso(Request $request)
    {  
        //recuperar el token de sesion
        $token = Cache::get('token');
         //cambiar Contraseña
         $pass = md5($request->password1); //encriptado de contraseña
         $password = Http::withToken($token)->post($this->url . '/seguridad/estusr/pass', [
             "USER" => Cache::get('user'),
             "PASS"=> $pass
         ]);
         $matchpass = strrpos($password, "INGRESAR LA MISMA");
 
       
         if ($matchpass > 0) {
             Session::flash('misma','No puedes ingresar tu misma contraseña');
             return view('home.personas');
         }

        //si lo anterior sale bien se ejecuta lo demas
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
        
        return redirect()->route('home');
    }

    
}
