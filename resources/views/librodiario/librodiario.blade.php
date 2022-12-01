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
                text: 'El libro diario se actualizo Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif


    <!-- ELIMINADO NORMAL NO ELIMINA PERO POR QUE DEBE SER ELIMINADO LOGICO -->
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'El libro diario se elimino Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif


    @if (Session::has('sinpermiso'))
<script>
  Swal.fire({
    icon: 'success',
    text: 'No Cuentas con permiso para realizar esta accion'
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
            <div class="modal fade bd-example-modal-lg" id="dialogo1">
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


                                    <label class="form-label">
                                        Periodo
                                        <select class="form-control text-white" name="periodo" id="periodo"
                                            onchange="datos();" required>
                                            <option hidden selected>SELECCIONAR</option>
                                            @foreach ($periodoArr as $key)
                                                <option value="{{ $key['COD_PERIODO'] }}">{{ $key['NOM_PERIODO'] }}</option>
                                            @endforeach

                                        </select>


                                        <label class="form-label">
                                            Clasificacion

                                            <select class="form-control text-white" name="naturaleza_cargo"
                                                id="clasificacion" onchange="datos();" required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach ($clasificacionArr as $key)
                                                    <option value="{{ $key['NATURALEZA'] }}">{{ $key['NATURALEZA'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </label>


                                        <label class="form-label">
                                            Seleccionar Cuenta

                                            <select class="form-control text-white" name="cuenta_cargo" id="cuenta"
                                                required>
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
                                            </label>
                                        </div>
                                        <br>
                                        <label for="">
                                            ingresar subcuentas
                                            <input type="checkbox" name="chkbx1" id="chkbx1" checked>

                                        </label>
                                        <br>

                                        <label class="form-label">
                                            Cargo
                                            <input type='number' id="cargo" min="0" name='saldo_cargo'
                                            onkeyup="validarnumeroscargo(this)"
                                                class="form-control text-white" required></input>
                                                <div id="divcargo"></div>
                                        </label>




                                        <br>
                                        <div style="background-color: #4154e14f">
                                            <label class="form-label">
                                                Clasificacion

                                                <select class="form-control text-white" name="naturaleza_abono"
                                                    id="clasificacion" onchange="datos();" required>
                                                    <option hidden selected>SELECCIONAR</option>
                                                    @foreach ($clasificacionArr as $key)
                                                        <option value="{{ $key['NATURALEZA'] }}">{{ $key['NATURALEZA'] }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </label>


                                            <label class="form-label">
                                                Seleccionar Cuenta

                                                <select class="form-control text-white" name="cuenta_abono" id="cuenta"
                                                    required>
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
                                                        id="nombresubcuenta" required>
                                                        <option hidden selected>SELECCIONAR</option>
                                                        @foreach ($subcuentas as $key)
                                                            <option value="{{ $key['NOM_SUBCUENTA'] }}">
                                                                {{ $key['NOM_SUBCUENTA'] }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </label>
                                            </div>

                                            <br>

                                            <label class="form-label">
                                                Abono
                                                <input type='number' id="abono" min="0" name='saldo_abono'
                                                onkeyup="validarnumerosabono(this)"
                                                    class="form-control text-white" required></input>
                                                    <div id="divabono"></div>
                                            </label>

                                            <br>
                                            <hr />
                                            <label class="form-label">
                                                Comprobante
                                                <br>

                                                <input type="file" name="comprobante" id="fileUpload" accept="image/*">
                                                @error('comprobante')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </label>
                                            <label class="form-label">
                                                Fecha
                                                <input type='date' name='fecha' class="form-control  text-white"
                                                    required></input>
                                            </label>
                                            <br>

                                        </div>
                                        <button type="submit" class="btn btn-primary" onclick="validar(); ">Registrar
                                        </button>

                                </form>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DE MODAL PARA NUEVA  -->



        <!-- INICIO MODAL PARA INGRESADA  -->
        <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo5">
                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <!-- CABECERA DEL DIALOGO NUEVA-->
                        <div class="modal-header">
                            <h4 class="modal-title">Estado de la Sub Cuenta</h4>
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
                                                            <h4 class="modal-title">Comprobante de Transaccion</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                @if ($librodiario['DIRRECCION'] == 'Transaccion sin compronte')
                                                                    <h1>Sin Comprobante de Transaccion</h1>
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
                                                                        Periodo
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
                                                                            Numero de Cuenta
                                                                            <input type='text'
                                                                                value="{{ $librodiario['NUM_SUBCUENTA'] }}"
                                                                                name='cuenta'
                                                                                id="num_cuenta"
                                                                                onkeyup="validarnumeros(this)"
                                                                                class="form-control text-white" required>
                                                                                <div id="divnum"></div>
                                                                        </label>
                                                                            <!-- <select class="form-control text-white" name="cuenta" id="">
                              <option value=""></option>
                              <option value="">Caja</option>
                              <option value="">Proveedores</option>
                              <option value="">Capital</option>
                            </select> -->
                                                                            <!-- </input>
                          </label> -->
                                                                            <label class="form-label">
                                                                                Nombre de Sub Cuenta
                                                                                <input type='text' list=""
                                                                                    name="nombresubcuenta"
                                                                                    id="nom_subcuenta"
                                                                                    onkeyup="validarletras(this)"
                                                                                    value="{{ $librodiario['NOM_SUBCUENTA'] }}"
                                                                                    class="form-control text-white bg-dark"
                                                                                    required>
                                                                                    
                                                                                <!-- <select class="form-control text-white" >
                              <option value=""></option>
                              <option value="">Cheques</option>
                              <option value="">Depositos</option>
                              <option value="">Aportacions</option>
                            </select> -->
                                                                                <div id="divnom"></div>
                                                                            </label>
                                                                            <label class="form-label">
                                                                            
                                                                                Saldo
                                                                                @if ($librodiario['SAL_DEBE'] > 0)
                                                                                    <input type='number' min="0"
                                                                                        name="saldo"
                                                                                        id="saldo"
                                                                                        
                                                                                       
                                                                                        onkeyup="validarnumerossaldo(this)"
                                                                                        value="{{ $librodiario['SAL_DEBE'] }}"
                                                                                        class="form-control text-white bg-dark"
                                                                                        required></input>
                                                                                        <div id="divsaldoe"></div>
                                                                                @else
                                                                                    <input type='number' min="0"
                                                                                        name="saldo"
                                                                                        id="saldo"
                                                                                        onkeyup="validarnumerossaldo(this)"
                                                                                        value="{{ $librodiario['SAL_HABER'] }}"
                                                                                        class="form-control text-white bg-dark"
                                                                                        
                                                                                        required></input>
                                                                                        <div id="divsaldoe"></div>
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
                                                                        ¿ Desea Eliminar la Transaccion ?
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
   
    <script src="{{ asset('assets/js/ab-librodiario.js')}}"></script>


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
   @routes
    <script>
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
                    contenido.innerHTML += `
                    
    <option name="INV" value="${valor.NOM_CUENTA}">${valor.NOM_CUENTA}</option>   
    `
                }

            }
        }).catch(error => console.error(error))
}
    </script>


@endsection










@endsection
