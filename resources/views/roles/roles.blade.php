@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Roles
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
{{ asset('assets/images/varon.png')}}
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
Fabricio
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
Administrador
@endsection

<!-- foto del menu de la derecha -->
@section('foto-user2')
{{ asset('assets/images/varon.png')}}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
Fabricio
@endsection
<!-- contenido de la pagina  -->
@section('contenido')

 
          <!-- INICIO MODAL PARA NUEVA  -->
          <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo1">
                  <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
             <div class="modal-dialog modal-md">
             <div class="modal-content">
                  <!-- CABECERA DEL DIALOGO NUEVA-->
             <div class="modal-header">
             <h4 class="modal-title">Ingresar Roles</h4>
                  <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
             </div>
                  <!-- CUERPO DEL DIALOGO NUEVA -->
             <div class="modal-body">
             <center>
             <form action="" method="post">
             <label class="form-label">
             Ingrese el Rol
             <input type='text' name='Clasificacion' class="form-control" required></input> 
             </label>
             <label class="form-label">
             Descripcion
             <textarea name="" id="" cols="30" rows="10" class="form-control text-white" ></textarea>
      
             </label>
             <label class="form-label">
             Estado del Rol
             <input type='text' name='Estado' class="form-control" required></input> 
            </label>
            <label class="form-label">
          
             

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
              <h4 class="modal-title">Editar Roles</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
                   <!-- CUERPO DEL DIALOGO EDITAR -->
              <div class="modal-body">
              <center>
              <form action="" method="post">
              <label class="form-label">
              Rol
              <input type='text' name='ROL' value="Administrador" class="form-control text-white" required></input> 
              </label>
              <label class="form-label">
              Descripción
              <textarea name="" id="" cols="30" class="form-control text-white" rows="10"></textarea>
              
              </label>
         
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
              <h4 class="modal-title">Eliminar roles</h4>
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
            <center> <h1>Roles H Tours Honduras</h1> </center>
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
                    <center><h4 class="card-title">Registros de Roles</h4></center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr class="text-dark bg-white">
                            <th class="text-dark bg-white">#</th>
                            <th class="text-dark bg-white">Rol</th>
                             <th class="text-dark bg-white">Descripcion</th>
                             <th class="text-dark bg-white">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td>1</td>
                            <td>Administrador</td>
                            <td>Activo</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                          </tr>
                          <tr class="text-white bg-dark">
                            <td>2</td>
                            <td>Oficial</td>
                            <td>Activo</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>

                          </tr>
                          <tr class="text-white bg-dark">
                            <td>3</td>
                            <td>Gerente</td>
                            <td>Activo</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td></button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>4</td>
                            <td>Subgerente</td>
                            <td>Activo</td>
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