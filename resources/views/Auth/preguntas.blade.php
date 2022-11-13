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
                <h3 class="text-warning">Responde una de las siguientes Preguntas</h3>
            </div>
           
            <div class=" d-flex align-items-center justify-content-center">
                <div class="bg-white col-md-4">
                    <div class="p-4 rounded shadow-md">
                        @if (Session::has('otrapregunta'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                Respuesta Correcta, porfavor selecciona otra pregunta y escribe tu respuesta
                            </div>
                          </div>
                        @endif
                        @if (Session::has('invalida'))
                            <script>
                                alert('Respuesta Invalida')
                            </script>
                        @endif

                        @if (!Session::has('valida'))
                        <form action="{{route('Recuperar.respuesta')}}" method="post">
                            @csrf
                            <div class="mt-3">
                                <label for="email" class="form-label">Usuario</label>
                                @if(!Cache::has('usuario'))
                                <input type="text" name="user" class="form-control" value="{{Session::get('user')}}" readonly>
                                @else
                                <input type="text" name="user" class="form-control" value="{{Cache::get('usuario')}}" readonly>
                                @endif
                            </div class="mt-3">
                            <div class="mt-3">
                                
                                <label for="email" class="form-label">Pregunta</label>
                                <select name="pregunta" class="form-select" id="pregunta" name="pregunta">
                                    <option hidden selected>Seleccionar</option>
                                    @if (Session::has('otrapregunta'))
                                        @for ($x=0;$x<count($array); $x++)
                                        <option value="{{ $array[$x] }}">{{ $array[$x] }}</option>
                                        @endfor
                                    @else
                                    @foreach ($arreglo as $pregunta)
                                    <option value="{{ $pregunta['PREGUNTA'] }}">{{ $pregunta['PREGUNTA'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mt-3">
                               
                                <label for="subject" class="form-label">Tú Respuesta</label>
                                <input type="text" name="respuesta" class="form-control" placeholder="Escribe tu respuesta...." required>
                            </div>
                            
                            <br>
                            <center>
                                <button  type="submit" class="btn btn-outline-success btn-lg">
                                    Enviar
                                </button>
                            </center>
                        </div>
                    </form>
                    @else
                    <form action="{{route('actualizar.constraseña')}}" method="post">
                        @csrf
                        <div class="mt-3">

                            <label for="user" class="form-label">Nueva Contraseña</label>
                            <input type="text" id="user" name="user" class="form-control" value="{{Cache::get('usuario')}}" readonly>
                            <label for="password1" class="form-label">Nueva Contraseña</label>
                            <input class="form-control" placeholder="Ingresa la nueva contraseña" type="password" name="password1" id="password1" required>
                        </div class="mt-3">
                        <div class="mt-3">
                            <label for="password2" class="form-label">Repite la Contraseña</label>
                            <input class="form-control p_input text-dark bg-white" onchange="comparar();" placeholder="Ingresa de nuevo la contraseña" type="password" name="password2" id="password2" required>
                        </div class="mt-3">
                            
                        <br>
                        <center>
                            <button  type="submit" class="btn btn-outline-success btn-lg">
                                Enviar
                            </button>
                        </center>
                    </div>
                </form>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </body>
    <script src="{{ asset('assets/js/registro.js') }}"></script>
</html>
