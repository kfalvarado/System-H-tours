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
                <h1> Crear SubCuentas </h1>
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
                                        <th class="text-dark bg-white"> <b>Nombre de Cuentas</b> </th>
                                        <th class="text-dark bg-white"> </b>Numero de Sub Cuentas</b> </th>
                                        <th class="text-dark bg-white"> </b>Nombre de Sub Cuentas</b> </th>
                                        <th class="text-dark bg-white"> </b>Acciones</b> </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-white bg-dark">
                                        <td> 1</td>
                                        <td> Activo</td>
                                        <td> Caja</td>
                                        <td> 1.1.1 </td>
                                        <td> Efectivo</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>

                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td> 2 </td>
                                        <td> Pasivo </td>
                                        <td> Priveedores </td>
                                        <td> 2.1.1</td>
                                        <td> Empresa x </td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                                    </tr>
                                    <tr class="text-white bg-dark">
                                        <td> 3 </td>
                                        <td> Patrimoniop </td>
                                        <td> Capital Social </td>
                                        <td> 3.1.1</td>
                                        <td> Aportaciones </td>
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
                                    <h4 class="modal-title">Ingresar Nueva Sub Cuenta</h4>
                                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                </div>
                                <!-- CUERPO DEL DIALOGO NUEVA -->
                                <div class="modal-body">
                                    <center>
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


                                            <label class="form-label">
                                                Nombre de Cuenta
                                                <Select class="form-control text-white">
                                                    <option value=""></option>
                                                    <option value="">Caja</option>
                                                    <option value="">Banco</option>
                                                    <option value="">Proveedores</option>
                                                    <option value="">Capital</option>
                                                </Select>


                                            </label>

                                            <label class="form-label">
                                                Numero de la sub Cuenta
                                                <input type='number' min="0" name='COS PRODUCTO' class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Nombre de la Sub Cuenta
                                                <input type='text' name='COS PRODUCTO' class="form-control text-white" required></input>
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





                <!-- INICIO MODAL PARA EDITAR  -->
                <div class="modal-container">
                    <div class="modal fade bd-example-modal-lg" id="dialogo2">
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

                                                    <option value=""> Activo</option>
                                                    <option value=""> Pasivo</option>
                                                    <option value="">Patrimonio </option>
                                                    <option value="">Resultado </option>

                                                </select>
                                            </label>


                                            <label class="form-label">
                                                Nombre de Cuenta
                                                <Select class="form-control text-white">
                                                    <option value="">Caja</option>
                                                    <option value="">Banco</option>
                                                    <option value="">Proveedores</option>
                                                    <option value="">Capital</option>
                                                </Select>


                                            </label>

                                            <label class="form-label">
                                                Numero de la sub Cuenta
                                                <input type='number' min="0" name='COS PRODUCTO' class="form-control text-white" required></input>
                                            </label>
                                            <label class="form-label">
                                                Nombre de la Sub Cuenta
                                                <input type='text' name='COS PRODUCTO' class="form-control text-white" required></input>
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
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">

        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
@endsection