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
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto border border-info" style="background-color:#008a60a1;">
              <div class="card-body px-3 py-2">
              <center>
                <img class="img-md" width="110" height="110"  src="{{ asset('assets/images/HTOURS.png')}}" alt="">
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
                    <label class="form-label"><H4><i class="mdi mdi-account"></i> Usuario</H4></label>
                    <input type="text" class="form-control p_input text-dark bg-white" required>
                  </div>

                 <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
                  <form class="form-group" method="POST">
                    <label class="form-label"><H4><i class="mdi mdi-lock" onclick="mostrarContrasena()"></i> Password</H4></label>
                    <div class="form-row">
                        <div class="col">
                      <input class="form-control p_input text-dark bg-white" type="password" name="password" id="password" required>
                    </div>
                      </div>
                    </form>
              <script>
                function mostrarContrasena(){
                    var tipo = document.getElementById("password");
                    if(tipo.type == "password"){
                        tipo.type = "text";
                    }else{
                        tipo.type = "password";
                    }
                }
              </script>
              <br>
              <!-- END CONTRASEÑA -->
                  <div class="text-center">
                    <a class="text-white font-weight-medium" href="{{route('home')}}"> <!-- redireccionar a home-->
                    <button type="submit" href="" class="btn btn-primary btn-block enter-btn">Iniciar Sesion</button></a>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-center">
                    <a href="#" class="forgot-pass text-white" data-toggle="modal" data-target="#dialogo11"><H5>¿Olvidaste tu contraseña?</H5></a> 
                    
                    
                    <!-- INICIO MODAL CONTRASEÑA  -->
               <div class="modal-container">
                <div class="modal fade bd-example-modal-lg" id="dialogo11">
                  <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm md PARA TAMANO PEQUENO -->
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <!-- CABECERA DEL DIALOGO CONTRASEÑA-->
                      <div class="modal-header">
                        <h4 class="modal-title">Recuperar Contraseña</h4>
                        <button align="right" type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                      </div>
                      <!-- CUERPO DEL DIALOGO CONTRASEÑA -->
                      <div class="modal-body">
                        <center>
                          <form action="" method="post">
                            <br>
                              <label class="form-label">
                              <h4>Ingrese su Nombre:</h4>
                               <input type='text' name='namereportlm' class="form-control bg-white" required></input>
                              </label>
                            <br>
                            <br>
                           <label class="form-label">
                          <h4>Ingrese su Correo:</h4>
                              <input type='text' name='namereportlm' class="form-control bg-white" required></input>
                            </label>
                            <br><br>
                            <label class="form-label">
                            <h4>Detallanos tu problema:</h4>
                              <br>
                              <textarea name="mensaje"> </textarea>
                            </label>
                            <br><br>
                            <a href="" class="btn btn-danger">Cancelar</a>
                            <button onclick="alert('Al dar click a enviar con tus Datos, te enviaremos un Correo con tu Nueva Contraseña Generada.');" type="submit" class="btn btn-primary">Enviar</button>
                            <br><br>
                          </form>
                      </div>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIN DE MODAL PARA PREVISUALIZAR  -->
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