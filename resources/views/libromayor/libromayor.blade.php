@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Libro Mayor | inicio
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


@section('encabezado')
    <link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
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
                text: 'El libro mayor se inserto Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif

    @if (Session::has('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El libro mayor se actualizó  Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif

    <!-- ELIMINADO NORMAL NO ELIMINA PERO POR QUE DEBE SER ELIMINADO LOGICO -->
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El libro mayor se eliminó Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif

    @if (Session::has('sinpermiso'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'No Cuentas con permiso para realizar esta acción'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
















    <!-- ESTE CSS ES PARA OCULTAR DATOS EN LA IMPRESION-->
    <style>
        @media print {

            .oculto-impresion,
            .oculto-impresion * {
                display: none !important;
            }
        }
    </style>
    <!--BUSCADOR VERDE CON CSS INICIO-->
    <style>
        .form-controlprueba {
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
            border-radius: 5px;
        }
    </style>
    <style>
        .form-controlprueba:hover {
            border-color: green;
            box-shadow: 0 0px 10px 0 green inset, 0 10px 70px 0 green,
                0 0px 10px 0 green inset, 0 10px 20px 0 green;
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
            border-radius: 5px;
        }

        .btnprueba:hover {

            background-color: green;
            box-shadow: 0 0px 10px 0 green inset, 0 10px 70px 0 green,
                0 0px 10px 0 green inset, 0 10px 20px 0 green;
            text-shadow: 0 0 0px green;
        }
    </style>

    <!-- partial -->
    <!-- <div class="main-panel">
              <div class="content-wrapper"> -->
    <!--<center> <h1>Libro Diario</h1> </center>-->
    <center>
        <h1>Libro Mayor</h1>
    </center>
    <div class="page-header">
        <!-- INICIO MODAL PARA NUEVA  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo1">
                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO NUEVA-->
                        <div class="modal-header">
                            <h4 class="modal-title">Ingresar a Libro Mayor</h4>
                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                        </div>
                        <!-- CUERPO DEL DIALOGO NUEVA -->
                        <div class="modal-body">
                            <center>
                                <form action="{{ route('libromayor.insertar') }}" method="post">
                                    @csrf

                                    <label class="form-label">
                                        Período
                                        <select class="form-control text-white" name="periodo" id="periodo_nuevo" required>
                                            <option hidden selected>SELECCIONAR</option>
                                            @foreach ($periodoArr as $key)
                                                <option value="{{ $key['COD_PERIODO'] }}">{{ $key['NOM_PERIODO'] }}
                                                </option>
                                            @endforeach

                                        </select>

                                        <label class="form-label">
                                            Clasificación
                                            <select class="form-control text-white" name="naturaleza_cargo"
                                                id="naturaleza_cargo" onchange="datos();" required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($clasificacionArr as $key)
                                                    <option value="{{ $key['NATURALEZA'] }}">{{ $key['NATURALEZA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>

                                        <label class="form-label">
                                            Seleccionar Cuenta

                                            <select class="form-control text-white" name="cuenta_cargo" id="cuenta_cargo"
                                                required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($nombrecuentaArr as $key)
                                                    <option value="{{ $key['NOM_CUENTA'] }}">{{ $key['NOM_CUENTA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>

                                        <label class="form-label">
                                            Cargo
                                            <input type='number' min="0" id="cargo"
                                                onkeyup="validarnumeroscargo(this)" name='saldo_cargo'
                                                class="form-control text-white" required></input>
                                            <div id="divcargo"></div>
                                        </label>

                                        <br>

                                        <label class="form-label">
                                            Clasificación
                                            <select class="form-control text-white" name="naturaleza_abono"
                                                id="naturaleza_abono" onchange="datosAbono();" required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($clasificacionArr as $key)
                                                    <option value="{{ $key['NATURALEZA'] }}">{{ $key['NATURALEZA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>

                                        <label class="form-label">
                                            Seleccionar Cuenta

                                            <select class="form-control text-white" name="cuenta_abono" id="cuenta_abono"
                                                required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($nombrecuentaArr as $key)
                                                    <option value="{{ $key['NOM_CUENTA'] }}">{{ $key['NOM_CUENTA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>

                                        <label class="form-label">
                                            Abono
                                            <input type='number' min="0" name='saldo_abono' id="abono"
                                                onkeyup="validarnumerosabono(this)" class="form-control text-white"
                                                required></input>
                                            <div id="divabono"></div>
                                        </label>
                                        <hr />
                                        <label class="form-label">
                                            Fecha
                                            <input type='date' name='fecha' class="form-control text-white"
                                                required></input>
                                        </label>
                                        <br>
                                        <a href="" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" onclick="validarbotonnuevo();"
                                            class="btn btn-primary">Registrar </button>
                                </form>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DE MODAL PARA NUEVA  -->



        <!-- INICIO MODAL PARA MAYORIZACION  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo4">
                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO MAYORIZACION-->
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <center> Seleccionar Período</center>
                            </h4>
                         
                        </div>
                        <!-- CUERPO DEL DIALOGO MAYORIZACION -->
                        <div class="modal-body">
                            <center>
                                <form action="{{ route('libromayor.mayorizacion') }}" method="post">
                                    @csrf
                                    <label class="form-label">
                                        Período
                                        <select class="form-control text-white" name="periodo" id="periodo_mayorizacion"
                                            onchange="datos();" required>
                                            <option hidden selected>SELECCIONAR</option>
                                            @foreach ($periodoArr as $key)
                                                <option value="{{ $key['COD_PERIODO'] }}">{{ $key['NOM_PERIODO'] }}
                                                </option>
                                            @endforeach

                                        </select>


                                        <label class="form-label">
                                            Clasificación
                                            <select class="form-control text-white" name="naturaleza"
                                                id="clasificacion_mayorizacion" onchange="datosmayorizacion();" required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($clasificacionArr as $key)
                                                    <option value="{{ $key['NATURALEZA'] }}">{{ $key['NATURALEZA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>


                                        <label class="form-label">
                                            Seleccionar Cuenta

                                            <select class="form-control text-white" name="cuenta"
                                                id="cuenta_mayorizacion" required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($nombrecuentaArr as $key)
                                                    <option value="{{ $key['NOM_CUENTA'] }}">{{ $key['NOM_CUENTA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>
                                        <!-- <a href="" class="btn btn-secondary">Cancelar</a> -->
                                        <br>
                                        <button type="submit" onclick="validar();"
                                            class="btn btn-primary">Aceptar</button>
                                </form>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DE MODAL PARA PERIODO  -->

        <!-- INICIO MODAL PARA INGRESADA  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo5">
                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO NUEVA-->
                        <div class="modal-header">
                            <h4 class="modal-title">Estado de la Sub Cuenta</h4>
                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                        </div>
                        <!-- CUERPO DEL DIALOGO INGRESADA -->
                        <div class="modal-body">
                            <center>
                                <form action="" method="post">
                                    <label class="form-label">
                                        Esta Sub cuenta ha sido ingresada en el libro diario
                                    </label>
                                </form>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DE MODAL PARA INGRESADA  -->

        <!-- INICIO MODAL PARA PENDIENTE  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo6">
                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO PENDIENTE-->
                        <div class="modal-header">
                            <h4 class="modal-title">Estado de la Sub Cuenta</h4>
                        </div>

                        <!-- CUERPO DEL DIALOGO PENDIENTE -->
                        <div class="modal-body">
                            <center>
                                <form action="" method="post">
                                    <label class="form-label">
                                        Esta Sub cuenta esta pendiente, no ha sido totalizada por el libro Mayor
                                    </label>
                                </form>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DE MODAL PARA PENDIENTE  -->

        <!-- INICIO MODAL PARA PROCESADA  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo7">
                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO PROCESADA-->
                        <div class="modal-header">
                            <h4 class="modal-title">Estado de la Sub Cuenta</h4>
                        </div>

                        <!-- CUERPO DEL DIALOGO PROCESADA -->
                        <div class="modal-body">
                            <center>
                                <form action="" method="post">
                                    <label class="form-label">
                                        Esta Sub cuenta procesada, ha sido totalizada por el libro Mayor

                                    </label>
                                </form>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DE MODAL PARA PROCESADA  -->

    </div>
    <!-- Control de pestaña -->
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('periodo.inicio') }}">Período</a>
        <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Libro Mayor</a>
    </nav>

    <p align="right" valign="baseline">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dialogo4"><i
                class="mdi mdi-book-open-page-variant"> </i>Mayorizar</button> <button type="button"
            class="btn btn-info" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button> <a type="button"
            class="btn btn-danger btn-sm" href="{{ route('pdf.libromayor') }}"><i class="mdi mdi-file-pdf"></i>Generar
            PDF</a>
        <button id="btnExportar" class="btn btn-success btn-sm">
            <i class="mdi mdi-file-excel"></i> Generar Excel
        </button>
    </p>

    <!--BUSCADOR VERDE CON CSS     INICIO-->
    <div class="demo">
        <form class="form-search">
            <div class="input-group">
                <input class="form-controlprueba form-text me-2 light-table-filter text-white" data-table="table_id"
                    type="text" placeholder="Buscar en libro mayor">
                <button class="btnprueba"> BUSCAR </button>
            </div>
        </form>
    </div>
    <!--BUSCADOR VERDE CON CSS     FIN-->

    <div class="row">

        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <select class="form-control text-white" name="" id="">
                            <option value="">Seleccionar</option>
                            <option value="">Periodo-2020-ene-1-001</option>
                            <option value="">Periodo-2021-ene-1-002</option>
                            <option value="">Periodo-2022-ene-1-003</option>
                        </select>
                    </form>
                    <div class="table-responsive">
                        <table id="tabla" class="table table-bordered table-contextual table_id">
                            <thead>
                                <tr>
                                    <th class="text-dark bg-white"> # </th>
                                    <th class="text-dark bg-white"> Clasificación </th>
                                    <th class="text-dark bg-white"> Código </th>
                                    <th class="text-dark bg-white"> Detalle </th>
                                    <th class="text-dark bg-white"> Saldo Debe </th>
                                    <th class="text-dark bg-white"> Saldo Haber </th>
                                    <th class="text-dark bg-white"> Fecha </th>
                                    <th class="text-dark bg-white"> Estado Cuenta </th>
                                    <th class="text-dark bg-white"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($personArr) <= 0)
                                    <tr>
                                        <td colspan="6"> No hay Resultados</td>
                                    </tr>
                                @else
                                    @foreach ($personArr as $libromayor)
                                        <tr class="text-white bg-dark">
                                            <td> {{ $libromayor['COD_LIBMAYOR'] }} </td>
                                            <td> {{ $libromayor['NATURALEZA'] }} </td>
                                            <td> {{ $libromayor['NUM_CUENTA'] }} </td>
                                            <td> {{ $libromayor['NOM_CUENTA'] }} </td>
                                            <td> {{ number_format($libromayor['SAL_DEBE']) }} </td>
                                            <td> {{ number_format($libromayor['SAL_HABER']) }}</td>
                                            <td> {{ substr($libromayor['FEC_LIBMAYOR'], 0, 10) }} </td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#dialogo5">Ingresada</button>

                                            <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#modal-editar{{ $libromayor['COD_LIBMAYOR'] }}"><i
                                                        class="mdi mdi-table-edit"></i>Editar</button> <button
                                                    type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar{{ $libromayor['COD_LIBMAYOR'] }}"><i
                                                        class="mdi mdi-delete-forever"></i>Eliminar</button> </td>
                                        </tr>



                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-editar{{ $libromayor['COD_LIBMAYOR'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Libro Mayor</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('libromayor.actualizar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')

                                                                    <input type="hidden" name="f"
                                                                        value="{{ $libromayor['COD_LIBMAYOR'] }}">

                                                                    <label class="form-label">
                                                                        Período
                                                                        <select class="form-control text-white"
                                                                            name="periodo" id="periodo"
                                                                            required>
                                                                            <option hidden selected
                                                                                value="{{ $libromayor['COD_PERIODO'] }}">
                                                                                {{ $libromayor['NOM_PERIODO'] }}</option>
                                                                            @foreach ($periodoArr as $key)
                                                                                <option value="{{ $key['COD_PERIODO'] }}">
                                                                                    {{ $key['NOM_PERIODO'] }}</option>
                                                                            @endforeach

                                                                        </select>



                                                                        <label class="form-label">
                                                                            Clasificación
                                                                            <select class="form-control text-white"
                                                                                name="naturaleza" id="clasificacion-{{ $libromayor['COD_LIBMAYOR'] }}"
                                                                                onchange="datosedit({{ $libromayor['COD_LIBMAYOR'] }});" required>
                                                                                <option hidden selected
                                                                                    value="{{ $libromayor['NATURALEZA'] }}">
                                                                                    {{ $libromayor['NATURALEZA'] }}
                                                                                </option>
                                                                                @foreach ($clasificacionArr as $key)
                                                                                    <option
                                                                                        value="{{ $key['NATURALEZA'] }}">
                                                                                        {{ $key['NATURALEZA'] }} </option>
                                                                                @endforeach

                                                                            </select>
                                                                        </label>

                                                                        <label class="form-label">
                                                                            Seleccionar Cuenta

                                                                            <select class="form-control text-white"
                                                                                name="cuenta" id="cuenta-{{ $libromayor['COD_LIBMAYOR'] }}" required>
                                                                                <option hidden selected
                                                                                    value="{{ $libromayor['NOM_CUENTA'] }}">
                                                                                    {{ $libromayor['NOM_CUENTA'] }}
                                                                                </option>
                                                                                @foreach ($nombrecuentaArr as $key)
                                                                                    <option
                                                                                        value="{{ $key['NOM_CUENTA'] }}">
                                                                                        {{ $key['NOM_CUENTA'] }}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </label>


                                                                        <label class="form-label">
                                                                            Saldo
                                                                            @if ($libromayor['SAL_DEBE'] > 0)
                                                                                <input type='number'
                                                                                    value="{{ $libromayor['SAL_DEBE'] }}"
                                                                                    name='saldo' id="saldo"
                                                                                    class="form-control text-white"
                                                                                    onkeyup="validarnumerossaldo(this)"
                                                                                    required></input>
                                                                            @else
                                                                                <input type='number'
                                                                                    value="{{ $libromayor['SAL_HABER'] }}"
                                                                                    name='saldo' id="saldo"
                                                                                    onkeyup="validarnumerossaldo(this)"
                                                                                    class="form-control text-white"
                                                                                    required></input>
                                                                            @endif
                                                                            <div id="divsaldoemayor"></div>
                                                                        </label>
                                                                        <br>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="transaccion"
                                                                                value="1" required>Debe
                                                                        </label>

                                                                        &nbsp;&nbsp;
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="transaccion"
                                                                                value="0" required>Haber
                                                                        </label>
                                                                        <hr />

                                                                        <label class="form-label">
                                                                            Fecha
                                                                            <input type='date'
                                                                                value="{{ substr($libromayor['FEC_LIBMAYOR'], 0, 10) }}"
                                                                                name='fecha'
                                                                                class="form-control text-white"
                                                                                required></input>
                                                                        </label>
                                                                        <a href=""
                                                                            class="btn btn-secondary">Cancelar</a>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Aceptar </button>
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
                                                id="modal-eliminar{{ $libromayor['COD_LIBMAYOR'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar Libro Mayor</h4>
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('libromayor.eliminar') }}"
                                                                    method="post">
                                                                    @csrf @method('DELETE')

                                                                    <input type="hidden" name="f"
                                                                        value="{{ $libromayor['COD_LIBMAYOR'] }}">

                                                                    <label class="form-label">
                                                                        <i class="mdi mdi-delete-forever"
                                                                            style="font-size: 100px;"></i> <br>
                                                                        ¿ Desea Eliminar la Transacción ?
                                                                    </label>

                                                                    <button type="submit" href=""
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
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
    <script src="{{ asset('assets/js/ab-libromayor.js') }}"></script>




    <script>
        function validar() {
            let periodo = document.getElementById('periodo_mayorizacion').value
            let clasificacion = document.getElementById('clasificacion_mayorizacion').value
            let seleccionarcuenta = document.getElementById('cuenta_mayorizacion').value




            if (periodo == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono un periodo'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }


            if (clasificacion == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono un clasificacion'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }


            if (seleccionarcuenta == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono una cuenta'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }
        }
    </script>

    <script>
        // VALIDACIONES PARA BOTON NUEVO LIBRO MAYOR
        function validarbotonnuevo() {

            let periodonuevo = document.getElementById('periodo_nuevo').value
            let naturalezacargo = document.getElementById('naturaleza_cargo').value
            let cuentacargo = document.getElementById('cuenta_cargo').value
            let naturalezaabono = document.getElementById('naturaleza_abono').value
            let cuentaabono = document.getElementById('cuenta_abono').value


            if (periodonuevo == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono un periodo'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }


            if (naturalezacargo == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono clasificacion'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }


            if (cuentacargo == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono la cuenta '
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }

            if (naturalezaabono == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono la clasificacion'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }

            if (cuentaabono == 'SELECCIONAR') {
                Swal.fire({
                    icon: 'error',
                    text: 'No selecciono la cuenta '
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
                event.preventDefault();
            }



        }
    </script>














    {{-- datables --}}
    <!-- script para exportar a excel -->
    <script>
        const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#tabla");

        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "Reporte de Libro Mayor", //Nombre del archivo de Excel
                sheetname: "Reporte de Libro Mayor", //Título de la hoja
                ignoreCols: 8,
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType,
                preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento
                .merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>
    {{-- insertar --}}
@routes
    <script>
        // funcio cuenta | clasificacion insertar
        function datos() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("naturaleza_cargo").value;
            var contenido = document.querySelector('#cuenta_cargo')

            // console.log(select);
            var url = route('busca.subcuentas')
            let data = {
                NATURALEZA: select
            }
            fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': window.CSRF_TOKEN
                    }
                })
                .then(resp => {
                    return resp.json()
                })
                .then(respuesta => {
                    // console.log(respuesta);
                    pinta(respuesta);

                    function pinta(res) {
                        contenido.innerHTML = '';
                        contenido.innerHTML = ' <option hidden selected>SELECCIONAR</option>';

                        for (let valor of res) {
                            contenido.innerHTML +=
                                `<option name="INV" value="${valor.NOM_CUENTA}">${valor.NOM_CUENTA}</option>   `
                        }

                    }
                }).catch(error => console.error(error))
        }
         // funcio cuenta | clasificacion abono
         function datosAbono() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("naturaleza_abono").value;
            var contenido = document.querySelector('#cuenta_abono')

            // console.log(select);
            var url = route('busca.subcuentas')
            let data = {
                NATURALEZA: select
            }
            fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': window.CSRF_TOKEN
                    }
                })
                .then(resp => {
                    return resp.json()
                })
                .then(respuesta => {
                    // console.log(respuesta);
                    pinta(respuesta);
                    //   console.log(typeof respuesta);
                    //   const object = JSON.stringify(respuesta)
                    //   console.log(object.NOM_CUENTA[0]);
                    //   var opciones = "";
                    //   for(let i in object.NOM_CUENTA){
                    //     // console.log(object.NOM_CUENTA[]);
                    //     opciones+="<option value='"+object.NOM_CUENTA[i]+"'>"+object.NOM_CUENTA[i]+'</option>';
                    //   }
                    //   document.getElementById('cuentas').innerHTML = opciones;
                    function pinta(res) {
                        contenido.innerHTML = '';
                        contenido.innerHTML = ' <option hidden selected>SELECCIONAR</option>';

                        for (let valor of res) {
                            contenido.innerHTML +=
                                `<option name="INV" value="${valor.NOM_CUENTA}">${valor.NOM_CUENTA}</option>   `
                        }

                    }
                }).catch(error => console.error(error))
        }
    </script>

    {{-- editar --}}
    @routes
<script>
    // funcio cuenta editar | clasificacion cargo
    function datosedit(e) {
      window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById(`clasificacion-${e}`).value;
            var contenido = document.querySelector(`#cuenta-${e}`)

            // console.log(select);
            var url = route('busca.subcuentas')
            let data = {
                NATURALEZA: select
            }
            fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': window.CSRF_TOKEN
                    }
                })
                .then(resp => {
                    return resp.json()
                })
                .then(respuesta => {
                  
                    pinta(respuesta);
                   
                    function pinta(res) {
                        contenido.innerHTML = '';
                        contenido.innerHTML = ' <option hidden selected>SELECCIONAR</option>';

                        for (let valor of res) {
                            contenido.innerHTML +=
                                `<option name="INV" value="${valor.NOM_CUENTA}">${valor.NOM_CUENTA}</option>   `
                        }

                    }
                }).catch(error => console.error(error))
        
    }

    //funcion | mayorizacion
    function datosmayorizacion(e) {
      window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById(`clasificacion_mayorizacion`).value;
            var contenido = document.querySelector(`#cuenta_mayorizacion`)

            // console.log(select);
            var url = route('busca.subcuentas')
            let data = {
                NATURALEZA: select
            }
            fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': window.CSRF_TOKEN
                    }
                })
                .then(resp => {
                    return resp.json()
                })
                .then(respuesta => {
                  
                    pinta(respuesta);
                   
                    function pinta(res) {
                        contenido.innerHTML = '';
                        contenido.innerHTML = ' <option hidden selected>SELECCIONAR</option>';

                        for (let valor of res) {
                            contenido.innerHTML +=
                                `<option name="INV" value="${valor.NOM_CUENTA}">${valor.NOM_CUENTA}</option>   `
                        }

                    }
                }).catch(error => console.error(error))
        
    }

</script>
@endsection



@endsection
