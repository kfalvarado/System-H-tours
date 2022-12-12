@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Estado Finaciero
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    {{ asset('assets/images/varon.png') }}
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
                            <form action="{{ route('Resultado.insertar') }}" method="post">
                                @csrf
                                <Label>Seleccionar período</Label>
                                <select class="form-control text-white" name="periodo" id="periodo">
                                    <option value="" hidden selected>Seleccionar</option>
                                    @foreach ($periodo as $key)
                                        <option value="{{ $key['COD_PERIODO'] }}">{{ $key['NOM_PERIODO'] }}</option>
                                    @endforeach

                                </select>
                                <br>
                                <br>

                                <button class="btn btn-primary"onclick="validar()">Aceptar</button>
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
        @if (count($resultado) > 0)
            @foreach ($resultado as $key)
                <center>
                    <h1>Estado de Resultado Empresa {{ $key['EMPRESA'] }}</h1>
                </center>
            @endforeach
        @else
            <center>
                <h1>Estado de Resultado </h1>
            </center>
        @endif
        <h5>________________________________________________________________________________________________________________
        </h5>
        <!-- <ul class="nav nav-pills nav-stacked">
                                      <li class="active"><a href="#"></a></li>
                                    </ul> -->

        <center>
            @if (count($resultado) > 0)
                @foreach ($resultado as $key)
                    <h1 id="nombre-periodo">{{ $key['PERIODO'] }}</h1>
                    <center>
                        <br>
                        <h3>Desde: <input type="date" aria-label="Disabled input example"
                                value="{{ substr($key['FECHA_INICIAL'], 0, 10) }}" readonly> Hasta: <input type="date"
                                value="{{ substr($key['FECHA_FINAL'], 0, 10) }}" readonly></h3>
                    </center>
                @endforeach
            @else
                <h1> Período</h1>
            @endif
        </center>


        <div class="container">
            <div class="row">
            <div class="col-3">
                <a type="button" href="{{ route('mostrar.libromayor') }}" class="btn btn-info btn-sm"><i
                        class="mdi mdi-eye"></i> Verificar</a>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dialogo1"><i
                        class="mdi mdi-calendar-check"></i> Período</button>
            </div>

            {{-- <div class="col-3">
                @if (!isset($pdf))
                    <a type="button" href="" class="btn btn-danger btn-sm"><i class="mdi mdi-file-pdf"></i>Generar
                        PDF</a>
                @endif
            </div> --}}
            <div class="col-3">
                @if (isset($pdf))
                <form action="{{ route('Resultado.pdf') }}" method="post">
                    @csrf
                    <input type="hidden" name="periodo" value="{{ $pdf }}">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-file-pdf"></i>Generar
                        PDF</button>
                </form>
                @else
                <a type="button" href="" class="btn btn-danger btn-sm"><i class="mdi mdi-file-pdf"></i>Generar
                    PDF</a>
                @endif
            </div>
            <div class="col-3">
                <button id="btnExportar" class="btn btn-success btn-sm">
                    <i class="mdi mdi-file-excel"></i> Generar Excel
                </button>
            </div>
            {{-- </p> --}}

        </div>
        </div>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"></a></li>
        </ul>
        <div class="page-header">

        </div>
        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h3 class="card-title">Detalle</h3>
                        </center>
                        <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                        </p>
                        <div class="table-responsive">
                            <table id="tabla" class="table table-condensed table-bordered table-hover ">
                                <thead>
                                    <tr class="text-dark">
                                        <th class="text-dark bg-gradient-secondary"><b>Ventas Totales</b></th>
                                        @if (count($resultado) <= 0)
                                            <th class="text-white bg-dark">0,000</th>
                                        @else
                                            @foreach ($resultado as $key)
                                                <th class="text-white bg-dark">{{ number_format($key['VENTAS_TOTALES']) }}
                                                </th>
                                            @endforeach
                                        @endif
                                    </tr>
                                    <thead>
                                        <tr class="text-dark">
                                            <th class="text-dark bg-gradient-secondary"><b>Descuentos Ventas</b></th>
                                            @if (count($resultado) <= 0)
                                                <th class="text-white bg-dark">0,000</th>
                                            @else
                                                @foreach ($resultado as $key)
                                                    <th class="text-white bg-dark">{{ number_format($key['DES_VENTAS']) }}
                                                    </th>
                                                @endforeach
                                            @endif
                                        </tr>
                                        <tr class="text-dark">
                                            <th class="text-dark bg-gradient-secondary"><b>Devoluciones Ventas</b></th>
                                            @if (count($resultado) <= 0)
                                                <th class="text-white bg-dark">0,000</th>
                                            @else
                                                @foreach ($resultado as $key)
                                                    <th class="text-white bg-dark">{{ number_format($key['DEV_VENTAS']) }}
                                                    </th>
                                                @endforeach
                                            @endif
                                        </tr>
                                    <tr class="text-dark">
                                        <th class="text-dark bg-gradient-success"><b>Ventas Netas</b></th>
                                        @if (count($resultado) <= 0)
                                            <th class="text-white bg-success">0,000</th>
                                        @else
                                            @foreach ($resultado as $key)
                                                <th class="text-white bg-gradient-success  ">{{ number_format($key['VENTAS_NETAS']) }}
                                                </th>
                                            @endforeach
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-dark">
                                        <th class="text-dark bg-gradient-secondary"><b>Compras Totales</b></th>
                                        @if (count($resultado) <= 0)
                                            <th class="text-white bg-dark">0,000</th>
                                        @else
                                            @foreach ($resultado as $key)
                                                <th class="text-white bg-dark">{{ number_format($key['COMPRAS_TOTALES']) }}
                                                </th>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-dark">
                                        <th class="text-dark bg-gradient-secondary"><b>Descuentos Compras</b></th>
                                        @if (count($resultado) <= 0)
                                            <th class="text-white bg-dark">0,000</th>
                                        @else
                                            @foreach ($resultado as $key)
                                                <th class="text-white bg-dark">{{ number_format($key['DES_COMPRAS']) }}
                                                </th>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-dark">
                                        <th class="text-dark bg-gradient-secondary"><b>Devoluciones Compras</b></th>
                                        @if (count($resultado) <= 0)
                                            <th class="text-white bg-dark">0,000</th>
                                        @else
                                            @foreach ($resultado as $key)
                                                <th class="text-white bg-dark">{{ number_format($key['DEV_COMPRAS']) }}
                                                </th>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-success"> <b>Costos de ventas</b> </td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-dark">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-success">{{ number_format($key['COS_VENTAS']) }}</td>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-primary"><B>Utilidad/Pérdida bruta</B></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-primary">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-primary">{{ number_format($key['UTI_BRUTA']) }}</td>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-secondary"><b> Sueldos y Salarios </b></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-dark">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-dark">{{ number_format($key['SUEL_SALARI']) }}</td>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-secondary"><b> Gastos Ventas </b></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-dark">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-dark">{{ number_format($key['GAST_VENTAS']) }}</td>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-secondary"><b> Gastos Administración </b></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-dark">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-dark">{{ number_format($key['GAST_ADMINIS']) }}</td>
                                            @endforeach
                                        @endif

                                    </tr>

                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-success"><b> Total Gastos </b></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-success">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-success">{{ number_format($key['TOT_GASTOS']) }}</td>
                                            @endforeach
                                        @endif

                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-secondary"><b> Utilidad/Pérdida Antes de
                                                impuestos </b></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-dark">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-dark">{{ number_format($key['UTI_ANTIMP']) }}</td>
                                            @endforeach
                                        @endif
                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td class="text-dark bg-gradient-secondary"><b>Impuesto a utilidad </b></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-dark">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-white bg-dark">{{ number_format($key['IMP_UTILIDAD']) }}
                                                </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                    <tr class="text-white bg-success">
                                        <td class="text-dark bg-gradient-success"><b> Utilidad/Pérdida Neta </b></td>
                                        @if (count($resultado) <= 0)
                                            <td class="text-white bg-success">0,000</td>
                                        @else
                                            @foreach ($resultado as $key)
                                                <td class="text-dark bg-success">{{ number_format($key['UTI_NETA']) }}</td>
                                            @endforeach
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            // $tabla = document.getElementsByClassName("excel");


            $btnExportar.addEventListener("click", function() {

                let tableExport = new TableExport($tabla, {
                    exportButtons: false, // No queremos botones
                    filename: "Reporte de Estado de resultado", //Nombre del archivo de Excel
                    sheetname: "Reporte de Estado de resultado", //Título de la hoja
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
@endsection
