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
                <img class="img-md" width="110" height="110" src="{{asset('assets/images/HTOURS.png')}}" alt="">
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
              <div class="card-header">
                @if(Session::has('correcto'))
                <script> alert('Se registro Correctamente tu Usuario porfavor Contacta a un administrador para que pueda brindarte permisos') </script>  
                @endif
              </div>
              <form action="{{route('Registrar.usuario')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label>
                    <H4><i class="mdi mdi-account"></i> Nombre Completo </H4>
                  </label>
                  <input type="text" id="nombre" name="nombre" class="form-control p_input text-dark bg-white" required>
                </div>
                <div class="form-group">
                  <label>
                    <H4><i class="mdi mdi-account"></i> Genero
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <i class="mdi mdi-account"></i> Edad
                    </h4>
                  </label>
                  <br>
                  <label for="masculino">Masculino
                    <input type="radio" id="genero" name="genero" value="M" class="form-control p_input text-dark bg-white">
                  </label>
                  <label for="femenino">Femenino
                    <input type="radio" id="genero" name="genero" value="F" class="form-control p_input text-dark bg-white">
                  </label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label for="edad">Ingresa tu edad
                    <input type="number" id="edad" name="edad" min="0" max="100" class="form-control p_input text-dark bg-white" required>
                  </label>
                </div>
                <label>
                  <H4><i class="mdi mdi-account"></i> Estado Civil</h4>
                </label>
                <Select id="civil" name="civil" class="form-control p_input text-dark bg-white" id="tipoPersona" name="tipoPersona" required>
                  <option value=""></option>
                  <option value="S">Soltero</option>
                  <option value="V">Viudo</option>
                  <option value="C">Casado</option>
                  <option value="D">Divorciado</option>
                </Select>
                <label>
                  <H4><i class="mdi mdi-account"></i> Tipo de persona </h4>
                </label>
                <Select class="form-control p_input text-dark bg-white" id="tipoPersona" name="tipoPersona" required>
                  <option value=""></option>
                  <option value="N">Normal</option>
                  <option value="J">Juridica</option>
                </Select>
                <div class="form-group">
                  <label>
                    <H4><i class="mdi mdi-account"></i> Numero de Indentidad </H4>
                    <div id="error"></div>
                    <table>
                      <thead>
                        <tr>
                          <th colspan="2">
                            <input type="number" minlength="0" min="0" pattern="[09]+" id="primerodigitos" name="primerodigitos" onkeypress="return validarprimercampo(event);" class="form-control p_input text-dark bg-white" size="100" required>
                          </th>
                          <th>-</th>
                          <th colspan="2">
                            <input type="number" minlength="0" min="0" pattern="[09]+" id="segundodigitos" name="segundodigitos" onkeypress="return validarsegundocampo(event);" class="form-control p_input text-dark bg-white" size="100" required>
                          </th>
                          <th>-</th>
                          <th colspan="2">
                            <input type="number" minlength="0" min="0" pattern="[09]+" id="tercerodigitos" name="tercerodigitos" onkeypress="return validartercercampo(event);" class="form-control p_input text-dark bg-white" size="100" required>
                          </th>
                        </tr>
                      </thead>
                    </table>
                  </label>
                </div>
                <div class="form-group">
                  <label>
                    <H4><i class="mdi mdi-account"></i> Telefono </H4>
                  </label>
                  <input type="tel" id="telefono" name="telefono" class="form-control p_input text-dark bg-white" required>
                </div>
                <label>
                  <H4><i class="mdi mdi-account"></i> Tipo de Telefono </h4>
                </label>
                <Select class="form-control p_input text-dark bg-white" id="tipotelefono" name="tipotelefono" required>
                  <option value=""></option>
                  <option value="C">Celular</option>
                  <option value="T">Telfono Fijo</option>
                </Select>
                <div class="form-group">
                <label>
                  <H4><i class="mdi mdi-account"></i> ROL </h4>
                </label>
                <Select class="form-control p_input text-dark bg-white" id="tipotelefono" name="tipotelefono" required>
                  <option value=""></option>
                  <option value="2">Contador</option>
                </Select>
                  <label>
                    <H4><i class="mdi mdi-account"></i> Usuario</H4>
                  </label>
                  <input type="text" class="form-control p_input text-dark bg-white" id="user" name="user" required>
                </div>
                <div class="form-group">
                  <label>
                    <H4><i class="mdi mdi-email"></i> Correo</H4>
                  </label>
                  <input type="email" class="form-control p_input text-dark bg-white" id="correo" name="correo" required>
                </div>
                <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->

                <label>
                  <H4><i class="mdi mdi-lock" onclick="mostrarContra()"></i>Contraseña</H4>
                </label>
                <div class="form-row">
                  <div class="col">
                    <input class="form-control p_input text-dark bg-white" type="password" name="password1" id="password1" required>
                  </div>
                </div>


                <br>
                <!-- END CONTRASEÑA -->
                <!-- 2 CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->

                <label>
                  <H4><i class="mdi mdi-lock" onclick="mostrarContrasena()"></i> Repetir Contraseña</H4>
                </label>
                <div class="form-row">
                  <div class="col">
                    <input class="form-control p_input text-dark bg-white" type="password" name="password2" id="password2" required>
                  </div>
                </div>

                <script>
                  function mostrarContra() {
                    var tipo = document.getElementById("password1");
                    if (tipo.type == "password") {
                      tipo.type = "text";
                    } else {
                      tipo.type = "password";
                    }
                  }

                  function validarprimercampo(e) {
                    var primero = document.getElementById('primerodigitos').value;
                    key = e.keyCode || e.which;

                    teclado = String.fromCharCode(key);
                    numero = "0123456789"
                    especiales = "8-37-38-46";
                    teclado_especial = false;
                    if (primero.length < 4) {
                      for (var i in especiales) {
                        if (key == especiales[i])[
                          teclado_especial = true
                        ]
                      }
                      if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
                        return false;
                      }
                    } else {
                      alert('demasiados numeros en una sola entrada');
                      e.preventDefault();
                    }
                  }

                  function validarsegundocampo(e) {

                    var segundo = document.getElementById('segundodigitos').value;
                    key = e.keyCode || e.which;

                    teclado = String.fromCharCode(key);
                    numero = "0123456789"
                    especiales = "8-37-38-46";
                    teclado_especial = false;
                    if (segundo.length < 4) {
                      for (var i in especiales) {
                        if (key == especiales[i])[
                          teclado_especial = true
                        ]
                      }
                      if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
                        return false;
                      }
                    } else {
                      alert('demasiados numeros en una sola entrada');
                      e.preventDefault();
                    }
                  }

                  function validartercercampo(e) {

                    var tercero = document.getElementById('tercerodigitos').value;
                    key = e.keyCode || e.which;

                    teclado = String.fromCharCode(key);
                    numero = "0123456789"
                    especiales = "8-37-38-46";
                    teclado_especial = false;
                    if (tercero.length < 5) {
                      for (var i in especiales) {
                        if (key == especiales[i])[
                          teclado_especial = true
                        ]
                      }
                      if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
                        return false;
                      }
                    } else {
                      alert('demasiados numeros en una sola entrada');
                      e.preventDefault();
                    }
                  }
                </script>
                <script>
                  function mostrarContrasena() {
                    var tipo = document.getElementById("password2");
                    if (tipo.type == "password") {
                      tipo.type = "text";
                    } else {
                      tipo.type = "password";
                    }
                  }
                </script>
                <br>
                <!-- 2 END CONTRASEÑA -->
                <div class="text-center">
                  <!-- <a class="text-white font-weight-medium" href="../tables/Pregunta_Usuario.html">
                    <button onclick="alert('Deberas Contestar las siguientes preguntas');" type="submit" class="btn btn-primary btn-block enter-btn">Registrate</button></a>
                </div> -->
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Registrate</button></a>
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