@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Libro Mayor | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
{{ asset('assets/images/varon.png')}}
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
Fabricio
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
Fabricio
@endsection
<!-- contenido de la pagina  -->
@section('contenido')



    <!-- ESTE CSS ES PARA OCULTAR DATOS EN LA IMPRESION-->
    <style>
    
    @media print{
      .oculto-impresion, .oculto-impresion *{
        display: none !important;
      }
    }
    </style>
<!--BUSCADOR VERDE CON CSS INICIO-->
<style>
 
  .form-controlprueba
 {
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
     border-radius:5px;
 }
 </style> 
 <style>
  
  .form-controlprueba:hover
 {
  border-color: green;
  box-shadow: 0 0px 10px 0 green inset,0 10px 70px 0 green,
     0 0px 10px 0 green inset,0 10px 20px 0 green;
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
     border-radius:5px;
 }
 .btnprueba:hover{

  background-color: green;
  box-shadow: 0 0px 10px 0 green inset,0 10px 70px 0 green,
     0 0px 10px 0 green inset,0 10px 20px 0 green;
     text-shadow: 0 0 0px green;
 }
  </style>

       <!-- partial:../../partials/_sidebar.html -->
           <!-- inicio de todo el menu -->
           <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
              <a class="sidebar-brand brand-logo" href="../../index.html"><H3><font color="white"> System H Tours</font></H3></a>
              <a class="sidebar-brand brand-logo-mini" href="../../index.html"><H3><font color="white">SHT</font></H3></a>
            </div>
            <ul class="nav">
              <li class="nav-item profile">
                <div class="profile-desc">
                  <div class="profile-pic">
                    <div class="count-indicator">
                      <img class="img-xs rounded-circle " src="../../assets/images/faces/usuario1.png" alt="">
                      <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                      <h5 class="mb-0 font-weight-normal">Usuario1</h5>
                      <span>Administrador</span>
                    </div>
                  </div>
                  <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                  <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-settings text-primary"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-onepassword  text-info"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-calendar-today text-success"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                       <a class="admin_ms.html"> </a>
                      </div>
                    </a>
                  </div>
                </div>
              </li>
              <li class="nav-item nav-category">
                <span class="nav-link">Navegacion</span>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="../../index.html">
                  <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                  </span>
                  <span class="menu-title">Home</span>
                </a>
              </li>
              <!-- cuentas -->
              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                  </span>
                  <span class="menu-title">Modulo de Cuentas</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="tablas-crear.cuenta.html">Gestion de cuentas</a></li>
                      <li class="nav-item"> <a class="nav-link" href="tablas-subcuentas.html">Gestion de subcuentas</a></li>
                      
                    </ul>
                </div>
              </li>
              <!-- periodo  -->
              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#periodo-contable" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                  </span>
                  <span class="menu-title">Modulo Contable</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="periodo-contable">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="libro_diario.html">Libro Diario</a></li>
                    <li class="nav-item"> <a class="nav-link" href="tablas-periodo.html">Periodo/Libro Mayor</a></li>
                    <li class="nav-item"> <a class="nav-link" href="Balance-GL.html">Reporte Balance General</a></li>
                    <li class="nav-item"> <a class="nav-link" href="Consultas-estadoDeResultados.html">Reporte Estado de Resultado</a></li>
                    </ul>
                </div>
              </li>
      
              <!-- mantenimiento -->
              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#mantenimiento" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Manteniminento</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="mantenimiento">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="tablas-Clasificacion.html">Clasificacion</a></li>
                    <!--<li class="nav-item"> <a class="nav-link" href="estado-cuentas.html">Estado de cuentas</a></li>-->
                    <!--<li class="nav-item"> <a class="nav-link" href="estado-sub-cuentas.html">Estado de subcuentas</a></li>-->
                 <li class="nav-item"> <a class="nav-link" href="estado-periodo.html">Estado de periodo</a></li>
                    <li class="nav-item"> <a class="nav-link" href="Objetos.html"> Objetos </a></li>
                  </ul>
                </div>
              </li>
              
            <!-- Seguridad  -->
              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                  <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                  </span>
                  <span class="menu-title">Seguridad</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="Usuarios.html"> Usuarios </a></li>
                    <li class="nav-item"> <a class="nav-link" href="Roles.html">Roles</a></li>
                   <li class="nav-item"> <a class="nav-link" href="Permisos.html"> Permisos </a></li>
                    <li class="nav-item"> <a class="nav-link" href="Bitacora.html">  Bitacoras </a></li>
                    <li class="nav-item"> <a class="nav-link" href="Parametros.html">  Parametros </a></li>
                    <li class="nav-item"> <a class="nav-link" href="admin_ms.html">  Administrador </a></li>
                  </ul>
                </div>
              </li>  
            </ul>
          </nav>
      
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
                <a class="btn btn-info" href="../samples/login.html" class="p-3 mb-0">Cerrar Sesion</a>
             
                </a>
                <div class="dropdown-divider"></div>
                <a class="p-3 mb-0 text-center" href="admin_ms.html">Administracion</a>
              </div>
            </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                  <span class="mdi mdi-format-line-spacing"></span>
                </button>
              </div>
            </nav>
                 <!-- INICIO MODAL PARA NUEVA  -->
          <div class="modal-container">
            <div class="modal fade bd-example-modal-lg" id="dialogo1">
                  <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
             <div class="modal-dialog modal-sm">
             <div class="modal-content">
                  <!-- CABECERA DEL DIALOGO NUEVA-->
             <div class="modal-header">
             <h4 class="modal-title">Ingresar Bitacora</h4>
                  <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
             </div>
                  <!-- CUERPO DEL DIALOGO NUEVA -->
             <div class="modal-body">
             <center>
             <form action="" method="post">
             <label class="form-label">
              Fecha Registro
             <input type='number' name='Clasificacion' class="form-control text-white" required></input> 
             </label>
             <label class="form-label">
             Usuario Registro
             <input type='text' name='usuario registro' class="form-control text-white" required></input> 
             </label>
             <label class="form-label">
             Acciones en el sistema
             <input type='text' name='Permiso Eliminacion' class="form-control text-white"  required></input> 
             </label>
             <label class="form-label">
             Descripcion Bitacora
             <input type='text' name='permiso' class="form-control text-white"  required></input> 
             </label>
             <label class="form-label">
             </label>
 
         
 
             <a href="" class="btn btn-secondary">Cancelar</a>
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
              <h4 class="modal-title">Editar Bitacora</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
                   <!-- CUERPO DEL DIALOGO EDITAR -->
              <div class="modal-body">
              <center>
              <form action="" method="post">
              <label class="form-label">
              Fecha Registro
              <input type='number' name='FECHA REGISTRO' class="form-control text-white" required></input> 
              </label>
              <label class="form-label">
              Usuario Registro 
              <input type='text' name='USUARIO REGISTRO' class="form-control text-white" required></input> 
              </label>
              <label class="form-label">
              Acciones sistema
              <input type='text' name='ACCIONES SISTEMA' class="form-control text-white"  required></input> 
              </label>
              <label class="form-label">
              Descripcion bitacora
              <input type='text' name='DESCRIPCION BITACORA' class="form-control text-white"  required></input> 
              </label>
              <label class="form-label">
              </label>
          
  
              <a href="" class="btn btn-secondary">Cancelar</a>
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
              <h4 class="modal-title">Eliminar Bitacira</h4>
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

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <center> <h1>Bitacora H Tours Honduras</h1> </center>
            <h5>________________________________________________________________________________________________________________</h5>
            <!-- <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"></a></li>
            </ul> -->
            <p align="right" valign="baseline">
              <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
            </p>
            
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"></a></li>
              </ul>
              
              
            
              
            
           
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <center><h4 class="card-title">Registros de bitacora</h4></center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr class="text-dark bg-white">
                            <th class="text-dark bg-white">#</th>
                            <th class="text-dark bg-white">Fecha registro</th>
                             <th class="text-dark bg-white">U registro</th>
                             <th class="text-dark bg-white">Acciones sistema</th>
                             <th class="text-dark bg-white">Descripcion Bitacora</th>          
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td>1</td>
                            <td>02/12/2021</td>
                            <td>Jose</td>
                            <td>Actualizar</td>
                            <td>Actualizar</td>
                       
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>2</td>
                            <td>02/12/2021</td>
                            <td>Cramen</td>
                            <td>Actualizar</td>
                            <td>Actualizar</td>
                            
                        
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>3</td>
                            <td>02/12/2021</td>
                            <td>Rosa</td>
                            <td>Actualizar</td>
                            <td>Actualizar</td>
                          
                            
                        </tbody>
                      </table>
                    </div>
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




@endsection