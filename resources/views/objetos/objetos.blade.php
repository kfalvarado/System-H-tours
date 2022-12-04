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
<link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
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
                text: 'El objeto se inserto Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El objeto se Actualizo Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El objeto se elimino Correctamente'
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
        <h1> Objetos </h1>
    </center>
    <div class="page-header">
        </nav>
    </div>

    <p align="right" valign="baseline">
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
        <a type="button" href="{{ route('objetos.pdf') }}" class="btn btn-danger btn-sm"><i
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
                        <center>Objetos</center>
                    </h4>
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input class="form-control me-2 light-table-filter text-white" data-table="table_id" type="text"
                            placeholder="Buscar un objetos">
                    </form>
                    <div class="table-responsive">
                        <table id="tabla" class="table table-bordered table-contextual table_id">
                            <thead>
                                <tr class="text-dark bg-white">
                                    <th class="text-dark bg-white">#</th>
                                    <th class="text-dark bg-white">Objetos</th>
                                    <th class="text-dark bg-white">Descripción</th>
                                    <th class="text-dark bg-white">Tipo de objetos</th>
                                    <th class="text-dark bg-white">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($personArr) <= 0)
                                    <tr>
                                        <td colspan="6">No hay resultados</td>
                                    </tr>
                                @else
                                    @foreach ($personArr as $objeto)
                                        <tr class="text-white bg-dark">
                                            <td> {{ $objeto['COD_OBJETO'] }} </td>
                                            <td>{{ $objeto['OBJETO'] }}</td>
                                            <td>{{ $objeto['DES_OBJETO'] }}</td>
                                            <td>{{ $objeto['TIP_OBJETO'] }}</td>
                                            <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#modal-editar-{{ $objeto['COD_OBJETO'] }}"> <i
                                                        class="mdi mdi-table-edit"></i>Editar</button> <button
                                                    type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $objeto['COD_OBJETO'] }}"><i
                                                        class="mdi mdi-delete-forever"></i>Eliminar</button> </td>
                                        </tr>

                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-editar-{{ $objeto['COD_OBJETO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Objetos</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('objetos.actualizar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')


                                                                    <input type="hidden" name="f"
                                                                        value="{{ $objeto['COD_OBJETO'] }}">
                                                                    <label class="form-label">
                                                                        Objeto
                                                                        <input type='text' list="lista-programacion"
                                                                            value="{{ $objeto['OBJETO'] }}" name='objetos'
                                                                            id="objeto-edit-{{  $objeto['COD_OBJETO'] }}"
                                                                            onkeyup="validarobjetoEDIT({{ $objeto['COD_OBJETO']  }})"
                                                                            class="form-control text-white bg-dark"
                                                                            required>
                                                                            <div id="divobjeto-edit-{{  $objeto['COD_OBJETO']  }}"></div>
                                                                        {{-- <datalist id="lista-programacion">
                             <option value="Periodo-2022-ene-1-004">
                           </datalist> --}}
                                                                        </input>
                                                                    </label>
                                                                    <br>
                                                                    <label class="form-label">
                                                                        Descripcion
                                                                        <input type='text' list="lista-programacion"
                                                                            value="{{ $objeto['DES_OBJETO'] }}"
                                                                            name='descripcion'
                                                                            id="descripcion-edit-{{  $objeto['COD_OBJETO'] }}"
                                                                            onkeyup="validardescripcionEDIT({{$objeto['COD_OBJETO']  }})"
                                                                            class="form-control text-white bg-dark"
                                                                            required>
                                                                            <div id="divdescrip-edit-{{ $objeto['COD_OBJETO']}}"></div>
                                                                        <datalist id="lista-programacion">
                                                                            
                                                                        </datalist>
                                                                        </input>
                                                                    </label>
                                                                    <br>
                                                                    <label class="form-label">
                                                                        Tipo de objeto
                                                                        <input type='text' list="lista-programacion"
                                                                            value="{{ $objeto['TIP_OBJETO'] }}"
                                                                            name='tipo'
                                                                            id="tipoobjeto-edit-{{  $objeto['COD_OBJETO'] }}"
                                                                            onkeyup="validartipoEDIT({{ $objeto['COD_OBJETO']  }})"
                                                                            class="form-control text-white bg-dark"
                                                                            required>
                                                                            <div id="divtipoob-{{ $objeto['COD_OBJETO'] }}"></div>
                                                                        <datalist id="lista-programacion">
                                                                         
                                                                        </datalist>
                                                                        </input>
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
                                                id="modal-eliminar-{{ $objeto['COD_OBJETO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar Objetos</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('objetos.eliminar') }}"
                                                                    method="post">
                                                                    @csrf @method('DELETE')

                                                                    <input type="hidden" name="f"
                                                                        value="{{ $objeto['COD_OBJETO'] }}">
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
                        <h4 class="modal-title">Ingresar Nuevo Objeto</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO NUEVA -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('objetos.insertar') }}" method="post">
                                @csrf
                                <label class="form-label">
                                    Objeto
                                    <input type='text' list="lista-programacion" name='objetos'
                                        class="form-control text-white" id="objeto" onkeyup="validarobjeto(this)"  required>
                                        <div id="divobjeto"></div>
                                    <datalist id="lista-programacion">
                                        <option value="Periodo-2022-ene-1-004">
                                    </datalist>
                                    </input>
                                </label>
                                <br>
                                <label class="form-label">
                                    Descripcion
                                    <input type='text' list="lista-programacion" name='descripcion'
                                        class="form-control text-white" id="descripcion" onkeyup="validardescripcion(this)" required>
                                        <div id="divdescrip"></div>
                                    <datalist id="lista-programacion">
                                        <option value="Periodo-2022-ene-1-004">
                                    </datalist>
                                    </input>
                                </label>
                                <br>
                                <label class="form-label">
                                    Tipo de Objeto
                                    <input type='text' list="lista-programacion" name='tipo'
                                        class="form-control text-white"  id="tipobjeto" onkeyup="validartipo(this)" required>
                                        <div id="divtipo"></div>
                                    <datalist id="lista-programacion">
                                        <option value="Periodo-2022-ene-1-004">
                                    </datalist>
                                    </input>
                                </label>
                                <br>
                                <label class="form-label">
                                    <br>

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
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>
    <script src="{{ asset('assets/js/ab-objetos.js') }}"></script>
    <script>
        const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#tabla");

        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "Reporte de Objetos", //Nombre del archivo de Excel
                sheetname: "Reporte de Objetos", //Título de la hoja
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
