@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Permisos | Inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    {{ asset('assets/images/varon.png') }}
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
    {{ asset('assets/images/varon.png') }}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
    {{ Cache::get('user') }}
@endsection
<!-- contenido de la pagina  -->
@section('contenido')



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


    <!-- INICIO MODAL PARA NUEVA  -->
    <div class="modal-container">
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
            <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- CABECERA DEL DIALOGO NUEVA-->
                    <div class="modal-header">
                        <h4 class="modal-title">Ingresar Permisos</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO NUEVA -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('permisos.insertar') }}" method="post">
                                @csrf
                                <label class="form-label">
                                    Seleccionar Rol
                                    <select class="form-control text-white">
                                        @foreach ($rolsArr as $key)
                                            <option value="{{ $key['COD_ROL'] }}">{{ $key['ROL'] }}</option>
                                        @endforeach

                                    </select>

                                </label>
                                <label class="form-label">
                                    Pantalla
                                    <select class="form-control text-white">
                                        @foreach ($objetos as $key)
                                            <option value="COD_OBJETO">{{ $key['OBJETO'] }}</option>
                                        @endforeach

                                    </select>

                                </label>
                                <br>

                                <label class="form-label">
                                    Insertar
                                    <input type='checkbox' name='PERMISO_INSERCION' value="1"
                                        class="form-control text-white">
                                </label>
                                <label class="form-label">
                                    Consultar
                                    <input type='checkbox' name='PERMISO_CONSULTAR' value="1"
                                        class="form-control text-white">
                                </label>
                                <label class="form-label">
                                    Eliminar
                                    <input type='checkbox' name='PERMISO_ELIMINACION'
                                        value="1"class="form-control text-white">
                                </label>

                                <br>
                                <label class="form-label">
                                    Actualizar
                                    <input type='checkbox' name='PERMISO_ACTUALIZACION' value="1"
                                        class="form-control text-white">
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











    <!-- INICIO MODAL PARA BORRAR  -->
    <div class="modal-container">
        <div class="modal fade bd-example-modal-lg" id="dialogo3">
            <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- CABECERA DEL DIALOGO EDITAR -->
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar permisos</h4>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE MODAL PARA BORRAR  -->

    <div class="content-wrapper">
        <center>
            <h1>Permisos H Tours Honduras</h1>
        </center>
        <h5>________________________________________________________________________________________________________________
        </h5>
        <!-- <ul class="nav nav-pills nav-stacked">
                                  <li class="active"><a href="#"></a></li>
                                </ul> -->
        <p align="right" valign="baseline">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dialogo1">(+)
                Nuevo</button>
        </p>

        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"></a></li>
        </ul>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h4 class="card-title">Registros de permisos</h4>
                    </center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    <form action="{{ route('permisos.roles') }}" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search"
                        method="POST">
                        @csrf
                        <select onchange="this.form.submit()" class="form-control text-white" name="rol" id=""
                            required>
                            @if (Session::has('rol'))
                                <option value="" hidden selected>{{ Session::get('rol') }}</option>
                            @else
                                <option value="" hidden selected>Seleccionar Rol</option>
                            @endif
                            @foreach ($rolsArr as $key)
                                <option value="{{ $key['ROL'] }}">{{ $key['ROL'] }}</option>
                            @endforeach
                        </select>
                    </form>
                    </p>
                    <div class="table-responsive">
                        <table id="tabla" class="table table-bordered table-contextual">
                            <thead>
                                <tr class="text-dark bg-white">
                                    <th class="text-dark bg-white">#</th>
                                    <th class="text-dark bg-white">Pantalla</th>
                                    <th class="text-dark bg-white">Permiso Insercion</th>
                                    <th class="text-dark bg-white">Permiso Eliminacion</th>
                                    <th class="text-dark bg-white">Permiso Actualizacion</th>
                                    <th class="text-dark bg-white">Permiso Consultar</th>
                                    <th class="text-dark bg-white">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (Cache::has('permisosa'))
                                    <td colspan="7">No hay resultados</td>
                                @else
                                    @if (count($permisos) > 0)
                                        @foreach ($permisos as $key)
                                            <tr class="text-white bg-dark">
                                                <td>{{ $key['COD_PERMISO'] }}</td>
                                                <td>{{ $key['OBJETO'] }}</td>
                                                <td>


                                                    @if ($key['PER_INSERCION'] == '1')
                                                        SI
                                                    @else
                                                        NO
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($key['PER_ELIMINACION'] == '1')
                                                        SI
                                                    @else
                                                        NO
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($key['PER_ACTUALIZACION'] == '1')
                                                        SI
                                                    @else
                                                        NO
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($key['PER_CONSULTAR'] == '1')
                                                        SI
                                                    @else
                                                        NO
                                                    @endif
                                                </td>
                                                <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#modal-editar-{{ $key['COD_PERMISO'] }}">Editar</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modal-eliminar-{{ $key['COD_PERMISO'] }}">Eliminar</button>
                                                </td></button> </td>

                                            </tr>


                                            <!-- INICIO MODAL PARA EDITAR  -->
                                            <div class="modal-container">
                                                <div class="modal fade bd-example-modal-lg"
                                                    id="modal-editar-{{ $key['COD_PERMISO'] }}">
                                                    <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <!-- CABECERA DEL DIALOGO EDITAR -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Editar Permisos</h4>
                                                                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                            </div>
                                                            <!-- CUERPO DEL DIALOGO EDITAR -->
                                                            <div class="modal-body">
                                                                <center>
                                                                    <label class="form-label">
                                                                        Pantalla
                                                                        <select class="form-control text-white">
                                                                            <option hidden selected>{{ $key['OBJETO'] }}
                                                                            </option>
                                                                            @foreach ($objetos as $new)
                                                                                <option>{{ $new['OBJETO'] }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </label>

                                                                    @if ($key['PER_INSERCION'] == '1')
                                                                        <label class="form-label">
                                                                            Permiso Insertar
                                                                            <input type='checkbox'
                                                                                name='PERMISO INSERCION'
                                                                                class="form-control text-white" checked>
                                                                        </label>
                                                                    @else
                                                                        <label class="form-label">
                                                                            Permiso Insertar
                                                                            <input type='checkbox'
                                                                                name='PERMISO INSERCION'
                                                                                class="form-control text-white">
                                                                        </label>
                                                                    @endif

                                                                    @if ($key['PER_ELIMINACION'] == '1')
                                                                        <label class="form-label">
                                                                            Permiso Eliminacion
                                                                            <input type='checkbox'
                                                                                name='PERMISO ELIMINACION'
                                                                                class="form-control text-white" checked>
                                                                        </label>
                                                                    @else
                                                                        <label class="form-label">
                                                                            Permiso Eliminacion
                                                                            <input type='checkbox'
                                                                                name='PERMISO ELIMINACION'
                                                                                class="form-control text-white">
                                                                        </label>
                                                                    @endif

                                                                    @if ($key['PER_ACTUALIZACION'] == '1')
                                                                        <label class="form-label">
                                                                            Permiso Actualizacion
                                                                            <input type='checkbox'
                                                                                name='PERMISO ACTUALIZACION'
                                                                                class="form-control text-white" checked>
                                                                        </label>
                                                                    @else
                                                                        <label class="form-label">
                                                                            Permiso Actualizacion
                                                                            <input type='checkbox'
                                                                                name='PERMISO ACTUALIZACION'
                                                                                class="form-control text-white">
                                                                        </label>
                                                                    @endif

                                                                    @if ($key['PER_CONSULTAR'] == '1')
                                                                        <label class="form-label">
                                                                            Permiso Consultar
                                                                            <input type='checkbox'
                                                                                name='PERMISO CONSULTAR'
                                                                                class="form-control text-white" checked>
                                                                        </label>
                                                                    @else
                                                                        <label class="form-label">
                                                                            Permiso Consultar
                                                                            <input type='checkbox'
                                                                                name='PERMISO CONSULTAR'
                                                                                class="form-control text-white">
                                                                        </label>
                                                                    @endif
                                                                    <br>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Registrar </button>
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
                                        @endforeach
                                    @else
                                        <td colspan="7">No hay resultados</td>
                                    @endif
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
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>
@endsection

@endsection
