@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Administración | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
{{ asset('assets/images/dama.png') }}
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
Scarleth
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
Administrador
@endsection

<!-- foto del menu de la derecha -->
@section('foto-user2')
{{ asset('assets/images/dama.png')}}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
Scarleth
@endsection

@section('contenido')
  
<!-- VISTA ADMIN-->
<main class="model-container">
    <!--TITULO-->
    <div class="content-wrapper" class="panel panel-default" style="background-color:rgba(2, 115, 134, 0.911);">
        <div class="panel-body" >
            <center> <h1>Opciones Administrador</h1> </center>
        </div>
    </div>
     
    <div class="content-wrapper" style="background-color:rgba(30, 0, 29);">
   
    <!-- TABLA PRINCIPAL -->
    <table cellspacing="10" cellpadding="10" align="center"> 
      <tr>
      <td>
      <!-- TABLA SECUNDARIA 1 COLUMNA -->
      <table  border="3" bordercolor="gray" rules="none" bgcolor="#424242">
        <tr>
          <td cellspacing="1" cellpadding="1">
            <center><img class="img-md" width="110" height="110"  src="../../assets/images/HTOURS.png" alt=""></center>
            <center> <h3>Editar Nombre</h3> </center>
              <br>
              <form action="" method="post">
                <div class="input-group  mb-3 ml-3 mr-3">
                  <span class="mr-1"><h4>Nuevo nombre :</h4></span>
                  <input name="" type="text" class="bg-dark text-white" id="" placeholder="Nuevo nombre">
                  <button onclick="alert('Nombre modificado');" type="submit" class="btn btn-primary">Aceptar</button></h4>
                </div>
                <div class="input-group  mb-3 ml-3 mr-3">
                  <span class="mr-3"><h4>Nuevo correo :</h4></span>
                  <input name="" type="text" class="bg-dark text-white" id="" placeholder="Nuevo correo">
                  <button onclick="alert('Correo modificado');" type="submit" class="btn btn-primary">Aceptar</button></h4>
                </div>
              </form>
          </td>
        </tr>
      </table>

      </td>
      <!-- ESPACIO DE TABLAS -->
      <td width="12%"></td>
      <!-- TERCERA TABLA 2 COLUMNA -->
      <td>
      <table  border="3" bordercolor="016EA4" rules="none" bgcolor="00919E">
          <tr>
            <td >
              <center> <h3>Editar contraseña</h3> </center>
              <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
          <form class="form-group" method="POST">
              <p><H4><i class="mdi mdi-lock" onclick="mostrarCont()"></i>Contraseña Actual:</H4>
                  <input class="text-dark bg-white" type="password" name="password3" id="password3" required>
              </p>
          </form>
        <script>
          function mostrarCont(){
              var tipo = document.getElementById("password3");
              if(tipo.type == "password"){
                  tipo.type = "text";
              }else{
                  tipo.type = "password";
              }
          }
        </script>
        <!-- END CONTRASEÑA -->
            </td>
          </tr>
          <tr>
            <td cellspacing="1" cellpadding="1">
                <!-- CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
          <form class="form-group" method="POST">
              <p><H4><i class="mdi mdi-lock" onclick="mostrarContrasena()"></i> Nueva Contraseña:</H4>
                  <input class="text-dark bg-white" type="password" name="password" id="password" required>
                  <button onclick="alert('Tu Contraseña se ha modificado');" type="submit" class="btn btn-primary">Editar</button>
              </p>
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
            </td>
        </tr>
      </table>
      </td>
      </tr>
    </table>
</main>

@endsection