@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Usuarios | inicio
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

@section('contenido')

    @if (Session::has('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El usuario se actualizo correctamente'
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

    <main>
        <div class="container-scroller">
            <div class="content-wrapper p-1">
                <center>
                    <h1>Usuarios H Tours Honduras</h1>
                </center>

                <!-- <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"></a></li>
            </ul> -->

                {{-- <p align="right" valign="baseline">
      <button type="button"  class="btn btn-success mr-3"  data-toggle="modal " data-target="#dialogo1">(+) Nuevo</button>
    </p> --}}
                <p align="right" valign="baseline">
                    {{-- <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
         --}}
                    <a type="button" href="{{ route('usuarios.pdf') }}" class="btn btn-danger btn-sm"><i
                            class="mdi mdi-file-pdf"></i>Generar PDF</a>

                    <button id="btnExportar" class="btn btn-success btn-sm">
                        <i class="mdi mdi-file-excel"></i> Generar Excel
                    </button>

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"></a></li>
                </ul>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body p-1">
                            <center>
                                <h4 class="card-title">Registros de usuarios</h4>
                            </center>
                            <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                            {{-- </p> --}}
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input class="form-control me-2 light-table-filter text-white" data-table="table_id"
                                    type="text" placeholder="Buscar un usuario">
                            </form>

                            <div class="table-responsive">
                                <table id="tabla" class="table table-bordered table-contextual table_id">
                                    <thead>
                                        <tr class="text-dark bg-white">
                                            <th class="text-dark bg-white"># Codigo</th>
                                            <th class="text-dark bg-white">Usuario</th>
                                            <th class="text-dark bg-white">Nombre usuario</th>
                                            <th class="text-dark bg-white">Estado</th>
                                            <th class="text-dark bg-white">Rol</th>
                                            <th class="text-dark bg-white">Tipo</th>
                                            <th class="text-dark bg-white">Ultima Conexión</th>
                                            {{-- <th class="text-dark bg-white">Preguntas contestadas</th> --}}
                                            <th class="text-dark bg-white">Ingresos</th>
                                            <th class="text-dark bg-white">Correo Electronico</th>
                                            <th class="text-dark bg-white">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($usrArr) <= 0)
                                            <tr>
                                                <td colspan="6">Sin resultados</td>
                                            </tr>
                                        @else
                                            @foreach ($usrArr as $usuario)
                                                <tr class="text-white bg-dark">
                                                    <td>{{ $usuario['CODIGO_USUARIO'] }}</td>
                                                    <td>{{ $usuario['USUARIO'] }}</td>
                                                    <td>{{ $usuario['NOMBRE_USUARIO'] }}</td>
                                                    <td>{{ $usuario['ESTADO_USUARIO'] }}</td>
                                                    <td>{{ $usuario['COD_ROL'] }}</td>
                                                    <td>{{ $usuario['TIPO'] }}</td>
                                                    <td>{{ substr( $usuario['FECHA_ULTIMO_ACCESO'],0,10 )  }}</td>
                                                    {{-- <td>{{$usuario['PREGUNTA_RESPONDIDA']}}</td> --}}
                                                    <td>{{ $usuario['PRIMER_ACCESO'] }}</td>
                                                    <td>{{ $usuario['CORREO_ELECTRONICO'] }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#modal-editar-{{ $usuario['CODIGO_USUARIO'] }}">Editar
                                                        </button>
                                                        {{-- <button 
                                                                    type="button"  
                                                                    class="btn btn-danger"  
                                                                    data-toggle="modal" 
                                                                    data-target="#modal-eliminar-{{$usuario['CODIGO_USUARIO']}}">Eliminar
                                                                </button>  --}}
                                                    </td>
                                                </tr>

                                                <!--MODAL EDITAR -->
                                                <div class="modal-container">
                                                    <div class="modal fade bd-example-modal-lg"
                                                        id="modal-editar-{{ $usuario['CODIGO_USUARIO'] }}">
                                                        <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <!-- CABECERA DEL DIALOGO NUEVA-->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Editar Usuarios</h4>
                                                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                                </div>
                                                                <!-- CUERPO DEL DIALOGO NUEVA -->
                                                                <div class="modal-body">
                                                                    <center>
                                                                        <form action="{{ route('usuarios.actualizar') }}"
                                                                            method="put">
                                                                            @csrf @method('PUT')
                                                                            <input name="COD_USR" type="hidden"
                                                                                value="{{ $usuario['CODIGO_USUARIO'] }}">
                                                                            <label class="form-label">
                                                                                Usuario
                                                                                <input type='text' name='USUARIO'
                                                                                    class="form-control text-white"
                                                                                    id="nom_usuario-edit-{{ $usuario['CODIGO_USUARIO'] }}" maxlength="50"
                                                                                    onkeyup="validarNomUsuario({{ $usuario['CODIGO_USUARIO'] }})"
                                                                                    value="{{ $usuario['USUARIO'] }}"
                                                                                    required>
                                                                                    <center>
                                                                                        <div style="background-color: white; opacity: 0.5;" id="divnomusuario-edt-{{ $usuario['CODIGO_USUARIO'] }}"></div>
                                                                                    </center>
                                                                            </label>
                                                                            <label class="form-label">
                                                                                Nombre del usuario
                                                                                <input type='text' name='NOMBRE_USUARIO'
                                                                                    class="form-control text-white"
                                                                                    id="usr_usuario-edit-{{  $usuario['CODIGO_USUARIO']  }}" maxlength="100"
                                                                                    onkeyup="validarUsrUsuario({{  $usuario['CODIGO_USUARIO']  }})"
                                                                                    value="{{ $usuario['NOMBRE_USUARIO'] }} "
                                                                                    required>
                                                                                    <center>
                                                                                        <div style="background-color: white; opacity: 0.5;" id="divusrusuario-edit-{{  $usuario['CODIGO_USUARIO']  }}"></div>
                                                                                    </center>
                                                                            </label>
                                                                            <label class="form-label">
                                                                                Seleccionar el estado
                                                                                <select class="form-control text-white"
                                                                                    name="ESTADO" id="">
                                                                                    <option hidden selected
                                                                                        value="{{ $usuario['ESTADO_USUARIO'] }}">
                                                                                        {{ $usuario['ESTADO_USUARIO'] }}
                                                                                    </option>
                                                                                    <option value="NUEVO">Nuevo</option>
                                                                                    <option value="ACTIVO">Activo</option>
                                                                                    <option value="INACTIVO">Inactivo
                                                                                    </option>
                                                                                    <option value="BLOQUEADO">Bloqueado
                                                                                    </option>
                                                                                </select>
                                                                            </label>
                                                                            <label class="form-label">
                                                                                Seleccionar el Rol
                                                                                <select class="form-control text-white"
                                                                                    name="ROL" id="">
                                                                                    <option
                                                                                        value="{{ $usuario['COD_ROL'] }}"
                                                                                        hidden selected>
                                                                                        {{ $usuario['TIPO'] }}</option>
                                                                                    @foreach ($usr_rol_Arr as $usr_rol)
                                                                                        <option
                                                                                            value="{{ $usr_rol['COD_ROL'] }}">
                                                                                            {{ $usr_rol['ROL'] }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </label>
                                                                            <br>
                                                                            <label class="form-label">
                                                                                Correo Electronico
                                                                                <input type='email' name='CORREO'
                                                                                    class="form-control text-white"
                                                                                    id="correo_usuario-edit-{{  $usuario['CODIGO_USUARIO']  }}" 
                                                                                    onkeyup="validarCorreoEdit({{  $usuario['CODIGO_USUARIO']  }})"
                                                                                    value="{{ $usuario['CORREO_ELECTRONICO'] }}"
                                                                                    required>
                                                                                    <center>
                                                                                        <div style="background-color: white; opacity: 0.5;" id="divcorreo-edit-{{ $usuario['CODIGO_USUARIO']  }}"></div>
                                                                                    </center>
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
                                                {{-- <div class="modal-container">
                                                    <div class="modal fade bd-example-modal-lg"
                                                        id="modal-eliminar-{{ $usuario['CODIGO_USUARIO'] }}">
                                                        <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <!-- CABECERA DEL DIALOGO EDITAR -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Eliminar usuarios</h4>
                                                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                                </div>
                                                                <!-- CUERPO DEL DIALOGO BORRAR -->
                                                                <div class="modal-body">
                                                                    <center>
                                                                        <form action="" method="post">
                                                                            <label class="form-label">¿ Desea eliminar
                                                                                usuario ? </label>
                                                                            <br>
                                                                            <a href=""
                                                                                class="btn btn btn-primary">SI</a>
                                                                            <a href=""
                                                                                class="btn btn-secondary">NO</a>

                                                                        </form>
                                                                </div>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Cerrar</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
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


                <div class="modal-container">
                    <div class="modal fade bd-example-modal-lg" id="dialogo1">
                        <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <!-- CABECERA DEL DIALOGO NUEVA-->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ingresar Usuarios</h4>
                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                </div>
                                <!-- CUERPO DEL DIALOGO NUEVA -->
                                <div class="modal-body">
                                    <center>
                                        <form action="" method="post">
                                            <label class="form-label">
                                                Usuario
                                                <input type='text' name='Clasificacion'
                                                    class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Nombre del usuario
                                                <input type='text' name='Clasificacion'
                                                    class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Seleccionar el Rol

                                                <select class="form-control text-white" name="" id="">
                                                    <option value=""></option>
                                                    <option value="">Administrador</option>
                                                    <option value="">Usuario</option>
                                                </select>
                                            </label>
                                            <br>
                                            <label class="form-label">
                                                Correo Electronico
                                                <input type='email' name='saldo' class="form-control text-white"
                                                    required></input>
                                            </label>
                                            <br>
                                            <label class="form-label">
                                                Contraseña
                                                <input type='password' name='CORREO ELECTRONICO'
                                                    class="form-control text-white" required></input>
                                            </label>
                                            <br>
                                            <label class="form-label">
                                                Fecha de vencimiento
                                                <input type='date' name='fecha' class="form-control text-white"
                                                    required></input>
                                            </label>
                                            <br>


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
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <!-- CABECERA DEL DIALOGO EDITAR -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Usuario</h4>
                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                </div>
                                <!-- CUERPO DEL DIALOGO EDITAR -->
                                <div class="modal-body">
                                    <center>
                                        <form action="" method="post">
                                            <label class="form-label">
                                                Usuario
                                                <input type='text' name='Clasificacion'
                                                    class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Nombre usuario
                                                <input type='text' name='NOM USUARIO' class="form-control text-white"
                                                    required></input>
                                            </label>
                                            <label class="form-label">
                                                Seleccionar el Rol

                                                <select class="form-control text-white" name="" id="">
                                                    <option value=""></option>
                                                    <option value="">Administrador</option>
                                                    <option value="">Usuario</option>
                                                </select>
                                            </label>
                                            <br>

                                            <label class="form-label">
                                                Correo Electronico
                                                <input type='email' name='CORREO ELECTRONICO'
                                                    class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Contraseña
                                                <input type='password' name='CORREO ELECTRONICO'
                                                    class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Fecha de vencimiento
                                                <input type='date' name='COS PRODUCTO' class="form-control text-white"
                                                    required></input>
                                            </label>














                                            <!-- partial -->
                                            <div class="main-panel">

                                                <!-- partial:../../partials/_footer.html -->
                                                <footer class="footer">
                                                    <div
                                                        class="d-sm-flex justify-content-center justify-content-sm-between">
                                                        <span
                                                            class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
                                                        <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
                                                    </div>
                                                </footer>
                                                <!-- partial -->
                                            </div>
                                            <!-- main-panel ends -->
                                </div>

                            </div>
    </main>

@section('js')
    {{-- VALIDACIONES --}}
    <script src="{{ asset('assets/js/ab-usuarios.js') }}"></script>
    {{-- BUSCADOR --}}
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
                filename: "Reporte de Usuarios", //Nombre del archivo de Excel
                sheetname: "Reporte de Usuarios", //Título de la hoja
                ignoreCols: 9,
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
