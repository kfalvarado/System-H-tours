@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Objetos | inicio
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
                text: 'El parametro se Actualizo Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El parametro se elimino Correctamente'
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

    <center>
        <h1> Parametros </h1>
    </center>
    <div class="page-header">
        </nav>
    </div>

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
                    <h4 class="card-title">
                        <center>Parametros</center>
                    </h4>
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" class="form-control" placeholder="Buscar Parametro">
                    </form>
                    <div class="table-responsive">
                        <table id="tabla" class="table table-bordered table-contextual">
                            <thead>
                                <tr class="text-dark bg-white">
                                    <th class="text-dark bg-white">#</th>
                                    <th class="text-dark bg-white">Parametros</th>
                                    <th class="text-dark bg-white">Valor</th>
                                    <th class="text-dark bg-white">Usuario</th>
                                    <th class="text-dark bg-white">Fecha de creación</th>
                                    <th class="text-dark bg-white">Fecha de modificación</th>
                                    <th class="text-dark bg-white">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($personArr) <= 0)
                                    <tr>
                                        <td colspan="6">No hay resultados</td>
                                    </tr>
                                @else
                                    @foreach ($personArr as $parametros)
                                        <tr class="text-white bg-dark">
                                            <td> {{ $parametros['COD_PARAMETRO'] }} </td>
                                            <td>{{ $parametros['PARAMETRO'] }}</td>
                                            <td>{{ $parametros['VALOR'] }}</td>
                                            <td>{{ $parametros['COD_USR'] }}</td>
                                            <td>{{ substr($parametros['FEC_CREACION'], 0, 10) }}</td>
                                            <td>{{ substr($parametros['FEC_MODIFICACION'], 0, 10) }}</td>
                                            <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#modal-editar-{{ $parametros['COD_PARAMETRO'] }}"> <i
                                                        class="mdi mdi-table-edit"></i>Editar</button> <button
                                                    type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $parametros['COD_PARAMETRO'] }}"><i
                                                        class="mdi mdi-delete-forever"></i>Eliminar</button> </td>
                                        </tr>

                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-editar-{{ $parametros['COD_PARAMETRO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Parametro</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('parametro.actualizar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')


                                                                    <input type="hidden" name="f"
                                                                        value="{{ $parametros['COD_PARAMETRO'] }}">
                                                                    <label class="form-label">
                                                                        Parametro
                                                                        <input type='text' list="lista-programacion"
                                                                            value="{{ $parametros['PARAMETRO'] }}"
                                                                            name='parametro'
                                                                            class="form-control text-white bg-dark"
                                                                            required>
                                                                        <datalist id="lista-programacion">
                                                                            <option value="Periodo-2022-ene-1-004">
                                                                        </datalist>
                                                                        </input>
                                                                    </label>
                                                                    <br>
                                                                    <label class="form-label">
                                                                        Valor
                                                                        <input type='text' list="lista-programacion"
                                                                            value="{{ $parametros['VALOR'] }}"
                                                                            name='valor'
                                                                            class="form-control text-white bg-dark"
                                                                            required>
                                                                        <datalist id="lista-programacion">
                                                                            <option value="Periodo-2022-ene-1-004">
                                                                        </datalist>
                                                                        </input>
                                                                    </label>
                                                                    <br>
                                                                    <label class="form-label">
                                                                        Usuario
                                                                        <input type='text' list="lista-programacion"
                                                                            value="{{ $parametros['COD_USR'] }}"
                                                                            name='usuario'
                                                                            class="form-control text-white bg-dark"
                                                                            required>
                                                                        <datalist id="lista-programacion">
                                                                            <option value="Periodo-2022-ene-1-004">
                                                                        </datalist>
                                                                        </input>
                                                                    </label>
                                                                    <br>
                                                                    <label class="form-label">
                                                                        Fecha creacion
                                                                        <input type="date"
                                                                            value="{{ substr($parametros['FEC_CREACION'], 0, 10) }}"
                                                                            name="creacion" readonly>
                                                                    </label>
                                                                    <label class="form-label">
                                                                        Fecha modificacion
                                                                        <input type="date"
                                                                            value="{{ substr($parametros['FEC_MODIFICACION'], 0, 10) }}"
                                                                            name="modificacion" readonly>
                                                                    </label>
                                                                    <br>
                                                                    <label class="form-label">

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
                                                id="modal-eliminar-{{ $parametros['COD_PARAMETRO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar Parametro</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('parametro.eliminar') }}"
                                                                    method="post">
                                                                    @csrf @method('DELETE')

                                                                    <input type="hidden" name="f"
                                                                        value="{{ $parametros['COD_PARAMETRO'] }}">
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
                        <h4 class="modal-title">Ingresar Nuevo Parametro</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO NUEVA -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('parametro.insertar') }}" method="post">
                                @csrf
                                <label class="form-label">
                                    Parametro
                                    <input type='text' list="lista-programacion" name='Parametro'
                                        class="form-control text-white" required>
                                    <datalist id="lista-programacion">
                                        <option value="Periodo-2022-ene-1-004">
                                    </datalist>
                                    </input>
                                </label>
                                <br>
                                <label class="form-label">
                                    Valor
                                    <input type='text' list="lista-programacion" name='Valor'
                                        class="form-control text-white" required>
                                    <datalist id="lista-programacion">
                                        <option value="Periodo-2022-ene-1-004">
                                    </datalist>
                                    </input>
                                </label>
                                <br>
                                <label class="form-label">
                                    Usuario
                                    <input type='text' list="lista-programacion" name='Usuario'
                                        class="form-control text-white" required>
                                    <datalist id="lista-programacion">
                                        <option value="Periodo-2022-ene-1-004">
                                    </datalist>
                                    </input>
                                </label>
                                <br>
                                <label class="form-label">
                                    Fecha creacion
                                    <input type='date' name='creacion' class="form-control" required></input>
                                </label>
                                <label class="form-label">
                                    Fecha modificacion
                                    <input type='date' name='modificacion' class="form-control" required></input>
                                </label>
                                <br>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="estado"
                                        value="activo">
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
                filename: "Reporte de Parametro", //Nombre del archivo de Excel
                sheetname: "Reporte de Parametro", //Título de la hoja
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