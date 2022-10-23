@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Usuarios | inicio
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
<div class="container-scroller">
  <div class="content-wrapper">
    <center> <h1>Usuarios H Tours Honduras</h1> </center>
    <h5>_____________________________________________________________________________________</h5>
    <!-- <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="#"></a></li>
    </ul> -->
    <p align="right" valign="baseline">
      <button type="button"  class="btn btn-success mr-3"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
    </p>
    
    <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="#"></a></li>
      </ul>
      
      
    
      
    
   
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <center><h4 class="card-title">Registros de usuarios</h4></center>
            <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
            </p>
            <div class="table-responsive">
              <table class="table table-bordered table-contextual">
                <thead>
                  <tr class="text-dark bg-white">
                    <th class="text-dark bg-white">#</th>
                    <th class="text-dark bg-white">Usuarios</th>
                     <th class="text-dark bg-white">Nombre usuario</th>
                     <th class="text-dark bg-white">Estado</th>
                     <th class="text-dark bg-white">Rol</th>
                     <th class="text-dark bg-white">Ultima Conexión</th>
                     <th class="text-dark bg-white">Preguntas contestadas</th>
                     <th class="text-dark bg-white">Ingresos</th>
                     <th class="text-dark bg-white">Fecha vencimiento</th>
                     <th class="text-dark bg-white">Correo Electronico</th>
                     <th class="text-dark bg-white">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-white bg-dark">
                    <td>1</td>
                    <td>Usuario1</td>
                    <td>Scarleth</td>
                    <td>Activo</td>
                    <td>Usuario</td>
                    <td>16/08/22</td>
                    <td>2</td>
                    <td>3</td>
                    <td>25/09/22</td>
                    <td>scarleth@gmail.com</td>
                    <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                  </tr>
                  <tr class="text-white bg-dark">
                    <td>2</td>
                    <td>Usuario2</td>
                    <td>Jose</td>
                    <td>Activo</td>
                    <td>Usuario</td>
                    <td>16/08/22</td>
                    <td>2</td>
                    <td>3</td>
                    <td>25/09/22</td>
                    <td>jose@gmail.com</td>
                    <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                  </tr>
                  <tr class="text-white bg-dark">
                    <td>3</td>
                    <td>Usuario3</td>
                    <td>Carmen</td>
                    <td>Activo</td>
                    <td>Usuario</td>
                    <td>16/08/22</td>
                    <td>2</td>
                    <td>3</td>
                    <td>25/09/22</td>
                    <td>Carmen@gmail.com</td>
                    <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
  <!-- content-wrapper ends -->

  <!-- INICIO MODAL PARA NUEVA  -->
     <div class="modal-container">
    <div class="modal fade bd-example-modal-lg" id="dialogo1">
          <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
     <div class="modal-dialog modal-md">
     <div class="modal-content">
          <!-- CABECERA DEL DIALOGO NUEVA-->
     <div class="modal-header">
     <h4 class="modal-title">Ingresar Usuarios</h4>
          <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
     </div>
          <!-- CUERPO DEL DIALOGO NUEVA -->
     <div class="modal-body">
     <center>
     <form action="" method="post">
      <label class="form-label">
        Usuario
       <input type='text' name='Clasificacion' class="form-control text-white" required></input> 
       </label>
     <label class="form-label">
      Nombre del usuario
     <input type='text' name='Clasificacion' class="form-control text-white" required></input> 
     </label>
     <label class="form-label">
      Seleccionar el Rol
       
       <select class="form-control text-white" name="" id="">
         <option value=""></option>
         <option value="">Administrador</option>
         <option value="">Usuario</option>
       </select> 
       </label>
       <br>
     <label class="form-label">
      Correo Electronico
     <input type='email' name='saldo' class="form-control text-white"  required></input> 
     </label>
     <br>
     <label class="form-label">
      Contraseña
      <input type='password' name='CORREO ELECTRONICO' class="form-control text-white"  required></input> 
      </label>
      <br>
     <label class="form-label">
     Fecha de vencimiento
     <input type='date' name='fecha' class="form-control text-white"  required></input> 
     </label>
     <br>
 

     <a href="" class="btn btn-secondary">Cancelar</a>
     <button type="submit" class="btn btn-primary">Registrar </button>
     </form>
     </div> 
     <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
     </center>
     </div>
     </div>
     </div>
     </div>
         <!-- FIN DE MODAL PARA NUEVA  -->


         
     
       
           <!-- INICIO MODAL PARA EDITAR  -->
    <div class="modal-container">
     <div class="modal fade bd-example-modal-lg" id="dialogo2">
           <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
      <div class="modal-dialog modal-md">
      <div class="modal-content">
           <!-- CABECERA DEL DIALOGO EDITAR -->
      <div class="modal-header">
      <h4 class="modal-title">Editar Usuario</h4>
           <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
      </div>
           <!-- CUERPO DEL DIALOGO EDITAR -->
      <div class="modal-body">
      <center>
      <form action="" method="post">
        <label class="form-label">
          Usuario
         <input type='text' name='Clasificacion' class="form-control text-white" required></input> 
         </label>
      <label class="form-label">
      Nombre usuario
      <input type='text' name='NOM USUARIO' class="form-control text-white" required></input> 
      </label>
      <label class="form-label">
     Seleccionar el Rol
      
      <select class="form-control text-white" name="" id="">
        <option value=""></option>
        <option value="">Administrador</option>
        <option value="">Usuario</option>
      </select> 
      </label>
     <br>
  
      <label class="form-label">
      Correo Electronico
      <input type='email' name='CORREO ELECTRONICO' class="form-control text-white"  required></input> 
      </label>
      <label class="form-label">
        Contraseña
        <input type='password' name='CORREO ELECTRONICO' class="form-control text-white"  required></input> 
        </label>
      <label class="form-label">
      Fecha de vencimiento
      <input type='date' name='COS PRODUCTO' class="form-control text-white"  required></input> 
      </label>
  <br>

      <a href="" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">Registrar </button>
      </form>
      </div> 
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </center>
      </div>
      </div>
      </div>
      </div>
          <!-- FIN DE MODAL PARA EDITAR  -->

      


     
       
           <!-- INICIO MODAL PARA BORRAR  -->
    <div class="modal-container">
     <div class="modal fade bd-example-modal-lg" id="dialogo3">
           <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
           <!-- CABECERA DEL DIALOGO EDITAR -->
      <div class="modal-header">
      <h4 class="modal-title">Eliminar usuarios</h4>
           <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
      </div>
           <!-- CUERPO DEL DIALOGO BORRAR -->
      <div class="modal-body">
      <center>
      <form action="" method="post">
      <label class="form-label">¿ Desea eliminar usuario ? </label>
      <br>
      <a href="" class="btn btn btn-primary">SI</a>
      <a href="" class="btn btn-secondary">NO</a>
      
      </form>
      </div> 
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </center>
      </div>
      </div>
      </div>
      </div>
          <!-- FIN DE MODAL PARA BORRAR  -->

    <!-- partial -->
    <div class="main-panel">
  
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
      <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
    </div>
  </footer>
  <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>

</div>
@endsection