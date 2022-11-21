@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Subcuentas | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
@if (Cache::get('genero') == 'M')
{{ asset('assets/images/varon.png')}}
@else
{{ asset('assets/images/dama.png')}}
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
{{ asset('assets/images/varon.png')}}
@else
{{ asset('assets/images/dama.png')}}
@endif
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
{{ Cache::get('user') }}
@endsection
<!-- contenido de la pagina  -->
@section('contenido')
@if(Session::has('insertado'))
<script>
    Swal.fire({
    icon: 'success',
    text: 'La cuenta se registro correctamente'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
  @endif
    <div class="content-wrapper">
        <div class="page-header">
            <center>
                <h1> Gestión Subcuentas </h1>
            </center>
            <!-- <h1 class="page-title"> Nombre de la Tabla </h1> -->
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav> -->
        </div>
        <p align="right" valign="baseline">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button> <a type="button" class="btn btn-success" href="javascript:window.print();">Generar PDF</a>
        </p>
        <div class="row">

            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">CREAR SUBCUENTA</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual">
                                <thead>
                                    <tr>
                                        <th class="text-dark bg-white"> # </th>
                                        <th class="text-dark bg-white"> <b>Clasificacion</b> </th>
                                        <th class="text-dark bg-white"> <b>Cuenta</b> </th>
                                        <th class="text-dark bg-white"> </b>Codigo</b> </th>
                                        <th class="text-dark bg-white"> </b>Nombre de Sub Cuentas</b> </th>
                                        <th class="text-dark bg-white"> </b>Acciones</b> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($personArr as $subcuentas)

                                    <tr class="text-white bg-dark">
                                        <td> {{$subcuentas ['COD_SUBCUENTA'] }}</td>
                                        <td> {{$subcuentas ['NATURALEZA'] }}</td>
                                        <td>{{$subcuentas ['COD_CUENTA'] }} </td>
                                        <td>{{$subcuentas ['NUM_SUBCUENTA'] }} </td>
                                        <td> {{$subcuentas ['NOM_SUBCUENTA'] }}</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-editar-{{ $subcuentas['COD_SUBCUENTA'] }}">Editar</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-eliminar-{{ $subcuentas['COD_SUBCUENTA'] }}">Eliminar</button> </td>

                                    </tr>


                                     <!-- INICIO MODAL PARA EDITAR  -->
                <div class="modal-container">
                    <div class="modal fade bd-example-modal-lg" id="modal-editar-{{ $subcuentas['COD_SUBCUENTA'] }}">
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
                                        <form action="" method="post">
                                            <label class="form-label">
                                                Clasificacion

                                                <select class="form-control text-white" name="" id="" required>

                                                    <option value="">Activo</option>
                                                    <option value="">Pasivo</option>
                                                    <option value="">Patrimonio </option>
                                                    <option value="">Resultado </option>

                                                </select>
                                            </label>


                                            <label class="form-label">
                                                Nombre de Cuenta
                                                <Select class="form-control text-white">
                                                    <option value="">{{$subcuentas ['COD_CUENTA'] }}</option>

                                                </Select>


                                            </label>

                                            <label class="form-label">
                                                Numero de la sub Cuenta
                                                <input type='text' min="0" name='COS PRODUCTO' value= "{{$subcuentas ['NUM_SUBCUENTA'] }}" class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Nombre de la Sub Cuenta
                                                <input type='text' name='COS PRODUCTO' value="{{$subcuentas ['NOM_SUBCUENTA'] }}" class="form-control text-white" required></input>
                                            </label>


                                            <a href="" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">EDITAR </button>
                                        </form>
                                </div>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN DE MODAL PARA EDITAR  -->



                <!-- INICIO MODAL PARA BORRAR  -->
                <div class="modal-container">
                    <div class="modal fade bd-example-modal-lg" id="modal-eliminar-{{ $subcuentas['COD_SUBCUENTA'] }}">
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
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
                                                Clasificacion

                                                <select class="form-control text-white" name="naturaleza" id="clasificacion"  onchange="datos();" required>
                                                <option hidden selected>SELECCIONAR</option>
                                                @foreach($clasificacionArr as $key)
                                                <option value="{{$key['NATURALEZA'] }}">{{$key['NATURALEZA'] }}</option>
                                                @endforeach

                                                </select>
                                            </label>


                                            <label class="form-label">
                                                Nombre de Cuenta

                                                <Select class="form-control text-white" name="nombrecuenta" id="cuentas" required>
                                                    <option hidden selected>SELECCIONAR</option>
                                                  
                                                    @foreach($nombrecuentaArr as $key)
                                                    <option value="{{$key['NOM_CUENTA'] }}">{{$key['NOM_CUENTA'] }}</option>
                                                    @endforeach

                                                </Select>
                                            </label>

                                            <label class="form-label">
                                                Numero de la sub Cuenta
                                                <input type='number' min="0" name='numerosubcuenta' class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Nombre de la Sub Cuenta
                                                <input type='text' name='nombresubcuenta' class="form-control text-white" required></input>
                                            </label>
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








            </div>
        </div>
    </div>
    @section('js')

    @routes
    <script>
        function datos() {
            window.CSRF_TOKEN = '{{ csrf_token() }}';
            // const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;
            //Vamos a rellenar el select automáticamente.
    const select = document.getElementById("clasificacion").value;
    var contenido = document.querySelector('#contenido')

    // console.log(select);
    var url = route('busca.subcuentas')
    let data = {
        NATURALEZA: select
    }
    fetch(url,{
        method:'POST',
        body:JSON.stringify(data),
        headers:{
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.CSRF_TOKEN
        }
    })
    .then(resp=>{
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
contenido.innerHTML = ''
for(let valor of res){
            contenido.innerHTML += `
            <option name="INV" value="${valor.NOM_CUENTA}">${valor.NOM_CUENTA}</option>   
            `  
}

    }
}  
    ).catch(error =>console.error(error))
        }


    </script>
        
    @endsection
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @endsection
