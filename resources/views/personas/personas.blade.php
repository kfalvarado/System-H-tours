@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Personas | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
{{ asset('assets/images/dama.png') }}
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
{{ Cache::get('user') }}
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
{{ Cache::get('user') }}
@endsection
<!-- contenido de la pagina  -->
@section('contenido')
<div class="page-header">
              </nav>
            </div>
            <center>
                <h1>Mantenimiento Personas</h1>
            </center>
            <p align="right" valign="baseline">
              <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
              <a type="button" href="{{route('periodo.pdf')}}" class="btn btn-success"  >Generar PDF</a>
            </p>
            <div class="row">
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <center>Personas Registradas</center></h4>
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                      <input type="text" class="form-control" placeholder="Buscar Usuario">
                    </form>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            
                            <th class="text-dark bg-white">#</th>
                            <th class="text-dark bg-white"> Usuario</th>
                            <th class="text-dark bg-white"> Genero</th>
                            <th class="text-dark bg-white"> Edad  </th>
                            <th class="text-dark bg-white"> Estado Civil </th>
                            <th class="text-dark bg-white"> Tipo de Persona </th>
                            <th class="text-dark bg-white"> Identidad  </th>
                            <th class="text-dark bg-white"> Telefono  </th>
                            <th class="text-dark bg-white"> Fecha Registro  </th>
                            <th class="text-dark bg-white"> Acciones  </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($personasArray as $persona)
                            
                         
                          <tr class="text-white bg-dark">
                            <td>{{ $persona['COD_PERSONA']  }} </td>
                            <td>{{ $persona['NOM_USR'] }}</td>
                            <td>{{ $persona['SEX_PERSONA']  }}</td>
                            <td>{{ $persona['EDA_PERSONAL'] }}</td>
                            <td>{{ $persona['IND_CIVIL'] }}</td>
                            <td>{{ $persona['TIP_PERSONA'] }}</td>
                            <td>{{ $persona['NUM_IDENTIDAD'] }}</td>
                            <td>{{ $persona['TELEFONO'] }}</td>
                            <td>{{ substr( $persona['FEC_REGISTRO'],0,10)}}</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>  
                          </tr>
                          @endforeach                
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