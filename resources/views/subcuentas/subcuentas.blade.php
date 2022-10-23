@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Balance General
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
{{ asset('assets/images/mujer.png') }}
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
{{ asset('assets/images/varon.png') }}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
Emerson
@endsection
<!-- contenido de la pagina  -->
@section('contenido')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
             <center><h1> Crear SubCuentas </h1></center>
              <!-- <h1 class="page-title"> Nombre de la Tabla </h1> -->
              <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav> -->
            </div>
            <p align="right" valign="baseline">
              <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
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
                            <tr class="text-dark bg-white">
                            <th class="text-dark bg-white"> </b> # </b> </th>
                            <th class="text-dark bg-white"> <b>CLASIFICACION</b> </th>
                            <th class="text-dark bg-white"> <b>NOMBRE DE CUENTA</b> </th>
                            <th class="text-dark bg-white"> <b>NUMERO DE SUBCUENTA</b> </th>
                            <th class="text-dark bg-white"> <b>NOMBRE DE SUBCUENTA</b> </th>
                            <th class="text-dark bg-white"> <b>ACCIONES</b> </th>
                          </tr>


                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td> 1</td>
                            <td> 1.ACTIVO</td>
                            <td> CAJA</td>
                            <td> 1.1.1 </td>
                            <td> EFECTIVO</td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>

                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 2 </td>
                            <td> 2.PASIVO </td>
                            <td> PROVEEDORES </td>
                            <td> 2.1.1</td>
                            <td> EMPRESA X </td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 3 </td>
                            <td> 3.PATRIMONIO </td>
                            <td> CAPITAL </td>
                            <td> 3.1.1</td>
                            <td> APORTACIONES </td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
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
             <h4 class="modal-title">Ingresar  Nuevo Registro de SubCuenta</h4>
                  <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
             </div>
                  <!-- CUERPO DEL DIALOGO NUEVA -->
             <div class="modal-body">
             <center>
             <form action="" method="post">
             <label class="form-label">
             CLASIFICACION
             <input type='text' name='NOM PRODUCTO' class="form-control  text-white" required></input>
             </label>
             <label class="form-Select">
             NOMBRE  DE CUENTA
             <input type='text' name='UNIDADES' class="form-control  text-white" required></input>
             </label>
             <label class="form-label">
             NUMERO DE CUENTA
             <input type='number' name='COS PRODUCTO' class="form-control text-white"  required></input>
             </label>
             <label class="form-label">
              NOMBRE  DE SUBCUENTA
              <input type='text' name='COS PRODUCTO' class="form-control  text-white"  required></input>
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
                      CLASIFICACION
                      <input type='text' name='NOM PRODUCTO' class="form-control  text-white" required></input>
                      </label>
                      <label class="form-Select">
                      NOMBRE  DE CUENTA
                      <input type='text' name='UNIDADES' class="form-control  text-white" required></input>
                      </label>
                      <label class="form-label">
                      NUMERO DE CUENTA
                      <input type='number' name='COS PRODUCTO' class="form-control  text-white"  required></input>
                      </label>
                      <label class="form-label">
                       NOMBRE  DE SUBCUENTA
                       <input type='text' name='COS PRODUCTO' class="form-control  text-white"  required></input>
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
             @endsection

