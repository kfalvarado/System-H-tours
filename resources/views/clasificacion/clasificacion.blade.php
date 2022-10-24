@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Clasificacion | inicio
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

<main class="container">
        <!-- INICIO CLASIFICACION  --> 
        <div class="container-scroller">
        <div class="content-wrapper">
          <center> <h1>Clasificacion H Tours Honduras</h1> </center>
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
                  <center><h4 class="card-title">Registros de Clasificaciones</h4></center>
                  <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered table-contextual">
                      <thead>
                        <tr class="text-dark bg-white">
                          <th class="text-dark bg-white">#</th>
                          <th class="text-dark bg-white">Naturaleza</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-white bg-dark">
                          <td>1</td>
                          <td>Activo</td>
                          <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button>
                        
                        </tr>
                        <tr class="text-white bg-dark">
                          <td>2</td>
                          <td>Pasivo</td>
                          <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> 
                            
                        </tr>
                        <tr class="text-white bg-dark">
                          <td>3</td>
                          <td>Resultado</td>
                          <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> 
                            
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
  
        </div>
        <!-- FINAL PANEL PREGUNTAS  -->

        <!-- INICIO MODAL PARA NUEVA  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo1">
                  <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
             <div class="modal-dialog modal-sm">
             <div class="modal-content">
                  <!-- CABECERA DEL DIALOGO NUEVA-->
             <div class="modal-header">
             <h4 class="modal-title">Ingresar Clasificacion</h4>
                  <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
             </div>
                  <!-- CUERPO DEL DIALOGO NUEVA -->
             <div class="modal-body">
             <center>
             <form action="" method="post">
             <label class="form-label">
             Clasificaciones
             <input type='text' name='Clasificacion' class="form-control text-white" required></input> 
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
              <div class="modal-header ">
              <h4 class="modal-title">Editar Clasificacion</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
             
                   <!-- CUERPO DEL DIALOGO EDITAR -->
              <div class="modal-body">
              <center>
              <form action="" method="post">
              <label class="form-label">
              Clasificaciones
              <input type='text' name='Clasificacion' class="form-control text-white" required></input> 
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
 
        {{-- <!-- INICIO MODAL PARA BORRAR  --> 
        <div class="modal-container">
             <div class="modal fade bd-example-modal-lg" id="dialogo3">
                   <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
              <div class="modal-dialog modal-sm">
              <div class="modal-content">
                   <!-- CABECERA DEL DIALOGO EDITAR -->
              <div class="modal-header">
              <h4 class="modal-title">Eliminar Clasificacion</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
                   <!-- CUERPO DEL DIALOGO BORRAR -->
              <div class="modal-body">
              <center>
              <form action="" method="post">
              <label class="form-label">¿ Desea eliminar clasificacion ?</label>
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
        </div> --}}
        <!-- FIN DE MODAL PARA BORRAR  -->
</main>
        
@endsection