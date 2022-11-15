@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Personas | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
@if (Cache::get('genero') == 'M')

{{ asset('assets/images/varon.png')  }}
@else
{{ asset('assets/images/dama.png');}}
@endif

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
@if (Cache::get('genero') == 'M')

{{ asset('assets/images/varon.png')  }}
@else
{{ asset('assets/images/dama.png');}}
@endif

@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
{{ Cache::get('user') }}
@endsection


{{-- encabezado o head --}}
@section('encabezado')


@endsection


<!-- contenido de la pagina  -->
@section('contenido')
<div class="page-header">
              </nav>
            </div>
            <center>
                <h1>Mantenimiento Personas</h1>
            </center>
            <br>
            <p align="right" valign="baseline">
              <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
              <a type="button" href="{{route('periodo.pdf')}}" class="btn btn-danger"  ><i class="mdi mdi-file-pdf"></i> Generar PDF</a>
              {{-- cambiar la ruta de perido.pdf a periodo.excel  --}}
              <a type="button" href="{{route('periodo.pdf')}}" class="btn btn-success"  ><i class="mdi mdi-file-excel"></i> Generar Excel</a>
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
                            <th class="text-dark bg-white"> Tipo </th>
                            <th class="text-dark bg-white"> Identidad  </th>
                            <th class="text-dark bg-white"> Telefono  </th>
                            <th class="text-dark bg-white"> Tipo </th>
                            <th class="text-dark bg-white"> Estado  </th>
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
                            <td>{{ $persona['TIP_TELEFONO'] }}</td>
                            <td>{{ $persona['EST_USR'] }}</td>
                            <td>{{ substr( $persona['FEC_REGISTRO'],0,10)}}</td>
                            <td><button type="button"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#modal-editar-{{ $persona['COD_PERSONA'] }}"> <i class="mdi mdi-table-edit"></i> Editar</button> <button type="button"  class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#modal-eliminar-{{  $persona['COD_PERSONA'] }}"><i class="mdi mdi-delete-forever"></i> Eliminar</button> </td>  
                          </tr>

                                         
                <!-- INICIO MODAL PARA EDITAR  -->
                <div class="modal-container">
                  <div class="modal fade bd-example-modal-md" id="modal-editar-{{ $persona['COD_PERSONA'] }}">
                        <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                   <div class="modal-dialog modal-md">
                   <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO EDITAR -->
                   <div class="modal-header">
                   <h4 class="modal-title">Editar Persona</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                   </div>
                        <!-- CUERPO DEL DIALOGO EDITAR -->
                   <div class="modal-body">
                     <center>
                       <form action="" method="post">
                         <label class="form-label">
                           <b>Nombre de  Usuario</b>
                           <input type='text'  value="{{ $persona['NOM_USR'] }}" name='usr' class="form-control bg-dark text-white" required readonly>
                          </label>
                        </center>
                        {{-- div contenedor  --}}
                        <div style="background-color:#2b4e821c;   justify-content: center; align-items: center;">
                         <br>
                          &nbsp;
                          &nbsp;
                          &nbsp;
                          &nbsp;
                          &nbsp;
                          &nbsp;
                          &nbsp;
                          &nbsp;
                          &nbsp;
                           <label class="form-label" style="background-color: #0778b199">
                           <center> Género</center>
                            <select class="form-control bg-white text-dark" name="genero" id="genero" required>
                              <option hidden selected>{{ $persona['SEX_PERSONA']  
                           }}</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                          </select>
                         </label>
                         <label style="background-color: #0778b199"> <font color='white'>  Tipo de persona</font>
                         </center>
                         <Select  class="form-control bg-white text-dark" id="tipoPersona" name="tipoPersona" required>
                           <option hidden selected>{{ $persona['TIP_PERSONA'] }}</option>
                           <option value="N">Normal</option>
                           <option value="J">Jurídica</option>
                         </Select>
                       </label>
                       
                          <label for="civil"  style="background-color: #0778b199">
                            <center><font color='white'>&nbsp;&nbsp;&nbsp;Estado Civil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font> </center>
                            <Select id="civil" name="civil" class="form-control bg-white text-dark" required>
                              <option hidden selected>{{ $persona['IND_CIVIL'] }}</option>
                              <option value="S">Soltero</option>
                              <option value="V">Viudo</option>
                              <option value="C">Casado</option>
                              <option value="D">Divorciado</option>
                            </Select>
                          </label>
                       
                          <br>
                           {{-- centrado  --}}
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;

                        {{-- fin centrado --}}
                          
                          <label for="" style="background-color: #0778b199"> <font color='white'> &nbsp;  Edad </font>  
                            <input type="number" id="edad" name="edad" placeholder="0" min="0" max="100" class="form-control bg-white text-dark" value="{{ $persona['EDA_PERSONAL'] }}" required>
                          </label> 
                          <label for="" style="background-color: #0778b199"> <font color='white'> &nbsp; Identidad </font> 
                            <input type="tel" value="{{ $persona['NUM_IDENTIDAD'] }}" onclick="tipopersona();"minlength="0" min="0" placeholder="0801-2000-09115" pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}"id="identidad" name="identidad"  class="form-control p_input text-dark bg-white" required>
                          </label> 
                          <br>
                           {{-- centrado  --}}
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;

                        {{-- fin centrado --}}
                          <label  style="background-color: #0778b199"> <font color='white'>Teléfono  </font>
                            <input type="tel" value="{{  '+504 '.$persona['TELEFONO'] }}" id="telefono" name="telefono" class="form-control p_input text-dark bg-white" placeholder="+504-90213300" pattern="[+0-9]{4} [0-9]{8}"  required>
                          </label>
                          <label style="background-color: #0778b199">
                            <font color='white'>&nbsp;&nbsp;Tipo de Teléfono &nbsp;&nbsp;</font>
                            <Select class="form-control bg-white text-dark" id="tipotelefono" name="tipotelefono" required>
                              <option hidden selected>{{ $persona['TIP_TELEFONO'] }}</option>
                              <option value="C">Celular</option>
                              <option value="T">Teléfono Fijo</option>
                            </Select>
                          </label>
                          <br>
                                {{-- centrado  --}}
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;

                        {{-- fin centrado --}}
                        </div>
                          <center>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                          </center>
                          </form>
                   </div> 
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  
                   </div>
                   </div>
                   </div>
                   </div>
                       <!-- FIN DE MODAL PARA EDITAR  -->
 
 
 
                     <!-- INICIO MODAL PARA BORRAR  -->
            <div class="modal-container">
             <div class="modal fade bd-example-modal-lg" id="modal-eliminar-{{ $persona['COD_PERSONA'] }}">
                   <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
              <div class="modal-dialog modal-sm">
              <div class="modal-content">
                   <!-- CABECERA DEL DIALOGO EDITAR -->
              <div class="modal-header">
              <h4 class="modal-title">Eliminar Persona</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
                   <!-- CUERPO DEL DIALOGO BORRAR -->
              <div class="modal-body">
              <center>
              <form action="" method="post">
              <label class="form-label">
                <i class="mdi mdi-delete-forever" style="font-size: 100px;"></i> 
                <br>
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

@endsection