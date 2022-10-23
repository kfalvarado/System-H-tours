<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

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
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE2NjY0MjI4OTUsImV4cCI6MTY2NjQyMzE5NX0.TYjNuQ8P7UFQQtF5GQYFV3oFhjZkASQa3UnmFKY5hzE';
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
        if ($insertarPersona == 'Forbidden'){
            Session::flash('denegado','Tu acceso a sido Denegado');
            return back();
            // return 'Acceso Denegado';
        }else{
            Session::flash('correcto','Usuario Registrado Correctamente');
            return back();
        }
        
        // // // return $indentidad;
           
    }  
    public function recuperar(Request $request)
    {
         
        //metodo de recuperacion por correo unido a PHP MAILER para enviar un correo de recuperacion
        //falta metodo para generar un token de expiracion
        if ($request->recuperacion == "c") {
            $RecupearusuarioPersona = Http::post('http://localhost:3000/seguridad/recuperar', [
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
                $mail->send();
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
            $RecupearusuarioPersona = Http::post('http://localhost:3000/seguridad/preguntas', [
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

    public function respuesta(Request $request)
    {
        //revisar si la pregunta coincide o no coincide
        $RecupearusuarioPersona = Http::post('http://localhost:3000/seguridad/respuesta', [
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
}
