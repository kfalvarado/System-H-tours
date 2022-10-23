<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Htours</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->

  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <!-- End layout styles -->
  <link rel="icon" href="{{ asset('assets/images/HTOURS.png')}}" />
</head>

<body>
  @if(Session::has('exito'))
  <script>
    alert('Tu solicitud se esta procesando')
  </script>
  @endif
  @if(Session::has('Fallo'))
  <script>
    alert('Ocurrio un error')
  </script>
  @endif
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto border border-info" style="background-color:#008a60a1;">
            <div class="card-body px-3 py-2">
              <center>
                <img class="img-md" width="110" height="110" src="{{ asset('assets/images/HTOURS.png')}}" alt="">
                <h1 class="card-title text-center mb-2">System H tours</h1>
                <nav class="nav nav-pills flex-column flex-sm-row">
                  <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">INGRESA</a>
                  <a class="flex-sm-fill text-sm-center nav-link" href="{{route('registro')}}">REGISTRATE</a>
                </nav>
              </center>
              <!-- End layout styles <ul class="nav nav-pills nav-stacked">    
                 </ul>
                 <br>
                <h3 class="card-title text-center mb-3">LOGIN</h3>-->

              <br>
              <form>
                <div class="form-group" method="POST">
                  <label class="form-label">
                    <H4><i class="mdi mdi-account"></i> Usuario</H4>
                  </label>
                  <input type="text" class="form-control p_input text-dark bg-white" required>
                </div>

                <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
                <form class="form-group" method="POST">
                  <label class="form-label">
                    <H4><i class="mdi mdi-lock" onclick="mostrarContrasena()"></i> Password</H4>
                  </label>
                  <div class="form-row">
                    <div class="col">
                      <input class="form-control p_input text-dark bg-white" type="password" name="password" id="password" required>
                    </div>
                  </div>
                </form>
                <script>
                  function mostrarContrasena() {
                    var tipo = document.getElementById("password");
                    if (tipo.type == "password") {
                      tipo.type = "text";
                    } else {
                      tipo.type = "password";
                    }
                  }
                </script>
                <br>
                <!-- END CONTRASEÑA -->
                <div class="text-center">
                  <a class="text-white font-weight-medium" href="{{route('home')}}">
                    <!-- redireccionar a home-->
                    <button type="submit" href="" class="btn btn-primary btn-block enter-btn">Iniciar Sesion</button>
                  </a>
                </div>
                <div class="form-group d-flex align-items-center justify-content-center">
                  <a href="#" class="forgot-pass text-white" data-toggle="modal" data-target="#dialogo11">
                    <H5>¿Olvidaste tu contraseña?</H5>
                  </a>




                  <!-- INICIO MODAL PARA CONTRASEÑA  -->
                  <div class="modal-container">
                    <div class="modal fade bd-example-modal-lg" id="dialogo11">
                      <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <!-- CABECERA DEL DIALOGO EDITAR -->
                          <div class="modal-header" style="background-color:#D80B0E;">
                            <h4 class="modal-title">Recuperacion de Contraseña</h4>
                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                          </div>
                          <!-- CUERPO DEL DIALOGO BORRAR -->
                          <div class="modal-body">
                            <center>
                              <form action="{{route('Recuperar.sesion')}}" method="post">
                                @csrf
                                <div style="background-color:#1A2940;">

                                  Ingrese su Usuario:<input type="text" id="user" name="user" required>
                                  <br>
                                  <br>
                                  <label class="form-label">
                                    ¿Metodo de Recuperacion?
                                    <br>
                                    <label for="form-label">
                                      <select class="form-control text-white" name="recuperacion" id="recuperacion">
                                        <option value="">Seleccionar</option>
                                        <option value="p">Pregunta de Seguridad</option>
                                        <option value="c">Correo Electronico</option>
                                      </select>
                                    </label>

                                    <br>
                                    <h4>Detallanos tu problema:</h4>
                                    <textarea name="mensaje" required> </textarea>
                                  </label>
                                  <br>
                                  <button class="btn btn-info btn-md">Recuperar</button>

                              </form>
                          </div>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="d-flex">
              <!-- <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> -->
              <!-- <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p> -->
              </form>


            </div>
          </div>
        </div>
        <!-- content-wrapper ends FINALIZA CUADRO LOGIN -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>