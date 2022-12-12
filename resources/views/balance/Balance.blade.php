@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Balance General
@endsection

@section('encabezado')
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    @if (Cache::get('genero'))
        {{ asset('assets/images/varon.png') }}
    @else
        {{ asset('assets/images/dama.png') }}
    @endif
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
    {{ asset('assets/images/varon.png') }}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
    {{ Cache::get('user') }}
@endsection
<!-- contenido de la pagina  -->
@section('contenido')
    <!-- INICIO MODAL PARA NUEVA  -->
    <div class="modal-container">
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
            <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- CABECERA DEL DIALOGO NUEVA-->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <center> Seleccionar Período</center>
                        </h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO NUEVA -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('balance.insertar') }}" method="post">
                                @csrf
                                <Label>Seleccionar período</Label>
                                <select class="form-control text-white" name="periodo" id="periodo">
                                    <option value="" selected>Seleccionar</option>
                                    @foreach ($personArr as $periodo)
                                        <option value="{{ $periodo['COD_PERIODO'] }}">{{ $periodo['NOM_PERIODO'] }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <br>
                                <a href="" class="btn btn-secondary">Cancelar</a>
                                <button class="btn btn-primary" onclick="validar()">Aceptar</button>
                            </form>
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE MODAL PARA NUEVA  -->

    <div class="content-wrapper">
        @if (count($balanceArr) > 0)
            @foreach ($balanceArr as $key)
                <center>
                    <h1>Balance General Empresa {{ $key['NOMBRE_EMPRESA'] }}</h1>
                </center>
            @endforeach
        @else
            <center>
                <h1>Balance General</h1>
            </center>
        @endif
        <h5>________________________________________________________________________________________________________________
        </h5>
        <!-- <ul class="nav nav-pills nav-stacked">
                                                  <li class="active"><a href="#"></a></li>
                                                </ul> -->
        <center>
            @if (count($balanceArr) > 0)
                @foreach ($balanceArr as $key)
                    <h1 id="nombre-periodo">{{ $key['PERIODO'] }}</h1>
                    <center>
                        <br>
                        <h3>Desde: <input type="date" aria-label="Disabled input example"
                                value="{{ substr($key['FECHA_INICIAL'], 0, 10) }}" readonly> Hasta: <input type="date"
                                value="{{ substr($key['FECHA_FINAL'], 0, 10) }}" readonly></h3>
                    </center>
                @endforeach
            @else
                <h1> Período </h1>
            @endif
        </center>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a type="button" href="{{ route('mostrar.libromayor') }}" class="btn btn-info btn-sm"><i
                            class="mdi mdi-eye"></i> Verificar</a>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dialogo1"><i
                            class="mdi mdi-calendar-check"></i> Periodo</button>
                </div>
              
                <div class="col-3">
                    @if (isset($pdf))
                        <div class="container-fluid">
                            <div class="pull-right">
                                <form action="{{ route('balance.pdf') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="periodo" value="{{ $pdf }}">
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="mdi mdi-file-pdf"></i>Generar
                                        PDF</button>
                                </form>
                            </div>
                        </div>
                    @else
                      
                            <a type="button" href="" class="btn btn-danger btn-sm"><i
                                    class="mdi mdi-file-pdf"></i>Generar
                                PDF</a>
                      
                    @endif
                </div>
                <div class="col-3">

                    <button id="btnExportar" class="btn btn-success btn-sm">
                        <i class="mdi mdi-file-excel"></i> Generar Excel
                    </button>
                </div>
            </div>
        </div>


        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"></a></li>
        </ul>
        <div class="page-header">

        </div>
        <div id="tabla">
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body ">
                            <center>
                                <h4 class="card-title">Activos</h4>
                            </center>

                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-contextual">
                                    <thead>
                                        <tr>
                                            <th class="text-dark bg-white" colspan="3">
                                                <center> Activos Corrientes</center>
                                            </th>
                                        </tr>
                                        <tr class="text-dark bg-white">
                                            <td class="text-dark bg-white">#</td>
                                            <td class="text-dark bg-white">Cuenta</td>
                                            <td class="text-dark bg-white">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($activoc <= 0)
                                            <tr class="text-white bg-dark">
                                                <td colspan="3">No hay resultados</td>

                                            </tr>
                                        @else
                                            @foreach ($activoc as $key)
                                                <tr class="text-white bg-dark">
                                                    <td>{{ $key['COD_CUENTA'] }}</td>
                                                    <td>{{ $key['NOM_CUENTA'] }}</td>
                                                    @if ($key['SAL_DEBE'] >0)
                                                    <td>{{ number_format($key['SAL_DEBE']) }}</td>
                                                    @else
                                                    <td>{{ number_format($key['SAL_HABER']) }}</td>
                                                        
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif

                                        <tr>
                                            <td class="text-dark bg-white" colspan="3">
                                                <center><b> Activo no corrientes</b></center>
                                            </td>
                                        </tr>
                                        @if ($activon <= 0)
                                            <tr class="text-white bg-dark">
                                                <td colspan="3">No hay resultados</td>

                                            </tr>
                                        @else
                                            @foreach ($activon as $key)
                                                <tr class="text-white bg-dark">
                                                    <td>{{ $key['COD_CUENTA'] }}</td>
                                                    <td>{{ $key['NOM_CUENTA'] }}</td>
                                                    @if ( number_format($key['SAL_DEBE'])> 0)
                                                    <td>{{ number_format($key['SAL_DEBE']) }}</td>
                                                    
                                                    @else
                                                    
                                                    <td>{{ number_format($key['SAL_HABER']) }}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tr>

                                            <td class="text-dark bg-white" colspan="2">
                                                <center>Total activos</center>
                                            </td>
                                            @if (count($balanceArr) <= 0)
                                                <td class="text-dark bg-white"> <b>0.00</b> </td>
                                            @else
                                                @foreach ($balanceArr as $key)
                                                    <td class="text-dark bg-white">
                                                        <b>{{ number_format($key['TOTAL_ACTIVOS']) }}</b>
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h4 class="card-title">Pasivos</h4>
                            </center>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-contextual">
                                 
                                    <tr>
                                        <td class="text-dark bg-white" colspan="3">
                                            <center> <b>Pasivos Corrientes </b> </center>
                                        </td>
                                    </tr>
                                    <tr class="text-dark bg-white">
                                        <td class="text-dark bg-white">#</td>
                                        <td class="text-dark bg-white">Cuentas</td>
                                        <td class="text-dark bg-white">Total</td>
                                    </tr>
                                   
                                    <tbody>
                                        @if ($pasivoc <= 0)
                                            <tr class="text-white bg-dark">
                                                <td colspan="3">No hay resultados</td>

                                            </tr>
                                        @else
                                            @foreach ($pasivoc as $key)
                                                <tr class="text-white bg-dark">
                                                    <td>{{ $key['COD_CUENTA'] }}</td>
                                                    <td>{{ $key['NOM_CUENTA'] }}</td>
                                                    @if (number_format($key['SAL_HABER'])>0)
                                                        
                                                    <td>{{ number_format($key['SAL_HABER']) }}</td>
                                                    @else
                                                    <td>{{ number_format($key['SAL_DEBE']) }}</td>
                                                        
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif

                                        <tr>
                                            <td class="text-dark bg-white" colspan="3">
                                                <center> <b> Pasivos no corrientes </b></center>
                                            </td>
                                        </tr>
                                        @if ($pasivon <= 0)
                                            <tr class="text-white bg-dark">
                                                <td colspan="3">No hay resultados</td>
                                            </tr>
                                        @else
                                            @foreach ($pasivon as $key)
                                                <tr class="text-white bg-dark">
                                                    <td>{{ $key['COD_CUENTA'] }}</td>
                                                    <td>{{ $key['NOM_CUENTA'] }}</td>
                                                    @if (number_format($key['SAL_HABER']) > 0)
                                                        
                                                    <td>{{ number_format($key['SAL_HABER']) }}</td>
                                                    @else
                                                    
                                                    <td>{{ number_format($key['SAL_DEBE']) }}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif

                                        <tr>
                                            <td class="text-dark bg-white" colspan="2">
                                                <center>Total pasivos</center>
                                            </td>
                                            @if (count($balanceArr) <= 0)
                                                <td class="text-dark bg-white"> <b>0.00</b> </td>
                                            @else
                                                @foreach ($balanceArr as $key)
                                                    <td class="text-dark bg-white">
                                                        <b>{{ number_format($key['TOTAL_PASIVOS']) }}</b>
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h4 class="card-title">Patrimonios</h4>
                            </center>
                         
                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-contextual">

                                    <tr class="text-dark bg-white">
                                        <td class="text-dark bg-white" colspan="3">
                                            <center> <b> Patrimonios</b> </center>
                                        </td>
                                    </tr>
                                    <tr class="text-dark bg-white">

                                        <td class="text-dark bg-white">#</td>
                                        <td class="text-dark bg-white">Cuentas</td>
                                        <td class="text-dark bg-white">Total</td>
                                    </tr>

                                    <tbody>
                                        @if ($patrimonio <= 0)
                                            <tr class="text-white bg-dark">
                                                <td colspan="3">No hay resultados</td>
                                            </tr>
                                        @else
                                            @foreach ($patrimonio as $key)
                                                <tr class="text-white bg-dark">
                                                    <td>{{ $key['COD_CUENTA'] }}</td>
                                                    <td>{{ $key['NOM_CUENTA'] }}</td>
                                                    @if ( number_format($key['SAL_HABER'])>0)
                                                        
                                                    <td>{{ number_format($key['SAL_HABER']) }}</td>
                                                    @else
                                                    
                                                    <td>{{ number_format($key['SAL_DEBE']) }}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif

                                        <tr>
                                            <td class="text-dark bg-white" colspan="2">
                                                <center>Total Patrimonio</center>
                                            </td>
                                            @if (count($balanceArr) <= 0)
                                                <td class="text-dark bg-white"> <b>0.00</b> </td>
                                            @else
                                                @foreach ($balanceArr as $key)
                                                    <td class="text-dark bg-white">
                                                        <b>{{ number_format($key['TOTAL_PATRIMONIOS']) }}</b>
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h4 class="card-title">Saldos Balance</h4>
                            </center>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-contextual">

                                    <tr class="text-dark bg-white">
                                        <td class="text-dark bg-white" colspan="4">
                                            <center> <b>Saldos</b> </center>
                                        </td>
                                    </tr>
                                    <tr class="text-dark bg-white">
                                        <td class="text-dark bg-white">#</td>
                                        <td class="text-dark bg-white">Periodo</td>

                                        <td class="text-dark bg-white">Total Activo</td>
                                        <td class="text-dark bg-white">Total Pasivo + Patrimonio</td>
                                    </tr>

                                    <tbody>
                                        <tr class="text-white bg-dark">
                                            <td>1</td>
                                            @if (count($balanceArr) <= 0)
                                                <td>Periodo </td>
                                                <td>0.00</td>
                                                <td>0.00</td>
                                            @else
                                                @foreach ($balanceArr as $key)
                                                    <td>{{ $key['PERIODO'] }}</td>

                                                    <td>{{ number_format($key['TOTAL_ACTIVOS']) }}</td>

                                                    <td>{{ number_format($key['TOTAL_PASIVOS'] + $key['TOTAL_PATRIMONIOS']) }}
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @section('js')
        <script>
            function validar() {
                let periodo = document.getElementById('periodo').value;
                if (periodo == '') {
                    swal.fire({
                        icon: "warning",
                        text: "No selecciono un período "
                    })
                    event.preventDefault();
                }
            }
        </script>
        <script>
            const $btnExportar = document.querySelector("#btnExportar"),
                $tabla = document.querySelector("#tabla");
            $btnExportar.addEventListener("click", function() {

                let tableExport = new TableExport($tabla, {
                    exportButtons: false, // No queremos botones
                    filename: "Reporte de balance", //Nombre del archivo de Excel
                    sheetname: "Reporte de balance", //Título de la hoja
                    ignoreCols: 5,
                });
                let datos = tableExport.getExportData();
                let preferenciasDocumento = datos.tabla.xlsx;
                tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType,
                    preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento
                    .merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
            });
        </script>
    @endsection
