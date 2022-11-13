<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registro Htours</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  {{-- sweeralert2 --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- End layout styles -->
  <link rel="icon" href="{{asset('assets/images/HTOURS.png')}}" />
</head>

<body>
  @if(Session::has('correcto'))
  <script>
  
   Swal.fire(
      '',
      'Usuario Registrado Correctamente, porfavor ponte en contacto con un administrador para que pueda brindarte los permisos',
      'question'
    )
  </script>
  @endif

  @if(Session::has('caracteres'))
  <input type="hidden" id="msg" value="{{ Session::get('caracteres') }}">
  <script>
    msg = document.getElementById('msg').value
     Swal.fire({
      icon: 'error',
      text: `Error ${msg}`,
      // footer: '<a href="">Why do I have this issue?</a>'
    })
  </script>
  @endif
  
  @if(Session::has('denegado'))
  <script>
      Swal.fire({
      icon: 'error',
      text: 'Tu acceso a sido Denegado',
      // footer: '<a href="">Why do I have this issue?</a>'
    })
  </script>
  @endif
  @if(Session::has('existe'))
  <script>
    Swal.fire({
      icon: 'error',
      text: 'El usuario que indico, no esta disponible',
      // footer: '<a href="">Why do I have this issue?</a>'
    })
    // alert('El usuario que indico ya existe')
  </script>
  @endif


  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto border border-info" style="background-color:#008a60a1;">
            <div class="card-body px-3 py-2">
            <center>
              <img class="img-md" width="110" height="110"  src="../../assets/images/HTOURS.png" alt="">
              <h1 class="card-title text-center mb-2">System H tours</h1>
              <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center text-white nav-link" href="{{ route('Auth.login') }}">INGRESA</a>
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">REGISTRATE</a>
              </nav>
            </center>
              <!-- End layout styles <ul class="nav nav-pills nav-stacked">    
               </ul>
               <br>
              <h3 class="card-title text-center mb-3">LOGIN</h3>-->

            <br>
              <form action="{{ route('Registrar.usuario') }}" method="POST">
                @csrf
                <div class="form-group" >
                  <label><H4><i class="mdi mdi-account"></i>Nombre Completo</H4></label>
                  <input type="text" id="nombre" name="nombre" placeholder="Ingresa su nombre completo" class="form-control p_input text-dark bg-white" required>
                </div>
                <div class="form-group" >
                  <label><H4><i class="mdi mdi-account"></i>Usuario</H4></label>
                  <input type="text" style="text-transform:uppercase"  onkeyup="javascript:this.value=this.value.toUpperCase();" id="user" name="user" placeholder="Ingresa nombre de usuario" class="form-control p_input text-dark bg-white" required>
                </div>
                <div class="form-group">
                  <label><H4><i class="mdi mdi-email"></i> Email</H4></label>
                  <input type="email" placeholder="Ingresa un Correo Electronico"  id="correo" name="correo"  class="form-control p_input text-dark bg-white" required>
                </div>
               <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
                
                  <label><H4><i class="mdi mdi-lock"  onclick="mostrarContra()"></i> Contraseña</H4></label>
                  <div class="form-row">
                      <div class="col">
                    <input class="form-control p_input text-dark bg-white" placeholder="Ingresa una contraseña" type="password" name="password1" id="password1" required>
                  </div>
                    </div>
            <br>
            <!-- END CONTRASEÑA -->
            <!-- 2 CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
            
              <label><H4><i class="mdi mdi-lock"  onclick="mostrarContrasena()"></i> Repetir Contraseña</H4></label>
              <div class="form-row">
                  <div class="col">
                <input class="form-control p_input text-dark bg-white" onchange="comparar();" placeholder="Ingresa de nuevo la contraseña" type="password" name="password2" id="password2" required>
              </div>
                </div>
                <br>
                <div class="text-center">
                  <button onclick="validacion();"  type="submit" class="btn btn-primary btn-block enter-btn">Registrate</button></a>
                </div>

                  <!-- <button class="btn btn-facebook mr-2 col">
                    <i class="mdi mdi-facebook"></i> Facebook </button>
                  <button class="btn btn-google col">
                    <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div> -->
                <!-- <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p> -->
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
        <script src="{{ asset('assets/js/registro.js') }}"></script>
     <br>
        <!-- 2 END CONTRASEÑA -->
               

              
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