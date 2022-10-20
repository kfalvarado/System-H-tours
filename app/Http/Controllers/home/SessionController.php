<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function inicio()
    {
        return view('home.inicio');
    }   
    public function register()
    {
        return view('Auth.register');
    } 
    public function Registrar(Request $request)
    {
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE2NjYyOTI4ODAsImV4cCI6MTY2NjI5MzE4MH0.mbd8DIyzbmpzz_sXzNIR3NaKMoYBvXUcJFz1Y1QImbQ';
        $indentidad = $request->primerodigitos."-".$request->segundodigitos."-".$request->tercerodigitos;
        // return $request;
        try {
            $insertarPersona = Http::withToken($token)->post('http://localhost:3000/personas/insertar', [
                "NOM_PERSONA" => $request->nombre,
                "SEX_PERSONA" => $request->genero,
                "EDA_PERSONAL" => $request->edad,
                "TIP_PERSONA" => $request->tipoPersona,
                "Num_Identidad" => $indentidad,
                "IND_CIVIL" => $request->civil,
                "IND_PERSONA" => 1,
                "TELEFONO" => $request->telefono,
                "TIP_TELEFONO" => $request->tipotelefono,
                "CORREO"=> $request->correo,
                "PREGUNTA"=>$request->pregunta,
                "RESPUESTA"=>$request->Respuesta,
                "USUARIO"=> $request->user,
                "PASSWORD"=> $request->correo,
                "ROL"=> $request->roluser

            ]);
        } catch (\Exception $e) {
            return 'Ocurrio una error con la  API POST PERSONAS';
        }

        
        // // return $indentidad;
        Session::flash('correcto','Usuario Registrado Correctamente');
        return back();
        
    }  
}
