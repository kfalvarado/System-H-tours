<!DOCTYPE html>
<html lang="en">

    <head>
        
        <style>
            body{
                background-image: url('/assets/images/auth/Login_bg.jpg');
            }
        </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HTOURS | RECUPERACION</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="mt-5 conatiner">
            <div class="text-center">
                <h3 class="text-warning">Responde la siguiente Pregunta</h3>
                @if(Session::has('pregunta'))
                <h5 class="text-warning">¿{{Session::get('pregunta')}}?</ha>
                
            </div>
            <div class=" d-flex align-items-center justify-content-center">
                <div class="bg-white col-md-4">
                    <div class="p-4 rounded shadow-md">
                        <form action="{{route('Recuperar.respuesta')}}" method="post">
                            @csrf
                            <div class="mt-3">
                                <label for="email" class="form-label">Usuario</label>
                                <input type="text" name="user" class="form-control" value="{{Session::get('user')}}" readonly>
                            </div class="mt-3">
                            <div class="mt-3">
                                <input type="hidden" name="pregunta" value="{{Session::get('pregunta')}}">
                                <label for="subject" class="form-label">Tú Respuesta</label>
                                <input type="text" name="respuesta" class="form-control" placeholder="Escribe tu respuesta...." required>
                            </div>
                            <button  type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
