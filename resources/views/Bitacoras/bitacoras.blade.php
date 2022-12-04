@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Bitácora | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')


@if (Cache::get('genero') == 'M')
{{ asset('assets/images/varon.png')}}
@else
{{ asset('assets/images/dama.png')}}
@endif


@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
{{cache::get('user')}}
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
{{cache::get("rol")}}
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
{{cache::get('user')}}
@endsection

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


          <div class="content-wrapper p-1">
            <center> <h1>Bitácora H Tours Honduras</h1> </center>
            <!-- <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"></a></li>
            </ul> -->
            <p align="right" valign="baseline">
              {{-- <button 
                type="button"  
                class="btn btn-success"  
                data-toggle="modal" 
                data-target="#dialogo1">(+) Nuevo</button> --}}
                <a type="button" href="{{ route('pdf.bitacoras') }}" class="btn btn-danger btn-sm" ><i
                  class="mdi mdi-file-pdf"></i>Generar PDF</a>
                <button id="btnExportar" class="btn btn-success btn-sm">
                  <i class="mdi mdi-file-excel"></i> Generar Excel
                </button>
            </p>
            
            
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"></a></li>
              </ul>
              
              
            
              
            
           
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <center><h4 class="card-title">Registros de bitácora</h4></center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    {{-- </p> --}}
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                      <input class="form-control me-2 light-table-filter text-white" data-table="table_id" type="text"
                          placeholder="Buscar actividad">
                  </form>
                    <div class="table-responsive">
                      <table id="tabla" class="table table-bordered table-contextual table_id">
                        <thead>
                          <tr class="text-dark bg-white">
                            <th class="text-dark bg-white"># Código</th>
                            <th class="text-dark bg-white">Fecha Registro</th>
                            <th class="text-dark bg-white">Usuario Registro</th>
                            <th class="text-dark bg-white">Acciones Sistema</th>
                            <th class="text-dark bg-white">Descripción Bitácora</th>
                            <th class="text-dark bg-white">Objeto</th>          
                          </tr>
                        </thead>
                        <tbody>

                          @if (count($bitacoraArr) <= 0)
                          <tr>
                            <td colspan="6">Sin resultados</td>
                          </tr>
                          @else
                        
                          @foreach ($bitacoraArr as $bitacora)
                          <tr class="text-white bg-dark">
                            <td>{{$bitacora['COD_BITACORA']}}</td>
                            <td>{{ substr( $bitacora['FEC_REGISTRO'],0,10)}}</td>
                            {{-- <td>{{ substr($bitacora['FEC_REGISTRO'],0,10)}}</td> --}}
                            <td>{{$bitacora['USR_REGISTRA']}}</td>
                            <td>{{$bitacora['ACC_SISTEMA']}}</td>
                            <td>{{$bitacora['DES_BITACORA']}}</td>
                            <td>{{$bitacora['OBJETO']}}</td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <div id="paginador"></div>
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

        @section('js')
        
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
        {{-- PAGINACIÓN --}}
        <script src="{{ asset('assets/js/ab-page.js') }}"></script>
        {{-- GENERADOR DE EXCEL --}}
        <script>
          const $btnExportar = document.querySelector("#btnExportar"),
              $tabla = document.querySelector("#tabla");
        
          $btnExportar.addEventListener("click", function() {
              let tableExport = new TableExport($tabla, {
                  exportButtons: false, // No queremos botones
                  filename: "Reporte de Bitacora", //Nombre del archivo de Excel
                  sheetname: "Reporte de Bitacora", //Título de la hoja
                    
              });
              let datos = tableExport.getExportData();
              let preferenciasDocumento = datos.tabla.xlsx;
              tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
          });
        </script>
        @endsection



@endsection