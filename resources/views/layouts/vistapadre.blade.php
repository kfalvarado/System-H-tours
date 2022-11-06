<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('titulo')</title>

  <!-- Bootstrap  -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">

{{-- sweetaler2 --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->

  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/HTOURS.png')}}" />

  <!-- metodo de cerrar sesion funcional, pero por el metodo GET, se necesita cambiar que sea funcional por el metodo POST
  para poder enviar el token y destruirlo en la api por medio de FETCH   -->
  <script>
    function presioname() {
      r = {}
      r.ruta = '{{route("cerrar.sesion")}}';
      if (confirm('Estas Seguro que deseas salir?')) {
        window.location = r.ruta;
      }
    }
  </script>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">
          <H3>
            <font color="white"> System H Tours</font>
          </H3>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html">
          <H3>
            <font color="white">SHT</font>
          </H3>
        </a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="@yield('foto-user1')" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">@yield('Usuario-Lateral')</h5>
                <span>@yield('rol-usuario')</span>
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
                  <p class="preview-subject ellipsis mb-1 text-small">Ajustes Cuenta</p>
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
                  <p class="preview-subject ellipsis mb-1 text-small">Cambiar Contraseña</p>
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
                  <p class="preview-subject ellipsis mb-1 text-small">Lista de tareas</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navegacion</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{route('inicio')}}">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Inicio</span>
          </a>
        </li>
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
              <li class="nav-item"> <a class="nav-link" href="{{route('mostrar.cuentas')}}">Gestion de cuentas</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('mostrar.subcuentas')}}">Gestion de subcuentas</a></li>
            </ul>
          </div>
        </li>
        <!-- Modulo Contable  -->
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
              <li class="nav-item"> <a class="nav-link" href="{{route('mostrar.librodiario')}}">Libro Diario</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('periodo.inicio')}}">Periodo/Libro Mayor</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('balance.inicio')}}">Reporte Balance General</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('Resultado.mostrar')}}">Reporte Estado de Resultado</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="{{route('mostrar.clasificacion')}}">Clasificacion</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('personas.inicio')}}">Personas</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('mostrar.objeto')}}"> Objetos </a></li>
            </ul>
          </div>
        </li>

        <!-- SEGURIDAD  -->
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
              <li class="nav-item"> <a class="nav-link" href="{{route('admins.inicio')}}"> Administrador </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('usuarios.inicio')}}"> Usuarios </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('mostrar.roles') }}">Roles</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('mostrar.permisos') }}"> Permisos </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('mostrar.bitacoras') }}"> Bitacoras </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('mostrar.parametro')}}"> Parametros </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('preguntas.inicio')}}"> Preguntas </a></li>
            </ul>
          </div>
        </li>
    </nav>
    <!-- fin de barra lateral -->
    <!-- inicio de menu  -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">

        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="@yield('foto-user2')" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">@yield('Usuario-Menu')</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Opciones</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="{{route('ajustes.inicio')}}">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Ajustes</p>
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
                    <p class="preview-subject mb-1" onclick="presioname();">Cerrar Sesion</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">Ajustes Avanzados</p>
              </div>
            </li>

            <!-- barra de menu en modo celular -->
          </ul>
          <button class="navbar-toggler   navbar-toggler-right d-lg-none align-self-right" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- fin menu -->
      <!-- inicio contenido  -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('contenido')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <div style="display: none;" id="number" name="number" >

  </div>

  <script src="{{ asset('assets/js/ab-sesionUser.js') }}"></script>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>

</html>