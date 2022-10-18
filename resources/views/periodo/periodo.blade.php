@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Periodo | inicio
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
<!-- contenido de la pagina  -->
@section('contenido')
<center><h1> Periodos Contables  </h1></center> 
            <div class="page-header">
              </nav>
            </div>
            <nav class="nav nav-pills flex-column flex-sm-row">
              <a class="flex-sm-fill text-sm-center nav-link active" href="#">Periodo</a>
              <a class="flex-sm-fill text-sm-center nav-link"  aria-current="page" href="libro_mayor.html">Libro Mayor</a>
            </nav>
            <p align="right" valign="baseline">
              <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
              <button type="button"  class="btn btn-success"  >Generar PDF</button>
            </p>
            <div class="row">
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <center>Periodos Contables</center></h4>
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                      <input type="text" class="form-control" placeholder="Buscar periodo">
                    </form>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            
                            <th class="text-dark bg-white">#</th>
                            <th class="text-dark bg-white"> Nombre de periodo</th>
                            <th class="text-dark bg-white"> Fecha inicial</th>
                            <th class="text-dark bg-white"> Fechas final  </th>
                            <th class="text-dark bg-white"> Estado del periodo  </th>
                            <th class="text-dark bg-white"> Acciones  </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td> 1 <input type="checkbox" name="" id=""></td>
                            <td>Periodo-2020-ene-1-001</td>
                            <td>01/01/2020</td>
                            <td>01/12/2020</td>
                            <td>Cerrado</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>  
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 2 <input type="checkbox" name="" id=""></td>
                            <td>Periodo-2021-ene-1-002</td>
                            <td>01/01/2021</td>
                            <td>01/12/2021</td>
                            <td>Cerrado</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 3 <input type="checkbox" name="" id=""> </td>
                            <td>Periodo-2022-ene-1-003</td>
                            <td>01/01/2022</td>
                            <td>01/12/2022</td>
                            <td>Activo</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>  


                <!-- INICIO MODAL PARA NUEVA  -->
                <div class="modal-container">
                  <div class="modal fade bd-example-modal-lg" id="dialogo1">
                    <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO NUEVA-->
                        <div class="modal-header">
                          <h4 class="modal-title">Ingresar Nuevo Periodo</h4>
                          <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                        </div>
                        <!-- CUERPO DEL DIALOGO NUEVA -->
                        <div class="modal-body">
                          <center>
                            <form action="" method="post">
                              <label class="form-label">
                                Nombre del Periodo
                                <input type='text' list="lista-programacion" name='nombre-periodo' class="form-control text-white" required>
                                <datalist id="lista-programacion">
                                  <option value="Periodo-2022-ene-1-004">
                                </datalist>
                                </input>
                              </label>
                              <br>
                              <label class="form-label">
                                Fecha inicial
                                <input type='date' name='fec-inic' class="form-control" required></input>
                              </label>
                              <label class="form-label">
                                Fecha final
                                <input type='date' name='fec-hast' class="form-control" required></input>
                              </label>
                              <br>
                              <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Estado <label>
                              </div>
                              <br>
                              <a href="" class="btn btn-secondary">Cancelar</a>
                              <button type="submit" class="btn btn-primary">NUEVO</button>
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
                  <h4 class="modal-title">Editar Periodo</h4>
                       <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                  </div>
                       <!-- CUERPO DEL DIALOGO EDITAR -->
                  <div class="modal-body">
                    <center>
                      <form action="" method="post">
                        <label class="form-label">
                          Nombre del Periodo
                          <input type='text' list="lista-programacion" value="Periodo-2022-ene-1-003" name='nombre-periodo' class="form-control" required>
                          <datalist id="lista-programacion">
                            <option value="Periodo-2022-ene-1-004">
                          </datalist>
                          </input>
                        </label>
                        <br>
                        <label class="form-label">
                          Fecha inicial
                          <input type="date" value="2021-01-01" readonly>
                        </label>
                        <label class="form-label">
                          Fecha final
                          <input type="date" value="2021-12-31" readonly>
                        </label>
                        <br>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch2">
                          <label class="custom-control-label" for="customSwitch2">Estado <label>
                        </div>
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Aceptar</button>
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
             <h4 class="modal-title">Eliminar Cuenta</h4>
                  <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
             </div>
                  <!-- CUERPO DEL DIALOGO BORRAR -->
             <div class="modal-body">
             <center>
             <form action="" method="post">
             <label class="form-label">
             ¿ Desea Eliminar el Registro ?
              
             </label>
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
              </div>
            </div>
          </div>
@endsection