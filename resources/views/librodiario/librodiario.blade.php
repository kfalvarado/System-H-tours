@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Libro Diario | inicio
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




<style>
    input[type=file]::file-selector-button {
      border: 2px solid #6c5ce7;
      padding: .2em .4em;
      border-radius: .2em;
      background-color: #a29bfe;
      transition: 1s;
    }
    
    input[type=file]::file-selector-button:hover {
      background-color: #81ecec;
      border: 2px solid #00cec9;
    }
  </style>


<!-- ESTE CSS ES PARA OCULTAR DATOS EN LA IMPRESION-->
  <style>
    
@media print{
  .oculto-impresion, .oculto-impresion *{
    display: none !important;
  }
}

/*<elemento class="oculto-impresion"><!-- AQUI EMPIEZA PARA OCULTAR EN LA IMPRESION INICIO-->
      </elemento><!-- AQUI SE QUITA PARA IMPRIMIR ESTO NO SALDRA FIN-->*/
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






<!-- <div class="main-panel">
          <div class="content-wrapper"> -->
            <!--<center> <h1>Libro Diario</h1> </center>-->
            <center><h1>Libro Diario</h1> </center>

<!--OCULTAR ELEMENTOS CON CSS ESTA ES LA CLASE LO QUE ESTE DENTRO APARECE EN LA PAGINA PERO NO EN LA IMPRESION EL CSS ESTA AL INICIO-->
            <!--<elemento class="oculto-impresion">  AQUI VA LO QUE SE QUIERE OCULTAR   </elemento>-->
                 <!-- INICIO MODAL PARA comprobante  -->
                 <div class="modal-container">
                  <div class="modal fade bd-example-modal-lg" id="comprobante">
                        <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                   <div class="modal-dialog modal-md">
                   <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO EDITAR -->
                   <div class="modal-header">
                   <h4 class="modal-title">Editar SubCuentas</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                   </div>
                        <!-- CUERPO DEL DIALOGO EDITAR -->
                   <div class="modal-body">
                    <center>
                      <img src="..\../assets/images/OIP.jpg" alt="">
                    </center>
                  </div> 
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </center>
                  </div>
                  </div>
                  </div>
                  </div>
                      <!-- FIN DE MODAL PARA EDITAR  -->

            <div class="page-header">
                  <!-- INICIO MODAL PARA NUEVA  -->
           <div class="modal-container">
           <div class="modal fade bd-example-modal-lg" id="dialogo1">
                 <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                 <!-- CABECERA DEL DIALOGO NUEVA-->
            <div class="modal-header">
            <h4 class="modal-title">Ingresar a Libro Diario</h4>
            </div>
                 <!-- CUERPO DEL DIALOGO NUEVA -->
            <div class="modal-body">
            <center>
            <form action="" method="post">
              <label class="form-label">
                Seleccionar Cuenta
                <select class="form-control text-white" name="" id="">
                  <option value=""></option>
                  <option value="">Caja</option>
                  <option value="">Proveedores</option>
                  <option value="">Capital</option>
                </select>
                </input>
              </label>
              <label class="form-label">
                Nombre de Sub Cuenta
                <select class="form-control text-white">
                  <option value=""></option>
                  <option value="">Cheques</option>
                  <option value="">Depositos</option>
                  <option value="">Aportacions</option>
                </select>
                </label>
              <button> + </button>
            <label class="form-label">
            Saldo
            <input type='number' min="0" name='COS PRODUCTO' class="form-control text-white"  required></input> 
            </label>
            <br>
                  <label class="radio-inline">
                      <input type="radio" name="Tipo" value=1>Debe
                  </label>
                  &nbsp;&nbsp; 
                  <label class="radio-inline">
                      <input type="radio" name="Tipo" value=2>Haber
                  </label><hr/>
            <label class="form-label">
              Comprobante
              <br>
              <form>
                <input type="file" id="fileUpload">
              </form>

              </label>
            <label class="form-label">
            Fecha
            <input type='date' name='COS PRODUCTO' class="form-control  text-white"  required></input> 
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
             <h4 class="modal-title">Editar Libro Diario</h4>
             </div>
                  <!-- CUERPO DEL DIALOGO EDITAR -->
             <div class="modal-body">
             <center>
             <form action="" method="post">
              <label class="form-label">
                Seleccionar Cuenta
                <select class="form-control text-white" name="" id="">
                  <option value=""></option>
                  <option value="">Caja</option>
                  <option value="">Proveedores</option>
                  <option value="">Capital</option>
                </select>
                </input>
              </label>
              <label class="form-label">
                Nombre de Sub Cuenta
                <select class="form-control text-white">
                  <option value=""></option>
                  <option value="">Cheques</option>
                  <option value="">Depositos</option>
                  <option value="">Aportacions</option>
                </select>
                </label>
            <label class="form-label">
            Saldo
            <input type='number' min="0" name='COS PRODUCTO' class="form-control text-white"  required></input> 
            </label>
            <br>
                  <label class="radio-inline">
                      <input type="radio" name="Tipo" value=1>Debe
                  </label>
                  &nbsp;&nbsp; 
                  <label class="radio-inline">
                      <input type="radio" name="Tipo" value=2>Haber
                  </label><hr />
            <label class="form-label">
              Comprobante
              <br>
              <form>
                <input type="file" id="fileUpload">
              </form>
              </label>
            <label class="form-label">
            Fecha
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
             <h4 class="modal-title">Eliminar Libro Diario</h4>
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

                  <!-- INICIO MODAL PARA INGRESADA  -->
                  <div class="modal-container">
                    <div class="modal fade bd-example-modal-lg" id="dialogo5">
                          <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                     <div class="modal-dialog modal-sm">
                     <div class="modal-content">
                          <!-- CABECERA DEL DIALOGO NUEVA-->
                     <div class="modal-header">
                     <h4 class="modal-title">Estado de la Sub Cuenta</h4>
                     </div>
                          <!-- CUERPO DEL DIALOGO INGRESADA -->
                     <div class="modal-body">
                     <center>
                     <form action="" method="post">
                     <label class="form-label">
                     Esta Sub cuenta ha sido ingresada en el libro diario
                     </label>
                     </form>
                     </div> 
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                     </center>
                     </div>
                     </div>
                     </div>
                     </div>
                         <!-- FIN DE MODAL PARA INGRESADA  -->
         
                           <!-- INICIO MODAL PARA PENDIENTE  -->
                    <div class="modal-container">
                     <div class="modal fade bd-example-modal-lg" id="dialogo6">
                           <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                      <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                           <!-- CABECERA DEL DIALOGO PENDIENTE-->
                      <div class="modal-header">
                      <h4 class="modal-title">Estado de la Sub Cuenta</h4>
                       
                      </div>
                       
                          <!-- CUERPO DEL DIALOGO PENDIENTE -->
                          <div class="modal-body">
                           <center>
                           <form action="" method="post">
                           <label class="form-label">
                           Esta Sub cuenta esta pendiente, no ha sido totalizada por el libro Mayor
                           </label>
                           </form>
                           </div> 
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                           </center>
                           </div>
                           </div>
                           </div>
                           </div>
                               <!-- FIN DE MODAL PARA PENDIENTE  -->
                  
                           <!-- INICIO MODAL PARA PROCESADA  -->
                           <div class="modal-container">
                             <div class="modal fade bd-example-modal-lg" id="dialogo7">
                                   <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                              <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                   <!-- CABECERA DEL DIALOGO PROCESADA-->
                              <div class="modal-header">
                              <h4 class="modal-title">Estado de la Sub Cuenta</h4>
                              </div>
                                  <!-- CUERPO DEL DIALOGO PROCESADA -->
                                  <div class="modal-body">
                                   <center>
                                   <form action="" method="post">
                                   <label class="form-label">
                                   Esta Sub cuenta  procesada, ha sido totalizada por el libro Mayor
                                   </label>
                                   </form>
                                   </div> 
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                   </center>
                                   </div>
                                   </div>
                                   </div>
                                   </div>
                                       <!-- FIN DE MODAL PARA PROCESADA  -->

            </div>
                <p align="right" valign="baseline">
                   <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button> <a type="button"  class="btn btn-success" href="javascript:window.print();">Generar PDF</a>
                    
          </p>
          <!--BUSCADOR VERDE CON CSS     INICIO-->
          <div class="demo">
            <form class="form-search">
              <div class="input-group">
                <input class="form-controlprueba form-text" maxlength="1000" placeholder="Buscar" size="30" type="text" /> &nbsp;
                <button class="btnprueba"> BUSCAR </button>
              </div>
            </form>
          </div>
          <!--BUSCADOR VERDE CON CSS     FIN-->

            <div class="row">
          
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
               
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual"  >
                        <thead>
                          <tr>
                            <th class="text-dark bg-white"> # </th>
                            <th class="text-dark bg-white"> Codigo </th>
                            <th class="text-dark bg-white"> Detalle  </th>
                            <th class="text-dark bg-white"> Saldo Debe </th>
                            <th class="text-dark bg-white"> Saldo Haber </th>
                            <th class="text-dark bg-white"> Comprobantes </th>
                            <th class="text-dark bg-white"> Fecha </th>
                            <th class="text-dark bg-white"> Estado </th>
                            <th class="text-dark bg-white"> Acciones </th>
                            


                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td> 1 </td>
                            <td> 1.1.1 </td>
                            <td> Efectivo  </td>
                            <td> 2500.00 </td>
                            <td>  </td>
                            <td> <a href="" data-toggle="modal" data-target="#comprobante">   image1651861487718.jpeg  </a> </td>
                            <td> May 15, 2022 </td>
                            <td><button type="button"  class="btn btn-primary"  data-toggle="modal" data-target="#dialogo5">Ingresada</button>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 2 </td>
                            <td> 2.1.1 </td>
                            <td> Cable color </td>
                            <td>  </td>
                            <td> 2500.00 </td>
                            <td> <a href="" data-toggle="modal" data-target="#comprobante">   image1651861487718.jpeg  </a> </td>
                            <td> May 15, 2022 </td>
                            <td><button type="button"  class="btn btn-primary"  data-toggle="modal" data-target="#dialogo5">Ingresada</button>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 3 </td>
                            <td> 3.1.1 </td>
                            <td> Aportaciones </td>
                            <td> 1500.00 </td>
                            <td>  </td>
                            <td> <a href="" data-toggle="modal" data-target="#comprobante">   image1651861487718.jpeg  </a> </td>
                            <td> May 15, 2022 </td>
                            <td><button type="button"  class="btn btn-warning"  data-toggle="modal" data-target="#dialogo6">Pendiente</button>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 4 </td>
                            <td> 2.1.3 </td>
                            <td> Acreedores </td>
                            <td> 1600.00 </td>
                            <td>  </td>
                            <td> <a href="" data-toggle="modal" data-target="#comprobante">   image1651861487718.jpeg  </a> </td>
                            <td> May 15, 2022 </td>
                            <td><button type="button"  class="btn btn-warning"  data-toggle="modal" data-target="#dialogo6">Pendiente</button>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 5 </td>
                            <td> 3.1.1 </td>
                            <td> Aportaciones </td>
                            <td> 9000.00 </td>
                            <td> <a href="" data-toggle="modal" data-target="#comprobante">   image1651861487718.jpeg  </a> </td>
                            <td> May 15, 2022 </td>
                            <td><button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo7">Procesada</button></td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
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