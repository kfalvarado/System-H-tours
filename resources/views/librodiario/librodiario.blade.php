@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Libro Diario | inicio
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

@section('encabezado')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
<!-- contenido de la pagina  -->
@section('contenido')


    @if (Session::has('insertado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El libro diario se inserto Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif

    @if (Session::has('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El libro diario se actualizó  Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('No_encontrada'))
        <input type="hidden" id="no_found" value="{{ Session::get('No_encontrada') }}">
        <script>
            let no = document.getElementById('no_found').value
            Swal.fire({
                icon: 'error',
                text: `La Cuenta ${no} no existe`
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif


    <!-- ELIMINADO NORMAL NO ELIMINA PERO POR QUE DEBE SER ELIMINADO LOGICO -->
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El libro diario se eliminó Correctamente'
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
    <style>
        input[type=file]::file-selector-button {
            border: 2px solid #6c5ce7;
            padding: .2em .4em;
            border-radius: .2em;
            background-color: #a29bfe;
            transition: 1s;
        }

        input[type=file]::file-selector-button:hover {
            background-color: #81ecec;
            border: 2px solid #00cec9;
        }
    </style>


    <!-- ESTE CSS ES PARA OCULTAR DATOS EN LA IMPRESION-->
    <style>
        @media print {

            .oculto-impresion,
            .oculto-impresion * {
                display: none !important;
            }
        }

        /*<elemento class="oculto-impresion"><!-- AQUI EMPIEZA PARA OCULTAR EN LA IMPRESION INICIO-->
                                                          </elemento><!-- AQUI SE QUITA PARA IMPRIMIR ESTO NO SALDRA FIN-->*/
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
    <!-- <div class="main-panel">
                                                              <div class="content-wrapper"> -->
    <!--<center> <h1>Libro Diario</h1> </center>-->
    <center>
        <h1>Libro Diario</h1>
    </center>

    <!--OCULTAR ELEMENTOS CON CSS ESTA ES LA CLASE LO QUE ESTE DENTRO APARECE EN LA PAGINA PERO NO EN LA IMPRESION EL CSS ESTA AL INICIO-->
    <!--<elemento class="oculto-impresion">  AQUI VA LO QUE SE QUIERE OCULTAR   </elemento>-->


    <div class="page-header">
        <!-- INICIO MODAL PARA NUEVA  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-md" id="dialogo1">
                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO NUEVA-->
                        <div class="modal-header">
                            <h4 class="modal-title">Ingresar a Libro Diario</h4>
                        </div>
                        <!-- CUERPO DEL DIALOGO NUEVA -->
                        <div class="modal-body">
                            <center>
                                <form action="{{ route('librodiario.insertar') }}" method="post"
                                    enctype="multipart/form-data" id="formulario">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">
                                                Período
                                                <select class="form-control text-white" name="periodo" id="periodo"
                                                    required>
                                                    <option hidden selected>SELECCIONAR</option>
                                                    @foreach ($periodoArr as $key)
                                                        <option value="{{ $key['COD_PERIODO'] }}">
                                                            {{ $key['NOM_PERIODO'] }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                <label class="form-label">
                                                    Clasificación

                                                    <select class="form-control text-white" name="naturaleza_cargo"
                                                        id="clasificacion" onchange="datos();" required>
                                                        <option hidden selected>SELECCIONAR</option>
                                                        @foreach ($clasificacionArr as $key)
                                                            <option value="{{ $key['NATURALEZA'] }}">
                                                                {{ $key['NATURALEZA'] }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </label>
                                        </div>
                                        <div class="col-6">


                                            <label class="form-label">
                                                Seleccionar Cuenta
                                                <select class="form-control text-white" name="cuenta_cargo"
                                                    onchange="cuesub()" id="cuenta" required>
                                                    <option hidden selected>SELECCIONAR</option>
                                                    @foreach ($nombrecuentaArr as $key)
                                                        <option value="{{ $key['NOM_CUENTA'] }}">{{ $key['NOM_CUENTA'] }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </label>
                                            <div id="subcuentas1">
                                                <label class="form-label">
                                                    Nombre de Sub Cuenta
                                                    <select class="form-control text-white" name="nombresubcuenta_cargo"
                                                        id="nombresubcuenta1" required>
                                                        <option hidden selected>SELECCIONAR</option>
                                                        @foreach ($subcuentas as $key)
                                                            <option value="{{ $key['NOM_SUBCUENTA'] }}">
                                                                {{ $key['NOM_SUBCUENTA'] }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                            </div>
                                            </label>

                                            <label for="">
                                                Ingresar subcuentas
                                                <input type="checkbox" name="chkbx1" id="chkbx1" checked>
                                            </label>
                                        </div>
                                    </div>

                        </div>
                        <center>
                            <div class="row">
                                <div class="col-12">

                                    <label class="form-label">
                                        Cargo
                                        <input type='number' id="cargo" min="0" name='saldo_cargo'
                                            step="any" onkeyup="validarnumeroscargo(this)"
                                            class="form-control text-white" required>
                                        <div id="divcargo"></div>
                                    </label>
                                </div>
                            </div>
                        </center>
                        <br>
                        <div style="background-color: #4154e14f">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-6">
                                    <label class="form-label">
                                        Clasificación
                                        <select class="form-control text-white" name="naturaleza_abono"
                                            id="clasificacion_abono" onchange="datosAbono();" required>
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
                                            onchange="cuesubAbono()" required>
                                            <option hidden selected>SELECCIONAR</option>
                                            @foreach ($nombrecuentaArr as $key)
                                                <option value="{{ $key['NOM_CUENTA'] }}">{{ $key['NOM_CUENTA'] }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </label>

                                    <div id="subcuentas2">
                                        <label class="form-label">
                                            Nombre de Sub Cuenta
                                            <select class="form-control text-white" name="nombresubcuenta_abono"
                                                id="nombresubcuenta_abono" required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($subcuentas as $key)
                                                    <option value="{{ $key['NOM_SUBCUENTA'] }}">
                                                        {{ $key['NOM_SUBCUENTA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-4"></div>
                                    <br>
                                    <div class="col-8">
                                        <label class="form-label">
                                            Abono
                                            <input type='number' id="abono" min="0" name='saldo_abono'
                                                step="any" onkeyup="validarnumerosabono(this)"
                                                class="form-control text-white" required></input>
                                            <div id="divabono"></div>
                                        </label> 
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <label class="form-label">
                                        Comprobante
                                        <br>
                                        <input type="file" name="comprobante" id="fileUpload" accept="image/*">
                                        @error('comprobante')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                </div>
                                <div style="width: 400px; margin: 0 auto; ">
                                    
                                    <table>
                                        <th>

                                            <label class="form-label">
                                                Descripción Transacción
                                                <br>
                                                <textarea class="form-control text-white" name="des" id="des" cols="15" rows="3" required></textarea>
                                            </label>

                                        </th>
                                        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>

                                            <label class="form-label">
                                                Fecha
                                                <input type='date' name='fecha' class="form-control  text-white"
                                                    required>
                                            </label>
                                        </th>
                                    </table>



                                </div>


                            </div>
                            <center>

                                <button type="submit" class="btn btn-lg btn-primary " onclick="validar(); ">Registrar
                                </button>

                            </center>



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
    <p align="right" valign="baseline">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button> <a
            type="button" href="{{ route('pdf.librodiario') }}" class="btn btn-danger btn-sm"><i
                class="mdi mdi-file-pdf"></i>Generar PDF</a>
        <button id="btnExportar" class="btn btn-success btn-sm">
            <i class="mdi mdi-file-excel"></i> Generar Excel
        </button>
    </p>
    <!--BUSCADOR VERDE CON CSS     INICIO-->
    <div class="demo">
        <form class="form-search">
            <div class="input-group">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input class="form-controlprueba form-text me-2 light-table-filter text-white" data-table="table_id"
                        type="text" placeholder="Buscar en libro diario">
                </form> &nbsp;
                <button class="btnprueba"> BUSCAR </button>
            </div>
        </form>
    </div>
    <!--BUSCADOR VERDE CON CSS     FIN-->

    <div class="row">

        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="tabla" class="table table-bordered table-contextual table_id">
                            <thead>
                                <tr>
                                    <th class="text-dark bg-white"> # </th>
                                    <th class="text-dark bg-white"> Código </th>
                                    <th class="text-dark bg-white"> Detalle </th>
                                    <th class="text-dark bg-white"> Saldo Debe </th>
                                    <th class="text-dark bg-white"> Saldo Haber </th>
                                    <th class="text-dark bg-white"> Comprobantes </th>
                                    <th class= "text-dark bg-white"> Descripcion</th>
                                    <th class="text-dark bg-white"> Fecha </th>
                                    <th class="text-dark bg-white"> Estado </th>
                                    <th class="text-dark bg-white"> Acciones </th>

                                </tr>
                            </thead>
                            <tbody>

                                @if (count($personArr) <= 0)
                                    <tr>
                                        <td colspan="9"> No hay Resultados</td>
                                    </tr>
                                @else
                                    @foreach ($personArr as $librodiario)
                                        <tr class="text-white bg-dark">
                                            <td> {{ $librodiario['COD_LIBDIARIO'] }} </td>
                                            <td> {{ $librodiario['NUM_SUBCUENTA'] }} </td>
                                            <td> {{ $librodiario['NOM_SUBCUENTA'] }} </td>
                                            <td> {{ number_format($librodiario['SAL_DEBE']) }} </td>
                                            <td> {{ number_format($librodiario['SAL_HABER']) }}</td>
                                            <td> <a href="" data-toggle="modal"
                                                    data-target="#comprobante-{{ $librodiario['COD_LIBDIARIO'] }}">
                                                    Ver imagen</a> </td>
                                            <td>{{$librodiario['DES_TRAN']}}</td>        
                                            <td> {{ substr($librodiario['FEC_LIBDIARIO'], 0, 10) }} </td>
                                            
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#dialogo5">Ingresada</button>
                                            <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#modal-editar{{ $librodiario['COD_LIBDIARIO'] }}"><i
                                                        class="mdi mdi-table-edit"></i>Editar</button> <button
                                                    type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar{{ $librodiario['COD_LIBDIARIO'] }}"><i
                                                        class="mdi mdi-delete-forever"></i>Eliminar</button> </td>
                                        </tr>


                                        <!-- INICIO MODAL PARA comprobante  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="comprobante-{{ $librodiario['COD_LIBDIARIO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Comprobante de Transacción</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                @if ($librodiario['DIRRECCION'] == 'Transaccion sin compronte')
                                                                    <h1>Sin Comprobante de Transacción</h1>
                                                                @else
                                                                    <img src="{{ $librodiario['DIRRECCION'] }}"
                                                                        alt="imagen comprobante" width="500"
                                                                        height="500">
                                                                @endif
                                                            </center>
                                                        </div>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar</button>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN DE MODAL PARA comprobante  -->







                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-editar{{ $librodiario['COD_LIBDIARIO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Libro Diario</h4>
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('librodiario.actualizar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')

                                                                    <input type="hidden" name="f"
                                                                        value="{{ $librodiario['COD_LIBDIARIO'] }}">

                                                                    <label class="form-label">
                                                                        Período
                                                                        <select class="form-control text-white"
                                                                            name="periodo" id="periodo"
                                                                            onchange="datos();" required>
                                                                            <option hidden selected
                                                                                value="{{ $librodiario['COD_PERIODO'] }}">
                                                                                {{ $librodiario['PERIODO'] }} </option>
                                                                            @foreach ($periodoArr as $key)
                                                                                <option value="{{ $key['COD_PERIODO'] }}">
                                                                                    {{ $key['NOM_PERIODO'] }}
                                                                                </option>
                                                                            @endforeach

                                                                        </select>



                                                                        <label class="form-label">
                                                                            Código
                                                                            <input type='text'
                                                                                value="{{ $librodiario['NUM_SUBCUENTA'] }}"
                                                                                name='cuenta' id="num_cuenta"
                                                                                onkeyup="validarnumeros(this)"
                                                                                class="form-control  text-white bg-dark"
                                                                                required readonly>
                                                                            <div id="divnum"></div>
                                                                        </label>


                                                                        <label class="form-label">
                                                                            Detalle
                                                                            <input type='text' list="lista-de-cuentas"
                                                                                name="nombresubcuenta"
                                                                                id="nom_subcuenta_edit-{{ $librodiario['COD_LIBDIARIO'] }}"
                                                                                onkeyup="datosedit({{ $librodiario['COD_LIBDIARIO'] }})"
                                                                                onchange="datoseditSub({{ $librodiario['COD_LIBDIARIO'] }})"
                                                                                onblur="validarletras({{ $librodiario['COD_LIBDIARIO'] }})"
                                                                                value="{{ $librodiario['NOM_SUBCUENTA'] }}"
                                                                                class="form-control text-white bg-dark"
                                                                                required>
                                                                            <datalist id="lista-de-cuentas">

                                                                            </datalist>
                                                                            <div
                                                                                id="divnom_edit-{{ $librodiario['COD_LIBDIARIO'] }}">
                                                                            </div>
                                                                        </label>
                                                                        <label class="form-label">

                                                                            Saldo
                                                                            @if ($librodiario['SAL_DEBE'] > 0)
                                                                                <input type='number' min="0"
                                                                                    name="saldo"
                                                                                    id="saldo-{{ $librodiario['COD_LIBDIARIO'] }}"
                                                                                    onkeyup="validarnumerossaldo({{ $librodiario['COD_LIBDIARIO'] }})"
                                                                                    value="{{ $librodiario['SAL_DEBE'] }}"
                                                                                    class="form-control text-white bg-dark"
                                                                                    required></input>
                                                                                <div id="divsaldoe"></div>
                                                                            @else
                                                                                <input type='number' min="0"
                                                                                    name="saldo"
                                                                                    id="saldo-{{ $librodiario['COD_LIBDIARIO'] }}"
                                                                                    onkeyup="validarnumerossaldo({{ $librodiario['COD_LIBDIARIO'] }})"
                                                                                    value="{{ $librodiario['SAL_HABER'] }}"
                                                                                    class="form-control text-white bg-dark"
                                                                                    required></input>
                                                                                <div
                                                                                    id="divsaldoe-{{ $librodiario['COD_LIBDIARIO'] }}">
                                                                                </div>
                                                                            @endif


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
                                                                            Comprobante
                                                                            <br>
                                                                            <!-- <form> -->
                                                                            <input type="file" id="fileUpload">
                                                                            <!-- </form> -->
                                                                        </label>
                                                                        <label class="form-label">
                                                                            Fecha
                                                                            <input type='date' name="fecha"
                                                                                value="{{ substr($librodiario['FEC_LIBDIARIO'], 0, 10) }}"
                                                                                class="form-control text-white"
                                                                                required></input>

                                                                        </label>
                                                                        <br>

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
                                                id="modal-eliminar{{ $librodiario['COD_LIBDIARIO'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar Libro Diario</h4>
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>

                                                                <form action="{{ route('librodiario.eliminar') }}"
                                                                    method="post">
                                                                    @csrf @method('DELETE')
                                                                    <label class="form-label">


                                                                        <input type="hidden" name="f"
                                                                            value="{{ $librodiario['COD_LIBDIARIO'] }}">
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
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>

    <script src="{{ asset('assets/js/ab-librodiario.js') }}"></script>


    <script>
        function validar() {
            let periodo = document.getElementById('periodo').value
            let clasificacion = document.getElementById('clasificacion').value
            let seleccionarcuenta = document.getElementById('cuenta').value



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
        $(document).ready(function() {
            $('#chkbx1').on('change', function() {
                if (this.checked) {
                    $("#subcuentas1").show();
                    $("#subcuentas2").show();
                } else {
                    $("#subcuentas1").hide();
                    $("#subcuentas2").hide();
                }
            })
        });
    </script>

    {{-- datables --}}
    <!-- script para exportar a excel -->
    <script>
        const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#tabla");

        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "Reporte de Libro Diario", //Nombre del archivo de Excel
                sheetname: "Reporte de Libro Diario", //Título de la hoja
                ignoreCols: 8,
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType,
                preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento
                .merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>
    {{-- insert --}}
    @routes
    <script>
        // funcio cuenta | clasificacion cargo
        function datos() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("clasificacion").value;
            var contenido = document.querySelector('#cuenta')

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

        //funcion cuenta | subcuenta cargo
        function cuesub() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("clasificacion").value;
            const cuenta = document.getElementById("cuenta").value;
            var contenido = document.querySelector('#nombresubcuenta1');

            // console.log(select,cuenta);
            var url = route('busca.buscalibdiario')
            let data = {
                NATURALEZA: select,
                CUENTA: cuenta
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
                                `<option name="INV" value="${valor.NOM_SUBCUENTA}">${valor.NOM_SUBCUENTA}</option>   `
                        }

                    }
                }).catch(error => console.error(error))
        }

        // funcio cuenta | clasificacion abono
        function datosAbono() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("clasificacion_abono").value;
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

        //funcion cuenta | subcuenta abono
        function cuesubAbono() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("clasificacion_abono").value;
            const cuenta = document.getElementById("cuenta_abono").value;
            var contenido = document.querySelector('#nombresubcuenta_abono');

            // console.log(select,cuenta);
            var url = route('busca.buscalibdiario')
            let data = {
                NATURALEZA: select,
                CUENTA: cuenta
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
                                `<option name="INV" value="${valor.NOM_SUBCUENTA}">${valor.NOM_SUBCUENTA}</option>   `
                        }

                    }
                }).catch(error => console.error(error))
        }
    </script>
    {{-- edit --}}
    @routes
    <script>
        // funcio cuenta editar | clasificacion cargo
        function datosedit(e) {
            // validarletras(e);
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById(`nom_subcuenta_edit-${e}`).value;
            var contenido = document.querySelector('#lista-de-cuentas')

            console.log(select);
            var url = route('busca.cuentEdit')
            let data = {
                CUENTA: select
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
                    console.log(respuesta);
                    pinta(respuesta);

                    function pinta(res) {
                        contenido.innerHTML = '';

                        for (let valor of res) {

                            contenido.innerHTML +=
                                `<option  value="${valor.nom_cuenta}"></option>   `
                        }

                        // for(let it of respuesta){
                        //     contenido.innerHTML +=
                        //         `<option  value="${valor.nom_cuenta}"></option>   `
                        // }

                    }
                }).catch(error => console.error(error))
        }

        function datoseditSub(e) {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById(`nom_subcuenta_edit-${e}`).value;
            var contenido = document.querySelector('#lista-de-cuentas')
            console.log('subcuentas');
            // console.log(select);
            var url = route('busca.cuentEditSUb')
            let data = {
                CUENTA: select
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
                    console.log(respuesta);

                    pinta2(respuesta);

                    function pinta2(res) {
                        contenido.innerHTML = '';

                        for (let valor of res) {
                            contenido.innerHTML +=
                                `<option  value="${valor.nom_subcuenta}"></option>   `
                        }

                    }
                }).catch(error => console.error(error))
        }
    </script>
@endsection










@endsection
