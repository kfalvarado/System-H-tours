@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Balance General
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
{{ asset('assets/images/varon.png')}}
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
Emerson
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
Administrador
@endsection

<!-- foto del menu de la derecha -->
@section('foto-user2')
{{ asset('assets/images/varon.png')}}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
Emerson
@endsection
<!-- contenido de la pagina  -->
@section('contenido')



    <!-- inicio de menu  -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><H3><font color="white">SHT</font></H3></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <!-- <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
              <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                <input type="text" class="form-control" placeholder="Search products">
              </form>
            </li> -->
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-lg-block">
           
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="../../assets/images/faces/usuario1.png" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Usuario1</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <a class="admin_ms.html"> </a>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <a  href="index.html" class="preview-subject mb-1">Cerrar Session</a>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">Advanced settings</p>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!--<center> <h1>Libro Diario</h1> </center>-->
            <center><h1>Estado de Periodo H Tours Honduras</h1> </center>
            <h5>________________________________________________________________________________________________________________</h5>
            <div class="page-header">
             <!--<center><h1> Libro Diario </h1></center>--> 
             
              <!-- <h1 class="page-title"> Nombre de la Tabla </h1> -->
              <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav> -->


              
                  <!-- INICIO MODAL PARA INGRESADA  -->
           <div class="modal-container">
           <div class="modal fade bd-example-modal-lg" id="dialogo1">
                 <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                 <!-- CABECERA DEL DIALOGO NUEVA-->
            <div class="modal-header">
            <h4 class="modal-title">Estado de la Cuenta</h4>
                 <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
            </div>
                 <!-- CUERPO DEL DIALOGO INGRESADA -->
            <div class="modal-body">
            <center>
            <form action="" method="post">
              <label class="form-label"> 
                Seleccionar Periodo
                <select class="form-select" aria-label="Default select example">
                  <option value=""></option>
                  <option value="">periodo-2020-ene-1-001</option>
                  <option value="">periodo-2021-ene-1-002</option>
                  <option value="">periodo-2022-ene-1-002</option>
                </select>
              </label>

            <label class="form-label">
              Estado
              <input type='text' name='perido' class="form-control" required></input>
              <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
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
            <div class="modal fade bd-example-modal-lg" id="dialogo2">
                  <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
             <div class="modal-dialog modal-sm">
             <div class="modal-content">
                  <!-- CABECERA DEL DIALOGO PENDIENTE-->
             <div class="modal-header">
             <h4 class="modal-title">Estado de la periodo</h4>
                  <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
             </div>
              
                 <!-- CUERPO DEL DIALOGO PENDIENTE -->
                 <div class="modal-body">
                  <center>
                  <form action="" method="post">
                  <label class="form-label">
                    <label for="">Estado</label>
                    
                  <input type='text' name='perido' value="Activo" class="form-control" required></input>
                  <button class="btn btn-success text-white">Aceptar</button>
                  </label>
             
      
              
      
                  <!--<a href="" class="btn btn-secondary">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Registrar </button>-->
                  </form>
                  </div> 
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </center>
                  </div>
                  </div>
                  </div>
                  </div>
                      <!-- FIN DE MODAL PARA PENDIENTE  -->
             


            



               

            </div>
            <!--<p align="right" valign="baseline">
              <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
            </p>-->
            <p align="right" valign="baseline">
              <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">Periodo</button> 
           <a type="button"  class="btn btn-success" href="javascript:window.print();">Generar PDF</a>
            </p>
            <div class="row">
          
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <!--<h4 class="card-title">Table with contextual classes</h4>-->
                    <!--<p class="card-description"> Add class <code>.table-{color}</code>
                    </p>-->
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual"  >
                        <thead>
                          <tr>
                            <th class="text-dark bg-white"> # </th>
                            <th class="text-dark bg-white"> Nombre del periodo </th>
                            <th class="text-dark bg-white"> Estado </th>
                            <th class="text-dark bg-white"> Acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td> 1 </td>
                            <td>periodo-2020-ene-1-001</td>
                            <td><div class="badge badge-outline-warning">Cerrado</div> </td> 
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 2 </td>
                            <td>Periodo-2021-ene-1-002 </td>
                            <td><div class="badge badge-outline-warning">Cerrado</div> </td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td> 3 </td>
                            <td> Periodo-2022-ene-1-003 </td>
                            <td><div class="badge badge-outline-success">Activo</div></td>
                            <td><button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#dialogo2">Editar</button> <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#dialogo3">Eliminar</button> </td>
                            <!-- <td><button type="button"  class="btn btn-warning"  data-toggle="modal" data-target="#dialogo2">Pendiente</button>  -->
                          </tr>
                        </tbody>
                      </table>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection