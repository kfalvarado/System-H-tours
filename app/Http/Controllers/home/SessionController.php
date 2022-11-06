<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Cache;

//encriptar token
use Illuminate\Support\Facades\Crypt;


class SessionController extends Controller
{
    /*
    =========================================================
     Definicion de Variables Globales
    ========================================================
    */ 
    protected  $url = 'http://localhost:3000';

    /*
    =========================================================
    Inicio de sesion en el sistema
    =========================================================

    Esta funcion se encarga de Validar  si el usuario existe,si el usuario es nuevo,el rol del usuario
     y los permisos de este usuario
    */
    public function inicio(Request $request)
    {
        
        /*
          Validar Mayusculas
          Buscar si existe el usuario
          Buscar si sus contraseñas coniciden
          Buscar el rol del usuario
          redirigir con las variables */
          try {
            // Validar que el usuario llege en Mayusculas
            if (!preg_match("/^[A-ZÑÁÉÍÓÚ0-9.@]+$/", $request->user)) {
                Session::flash('accesoDenegado', 'usuario / contraseña incorrectos');
                return back();
            }

            $posicionU=0;
            $codificacion = md5($request->password);
            $loginUser = Http::post($this->url . '/seguridad/login', [
                "user" => $request->user,
                "pass" => $codificacion
            ]);

            $posicionU = strrpos($loginUser, "pudo obtener resultado");
            if ($posicionU > 0) {
                if (Cache::has('intento')) {
                    $intento = Cache::get('intento');
                    $intento += 1;
                    Cache::put('intento', $intento);
                } else {
                    $intento = Cache::put('intento', 1);
                }

                if (Cache::get('intento') > 3) {
                    Cache::flush('intento');
                    Session::flash('bloqueado', 'tu usuario a sido desabilitado');
                    return back();
                } else {
                    Session::flash('accesoDenegado', 'usuario / contraseña incorrectos');
                    return back();
                }
            } else {

                // Limpiar datos del usuario
                
                
                $posicion = strpos($loginUser,':')+2;
                $token = substr($loginUser,$posicion,-2);
               
               
                /*
                ///////////////////////////////////////////////////////////////////////////////
                Usuario Correcto 
                //////////////////////////////////////////////////////////////////////////////
                */
                $estado=0;
                $est = Http::post($this->url . '/seguridad/estadousr', [
                    "user"=>$request->user
                ]);
                $estado = strrpos($est, "NUEVO");
                
                if ($estado>0) {
                    $user = $request->user;
                    Cache::flush('intento');
                    //encriptar token
                    // $cadenaEncriptada = Crypt::encryptString($loginUser);

                    Cache::put('token', $token);
                    Cache::put('user', $user);
                    //validar rol del usuario
                    return view('home.personas');
                }
                // Falta validar rol del usuario 
                $user = $request->user;
                Cache::flush('intento');
                Cache::put('token', $token);
                Cache::put('user', $user);
                $conteo = Http::post($this->url . '/seguridad/conteo', []);
                $newconteo = json_decode($conteo, true);
                return view('home.inicio', compact('newconteo'));
            }

        } catch (\Exception $e) {
            return 'Ocurrio una error con la  API POST PERSONAS';
        }


        // return view('home.inicio');
    }   

    public function home()
    {
        $conteo = Http::post($this->url . '/seguridad/conteo', [
        ]);
        $newconteo = json_decode($conteo,true);
        return view('home.inicio',compact('newconteo'));
    }

