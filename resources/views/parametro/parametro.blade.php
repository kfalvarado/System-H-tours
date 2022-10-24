@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Parametro | inicio
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
<div class="modal-container">
  <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
   <div class="modal-dialog modal-sm">
   <div class="modal-content">
        <!-- CABECERA DEL DIALOGO NUEVA-->
   <div class="modal-header">
   <h4 class="modal-title">Ingresar Parametros</h4>
        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
   </div>
        <!-- CUERPO DEL DIALOGO NUEVA -->
   <div class="modal-body">
   <center>
   <form action="" method="post">
   <label class="form-label">
    Parametro
   <input type='text' name='Clasificacion' class="form-control text-white" required></input> 
   </label>
   <label class="form-label">
   Valor
   <input type='number' name='Numero de Cuenta' class="form-control text-white" required></input> 
   </label>
   <label class="form-label">
   Id usuario
   <input type='text' name='Nombre de Cuenta' class="form-control text-white"  required></input> 
   </label>
   <label class="form-label">
   Fecha creación
   <input type='number' name='saldo' class="form-control text-white"  required></input> 
   </label>
   <label class="form-label">
   Fecha Modificación
   <input type='number' name='fecha' class="form-control text-white"  required></input> 
   </label>



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
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
         <!-- CABECERA DEL DIALOGO EDITAR -->
    <div class="modal-header">
    <h4 class="modal-title">Editar Parametro</h4>
         <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
    </div>
         <!-- CUERPO DEL DIALOGO EDITAR -->
    <div class="modal-body">
    <center>
    <form action="" method="post">
    <label class="form-label">
    Parametro
    <input type='text' name='PARAMETRO' class="form-control text-white" required></input> 
    </label>
    <label class="form-label">
    Valor
    <input type='number' name='VALOR' class="form-control text-white" required></input> 
    </label>
    <label class="form-label">
    Id Usuario
    <input type='number' name='ID USUARIO' class="form-control text-white"  required></input> 
    </label>
    <label class="form-label">
    Fecha creación
    <input type='number' name='FECH CREACION' class="form-control text-white"  required></input> 
    </label>
    <label class="form-label">
    Fecha Modificación
    <input type='number' name='FECH MODIFICACION' class="form-control text-white"  required></input> 
    </label>


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
    <h4 class="modal-title">Eliminar parametros</h4>
         <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
    </div>
         <!-- CUERPO DEL DIALOGO BORRAR -->
    <div class="modal-body">
    <center>
    <form action="" method="post">
    <label class="form-label">
    ¿ Desea Eliminar la Transaccion ?
     
    </label>
    


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


<div class="content-wrapper">
  <center> <h1>Parametros H Tours Honduras</h1> </center>
  <h5>________________________________________________________________________________________________________________</h5>
  <!-- <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#"></a></li>
  </ul> -->
  <p align="right" valign="baseline">
    <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
  </p>
  
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#"></a></li>
    </ul>
    
    
  
    
  
 
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <center><h4 class="card-title">Registros de parametros</h4></center>
          <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
          </p>
          <div class="table-responsive">
            <table class="table table-bordered table-contextual">
              <thead>
                <tr class="text-dark bg-white">
                  <th class="text-dark bg-white">#</th>
                  <th class="text-dark bg-white">Parametros</th>
                   <th class="text-dark bg-white">Valor</th>
                   <th class="text-dark bg-white">Usuario</th>
                   <th class="text-dark bg-white">Fecha de Creación</th>
                   <th class="text-dark bg-white">Fecha Modificación</th>
                   <th class="text-dark bg-white">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-white bg-dark">
                  <td>1</td>
                  <td>Admin Num Registros</td>
                  <td>2</td>
                  <td>Jose</td>
                  <td>06/11/2021</td>
                  <td>16/08/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>2</td>
                  <td>Admin Intentos invalidos</td>
                  <td>3</td>
                  <td>Carmen</td>
                  <td>26/11/2020</td>
                  <td>10/12/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>3</td>
                  <td>Admin Preguntas</td>
                  <td>3</td>
                  <td>Rosa</td>
                  <td>03/01/2020</td>
                  <td>09/08/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>4</td>
                  <td>Admin Correo</td>
                  <td>correo@dominio.com</td>
                  <td>Pedro</td>
                  <td>12/01/2020</td>
                  <td>11/08/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>5</td>
                  <td>Admin Usuario</td>
                  <td>Usuario</td>
                  <td>Cindy</td>
                  <td>27/01/2020</td>
                  <td>12/08/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>6</td>
                  <td>Admin Pass</td>
                  <td>Password</td>
                  <td>Karla</td>
                  <td>23/01/2020</td>
                  <td>14/08/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>7</td>
                  <td>Admin Vigencia</td>
                  <td>30</td>
                  <td>Lucas</td>
                  <td>26/11/2020</td>
                  <td>11/08/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>8</td>
                  <td>Admin Impuesto</td>
                  <td>15%</td>
                  <td>Juan</td>
                  <td>2/11/2020</td>
                  <td>10/09/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>9</td>
                  <td>Sys Nombre</td>
                  <td>Sistema X</td>
                  <td>Roberto</td>
                  <td>05/08/2020</td>
                  <td>11/08/22</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

              </tbody>
            </table>
          </div>
        </div>
      </div>      
@endsection