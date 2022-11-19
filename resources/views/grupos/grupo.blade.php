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
    <div class="content-wrapper">
        <div class="page-header">
            <center>
                <h1> Mantenimiento Grupos </h1>
            </center>
        </div>
        <p align="right" valign="baseline">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button> <a
                type="button" class="btn btn-success" href="javascript:window.print();">Generar PDF</a>
        </p>
        <div class="row">

            <div class="col-lg-12 stretch-card">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gestion de Grupos</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual">
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
                                                                <form action="{{ route('grupo.actualizar') }}" method="post">
                                                                    @csrf @method('PUT')
                                                                    <input type="hidden" name="cod" value="{{ $grupo['COD_GRUPO'] }}">
                                                                    <label class="form-label">
                                                                        Clasificacion
                                                                        <select class="form-control text-white"
                                                                            name="clasificacion" id="" required>
                                                                            <option value="{{ $grupo['NATURALEZA'] }}" hidden selected>
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
                                                                            value="{{ $grupo['NUM_GRUPO'] }}"
                                                                            class="form-control text-white" maxlength="3"
                                                                            required></input>
                                                                    </label>
                                                                    <label class="form-label">
                                                                        Nombre del grupo
                                                                        <input type='text' name='name'
                                                                            value="{{ $grupo['NOM_GRUPO'] }}"
                                                                            min="0" class="form-control text-white"
                                                                            required></input>
                                                                    </label>

                                                                    <button type="submit" class="btn btn-primary">Actualizar
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
                                                            <h4 class="modal-title">Eliminar Cuenta</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="" method="post">
                                                                    <label class="form-label">
                                                                        ¿ Desea Eliminar el Registro ?

                                                                    </label>
                                                                    <br>
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
                                </tbody>
                            </table>
                        </div>
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
                                                        <form action="{{ route('grupo.insertar') }}" method="post">
                                                            @csrf
                                                            <label class="form-label">
                                                                <label class="form-label">
                                                                    Clasificacion
                                                                    <select class="form-control text-white" name="clasificacion"
                                                                        id="" required>
                                                                        <option hidden selected>Seleccionar</option>
                                                                        @foreach ($clasificacionArr as $key)
                                                                            <option
                                                                                value="{{ $key['NATURALEZA'] }}">
                                                                                {{ $key['NATURALEZA'] }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    </select>
                                                                </label>
                                                  
                                                        <label class="form-label">
                                                            Numero de Grupo
                                                            <input type='number' name='grupo' min="0"
                                                                class="form-control text-white" maxlength="3" required>
                                                        </label>
                                                
                                                </tr>
                                            </thead>
                                        </table>
                                        <label class="form-label">
                                            Nombre de grupo
                                            <input type='text' name='name' class="form-control text-white"
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
@endsection
