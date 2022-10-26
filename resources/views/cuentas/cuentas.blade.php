@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Cuentas | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
{{ asset('assets/images/dama.png') }}
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
ALE
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
Administrador
@endsection

<!-- foto del menu de la derecha -->
@section('foto-user2')
{{ asset('assets/images/dama.png') }}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
ALE
@endsection
<!-- contenido de la pagina  -->
@section('contenido')
<div class="content-wrapper">
    <div class="page-header">
        <center>
            <h1> Crear Cuentas </h1>
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
                    <h4 class="card-title">CREAR CUENTA</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-contextual">
                            <thead>
                                <tr>
                                    <th class="text-dark bg-white"> # </th>
                                    <th class="text-dark bg-white"> <b>Clasificacion</b> </th>
                                    <th class="text-dark bg-white"> <b>Codigo</b> </th>
                                    <th class="text-dark bg-white"> </b>Nombre de Cuentas</b> </th>
                                    <th class="text-dark bg-white"> </b>Acciones</b> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-white bg-dark">
                                    <td> 1</td>
                                    <td> Activo</td>
                                    <td> 1.1</td>
                                    <td> Caja</td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                                </tr>
                                <tr class="text-white bg-dark">
                                    <td> 2 </td>
                                    <td> Pasivo </td>
                                    <td> 2.1 </td>
                                    <td> Proveedores</td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                                </tr>
                                <tr class="text-white bg-dark">
                                    <td> 3 </td>
                                    <td> Patrimonio </td>
                                    <td> 3.1 </td>
                                    <td> Capital Social </td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                                </tr>

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
                                                    <form action="" method="post">
                                                        <label class="form-label">
                                                            Clasificacion
                                                            
                                                            <select class="form-control text-white" name="" id="" required>
                                                                <option value=""></option>
                                                                <option value=""> Activo</option>
                                                                <option value=""> Pasivo</option>
                                                                <option value="">Patrimonio </option>
                                                                <option value="">Resultado </option>
                                                                
                                                            </select>
                                                        </label>
                                                    </th>
                                                    &nbsp;
                                                    <th>                                                    
                                                        <label class="form-label">
                                                            Numero de Cuenta
                                                            <input type='number' name='UNIDADES' min="0" class="form-control text-white" maxlength="3" required></input>
                                                        </label>
                                                    </th>
                                        </tr>
                                        </thead>
                                        </table>
                                        <label class="form-label">
                                            Nombre de la Cuenta
                                            <input type='text' name='COS PRODUCTO' class="form-control text-white" required></input>
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

            <!-- INICIO MODAL PARA EDITAR  -->
            <div class="modal-container">
                <div class="modal fade bd-example-modal-lg" id="dialogo2">
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
                                    
                                    <form action="" method="post">
                                        <label class="form-label">
                                            Clasificacion

                                            <select class="form-control text-white" name="" id="" required>
                                                <option value=""> Activo</option>
                                                <option value=""> Pasivo</option>
                                                <option value="">Patrimonio </option>
                                                <option value="">Resultado </option>

                                            </select>
                                        </label>

                                        <label class="form-label">
                                            Numero de Cuenta
                                            <input type='number' name='UNIDADES' value="1" class="form-control text-white" maxlength="3" required></input>
                                        </label>
                                        <label class="form-label">
                                            Nombre de la Cuenta
                                            <input type='text' name='COS PRODUCTO' value="Caja" min="0" class="form-control text-white" required></input>
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
            <!-- FIN DE MODAL PARA EDITAR  -->



            <!-- INICIO MODAL PARA BORRAR  -->
            <div class="modal-container">
                <div class="modal fade bd-example-modal-lg" id="dialogo3">
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




        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->

@endsection