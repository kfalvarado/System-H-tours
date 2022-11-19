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
        try {
            //code...
            $personas = Http::withToken(Cache::get('token'))->get($this->url . '/personas');
            $usuarios = Http::withToken(Cache::get('token'))->get($this->url . '/personas/buscar/list_usuarios');
        } catch (\Throwable $th) {
            return 'Error persona 20';
        }

  
        $personasArray = $personas->json();
        $usuariosArray = $usuarios->json();

        return view('personas.personas', compact('personasArray', 'usuariosArray'));
    }

 

    public function insertar(Request $request)
    {

        try {
            //code...
            $acceso = Http::withToken(Cache::get('token'))->post($this->url . '/personas/insertar', [
                "USUARIO" => $request->user,
                "SEX_PERSONA" => $request->genero,
                "EDA_PERSONAL" => $request->edad,
                "TIP_PERSONA" => $request->tipoPersona,
                "Num_Identidad" => $request->identidad,
                "IND_CIVIL" => $request->civil,
                "TELEFONO" => substr($request->telefono, 4),
                "TIP_TELEFONO" => $request->tipotelefono
            ]);
        } catch (\Throwable $th) {
            return 'Error Personas 40';
        }
        Session::flash('insertado', '1');
        return back();
    }

    public function actualizar(Request $request)
    {
   
       try {
            //El procedimiento de Actualizar no funciona requiere revision
            $acceso = Http::withToken(Cache::get('token'))->post($this->url . '/personas/insertar/' . $request->cod, [
                "USUARIO" => $request->user,
                "SEX_PERSONA" => $request->genero,
                "EDA_PERSONAL" => $request->edad,
                "TIP_PERSONA" => $request->tipoPersona,
                "Num_Identidad" => $request->identidad,
                "IND_CIVIL" => $request->civil,
                "TELEFONO" => substr($request->telefono, 4),
                "TIP_TELEFONO" => $request->tipotelefono
            ]);
        } catch (\Throwable $th) {
            return 'Error Personas 40';
        }
        Session::flash('insertado', '1');
        return redirect()->route('personas.inicio');
    }

    /**
     * Función de primer acceso aquí se va a cambiar la contraseña y se cambiar el estado
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
            "TELEFONO" => substr($request->telefono,4),
            "TIP_TELEFONO" => $request->tipotelefono
            
        ]);  

        //actualizar el estado del usuario a Activo
        $estactivo = Http::withToken($token)->post($this->url . '/seguridad/estusr/actualizar', [
            "USER" => Cache::get('user')   
        ]);
        
        return redirect()->route('preguntas.personas');
    }

    public function preguntas()
    {
        
            Cache::put('resp_preg',1);
            return view('home.preguntas');
        

        
        
    }

    public function ins_preguntas(Request $request)
    {
        //traer la cantidad de preguntas permitidas
        $parametro = Http::withToken(Cache::get('token'))->post($this->url . '/parametros/buscar', [
            "PARAMETRO"=>"ADMIN_CANT_PREG"   
        ]);  
        $preguntasArr = $parametro->json();
        foreach($preguntasArr as $data){
            $cantidad = $data['VALOR'];
        }

        $insertarP = Http::withToken(Cache::get('token'))->post($this->url.'/seguridad/preguntas/insertar',[
            "user"=> Cache::get('user'),
            "preg"=> $request->pregunta,
            "resp"=> $request->respuesta,
            "pass"=> ''
        ]);
        //ver cuantos intentos a realizado
        if (Cache::has('resp_preg')) {

            $resp = Cache::get('resp_preg') + 1;
            if ($resp >= $cantidad) {
                Cache::forget('resp_preg');
                return redirect()->route('inicio');
            }else {
               Cache::put('resp_preg', $resp);
               return view('home.preguntas');
            }
            
        }else {
            return 'ocurrio un error';
        }

    }

    
}
