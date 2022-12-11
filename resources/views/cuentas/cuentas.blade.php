@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Cuentas | inicio
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
<!-- contenido de la pagina  -->
@section('contenido')
    @if (Session::has('insertado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'La cuenta se registro correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('eliminado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'La cuenta se eliminó Correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('nopuedes'))
        <script>
            Swal.fire({
                icon: 'error',
                text: 'No puedes eliminar esta cuenta, se encuentra en uso'
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
    @if (Session::has('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'La cuenta se actualizó  correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    <div class="content-wrapper">
        <div class="page-header">
            <center>
                <h1> Gestión Cuentas </h1>
            </center>
        </div>
        <p align="right" valign="baseline">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
            <a type="button" href="{{ route('cuentas.pdf') }}" class="btn btn-danger btn-sm"><i
                    class="mdi mdi-file-pdf"></i>Generar PDF</a>
            <button id="btnExportar" class="btn btn-success btn-sm">
                <i class="mdi mdi-file-excel"></i> Generar Excel
            </button>
        </p>
        <div class="row">

            <div class="col-lg-12 stretch-card">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">CUENTAS</h4>
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input class="form-control me-2 light-table-filter text-white" data-table="table_id"
                                type="text" placeholder="Buscar una cuenta">
                        </form>
                        <div class="table-responsive">
                            <table id="tabla" class="table table-bordered table-contextual table_id">
                                <thead>
                                    <tr>
                                        <th class="text-dark bg-white"> # </th>
                                        <th class="text-dark bg-white"> <b>Clasificación</b> </th>
                                        <th class="text-dark bg-white"> <b>Código</b> </th>
                                        <th class="text-dark bg-white"> <b>Grupo</b> </th>
                                        <th class="text-dark bg-white"> </b>Nombre de cuentas</b> </th>
                                        <th class="text-dark bg-white"> </b>Acciones</b> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($personArr) <= 0)
                                        <td colspan='6'>No hay resultados</td>
                                    @else
                                        @foreach ($personArr as $cuentas)
                                            <tr class="text-white bg-dark">
                                                <td> {{ $cuentas['COD_CUENTA'] }}</td>
                                                <td> {{ $cuentas['COD_CLASIFICACION'] }}</td>
                                                <td> {{ $cuentas['NUM_CUENTA'] }} </td>
                                                <td> {{ $cuentas['cod_grupo'] }} </td>
                                                <td> {{ $cuentas['NOM_CUENTA'] }}</td>
                                                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#modal-editar-{{ $cuentas['COD_CUENTA'] }}"><i
                                                            class="mdi mdi-table-edit"></i>Editar</button> <button
                                                        type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#modal-eliminar-{{ $cuentas['COD_CUENTA'] }}"><i
                                                            class="mdi mdi-delete-forever"></i>Eliminar</button> </td>
                                            </tr>

                                            <!-- INICIO MODAL PARA EDITAR  -->
                                            <div class="modal-container">
                                                <div class="modal fade bd-example-modal-lg"
                                                    id="modal-editar-{{ $cuentas['COD_CUENTA'] }}">
                                                    <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <!-- CABECERA DEL DIALOGO EDITAR -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Editar Cuenta</h4>
                                                                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                            </div>
                                                            <!-- CUERPO DEL DIALOGO EDITAR -->
                                                            <div class="modal-body">
                                                                <center>
                                                                    <form action="{{ route('cuentas.actualizar') }}"
                                                                        method="post">
                                                                        @csrf @method('PUT')
                                                                        <input type="hidden" name="f"
                                                                            value="{{ $cuentas['COD_CUENTA'] }}">
                                                                        <label class="form-label">
                                                                            Clasificación
                                                                            <select class="form-control text-white"
                                                                                name="naturaleza" id="" required>
                                                                                <option value="{{ $cuentas['COD_NATU'] }}"
                                                                                    hidden selected>
                                                                                    {{ $cuentas['COD_CLASIFICACION'] }}
                                                                                </option>
                                                                                @foreach ($clasificacionArr as $key)
                                                                                    <option
                                                                                        value="{{ $key['COD_CLASIFICACION'] }}">
                                                                                        {{ $key['NATURALEZA'] }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </label>

                                                                        <label class="form-label">
                                                                            Número de Cuenta
                                                                            <input type='text' name='numero' id="num_cuenta-edit-{{ $cuentas['COD_CUENTA']  }}" 
                                                                            onkeyup="validarnumerosEDIT({{ $cuentas['COD_CUENTA']  }})"
                                                                                value="{{ $cuentas['NUM_CUENTA'] }}"
                                                                                class="form-control text-white"
                                                                                required>
                                                                                <div id="divnumedit-{{ $cuentas['COD_CUENTA'] }}"></div>
                                                                            </label>
                                                                            <label class="form-label">
                                                                                Nombre de la Cuenta
                                                                                <input type='text' name='cuenta'
                                                                                value="{{ $cuentas['NOM_CUENTA'] }}"
                                                                                id="nom_cuenta-edit-{{ $cuentas['COD_CUENTA']  }}" 
                                                                                onkeyup="validarletrasEDIT({{ $cuentas['COD_CUENTA']  }})"
                                                                                min="0"
                                                                                class="form-control text-white"
                                                                                required>
                                                                                <div id="divnomedit-{{ $cuentas['COD_CUENTA'] }}"></div>
                                                                        </label>


                                                                        <button type="submit"
                                                                            class="btn btn-primary">Actualizar </button>
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
                                                    id="modal-eliminar-{{ $cuentas['COD_CUENTA'] }}">
                                                    <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <!-- CABECERA DEL DIALOGO EDITAR -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Eliminar Cuenta</h4>
                                                                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                            </div>
                                                            <!-- CUERPO DEL DIALOGO BORRAR -->
                                                            <div class="modal-body">
                                                                <center>
                                                                    <form action="{{ route('cuentas.eliminar') }}"
                                                                        method="post">
                                                                        @csrf @method('DELETE')
                                                                        <label class="form-label">
                                                                            <input type="hidden" name="f"
                                                                                value="{{ $cuentas['COD_CUENTA'] }}">
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
                                    <h4 class="modal-title">Ingresar Nueva Cuenta</h4>
                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                </div>
                                <!-- CUERPO DEL DIALOGO NUEVA -->
                                <div class="modal-body">
                                    <center>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <form action="{{ route('insertar.cuentas') }}" method="post"
                                                            id="formulario">
                                                            @csrf
                                                            <label class="form-label">
                                                                Clasificación

                                                                <select class="form-control text-white" name="naturaleza"
                                                                    id="clasificacion" onchange="datos()" required>
                                                                    <option hidden selected>SELECCIONAR</option>
                                                                    @foreach ($clasificacionArr as $key)
                                                                        <option value="{{ $key['NATURALEZA'] }}">
                                                                            {{ $key['NATURALEZA'] }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </label>
                                                    </th>
                                                    <th>
                                                        <label class="form-label">
                                                            Grupo

                                                            <select class="form-control text-white" name="grupo"
                                                                id="grupos" required>
                                                                <option hidden selected>SELECCIONAR</option>
                                                                @foreach ($gruposArr as $key)
                                                                    <option value="{{ $key['COD_GRUPO'] }}">
                                                                        {{ $key['NOM_GRUPO'] }}</option>
                                                                @endforeach

                                                            </select>
                                                        </label>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>

                                        <label class="form-label">

                                            Número de Cuenta
                                            <input title="Ingresar solo numeros" type='number' name='numerocuenta'
                                                id="num_cuenta" onkeyup="validarnumeros(this)" oninvalid=""
                                                min="0" class="form-control text-white " maxlength="3" required>
                                            <span for=""id="divnum"></span>

                                        </label>
                                        <br>
                                        <label class="form-label">
                                            Nombre de la Cuenta
                                            <input type='text' name='nombrecuenta' id="nom_cuenta"
                                                class="form-control text-white" onkeyup="validarletras(this)" required>
                                            <label for=""id="divcuenta"></label>
                                        </label>
                                        <br>
                                        <button type="submit" onclick="validarINScuentas()" class="btn btn-primary">Registrar </button>
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
    @routes
    <script>
        function datos() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("clasificacion").value;
            var contenido = document.querySelector('#grupos')

            console.log(select);
            var url = route('grupo.search')
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
                                `<option name="INV" value="${valor.COD_GRUPO}">${valor.NOM_GRUPO}</option>`
                        }

                    }
                }).catch(error => console.error(error))
        }
        function validarINScuentas() {
            let clasificacion = document.getElementById('clasificacion').value 
            let grupos = document.getElementById('grupos').value 
            let num_cuenta = document.getElementById('num_cuenta').value 
            let nom_cuenta = document.getElementById('nom_cuenta').value 
            if (clasificacion == "SELECCIONAR") {
                Swal.fire({
                icon: 'error',
                text: 'No selecciono una clasificacion'
                })
                event.preventDefault()
            }else{
                if (grupos == "SELECCIONAR") {
                Swal.fire({
                icon: 'error',
                text: 'No ingreso un grupo'
                })
                event.preventDefault()
            }else{
                if (num_cuenta == "") {
                Swal.fire({
                icon: 'error',
                text: 'No ingreso un  numero de cuenta'
                })
                event.preventDefault()
            }else{
                if (nom_cuenta == "") {
                    Swal.fire({
                icon: 'error',
                text: 'No ingreso un  nombre de cuenta'
                })
                event.preventDefault()
                }
            }
            }
            }
        }
    </script>
@endsection

@endsection
