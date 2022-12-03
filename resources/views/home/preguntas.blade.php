<!DOCTYPE html>
<html lang="en">

    <head>
        
        <style>
            body{
                background-image: url('/assets/images/Login_bg.jpg');
                background-size: cover;
            }
        </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HTOURS | Preguntas Seguridad</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- iconos boostrap --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- icono  --}}
        <link rel="icon" href="{{asset('assets/images/HTOURS.png')}}" />
      </head>

    <body  onbeforeunload="return donotgo();">

      @if (Session::has('misma'))
        <script>
          Swal.fire({
             icon: 'error',
             text: 'No puedes ingresar tu anterior Contraseña'
    // footer: '<a href="">Why do I have this issue?</a>'
           })
        </script>
      @endif
        <div class="mt-5 conatiner" >
            <div class="text-center p-1 mb-1" style="background-color: #029d2988;">
                <h3 class="text-light">Configuracion de Preguntas Secretas</h3>
                <h5 class="text-light"> <font color="yellow">{{ Cache::get('user') }}</font> Debes Crear las Preguntas de seguridad con sus respectiva respuesta</h5>
                <h6 class="text-light">de esta forma podras recuperar tu cuenta en caso de olvidar tu contraseña </h6>
            
            </div> 
            <div class=" d-flex align-items-center justify-content-center">
                <div class="col-md-4" style=" background-color: #029d2988;">
                    <div class="p-4 rounded shadow-md">
                      <form action="{{ route('prinsertar') }}" method="post">
                        @csrf
                      <center>
                        
                        <label for="">
                          <div style="background-color: #0778b199">
                            <font color='white'><h5> <i class="bi bi-question-octagon"></i> Ingresa la Pregunta Secreta #{{ Cache::get('resp_preg') }}</h5></font>
                            <input type="text" class="form-control" id="pregunta" name="pregunta" required>
                          </label>
                        </div>
                          <div style="background-color: #0778b199">
                            <font color='white'><h5><i class="bi bi-r-circle"></i> Ingresa la respuesta </h5></font>
                            <input type="text" class="form-control" id="respuesta" name="respuesta" required>
                          </label>
                        </div>
                   <button class="btn btn-outline-info  text-white" onclick="check();" type="submit">Guardar</button>
                      </center>
                    </form>           
                </div>
            </div>
        </div>
        </div>
        <script src="{{ asset('assets/js/ab-valpersonas.js') }}"></script>
    </body>
</html>
