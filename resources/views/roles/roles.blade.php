@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Roles | inicio
@endsection
@section('encabezado')
<link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
    
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    @if (Cache::get('genero') == 'M')
        {{ asset('assets/images/varon.png') }}
    @else
        {{ asset('assets/images/dama.png') }}
    @endif
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
    {{ cache::get('user') }}
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
    {{ cache::get('rol') }}
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
    {{ cache::get('user') }}
@endsection

@section('contenido')
@if (Session::has('sinpermiso'))
<script>
    Swal.fire({
        icon: 'error',
        text: 'No cuentas con  permiso para realizar esta accion'
        // footer: '<a href="">Why do I have this issue?</a>'
    })
</script>
@endif
    @if (Session::has('insertado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El rol se ingresado correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif

    @if (Session::has('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El rol se actualizo correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif


    <!-- INICIO MODAL PARA NUEVA  -->
    <div class="modal-container">
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
            <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- CABECERA DEL DIALOGO NUEVA-->
                    <div class="modal-header">
                        <h4 class="modal-title">Ingresar Roles</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO NUEVA -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('roles.insertar') }}">
                                @csrf @method('POST')

                                <label class="form-label">
                                    Ingresa el nombre del Rol
                                    <input type='text' name='ROL' id="rol" class="form-control text-white"  onkeyup="validarletras(this);" required>
                                    <div id="divrol"></div>
                                </label>
                                <br>
                                <label class="form-label">
                                    Descripción
                                    <input type='text' size="50" maxlength="50" name='DES_ROL' id="des" onkeyup="validardescripcion(this);"
                                        class="form-control text-white" required>
                                        <div id="divres"></div>
                                </label>

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
    <!-- FIN DE MODAL PARA NUEVA  -->




    <div class="content-wrapper p-1">
        <center>
            <h1>Roles H Tours Honduras</h1>
        </center>
        <!-- <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"></a></li>
                </ul> -->
        <p align="right" valign="baseline">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo1">(+) Nuevo
            </button>
            <a type="button" href="{{ route('pdf.roles') }}" class="btn btn-danger btn-sm"><i
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
                    <center>
                        <h4 class="card-title">Registros de Roles</h4>
                    </center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    {{-- </p> --}}
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input class="form-control me-2 light-table-filter text-white" data-table="table_id" type="text"
                            placeholder="Buscar un rol">
                    </form>
                    <div class="table-responsive">
                        <table id="tabla" class="table table-bordered table-contextual table_id">
                            <thead>
                                <tr class="text-dark bg-white">
                                    <th class="text-dark bg-white">#</th>
                                    <th class="text-dark bg-white">Rol</th>
                                    <th class="text-dark bg-white">Descripción</th>
                                    <th class="text-dark bg-white">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($rolsArr) <= 0)
                                    <tr>
                                        <td colspan="6">Sin resultados</td>
                                    </tr>
                                @else
                                    @foreach ($rolsArr as $rols)
                                        <tr class="text-white bg-dark">
                                            <td>{{ $rols['COD_ROL'] }}</td>
                                            <td>{{ $rols['ROL'] }}</td>
                                            <td>{{ $rols['DES_ROL'] }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#modal-editar-{{ $rols['COD_ROL'] }}">Editar
                                                </button>
                                                {{-- <button 
                                type="button"  
                                class="btn btn-danger"  
                                data-toggle="modal" 
                                data-target="#dialogo3">Eliminar
                              </button> --}}
                                            </td>

                                        </tr>

                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-editar-{{ $rols['COD_ROL'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Roles</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('roles.actualizar') }}"
                                                                    method="put">
                                                                    @csrf @method('PUT')
                                                                    <input name="COD_ROL" type="hidden"
                                                                        value="{{ $rols['COD_ROL'] }}">

                                                                    <label class="form-label">
                                                                        Rol
                                                                        <input type='text' name='ROL' id="editrol-{{ $rols['COD_ROL']  }}"
                                                                            value="{{ $rols['ROL'] }}"
                                                                            class="form-control text-white" onkeyup="validareditarROL({{ $rols['COD_ROL']  }})" required>
                                                                            <div id="divroledit-{{ $rols['COD_ROL']  }}"></div>
                                                                        </label>
                                                                    <br>
                                                                    <label class="form-label">
                                                                        Descripción
                                                                        <input type='text' size="50" maxlength="50" id="editres-{{ $rols['COD_ROL']  }}"
                                                                            name='DES_ROL' value="{{ $rols['DES_ROL'] }}"
                                                                            class="form-control text-white" onkeyup="validareditarDES({{ $rols['COD_ROL']  }})" required>
                                                                            <div id="divrresedit-{{ $rols['COD_ROL']  }}"></div>
                                                                    </label>
                                                                    <br>

                                                                    <a href=""
                                                                        class="btn btn-secondary">Cancelar</a>
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
                                            <div class="modal fade bd-example-modal-lg" id="dialogo3">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar roles</h4>
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
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar</button>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN DE MODAL PARA BORRAR  -->
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
    <script src="{{ asset('assets/js/ab-roles.js') }}"></script>
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
                filename: "Reporte de Roles", //Nombre del archivo de Excel
                sheetname: "Reporte de Roles", //Título de la hoja
                ignoreCols: 3,
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
