@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Grupos | inicio
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
                text: 'El grupo se inserto correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('actualizo'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El grupo se actualizo correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El grupo se elimino correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('duplicada'))
        <script>
            Swal.fire({
                icon: 'error',
                text: 'El numero de grupo esta duplicado'
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
    <div class="content-wrapper">
        <div class="page-header">
            <center>
                <h1> Mantenimiento Grupos </h1>
            </center>
        </div>
        <p align="right" valign="baseline">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
            <a type="button" href="{{ route('pdf.grupos') }}" class="btn btn-danger btn-sm"><i
                    class="mdi mdi-file-pdf"></i>Generar PDF</a>
            <button id="btnExportar" class="btn btn-success btn-sm">
                <i class="mdi mdi-file-excel"></i> Generar Excel
            </button>
        </p>
        <div class="row">

            <div class="col-lg-12 stretch-card">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gestion de Grupos</h4>
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input class="form-control me-2 light-table-filter text-white" data-table="table_id"
                                type="text" placeholder="Buscar un Grupos">
                        </form>
                        <div class="table-responsive">
                            <table id="tabla" class="table table-bordered table-contextual table_id">
                                <thead>
                                    <tr>
                                        <th class="text-dark bg-white"> # </th>
                                        <th class="text-dark bg-white"> <b>Clasificacion</b> </th>
                                        <th class="text-dark bg-white"> <b>Codigo</b> </th>
                                        <th class="text-dark bg-white"> <b>Nombre Grupo</b> </th>
                                        <th class="text-dark bg-white"> </b>Acciones</b> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($grupoArr)<=0)
                                    <tr><td colspan="5">No hay resultados</td></tr>
                                        
                                    @else
                                        
                                   
                                    @foreach ($grupoArr as $grupo)
                                        <tr class="text-white bg-dark">
                                            <td> {{ $grupo['COD_GRUPO'] }}</td>
                                            <td> {{ $grupo['NATURALEZA'] }}</td>
                                            <td> {{ $grupo['NUM_GRUPO'] }} </td>
                                            <td> {{ $grupo['NOM_GRUPO'] }}</td>
                                            <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#modal-editar-{{ $grupo['COD_GRUPO'] }}">Editar</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $grupo['COD_GRUPO'] }}">Eliminar</button>
                                            </td>
                                        </tr>



                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-editar-{{ $grupo['COD_GRUPO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Grupo</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('grupo.actualizar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')
                                                                    <input type="hidden" name="cod"
                                                                        value="{{ $grupo['COD_GRUPO'] }}">
                                                                    <label class="form-label">
                                                                        Clasificacion
                                                                        <select class="form-control text-white"
                                                                            name="clasificacion" id="" required>
                                                                            <option value="{{ $grupo['NATURALEZA'] }}"
                                                                                hidden selected>
                                                                                {{ $grupo['NATURALEZA'] }}</option>
                                                                            @foreach ($clasificacionArr as $key)
                                                                                <option
                                                                                    value="{{ $key['COD_CLASIFICACION'] }}">
                                                                                    {{ $key['NATURALEZA'] }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </label>
                                                                    <label class="form-label">
                                                                        Numero de grupo

                                                                        <input type='text' name='grupo'
                                                                            value="{{ $grupo['NUM_GRUPO'] }}" id="num_grupo-{{ $grupo['COD_GRUPO'] }}" onkeyup="validarNgruposEdit({{  $grupo['COD_GRUPO'] }})"
                                                                            class="form-control text-white" maxlength="3"
                                                                            required>
                                                                            <div id="div_grupo-{{ $grupo['COD_GRUPO'] }}"></div>
                                                                        </label>
                                                                        <label class="form-label">
                                                                            Nombre del grupo
                                                                            <input type='text' name='name'
                                                                            value="{{ $grupo['NOM_GRUPO'] }}" id="nom_grupo-{{ $grupo['COD_GRUPO'] }}" onkeyup="validarLgruposEdit({{ $grupo['COD_GRUPO']  }})"
                                                                            min="0" class="form-control text-white"
                                                                            required></input>
                                                                            <div id="div_nom-{{ $grupo['COD_GRUPO'] }}"></div>    
                                                                    </label>

                                                                    <button type="submit"
                                                                        class="btn btn-primary">Actualizar
                                                                    </button>
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
                                                id="modal-eliminar-{{ $grupo['COD_GRUPO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar Grupo</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('grupo.eliminar') }}"
                                                                    method="post">
                                                                    @csrf @method('DELETE')
                                                                    <label class="form-label">
                                                                        <i class="mdi mdi-delete-forever"
                                                                        style="font-size: 100px;"></i> <br>
                                                                        ¿ Desea Eliminar el Registro ?
                                                                        <input type="hidden" name="cod"
                                                                            value="{{ $grupo['COD_GRUPO'] }}">
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
                                    <h4 class="modal-title">Ingresar Nuevo Grupo</h4>
                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                </div>
                                <!-- CUERPO DEL DIALOGO NUEVA -->
                                <div class="modal-body">
                                    <center>

                                        <form action="{{ route('grupo.insertar') }}" method="post">
                                            @csrf
                                            <label class="form-label">
                                                <label class="form-label">
                                                    Clasificacion

                                                    <select class="form-control text-white" name="clasificacion"
                                                        id="" onchange="valor();" required>
                                                        <option hidden selected>Seleccionar</option>
                                                        @foreach ($clasificacionArr as $key)
                                                            <option value="{{ $key['NATURALEZA'] }}">
                                                                {{ $key['NATURALEZA'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <br>
                                                <label class="form-label">
                                                    Numero de Grupo

                                                    <input type='number' name='grupo' min="0" id="num_grupo"
                                                        class="form-control text-white" maxlength="3"
                                                        onkeyup="validarNgrupos(this)" required>
                                                </label>
                                                <div id="div_num"></div>


                                                <label class="form-label">
                                                    Nombre de grupo
                                                    <input type='text' name='name' class="form-control text-white"
                                                        id="nom_grupo" onkeyup="validarLgrupos(this)" required>
                                                    <div id="divgrupo"></div>
                                                </label>
                                                <br>
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
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
@section('js')
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>
    <script src="{{ asset('assets/js/ab-formularios.js') }}"></script>
    <script>
        const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#tabla");

        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "Reporte de Grupos", //Nombre del archivo de Excel
                sheetname: "Reporte de Grupos", //Título de la hoja
                ignoreCols: 4,
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
