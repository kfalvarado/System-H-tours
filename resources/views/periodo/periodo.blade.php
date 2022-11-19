@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Periodo | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
@if (Cache::get('genero') == 'M')
{{ asset('assets/images/varon.png')}}
@else
{{ asset('assets/images/dama.png')}}
@endif
@endsection

@section('encabezado')


@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
{{ Cache::get('user') }}
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
{{ Cache::get('rol') }}
@endsection

<!-- foto del menu de la derecha -->
@section('foto-user2')
@if (Cache::get('genero') == 'M')
{{ asset('assets/images/varon.png')}}
@else
{{ asset('assets/images/dama.png')}}
@endif
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
{{ Cache::get('user') }}
@endsection
<!-- contenido de la pagina  -->
@section('contenido')

@if (Session::has('insertado'))
  <script>
    Swal.fire({
    icon: 'success',
    text: 'El periodo se inserto Correctamente'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif
@if (Session::has('actualizado'))
  <script>
    Swal.fire({
    icon: 'success',
    text: 'El periodo se Actualizo Correctamente'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif
@if (Session::has('eliminado'))
  <script>
    Swal.fire({
    icon: 'success',
    text: 'El periodo se elimino Correctamente'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif
@if (Session::has('sinpermiso'))
  <script>
    Swal.fire({
    icon: 'error',
    text: 'No cuentas con  permiso para realizar esta accion'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif


<center><h1> Periodos Contables  </h1></center> 
            <div class="page-header">
              </nav>
            </div>
            <nav class="nav nav-pills flex-column flex-sm-row">
              <a class="flex-sm-fill text-sm-center nav-link active" href="#">Periodo</a>
              <a class="flex-sm-fill text-sm-center nav-link"  aria-current="page" href="{{route('mostrar.libromayor')}}">Libro Mayor</a>
            </nav>
            <p align="right" valign="baseline">
              <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
              <a type="button" href="{{route('periodo.pdf')}}" class="btn btn-danger btn-sm"  ><i class="mdi mdi-file-pdf"></i>Generar PDF</a>
              <button id="btnExportar" class="btn btn-success btn-sm">
                <i class="mdi mdi-file-excel"></i> Generar Excel
            </button>

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
                      <table id="tabla" class="table table-bordered table-contextual">
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
                          @if ( count($personArr)<=0)
                          <tr>
                            <td colspan="6" >No hay resultados</td>
                          </tr>
                            
                          @else
                            
                      
                          @foreach ($personArr as $periodo)
                            
                          <tr class="text-white bg-dark">
                            <td> {{ $periodo['COD_PERIODO'] }} </td>
                            <td>{{ $periodo['NOM_PERIODO'] }}</td>
                            <td>{{ substr( $periodo['FEC_INI'],0,10 )}}</td>
                            <td>{{ substr($periodo['FEC_FIN'],0,10) }}</td>
                            <td>{{ $periodo['ESTADO'] }}</td>
                            <td><button type="button"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#modal-editar-{{ $periodo['COD_PERIODO'] }}"> <i class="mdi mdi-table-edit"></i>Editar</button> <button type="button"  class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#modal-eliminar-{{ $periodo['COD_PERIODO'] }}"><i class="mdi mdi-delete-forever"></i>Eliminar</button> </td>  
                          </tr>
                          
                              <!-- INICIO MODAL PARA EDITAR  -->
                <div class="modal-container">
                  <div class="modal fade bd-example-modal-lg" id="modal-editar-{{ $periodo['COD_PERIODO'] }}">
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
                       <form action="{{ route('periodo.actualizar') }}" method="post">
                        @csrf  @method('PUT')


                        <input type="hidden" name="f" value="{{ $periodo['COD_PERIODO'] }}">
                         <label class="form-label">
                           Nombre del Periodo
                           <input type='text' list="lista-programacion" value="{{ $periodo['NOM_PERIODO'] }}" name='periodo' class="form-control text-white bg-dark" required>
                           <datalist id="lista-programacion">
                             <option value="Periodo-2022-ene-1-004">
                           </datalist>
                           </input>
                         </label>
                         <br>
                         <label class="form-label">
                           Fecha inicial
                           <input type="date" value="{{ substr( $periodo['FEC_INI'],0,10 )}}"  name="inicial" readonly>
                         </label>
                         <label class="form-label">
                           Fecha final
                           <input type="date" value="{{ substr($periodo['FEC_FIN'],0,10) }}"  name="final" readonly>
                         </label>
                         <br>
                         <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch{{ $periodo['COD_PERIODO'] }}" name="estado" value="activo">
                          <label class="custom-control-label" for="customSwitch{{ $periodo['COD_PERIODO'] }}">Estado <label>
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
             <div class="modal fade bd-example-modal-lg" id="modal-eliminar-{{ $periodo['COD_PERIODO'] }}">
                   <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
              <div class="modal-dialog modal-sm">
              <div class="modal-content">
                   <!-- CABECERA DEL DIALOGO EDITAR -->
              <div class="modal-header">
              <h4 class="modal-title">Eliminar Periodo</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
                   <!-- CUERPO DEL DIALOGO BORRAR -->
              <div class="modal-body">
              <center>
              <form action="{{ route('periodo.eliminar') }}" method="post">
                @csrf @method('DELETE')

                <input type="hidden" name="f" value="{{ $periodo['COD_PERIODO'] }}">
              <label class="form-label">
                <i class="mdi mdi-delete-forever" style="font-size: 100px;"></i> <br>
              ¿ Desea Eliminar el Registro ?
               
              </label>
              <br>
          
  
              <button type="submit" class="btn btn btn-primary">SI</button>
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
                          @endif  
                        </tbody>
                      </table>
                    </div>
                    <div id="paginador" class=""></div>
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
                            <form action="{{ route('periodo.insertar') }}" method="post">
                             @csrf
                              <label class="form-label">
                                Nombre del Periodo
                                <input type='text' list="lista-programacion" name='periodo' class="form-control text-white" required>
                                <datalist id="lista-programacion">
                                  <option value="Periodo-2022-ene-1-004">
                                </datalist>
                                </input>
                              </label>
                              <br>
                              <label class="form-label">
                                Fecha inicial
                                <input type='date' name='inicial' class="form-control" required></input>
                              </label>
                              <label class="form-label">
                                Fecha final
                                <input type='date' name='final' class="form-control" required></input>
                              </label>
                              <br>
                              <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch" name="estado" value="activo">
                                <label class="custom-control-label" for="customSwitch">Estado <label>
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
  
 @section('js')
                <script src="{{ asset('assets/js/ab-page.js') }}"></script>
                <script>
                  const $btnExportar = document.querySelector("#btnExportar"),
                      $tabla = document.querySelector("#tabla");
                
                  $btnExportar.addEventListener("click", function() {
                      let tableExport = new TableExport($tabla, {
                          exportButtons: false, // No queremos botones
                          filename: "Reporte de Periodo", //Nombre del archivo de Excel
                          sheetname: "Reporte de Periodo", //Título de la hoja
                          ignoreCols: 5,  
                      });
                      let datos = tableExport.getExportData();
                      let preferenciasDocumento = datos.tabla.xlsx;
                      tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
                  });
                </script>
@endsection
            
@endsection