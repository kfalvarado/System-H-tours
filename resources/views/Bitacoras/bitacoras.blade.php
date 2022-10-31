@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Libro Mayor | inicio
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



    <!-- ESTE CSS ES PARA OCULTAR DATOS EN LA IMPRESION-->
    <style>
    
    @media print{
      .oculto-impresion, .oculto-impresion *{
        display: none !important;
      }
    }
    </style>
<!--BUSCADOR VERDE CON CSS INICIO-->
<style>
 
  .form-controlprueba
 {
   /*width:8000;*/
     /*position: relative;*/
     background-color: black;
     color: white;
     letter-spacing: 0px;
     border: 1px solid green;
     padding: 6px;
     font-size: 15px;
     font-family: Arial;
     font-weight: bold;
     transition: 0.50s;
     border-radius:5px;
 }
 </style> 
 <style>
  
  .form-controlprueba:hover
 {
  border-color: green;
  box-shadow: 0 0px 10px 0 green inset,0 10px 70px 0 green,
     0 0px 10px 0 green inset,0 10px 20px 0 green;
     text-shadow: 0 0 0px green;
 }
.btnprueba {
  
   /*width:8000;*/
     /*position: relative;*/
     
     background-color: black;
     color: white;
     letter-spacing: 0px;
     border: 1px solid green;
     padding: 6px;
     font-size: 15px;
     font-family: Arial;
     font-weight: bold;
     transition: 0.50s;
     border-radius:5px;
 }
 .btnprueba:hover{

  background-color: green;
  box-shadow: 0 0px 10px 0 green inset,0 10px 70px 0 green,
     0 0px 10px 0 green inset,0 10px 20px 0 green;
     text-shadow: 0 0 0px green;
 }
  </style>

      
                 <!-- INICIO MODAL PARA NUEVA  -->
          <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo1">
                  <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
             <div class="modal-dialog modal-sm">
             <div class="modal-content">
                  <!-- CABECERA DEL DIALOGO NUEVA-->
             <div class="modal-header">
             <h4 class="modal-title">Ingresar Bitacora</h4>
                  <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
             </div>
                  <!-- CUERPO DEL DIALOGO NUEVA -->
             <div class="modal-body">
             <center>
             <form action="" method="post">
             <label class="form-label">
              Fecha Registro
             <input type='number' name='Clasificacion' class="form-control text-white" required></input> 
             </label>
             <label class="form-label">
             Usuario Registro
             <input type='text' name='usuario registro' class="form-control text-white" required></input> 
             </label>
             <label class="form-label">
             Acciones en el sistema
             <input type='text' name='Permiso Eliminacion' class="form-control text-white"  required></input> 
             </label>
             <label class="form-label">
             Descripcion Bitacora
             <input type='text' name='permiso' class="form-control text-white"  required></input> 
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
              <h4 class="modal-title">Editar Bitacora</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
                   <!-- CUERPO DEL DIALOGO EDITAR -->
              <div class="modal-body">
              <center>
              <form action="" method="post">
              <label class="form-label">
              Fecha Registro
              <input type='number' name='FECHA REGISTRO' class="form-control text-white" required></input> 
              </label>
              <label class="form-label">
              Usuario Registro 
              <input type='text' name='USUARIO REGISTRO' class="form-control text-white" required></input> 
              </label>
              <label class="form-label">
              Acciones sistema
              <input type='text' name='ACCIONES SISTEMA' class="form-control text-white"  required></input> 
              </label>
              <label class="form-label">
              Descripcion bitacora
              <input type='text' name='DESCRIPCION BITACORA' class="form-control text-white"  required></input> 
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
              <h4 class="modal-title">Eliminar Bitacira</h4>
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
            <center> <h1>Bitacora H Tours Honduras</h1> </center>
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
                    <center><h4 class="card-title">Registros de bitacora</h4></center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr class="text-dark bg-white">
                            <th class="text-dark bg-white">#</th>
                            <th class="text-dark bg-white">Fecha registro</th>
                             <th class="text-dark bg-white">U registro</th>
                             <th class="text-dark bg-white">Acciones sistema</th>
                             <th class="text-dark bg-white">Descripcion Bitacora</th>          
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td>1</td>
                            <td>02/12/2021</td>
                            <td>Jose</td>
                            <td>Actualizar</td>
                            <td>Actualizar</td>
                       
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>2</td>
                            <td>02/12/2021</td>
                            <td>Cramen</td>
                            <td>Actualizar</td>
                            <td>Actualizar</td>
                            
                        
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>3</td>
                            <td>02/12/2021</td>
                            <td>Rosa</td>
                            <td>Actualizar</td>
                            <td>Actualizar</td>
                          
                            
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