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
        $indentidad = $request->primerodigitos."-".$request->segundodigitos."-".$request->tercerodigitos;
        // return $request;
        try {
            $insertarPersona = Http::post('http://localhost:3000/personas/insertar', [
                "NOM_PERSONA" => $request->nombre,
                "SEX_PERSONA" => $request->genero,
                "EDA_PERSONAL" => $request->edad,
                "Num_Identidad" => $indentidad,
                "IND_CIVIL" => $request->civil,
                "IND_PERSONA" => 1,
                "TELEFONO" => $request->telefono,
                "TIP_TELEFONO" => $request->tipotelefono,
            ]);
        } catch (\Exception $e) {
            return 'Ocurrio una error con la  API POST PERSONAS';
        }

        
        // return $indentidad;
        Session::flash('correcto','Usuario Registrado Correctamente');
        return back();
        
    }  
}
