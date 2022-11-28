@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Cuentas | inicio
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
            text: 'La cuenta se elimino Correctamente'
            // footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
@endif
@if (Session::has('nopuedes'))
    <script>
        Swal.fire({
            icon: 'error',
            text: 'No puedes eliminar ya se esta usando en libro diairo'
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
@if (Session::has('actualizado'))
<script>
    Swal.fire({
        icon: 'success',
        text: 'La cuenta se actualizo correctamente'
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
                                        <th class="text-dark bg-white"> <b>Clasificacion</b> </th>
                                        <th class="text-dark bg-white"> <b>Codigo</b> </th>
                                        <th class="text-dark bg-white"> <b>Grupo</b> </th>
                                        <th class="text-dark bg-white"> </b>Nombre de Cuentas</b> </th>
                                        <th class="text-dark bg-white"> </b>Acciones</b> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($personArr) <= 0)
                                        <td>No hay resultados</td>
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
                                                                            Clasificacion
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
                                                                            Numero de Cuenta
                                                                            <input type='text' name='numero'
                                                                                value="{{ $cuentas['NUM_CUENTA'] }}"
                                                                                class="form-control text-white"
                                                                                required></input>
                                                                        </label>
                                                                        <label class="form-label">
                                                                            Nombre de la Cuenta
                                                                            <input type='text' name='cuenta'
                                                                                value="{{ $cuentas['NOM_CUENTA'] }}"
                                                                                min="0"
                                                                                class="form-control text-white"
                                                                                required></input>
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
                                                                    <form action="{{ route('cuentas.eliminar') }}" method="post">
                                                                        @csrf @method('DELETE')
                                                                        <label class="form-label">
                                                                            <input type="hidden" name="f" value="{{  $cuentas['COD_CUENTA']  }}">
                                                                            <i class="mdi mdi-delete-forever"
                                                                            style="font-size: 100px;"></i> <br>
                                                                            ¿ Desea Eliminar el Registro ?

                                                                        </label>
                                                                        <br>
                                                                        <button type="submit" class="btn btn btn-primary">SI</button>
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
                                                        <form action="{{ route('insertar.cuentas') }}" method="post">
                                                            @csrf
                                                            <label class="form-label">
                                                                Clasificacion

                                                                <select class="form-control text-white" name="naturaleza"
                                                                    id="" required>
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
                                                                id="" required>
                                                                <option hidden selected>SELECCIONAR</option>
                                                                @foreach ($gruposArr as $key)
                                                                    <option value="{{ $key['COD_GRUPO'] }}">
                                                                        {{ $key['NOM_GRUPO'] }}</option>
                                                                @endforeach

                                                            </select>
                                                        </label>
                                                    </th>


                                                    &nbsp;
                                                    <th>
                                                        <label class="form-label">
                                                            Numero de Cuenta
                                                            <input type='number' name='numerocuenta' min="0"
                                                                class="form-control text-white" maxlength="3"
                                                                required></input>
                                                        </label>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <label class="form-label">
                                            Nombre de la Cuenta
                                            <input type='text' name='nombrecuenta' class="form-control text-white"
                                                required></input>
                                        </label>
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
@endsection

@endsection
