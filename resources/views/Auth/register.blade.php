<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Htours</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
   <link rel="icon" href="{{asset('assets/images/HTOURS.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto border border-info" style="background-color:#008a60a1;">
              <div class="card-body px-3 py-2">
              <center>
                <img class="img-md" width="110" height="110"  src="{{asset('assets/images/HTOURS.png')}}" alt="">
                <h1 class="card-title text-center mb-2">System H tours</h1>
                <nav class="nav nav-pills flex-column flex-sm-row">
                  <a class="flex-sm-fill text-sm-center nav-link" href="{{url('/')}}">INGRESA</a>
                  <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">REGISTRATE</a>
                </nav>
              </center>
                <!-- End layout styles <ul class="nav nav-pills nav-stacked">    
                 </ul>
                 <br>
                <h3 class="card-title text-center mb-3">LOGIN</h3>-->

              <br>
                <form>
                  <div class="form-group" >
                    <label><H4><i class="mdi mdi-account"></i> Usuario</H4></label>
                    <input type="text" class="form-control p_input text-dark bg-white">
                  </div>
                  <div class="form-group">
                    <label><H4><i class="mdi mdi-email"></i> Email</H4></label>
                    <input type="email" class="form-control p_input text-dark bg-white">
                  </div>
                 <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
                  <form class="form-group" method="POST">
                    <label><H4><i class="mdi mdi-lock" onclick="mostrarContra()"></i> Password</H4></label>
                    <div class="form-row">
                        <div class="col">
                      <input class="form-control p_input text-dark bg-white" type="password" name="password1" id="password1">
                    </div>
                      </div>
                    </form>
              <script>
                function mostrarContra(){
                    var tipo = document.getElementById("password1");
                    if(tipo.type == "password"){
                        tipo.type = "text";
                    }else{
                        tipo.type = "password";
                    }
                }
              </script>
              <br>
              <!-- END CONTRASEÑA -->
              <!-- 2 CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
              <form class="form-group" method="POST">
                <label><H4><i class="mdi mdi-lock" onclick="mostrarContrasena()"></i> Repeat password</H4></label>
                <div class="form-row">
                    <div class="col">
                  <input class="form-control p_input text-dark bg-white" type="password" name="password2" id="password2">
                </div>
                  </div>
                </form>
          <script>
            function mostrarContrasena(){
                var tipo = document.getElementById("password2");
                if(tipo.type == "password"){
                    tipo.type = "text";
                }else{
                    tipo.type = "password";
                }
            }
          </script>
          <br>
          <!-- 2 END CONTRASEÑA -->
                  <div class="text-center">
                    <a class="text-white font-weight-medium" href="../tables/Pregunta_Usuario.html">
                    <button onclick="alert('Deberas Contestar las siguientes preguntas');" type="submit" class="btn btn-primary btn-block enter-btn">Registrate</button></a>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-center">
                    <!-- <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p> -->
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