    /*
    =========================================================
    Pantalla de Registro 
    =========================================================
    */
    public function register()
    {
        return view('Auth.register');
    } 
    /*
    =========================================================
    Funcion de validacion para registro en API
    =========================================================
    */
    public function Registrar(Request $request)
    {
        //validar Datos antes de guardarlos
        
        //proteccion extra contra cross-site scripting doble verificacion desde server
        if (
            // preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/", $request->nombre) &&
            // preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/", $request->tipoPersona) &&
            // preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/", $request->tipotelefono) &&
            // preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ 0-9]+$/", $request->roluser) &&
            preg_match("/^[A-ZÑÁÉÍÓÚ0-9.@]+$/", $request->user) &&
            preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/", $request->nombre) &&
            preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ@.0-9]+$/", $request->correo) &&
            preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ@.0-9!?#$`^-_=+|%&*~,]+$/", $request->password1) &&
            preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ@.0-9!?#%&*~,]+$/", $request->password2)
            // preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ?]+$/", $request->pregunta) &&
            // preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/", $request->Respuesta)
        ) {
           
            // if ($request->civil =="S" || $request->civil =="V" || $request->civil =="C" || $request->civil =="D") {
            //     if ($request->genero == "M" || $request->genero =="F") {

            // return $request; //prueba de funcionalidades de los if
            #############################################################

            //             $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE2NjcxMDE3NDMsImV4cCI6MTY2NzEwMjA0M30.QhL-Ff0m9CR8gbvJ00JRxY74vdgpfrmBg9nRTHTRL7U';
            //             $indentidad = $request->primerodigitos."-".$request->segundodigitos."-".$request->tercerodigitos;



            # +++++++++++++++++++++++++++++++++++++++++++++++
            /* Buscar el ROL QUE DIGA SIN ASIGNAR O NUEVO */
            # +++++++++++++++++++++++++++++++++++++++++++++++
            
           


            try {
                $posicionU = 0;
                $codificacion = md5($request->password1);
                $registrarUsuario = Http::post($this->url . '/seguridad/usuarios/registrar', [
                    "USER" => $request->user,
                    "NOMBRE_USUARIO" => $request->nombre,
                    "ROL_USUARIO" => 1,
                    "CORREO_ELECTRONICO" =>  $request->correo,
                    "PASS" => $codificacion
                ]);
                $posicionU = strrpos($registrarUsuario, "EL USUARIO YA EXISTE");
            } catch (\Exception $e) {
                return 'Ocurrio una error con la  API POST PERSONAS';
            }
            if ($registrarUsuario == 'Forbidden') {
                Session::flash('denegado', 'Tu acceso a sido Denegado');
                return back();
                // return 'Acceso Denegado';
            }
             if ($posicionU > 0) {
                 Session::flash('existe', 'Usuario ya  existe');
                 return back();
              
            } else {
                Session::flash('correcto', 'Usuario Registrado Correctamente');
                return back();
            
            }

                        //     $insertarPersona = Http::withToken($token)->post($this->url.'/personas/insertar', [
                        //         "NOM_PERSONA" => $request->nombre,
                        //         "SEX_PERSONA" => $request->genero,
                        //         "EDA_PERSONAL" => $request->edad,
                        //         "TIP_PERSONA" => $request->tipoPersona,
                        //         "Num_Identidad" => $indentidad,
                        //         "IND_CIVIL" => $request->civil,
                        //         "IND_PERSONA" => 1,
                        //         "TELEFONO" => $request->telefono,
                        //         "TIP_TELEFONO" => $request->tipotelefono,
                        //         "CORREO"=> $request->correo,
                        //         "PREGUNTA"=>$request->pregunta,
                        //         "RESPUESTA"=>$request->Respuesta,
                        //         "USUARIO"=> $request->user,
                        //         "PASSWORD"=> $request->correo,
                        //         "ROL"=> $request->roluser

                        //     ]);
                        // } catch (\Exception $e) {
                        //         return 'Ocurrio una error con la  API POST PERSONAS';
                        // }
                        // if ($insertarPersona == 'Forbidden'){
                        //     Session::flash('denegado','Tu acceso a sido Denegado');
                        //     return back();
                        //     // return 'Acceso Denegado';
                        // }else{
                        //         Session::flash('correcto','Usuario Registrado Correctamente');
                        //         return back();
                        //     }
    #####################################################################
        // }else{
        //     Session::flash('denegado','Tu acceso a sido Denegado Manipulacion Genero');
        //         return back();
        // }
        // }else{
        //     Session::flash('denegado','Tu acceso a sido Denegado Manipulacion Estado civil');
        //         return back();
        // }
        }else {
            Session::flash('caracteres','Error Caracteres especiales no permitidos');
            return back();
    }    
    }  
    /*
    =========================================================
    Metodo de Recuperacion de sesion por Correo
    =========================================================
    */
    public function recuperar(Request $request)
    {
        
        //metodo de recuperacion por correo unido a PHP MAILER para enviar un correo de recuperacion
        //falta metodo para generar un token de expiracion
        if ($request->recuperacion == "c") {
            $RecupearusuarioPersona = Http::post($this->url.'/seguridad/recuperar', [
                "user"=> $request->user
            ]);
            $arreglo =  json_decode($RecupearusuarioPersona,true);

            foreach($arreglo as $data){
               $correo = $data['CORREO'];
            }
            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);
            try {

                // Email server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';             //  smtp host
                $mail->SMTPAuth = true;
                $mail->Username = 'systemhtours@gmail.com';   //  Correo desde donde se enviara el Correo
                $mail->Password = 'kmbyyqvcgkxfpluj';       // contraseña de Aplicacion
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                  // encryption - ssl/tls
                $mail->Port = 465;                          // port - 587/465

                $mail->setFrom('systemhtours@gmail.com', 'Credenciales Htours');
                $mail->addAddress($correo,$request->user);
                // $mail->addCC($request->emailCc);
                // $mail->addBCC($request->emailBcc);

                // $mail->addReplyTo('sender@example.com', 'SenderReplyName');

                if (isset($_FILES['emailAttachments'])) {
                    for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                        $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                    }
                }
                $bodyHtml = '<h1> Recibimos una solicitud de cambio de contraseña por favor ingrese al siguiente Enlace para restablecer tu contraseña </h1> <img src="https://tester-security.herokuapp.com/track/laravel" alt="" srcset="">';
                $mail->isHTML(true);                // Set email content format to HTML

                $mail->Subject = 'Solicitud de recuperacion de credenciales';
                $mail->Body    = $bodyHtml;

                // $mail->AltBody = plain text version of email body;
                
                if (!$mail->send()) {
                    Session::flash('Fallo','Tu solicitud no puede ser procesada');
                    return back();
                } else {
                    Session::flash('exito','Tu solicitud se esta procesando');
                    return back();
                }
            } catch (Exception $e) {
                return back();
            }

        }elseif ($request->recuperacion == "p") { //metodo de recuperacion por pregunta secreta
            
          //buscar la pregunta relacionada al usuario proporcionado
            $RecupearusuarioPersona = Http::post($this->url.'/seguridad/preguntas', [
                "user"=> $request->user
            ]);
            $arreglo =  json_decode($RecupearusuarioPersona,true);

            foreach($arreglo as $data){
               $pregunta = $data['PREGUNTA'];
            }
            $user = $request->user;
            Session::flash('pregunta',$pregunta);
            Session::flash('user',$user);
            return view('Auth.preguntas');
        }
    }
    /*
    =========================================================
     Metodo de Recuperacion de sesion por Pregunta Secreta
    =========================================================
    */
    public function respuesta(Request $request)
    {
        //revisar si la pregunta coincide o no coincide
        $RecupearusuarioPersona = Http::post($this->url.'/seguridad/respuesta', [
            "user"=> $request->user,
            "preg"=> $request->pregunta,
            "resp"=> $request->respuesta
        ]);
    
        $arreglo =  json_decode($RecupearusuarioPersona,true);
        foreach($arreglo as $data){
            $estado = $data['ESTADO'];
         }
         //se deja pasar si encuentra coicidencia
        if($estado == 1){
            return 'puede pasar';
        }else{
            return 'no puede pasar'; // se le niega el acceso si no
        }
    }
    /*
    =========================================================
     Cierre de Sesion y Destruccion de Toke
    =========================================================
    */
    public function logout()
    {
        return redirect('/');
    }

    public function pruebas()
    {
        return view('vista');
    }
}
