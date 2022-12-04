@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Período | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    @if (Cache::get('genero') == 'M')
        {{ asset('assets/images/varon.png') }}
    @else
        {{ asset('assets/images/dama.png') }}
    @endif
@endsection

@section('encabezado')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
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
        {{ asset('assets/images/varon.png') }}
    @else
        {{ asset('assets/images/dama.png') }}
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
                text: 'El periodo se actualizó  Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El periodo se eliminó Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('sinpermiso'))
        <script>
            Swal.fire({
                icon: 'error',
                text: 'No cuentas con  permiso para realizar esta acción'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif


    <center>
        <h1> Períodos Contables </h1>
    </center>
    <div class="page-header">
        </nav>
    </div>
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link active" href="#">Período</a>
        <a class="flex-sm-fill text-sm-center nav-link" aria-current="page" href="{{ route('mostrar.libromayor') }}">Libro
            Mayor</a>
    </nav>
    <p align="right" valign="baseline">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
        <a type="button" href="{{ route('periodo.pdf') }}" class="btn btn-danger btn-sm"><i
                class="mdi mdi-file-pdf"></i>Generar PDF</a>
        <button id="btnExportar" class="btn btn-success btn-sm">
            <i class="mdi mdi-file-excel"></i> Generar Excel
        </button>

    </p>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 id="titulo" class="card-title">
                        <center>Períodos Contables</center>
                    </h4>

                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input class="form-control me-2 light-table-filter text-white" data-table="table_id" type="text"
                            placeholder="Buscar un periodo">
                    </form>

                    <div class="table-responsive">
                        <table id="tabla" class="table table-bordered table-contextual table_id">
                            <thead>
                                <tr>
                                    <th class="text-dark bg-white">#</th>
                                    <th class="text-dark bg-white"> Nombre de período</th>
                                    <th class="text-dark bg-white"> Fecha inicial</th>
                                    <th class="text-dark bg-white"> Fechas final </th>
                                    <th class="text-dark bg-white"> Estado del período </th>
                                    <th class="text-dark bg-white"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($personArr) <= 0)
                                    <tr>
                                        <td colspan="6">No hay resultados</td>
                                    </tr>
                                @else
                                    @foreach ($personArr as $periodo)
                                        <tr class="text-white bg-dark">
                                            <td> {{ $periodo['COD_PERIODO'] }} </td>
                                            <td>{{ $periodo['NOM_PERIODO'] }}</td>
                                            <td>{{ substr($periodo['FEC_INI'], 0, 10) }}</td>
                                            <td>{{ substr($periodo['FEC_FIN'], 0, 10) }}</td>
                                            <td>{{ $periodo['ESTADO'] }}</td>
                                            <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#modal-editar-{{ $periodo['COD_PERIODO'] }}"> <i
                                                        class="mdi mdi-table-edit"></i>Editar</button> <button
                                                    type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $periodo['COD_PERIODO'] }}"><i
                                                        class="mdi mdi-delete-forever"></i>Eliminar</button> </td>
                                        </tr>

                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-editar-{{ $periodo['COD_PERIODO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Período</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('periodo.actualizar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')


                                                                    <input type="hidden" name="f"
                                                                        value="{{ $periodo['COD_PERIODO'] }}">
                                                                    <label class="form-label">
                                                                        Nombre del Período
                                                                        <input type='text' list="lista-programacion"
                                                                            value="{{ $periodo['NOM_PERIODO'] }}"
                                                                            name='periodo'
                                                                            id="periodo-edit-{{  $periodo['COD_PERIODO'] }}"
                                                                            onkeyup="ValidarperiodoEdit({{ $periodo['COD_PERIODO']  }})"
                                                                            class="form-control text-white bg-dark"
                                                                            required>
                                                                            <div id="div-periodo-{{ $periodo['COD_PERIODO'] }}"></div>
                                                                        <datalist id="lista-programacion">
                                                                            <option value="Periodo-2022-ene-1-004">
                                                                        </datalist>
                                                                        </input>
                                                                    </label>
                                                                    <br>
                                                                    <label class="form-label">
                                                                        Fecha inicial
                                                                        <input type="date"
                                                                            value="{{ substr($periodo['FEC_INI'], 0, 10) }}"
                                                                            name="inicial" readonly>
                                                                    </label>
                                                                    <label class="form-label">
                                                                        Fecha final
                                                                        <input type="date"
                                                                            value="{{ substr($periodo['FEC_FIN'], 0, 10) }}"
                                                                            name="final" readonly>
                                                                    </label>
                                                                    <br>
                                                                    <div class="custom-control custom-switch">
                                                                        @if ($periodo['ESTADO'] == 'ACTIVO')
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customSwitch{{ $periodo['COD_PERIODO'] }}"
                                                                                name="estado" value="ACTIVO" checked>
                                                                            <label class="custom-control-label"
                                                                                for="customSwitch{{ $periodo['COD_PERIODO'] }}">Estado
                                                                            </label>
                                                                        @else
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customSwitch{{ $periodo['COD_PERIODO'] }}"
                                                                                name="estado"
                                                                                value="{{ $periodo['ESTADO'] }}" disabled>
                                                                            <label class="custom-control-label"
                                                                                for="customSwitch{{ $periodo['COD_PERIODO'] }}">Estado
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                    <br>

                                                                    <button type="submit"
                                                                        class="btn btn-primary">Aceptar</button>
                                                                </form>
                                                        </div>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar</button>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN DE MODAL PARA EDITAR  -->



                                        <!-- INICIO MODAL PARA BORRAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-eliminar-{{ $periodo['COD_PERIODO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar Período</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('periodo.eliminar') }}"
                                                                    method="post">
                                                                    @csrf @method('DELETE')

                                                                    <input type="hidden" name="f"
                                                                        value="{{ $periodo['COD_PERIODO'] }}">
                                                                    <label class="form-label">
                                                                        <i class="mdi mdi-delete-forever"
                                                                            style="font-size: 100px;"></i> <br>
                                                                        ¿ Desea Eliminar el Registro ?

                                                                    </label>
                                                                    <br>


                                                                    <button type="submit"
                                                                        class="btn btn btn-primary">SI</button>
                                                                    <a href="" class="btn btn-secondary">NO</a>

                                                                </form>
                                                        </div>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar</button>
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
                        <h4 class="modal-title">Ingresar Nuevo Período</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO NUEVA -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('periodo.insertar') }}" method="post">
                                @csrf
                                <label class="form-label">
                                    Nombre del Período
                                    <input type='text' list="lista" name='periodo' id="periodo_ins" class="form-control text-white" onkeyup="Validarperiodo(this)"
                                        required>
                                        <div id="divperiodo"></div>

                                    <datalist id="lista">
                                        @foreach ($incrementable as $key)
                                            <option
                                                value="Periodo-{{ date('Y') }}-{{ date('M') }}-00{{ $key['MAX(COD_PERIODO)'] + 1 }}">
                                        @endforeach
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
                                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="estado"
                                        value="activo" checked>
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
    <input type="hidden" id="imagen" value="{{ asset('assets\images\HTOURS.png') }}">

@section('js')
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
    <script src="{{ asset('assets/js/ab-formularios.js') }}"></script>
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
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType,
                preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento
                .merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>

    <script>
        async function generarPDF() {
            let elements = document.querySelectorAll("#tabla");
            let pdf = jsPDF('p', 'pt', 'a4', 1);
            var options = {
                background: '#fff',
            };
            var pageHeight = pdf.internal.pageSize.height; // Tamaño de una pagina
            var pageHeightLeft = pageHeight; // La utilizaremos para ver cuanto espacio nos queda
            position = 0;

            for (let i = 0; i < elements.length; i++) {
                await html2canvas(elements[i]).then(function(canvas) {
                    // Comprobamos salto
                    if (pageHeightLeft - canvas.height <= 0) {
                        pdf.addPage();
                        position = 0; // Pintaremos en el inicio de la nueva pagina
                    }
                    pdf.addImage(canvas.toDataURL('{{ asset('assets/images/HTOURS.png') }}'), 'PNG', 0,
                        position, canvas.width, canvas.height, options);
                    position += canvas.height; // Marcamos el siguiente inicio
                    pageHeightLeft -= canvas.height; // Marcamos cuanto espacio nos queda
                });
            }

            pdf.save("informe.pdf");
        }

        function imprimir() {
            var titulo = document.getElementById('titulo').innerText,
                data = document.getElementById('datos').innerText,
                fecha = document.getElementById('fecha').innerText;
            var img = document.getElementById('imagen');

            var doc = new jsPDF();
            doc.setFontSize(22);
            doc.text('Empresa H Tours S. de R. L', 60, 10);
            doc.setFontSize(22);
            doc.text(titulo, 80, 20);
            doc.setFontSize(11);
            doc.text(fecha, 10, 30);
            doc.setFontSize(16);
            doc.addImage(img, 150, 10, 60, 30)
            doc.text(data, 10, 60);
            doc.save('Reporte-Periodo.pdf');
        }

        function imprimir() {
            console.log('click');
            var doc = new jsPDF();
            var margin = 10;
            var scale = (doc.internal.pageSize.width - margin * 2) / document.body.scrollWidth;
            var date = new Date();
            fecha = date.toLocaleString();
            var titulo = document.getElementById('titulo').innerText,
                data = document.getElementById('tabla').innerText;

            // var img = '{{ asset('assets/images/HTOURS.png') }} '

            doc.setFontSize(22);
            doc.text('Empresa H Tours S. de R. L', 100, 50);
            doc.setFontSize(22);
            doc.text(titulo, 100, 50);
            doc.setFontSize(11);
            doc.text(fecha, 100, 50);
            doc.setFontSize(16);
            // doc.addImage(img,150,10,60,30)
            doc.text(data, 1, 90);

            doc.save('Reporte-Periodo.pdf');
        }
    </script>
@endsection

@endsection
