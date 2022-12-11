@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Subcuentas | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    @if (Cache::get('genero') == 'M')
        {{ asset('assets/images/varon.png') }}
    @else
        {{ asset('assets/images/dama.png') }}
    @endif
@endsection
{{-- estilos css  --}}
@section('encabezado')
    <link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
@endsection
{{-- fin estilos css  --}}


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
        text: 'La subcuenta se registro correctamente'
        // footer: '<a href="">Why do I have this issue?</a>'
    })
</script>
@endif
@if (Session::has('eliminado'))
<script>
    Swal.fire({
        icon: 'success',
        text: 'La subcuenta se eliminó Correctamente'
        // footer: '<a href="">Why do I have this issue?</a>'
    })
</script>
@endif
@if (Session::has('nopuedes'))
<script>
    Swal.fire({
        icon: 'error',
        text: 'No puedes eliminar esta subcuenta, se encuentra en uso'
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
        text: 'La subcuenta se actualizó  correctamente'
        // footer: '<a href="">Why do I have this issue?</a>'
    })
</script>
@endif
<div class="content-wrapper">
        <div class="page-header">
            <center>
                <h1> Gestión Subcuentas </h1>
            </center>

        </div>
        <p align="right" valign="baseline">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
            <a type="button" href="{{ route('pdf.subcuentas') }}" class="btn btn-danger btn-sm"><i
                    class="mdi mdi-file-pdf"></i>Generar PDF</a>
            <button id="btnExportar" class="btn btn-success btn-sm">
                <i class="mdi mdi-file-excel"></i> Generar Excel
            </button>
        </p>
        <div class="row">

            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">SUBCUENTAS</h4>
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input class="form-control me-2 light-table-filter text-white" data-table="table_id"
                                type="text" placeholder="Buscar una subcuenta">
                        </form>
                        <div class="table-responsive">
                            <table id="tabla" class="table table-bordered table-contextual table_id">
                                <thead>
                                    <tr>
                                        <th class="text-dark bg-white"> # </th>
                                        <th class="text-dark bg-white"> <b>Clasificación</b> </th>
                                        <th class="text-dark bg-white"> <b>Cuenta</b> </th>
                                        <th class="text-dark bg-white"> </b>Código</b> </th>
                                        <th class="text-dark bg-white"> </b>Nombre de subcuentas</b> </th>
                                        <th class="text-dark bg-white"> </b>Acciones</b> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($personArr) <= 0)
                                        <td colspan="6">No hay resultados</td>
                                    @else
                                        @foreach ($personArr as $subcuentas)
                                            <tr class="text-white bg-dark">
                                                <td> {{ $subcuentas['COD_SUBCUENTA'] }}</td>
                                                <td> {{ $subcuentas['NATURALEZA'] }}</td>
                                                <td>{{ $subcuentas['COD_CUENTA'] }} </td>
                                                <td>{{ $subcuentas['NUM_SUBCUENTA'] }} </td>
                                                <td> {{ $subcuentas['NOM_SUBCUENTA'] }}</td>
                                                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#modal-editar-{{ $subcuentas['COD_SUBCUENTA'] }}"><i
                                                            class="mdi mdi-table-edit"></i>Editar</button> <button
                                                        type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#modal-eliminar-{{ $subcuentas['COD_SUBCUENTA'] }}"><i
                                                            class="mdi mdi-delete-forever"></i>Eliminar</button> </td>

                                            </tr>


                                            <!-- INICIO MODAL PARA EDITAR  -->
                                            <div class="modal-container">
                                                <div class="modal fade bd-example-modal-lg"
                                                    id="modal-editar-{{ $subcuentas['COD_SUBCUENTA'] }}">
                                                    <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <!-- CABECERA DEL DIALOGO EDITAR -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Editar SubCuentas</h4>
                                                                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                            </div>
                                                            <!-- CUERPO DEL DIALOGO EDITAR -->
                                                            <div class="modal-body">
                                                                <center>
                                                                    <form action="{{ route('subcuentas.actualizar') }}"
                                                                        method="post">
                                                                        @csrf @method('PUT')
                                                                        <input type="hidden" name="f"
                                                                            value="{{ $subcuentas['COD_SUBCUENTA'] }}">
                                                                        <label class="form-label">

                                                                            Clasificación

                                                                            <select class="form-control text-white"
                                                                                name="naturaleza" id="clasificacionedit"
                                                                                onchange="datosedit();" required>
                                                                                <option
                                                                                    value="{{ $subcuentas['COD_CLASIFICACION'] }}"
                                                                                    hidden selected>
                                                                                    {{ $subcuentas['NATURALEZA'] }}
                                                                                </option>
                                                                                @foreach ($clasificacionArr as $key)
                                                                                    <option
                                                                                        value="{{ $key['COD_CLASIFICACION'] }}">
                                                                                        {{ $key['NATURALEZA'] }}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </label>

                                                                        <label class="form-label">
                                                                            Cuentas

                                                                            <Select class="form-control text-white"
                                                                                name="nombrecuenta" id="cuentasedit"
                                                                                required>
                                                                                <option
                                                                                    value="{{ $subcuentas['COD_CUENTA'] }}"
                                                                                    hidden selected>
                                                                                    {{ $subcuentas['COD_CUENTA'] }}
                                                                                </option>
                                                                                @foreach ($nombrecuentaArr as $key)
                                                                                    <option
                                                                                        value="{{ $key['NOM_CUENTA'] }}">
                                                                                        {{ $key['NOM_CUENTA'] }}</option>
                                                                                @endforeach


                                                                            </Select>
                                                                        </label>

                                                                        <label class="form-label">
                                                                            Número de la subcuenta
                                                                            <input type='text' min="0"
                                                                                id="num_subcuenta-edit-{{ $subcuentas['COD_SUBCUENTA'] }}"
                                                                                name='numerosubcuenta'
                                                                                onkeyup="validarnumerosEDIT({{ $subcuentas['COD_SUBCUENTA'] }})"
                                                                                value="{{ $subcuentas['NUM_SUBCUENTA'] }}"
                                                                                class="form-control text-white" required>
                                                                            <div
                                                                                id="divnum-edit-{{ $subcuentas['COD_SUBCUENTA'] }}">
                                                                            </div>
                                                                        </label>
                                                                        <label class="form-label">
                                                                            Nombre de la subcuenta
                                                                            <input type='text' name='nombresubcuenta'
                                                                                id="nom_subcuenta-edit-{{ $subcuentas['COD_SUBCUENTA'] }}"
                                                                                onkeyup="validarletrasEDIT({{ $subcuentas['COD_SUBCUENTA'] }})"
                                                                                value="{{ $subcuentas['NOM_SUBCUENTA'] }}"
                                                                                class="form-control text-white" required>
                                                                            <div
                                                                                id="divnom-edit-{{ $subcuentas['COD_SUBCUENTA'] }}">
                                                                            </div>
                                                                        </label>



                                                                        <button type="submit"
                                                                            class="btn btn-primary">EDITAR </button>
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
                                                    id="modal-eliminar-{{ $subcuentas['COD_SUBCUENTA'] }}">
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
                                                                    <form action="{{ route('subcuentas.eliminar') }}" method="post">
                                                                        @csrf @method('DELETE')
                                                                        <label class="form-label">
                                                                            <input type="hidden" name="f" value="{{ $subcuentas['COD_SUBCUENTA']  }}">
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
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <!-- CABECERA DEL DIALOGO NUEVA-->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ingresar Nueva Sub Cuenta</h4>
                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                </div>
                                <!-- CUERPO DEL DIALOGO NUEVA -->
                                <div class="modal-body">
                                    <center>
                                        <form action="{{ route('insertar.subcuentas') }}" method="post">
                                            @csrf
                                            <label class="form-label">
                                                Clasificación

                                                <select class="form-control text-white" name="naturaleza"
                                                    id="clasificacion" onchange="datos();" required>
                                                    <option hidden selected>SELECCIONAR</option>
                                                    @foreach ($clasificacionArr as $key)
                                                        <option value="{{ $key['NATURALEZA'] }}">{{ $key['NATURALEZA'] }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </label>
                                            <br>
                                            <label class="form-label">
                                                Cuenta

                                                <Select class="form-control text-white" name="nombrecuenta"
                                                    id="cuentas" required>
                                                    <option hidden selected>SELECCIONAR</option>

                                                    {{-- @foreach ($nombrecuentaArr as $key)
                                                        <option value="{{ $key['NOM_CUENTA'] }}">{{ $key['NOM_CUENTA'] }}
                                                        </option>
                                                    @endforeach --}}

                                                </Select>
                                            </label>
                                            <div id="contenido"></div>

                                            <label class="form-label">
                                                Número de la subcuenta
                                                <input type='number' min="0" name='numerosubcuenta'
                                                    class="form-control text-white" id="num_subcuenta"
                                                    onkeyup="validarnumeros(this)" required>
                                                <div id="divnum"></div>
                                            </label>
                                            <label class="form-label">
                                                Nombre de la subcuenta
                                                <input type='text' name='nombresubcuenta' id="nom_subcuenta"
                                                    class="form-control text-white" onkeyup="validarletras(this)"
                                                    required>
                                                <div id="divsubcuenta"></div>
                                            </label>

                                            <button type="submit" onclick="validarINsubcuentas()" class="btn btn-primary">NUEVO</button>
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
@section('js')
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>
    <script src="{{ asset('assets/js/ab-subcuentas.js') }}"></script>
    @routes
    <script>
        function datos() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("clasificacion").value;
            var contenido = document.querySelector('#cuentas')

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

        function datosedit() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
            const select = document.getElementById("clasificacionedit").value;
            var contenido = document.querySelector('#cuentasedit')

            // console.log(select);
            var url = route('buscaedit.subcuentas')
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
                    console.log(respuesta);
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

         function validarINsubcuentas() {
            let clasificacion = document.getElementById('clasificacion').value 
            let cuentas = document.getElementById('cuentas').value 
            let num_subcuenta = document.getElementById('num_subcuenta').value 
            let nom_subcuenta = document.getElementById('nom_subcuenta').value 
            if (clasificacion == "SELECCIONAR") {
                Swal.fire({
                icon: 'error',
                text: 'No selecciono una clasificacion'
                })
                event.preventDefault()
            }else{
                if (cuentas == "SELECCIONAR") {
                Swal.fire({
                icon: 'error',
                text: 'No ingreso un grupo'
                })
                event.preventDefault()
            }else{
                if (num_subcuenta == "") {
                Swal.fire({
                icon: 'error',
                text: 'No ingreso un  numero de subcuenta'
                })
                event.preventDefault()
            }else{
                if (nom_subcuenta == "") {
                    Swal.fire({
                icon: 'error',
                text: 'No ingreso un  nombre de subcuenta'
                })
                event.preventDefault()
                }
            }
            }
            }
        }
    </script>
@endsection
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
@endsection
