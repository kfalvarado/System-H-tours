@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Objetos | inicio
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
 <!-- INICIO MODAL PARA NUEVA  -->
 <div class="modal-container">
  <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
   <div class="modal-dialog modal-sm">
   <div class="modal-content">
        <!-- CABECERA DEL DIALOGO NUEVA-->
   <div class="modal-header">
   <h4 class="modal-title">Ingresar Objetos</h4>
        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
   </div>
        <!-- CUERPO DEL DIALOGO NUEVA -->
   <div class="modal-body">
   <center>
   <form action="" method="post">
   <label class="form-label">
    Objeto
   <input type='text' name='Clasificacion' class="form-control text-white" required></input> 
   </label>
   <label class="form-label">
   Descripcion
   <input type='text' name='Descripcion' class="form-control text-white" required></input> 
   </label>
   <label class="form-label">
   Tipo Objeto
   <input type='text' name='Tipo' class="form-control text-white"  required></input> 
   </label>
   <label class="form-label">
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
    Objeto
    <input type='text' name='OBJETO' class="form-control text-white" required></input> 
    </label>
    <label class="form-label">
    Descripcion
    <input type='text' name='DESCRIPCION' class="form-control text-white" required></input> 
    </label>
    <label class="form-label">
    Tipo Objeto
    <input type='text' name='TIPO OBJETO' class="form-control text-white"  required></input> 
    </label>
    <label class="form-label">
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
    <h4 class="modal-title">Eliminar Objeto</h4>
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
  <center> <h1>Objetos H Tours Honduras</h1> </center>
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
          <center><h4 class="card-title">Registros de Objetos</h4></center>
          <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
          </p>
          <div class="table-responsive">
            <table class="table table-bordered table-contextual">
              <thead>
                <tr class="text-dark bg-white">
                  <th class="text-dark bg-white">#</th>
                  <th class="text-dark bg-white">Objetos</th>
                   <th class="text-dark bg-white">Descripción</th>
                   <th class="text-dark bg-white">Tipo de objetos</th>
                   <th class="text-dark bg-white">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-white bg-dark">
                  <td>1</td>
                  <td>Principal</td>
                  <td>Usuario</td>
                  <td>Pantalla</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>2</td>
                  <td>Mant. Usuario</td>
                  <td>Administrador</td>
                  <td>Pantalla</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                </tr>
                <tr class="text-white bg-dark">
                  <td>3</td>
                  <td>Mant. Clasificacion</td>
                  <td>Administrador</td>
                  <td>Pantalla</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>
                </tr>
                <tr class="text-white bg-dark">
                  <td>4</td>
                  <td>Mant. Permisos</td>
                  <td>Administrador</td>
                  <td>Pantalla</td>
                  <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
     
  </div>
</footer>
<!-- partial -->
</div>  
@endsection