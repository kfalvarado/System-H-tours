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


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- End layout styles -->
  <link rel="icon" href="{{asset('assets/images/HTOURS.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-9 mx-auto border border-info" style="background-color:#008a60a1;">
            <div class="card-body px-3 py-2">
              <center>
                <img class="img-md" width="110" height="110" src="{{asset('assets/images/HTOURS.png')}}" alt="">
                <h1 class="card-title text-center mb-2">System H tours</h1>
                <nav class="nav nav-pills flex-column flex-sm-row">
                  <a class="flex-sm-fill text-sm-center nav-link text-white" href="{{url('/')}}">INGRESA</a>
                  <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">REGISTRATE</a>
                </nav>
              </center>
              <br>
              <div class="card-header">
                @if(Session::has('correcto'))
                <script>
                  alert('Se registro Correctamente tu Usuario porfavor Contacta a un administrador para que pueda brindarte permisos')
                </script>
                @endif

                @if(Session::has('caracteres'))
                <script>
                  alert('Error Caracteres especiales no permitidos')
                </script>
                @endif
                
                @if(Session::has('denegado'))
                <script>
                  alert('Tu acceso a sido Denegado')
                </script>
                @endif
              </div>
              <form action="{{route('Registrar.usuario')}}" method="POST" id="formulario">
                @csrf
                <details>
                  <summary>Datos Personales</summary>
                  <div class="form-group">
                    <label>
                      <H4><i class="mdi mdi-account"></i> Nombre Completo </H4>
                    </label>
                    <input type="text" id="nombre" name="nombre" class="form-control p_input text-dark bg-white" required>
                  </div>
                  <div class="form-group">
                    <table>
                      <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </th>
                      </thead>
                      <tbody>


                        <td colspan="2">

                          <H4>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class="mdi mdi-account"></i> Genero</H4>

                          <label for="masculino">
                            <input type="radio" id="genero" name="genero" value="M" class="form-control p_input text-dark bg-white">
                            Masculino
                          </label>
                          &nbsp; &nbsp;&nbsp;&nbsp;
                          <label for="femenino">
                            <input type="radio" id="genero" name="genero" value="F" class="form-control p_input text-dark bg-white">
                            Femenino
                          </label>
                          &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        </td>

                        <td colspan="">
                          &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                          <label for="">
                            <center>
                              <h4><i class="mdi mdi-account"></i> Edad</h4>
                              <input type="number" id="edad" name="edad" min="0" max="100" class="form-control p_input text-dark bg-white" required>
                            </center>
                          </label>
                          &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        </td>

                        <td colspan="2">
                          <label for="civil">
                            <h4>
                              <i class="mdi mdi-account"></i> Estado Civil
                            </h4>
                            <Select id="civil" name="civil" class="form-control p_input text-dark bg-white" id="tipoPersona" name="tipoPersona" required>
                              <option value=""></option>
                              <option value="S">Soltero</option>
                              <option value="V">Viudo</option>
                              <option value="C">Casado</option>
                              <option value="D">Divorciado</option>
                            </Select>
                          </label>
                          &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        </td>
                        <td colspan="2">
                          <label for="">
                            <center>
                              <h4><i class="mdi mdi-account"></i> Tipo de persona </th>
                              </h4>
                            </center>
                            <Select onchange="validacion1();" class="form-control p_input text-dark bg-white" id="tipoPersona" name="tipoPersona" required>
                              <option value=""></option>
                              <option value="N">Normal</option>
                              <option value="J">Juridica</option>
                            </Select>
                          </label>
                        </td>
                      </tbody>
                    </table>
                  </div>
                </details>
                
                <details>     
                  <summary  onclick="validacion1();">Informacion Personal</summary>
                  <div class="form-group">
                    <center>
                      <label>
                        <H4><i class="mdi mdi-account"></i> Numero de Identidad </H4>
                        <div id="error"></div>
                        <table>
                          <thead>
                            <tr>
                              <th colspan="2">
                                <input type="number"  onclick="tipopersona();"minlength="0" min="0" pattern="[09]+" id="primerodigitos" name="primerodigitos" onkeypress="return validarprimercampo(event);" class="form-control p_input text-dark bg-white" size="100" required>
                              </th>
                              <th>-</th>
                              <th colspan="2">
                                <input type="number"  minlength="0" min="0" pattern="[09]+" id="segundodigitos" name="segundodigitos" onkeypress="return validarsegundocampo(event);" class="form-control p_input text-dark bg-white" size="100" required>
                              </th>
                              <th>-</th>
                              <th colspan="2">
                                <input type="number" minlength="0" min="0" pattern="[09]+" id="tercerodigitos" name="tercerodigitos" onkeypress="return validartercercampo(event);" class="form-control p_input text-dark bg-white" size="100" required>
                              </th>
                            </tr>
                          </thead>
                        </table>
                      </label>
                    </center>
                  </div>
                  <center>

                    <div class="form-group">
                      <table>
                        <thead>
                          <tr>
                            <th colspan="2">

                              <label>
                                <H4><i class="mdi mdi-account"></i> Telefono </H4>
                                <input type="number" id="telefono" name="telefono" class="form-control p_input text-dark bg-white" required>
                              </label>
                              &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                            </th>
                            <th>
                              <label>
                                <H4><i class="mdi mdi-account"></i> Tipo de Telefono </h4>
                                <Select class="form-control p_input text-dark bg-white" id="tipotelefono" name="tipotelefono" required>
                                  <option value=""></option>
                                  <option value="C">Celular</option>
                                  <option value="T">Telefono Fijo</option>
                                </Select>
                              </label>
                              &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                            </th>
                            <th>
                              <label>
                                <H4><i class="mdi mdi-account"></i> Rol del Usuario</h4>
                              </label>
                              <Select  onchange="validacion2();" class="form-control p_input text-dark bg-white" id="roluser" name="roluser" required>
                                <option value=""></option>
                                <option value="2">Contador</option>
                              </Select>
                            </th>
                            </label>
                        </thead>
                        </tr>
                      </table>
                    </div>
                  </center>
                </details>
                <details>
                  <summary onclick="validacion2();">Datos del Usuario</summary>
                  <div class="form-group">
                    <label>
                      <H4><i class="mdi mdi-account"></i> Usuario</H4>
                    </label>
                    <input type="text" onclick="validarol();" style="text-transform:uppercase"  class="form-control p_input text-dark bg-white" id="user" name="user" required>
                  </div>
                  <div class="form-group">
                    <label>
                      <H4><i class="mdi mdi-email"></i> Correo</H4>
                    </label>
                    <input type="email" class="form-control p_input text-dark bg-white" id="correo" name="correo" required>
                  </div>
                  <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
                  <div id="preguntas">

                  </div>
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
                    <H4><i class="mdi mdi-lock"  onclick="mostrarContrasena()"></i> Repetir Contraseña</H4>
                  </label>
                  <div class="form-row">
                    <div class="col">
                      <input class="form-control p_input text-dark bg-white" type="password" onchange="validacion3();" name="password2" id="password2" required>
                    </div>

                  </div>
                </details>
                <details>
                  <summary onclick="validacion3();">Método de Recuperación de contraseña</summary>
                  <label>
                    <H4><i class="mdi mdi-account"></i> Ingresa una pregunta de seguridad</H4>
                  </label>
                  <input type="text" onclick="validacion4();" class="form-control p_input text-dark bg-white" id="pregunta" name="pregunta" required>
                  <H4><i class="mdi mdi-account"></i> Ingresa una respuesta a esa pregunta</H4>
                  </label>
                  <input type="text" class="form-control p_input text-dark bg-white" id="Respuesta" name="Respuesta" required>
                </details>
                <!--
                ===================================
                Primer Bloque de javascript
                ===================================
               -->
                <script>
                  /*
                  ============================================
                  Funcion para visibilidad de contraseña
                  ============================================
                  */
                  function mostrarContra() {
                    var tipo = document.getElementById("password1");
                    if (tipo.type == "password") {
                      tipo.type = "text";
                    } else {
                      tipo.type = "password";
                    }
                  }
                  /*
                  ============================================
                  Validar primer campo de indentidad
                  ============================================
                  */

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
                      alert('No puedes agregar mas numeros en este campo');
                      e.preventDefault();
                    }
                  }
                   /*
                  ============================================
                  Validar segundo campo de indentidad
                  ============================================
                  */
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
                      alert('No puedes agregar mas numeros en este campo');
                      e.preventDefault();
                    }
                  }
                   /*
                  ============================================
                  Validar tercer campo de indentidad
                  ============================================
                  */

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
                      alert('No puedes agregar mas numeros en este campo');
                      e.preventDefault();
                    }
                  }
                </script>
                <!--
                ===================================
                Segundo Bloque de javascript
                ===================================
               -->
                <script>
                   /*
                  ============================================
                  Mostrar Contraseña
                  ============================================
                  */
                  function mostrarContrasena() {
                    var tipo = document.getElementById("password2");
                    if (tipo.type == "password") {
                      tipo.type = "text";
                    } else {
                      tipo.type = "password";
                    }
                  }

                   /*
                  ============================================
                  Detener el intento de registro primer Bloque
                  ============================================
                  */
                  function validacion1() {
                    let nombre = document.getElementById('nombre').value;
                    let genero = document.getElementsByName('genero');
                    let edad = document.getElementById('edad').value;
                    let civil = document.getElementById('civil').value;
                    var genero2='';
                    if (nombre == "") {
                      alert('No escribiste un nombre')
                      document.getElementById("nombre").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#nombre'
                    }
                    for (var i = 0; i < genero.length; i++) {
                      if (genero[i].checked) {
                        genero2 = genero[i].value;
                        break;
                      }
                    }
                    if (genero2== "") {
                      alert('No selecciono un genero');
                      document.getElementById("genero").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#genero'
                    }
                    if (edad=='') {
                      alert('No escribio una edad')
                      // let input = document.getElementById('edad').style.background = "red";
                      document.getElementById("edad").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#edad'
                    }
                    if (civil == '') {
                      alert('No Seleccion un Estado Civil')
                      document.getElementById("civil").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#civil'
                    }   
                  }
                  /*
                  ============================================
                  Detener el intento de registro sin selecion de tipo persona
                  ============================================
                  */
                  function tipopersona() {
                    let tipoPersona = document.getElementById('tipoPersona').value;
                    if (tipoPersona=='') {
                      alert('Aun no selecciono un tipo de persona en la pestaña de Datos Personales');
                      document.getElementById("tipoPersona").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#tipoPersona'
                    }
                  }
                  /*
                  ============================================
                  Detener el intento de registro segundo Bloque
                  ============================================
                  */
                  function validacion2() {
            
                    let primerodigitos = document.getElementById('primerodigitos').value;
                    let segundodigitos = document.getElementById('segundodigitos').value;
                    let tercerodigitos = document.getElementById('tercerodigitos').value;
                    let telefono = document.getElementById('telefono').value;
                    let tipotelefono = document.getElementById('tipotelefono').value;
                    
                    if (primerodigitos=='' || segundodigitos=='' || tercerodigitos =='') {
                      alert('faltan digitos en la indentidad')
                      document.getElementById("primerodigitos").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#primerodigitos'
                      document.getElementById("segundodigitos").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#segundodigitos'
                      document.getElementById("tercerodigitos").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#tercerodigitos'
                    }
                    if (telefono =='') {
                      alert('No escribio su telefono');
                      document.getElementById("telefono").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#telefono'
                    }
                    if (tipotelefono == '') {
                      alert('No selecciono un tipo de telefono')
                      document.getElementById("tipotelefono").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#tipotelefono'
                    }
                    
                  }
                  /*
                  ============================================
                  Detener el intento de registro  Rol
                  ============================================
                  */
                  function validarol() {
                    let roluser = document.getElementById('roluser').value;
                    
                    if (roluser=='') {
                      alert('No selecciono un rol de usuario')
                      document.getElementById("roluser").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#roluser'
                    }
                  }
                  /*
                  ============================================
                  Detener el intento de registro tercer Bloque
                  ============================================
                  */
                  function validacion3() {
                    let user = document.getElementById('user').value;
                    let correo = document.getElementById('correo').value;
                    let password1 = document.getElementById('password1').value;
                    let password2 = document.getElementById('password2').value;
                    if(user==''){
                      alert('No escribio su nombre de Usuario')
                      document.getElementById("user").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#user'
                    }
                    if (correo =='') {
                      alert('No escribio su correo')
                      document.getElementById("correo").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#correo'
                    }
                    if (password1=='') {
                      alert('No escribio una contraseña')
                      document.getElementById("password1").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#password1'
                      }
                    if (password1 != password2) {
                      alert('Las contraseña no Coinciden ')
                      document.getElementById("password2").value = "";
                    }    
                  }
                  /*
                  ============================================
                  Detener el intento de registro cuarto Bloque
                  ============================================
                  */
                  function validacion4() {
                    let password2 = document.getElementById('password2').value;
                    let pregunta = document.getElementById('pregunta').value;
                    let Respuesta = document.getElementById('Respuesta').value;
                    if (password2 =='') {
                      alert('Aun no has repetido la contraseña');
                      document.getElementById("password2").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#password2'
                    }   
                  }
                    /*
                  ============================================
                  Validar todos los inputs
                  ============================================
                  */
                  function revalidar() {
                    let pregunta = document.getElementById('pregunta').value;
                    let Respuesta = document.getElementById('Respuesta').value;
                    if (pregunta == '') {
                      alert('No escribio una Pregunta');
                      document.getElementById("pregunta").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#pregunta'
                    }
                    if (Respuesta == '') {
                      alert('No escribio una Respuesta');
                      document.getElementById("Respuesta").className = "form-control p_input text-dark bg-warning";
                      document.location.href='#Respuesta'         
                    }
                    validacion1();
                    validacion2();
                    validacion3();
                    validacion4();
                    validarol();
                    tipopersona();
                  }
                
                </script>
                <br>
                <!-- 2 END CONTRASEÑA -->
            
                <button type="submit" onclick="revalidar();" class="btn btn-primary btn-block enter-btn">Registrate</button></a>
                <div class="form-group d-flex align-items-center justify-content-center">
                  <!-- <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p> -->
                </div>
                <div class="d-flex">
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