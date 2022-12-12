<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('titulo')</title>


    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    {{-- sweetaler2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/HTOURS.png') }}" />

    <!-- metodo de cerrar sesion funcional, pero por el metodo GET, se necesita cambiar que sea funcional por el metodo POST
  para poder enviar el token y destruirlo en la api por medio de FETCH   -->
    <script>
        function presioname() {
            r = {}
            r.ruta = '{{ route('cerrar.sesion') }}';
            Swal.fire({
                title: 'Cerrar Sesion',
                text: "Estas Seguro que deseas salir?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = r.ruta;
                }
            })

        }
    </script>
    <script src="https://use.fontawesome.com/73f69ada3d.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
    @yield('encabezado')
</head>

<body onbeforeunload="return CacheTime();">
    @if (Cache::has('CierreP'))
        <script>
            if (!localStorage.getItem("cierraya")) {
                Swal.fire({
                    icon: 'info',
                    text: 'Atención HOY es el cierre contable el periodo termina hoy, debes ir a la vista de PERIODO y ejecutar el cierre de periodo para posteriormente crear uno nuevo',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ir ahora',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Entendido',
                    showCancelButton: true,

                    // footer: '<a href="">Why do I have this issue?</a>'
                }).then((result) => {
                    if (result.isConfirmed) {
                        r = {}
                        r.ruta = '{{ route('periodo.inicio') }}';
                        localStorage.setItem('cierraya', '1');
                        window.location.replace(r.ruta);
                    } else {
                        localStorage.setItem('cierraya', '1');
                    }
                })
            }
        </script>
    @endif
    @if (Cache::has('oneday'))
        <script>
            Swal.fire({
                icon: 'warning',
                text: 'Atención mañana es el último día del periodo contable, se aproxima el cierre contable'
            })
        </script>

        <input type="hidden" value="{{ Cache::forget('oneday') }}">
    @endif
    <div class="container-scroller">
        {{-- Recuperacion de datos de acceso de la cache --}}
        <?php
        $intentos = Cache::get('totalaccesos');
        
        $accesos = []; ?>
        @for ($i = 0; $i <= $intentos; $i++)
            <?php array_push($accesos, Cache::get('access' . $i)); ?>
        @endfor

        <?php
        $largo = count($accesos) - 1;
        
        ?>
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="{{ route('inicio') }}">
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
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">

                            <div class="dropdown-divider"></div>
                            <a href="https://youtube.com/playlist?list=PLMPPqelIfnFJq_2HHNhqHwS57V3w3IvCz"
                                class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small"> Manual de uso</p>
                                </div>
                            </a>

                        </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navegación</span>
                </li>
                {{-- Comienza permisos --}}

                @for ($i = 0; $i <= $largo; $i++)
                    @if ($accesos[$i] == 'HOME')
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ route('inicio') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-speedometer"></i>
                                </span>
                                <span class="menu-title">Inicio</span>
                            </a>
                        </li>
                    @endif
                @endfor

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>

                        <span class="menu-title">Módulo de Cuentas</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            @for ($i = 0; $i <= $largo; $i++)
                                @if ($accesos[$i] == 'CUENTAS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('mostrar.cuentas') }}">Gestión de cuentas</a></li>
                                @endif
                                @if ($accesos[$i] == 'SUBCUENTAS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('mostrar.subcuentas') }}">Gestión de subcuentas</a></li>
                                @endif
                            @endfor

                        </ul>
                    </div>
                </li>

                <!-- Modulo Contable  -->
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#periodo-contable" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Módulo Contable</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="periodo-contable">
                        <ul class="nav flex-column sub-menu">
                            @for ($i = 0; $i <= $largo; $i++)
                                @if ($accesos[$i] == 'LIBRODIARIO')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('mostrar.librodiario') }}">Libro Diario</a></li>
                                @endif
                                @if ($accesos[$i] == 'PERIODO')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('periodo.inicio') }}">Período/Libro Mayor</a></li>
                                @endif
                                @if ($accesos[$i] == 'BALANCE')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('balance.inicio') }}">Reporte Balance General</a></li>
                                @endif
                                @if ($accesos[$i] == 'RESULTADOS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('Resultado.mostrar') }}">Reporte Estado de Resultado</a>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </li>
                <!-- mantenimiento -->
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#mantenimiento" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">Manteniminento</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="mantenimiento">
                        <ul class="nav flex-column sub-menu">
                            @for ($i = 0; $i <= $largo; $i++)
                                @if ($accesos[$i] == 'CLASIFICACION')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('clasificacion.inicio') }}">Clasificación</a></li>
                                @endif
                                @if ($accesos[$i] == 'GRUPOS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('mostrar.grupos') }}">Grupos</a></li>
                                @endif

                                @if ($accesos[$i] == 'PERSONAS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('personas.inicio') }}">Personas</a></li>
                                @endif
                                @if ($accesos[$i] == 'OBJETOS')
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('objetos.inicio') }}">
                                            Objetos </a></li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </li>

                <!-- SEGURIDAD  -->
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                        aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Seguridad</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admins.inicio')}}"> Administrador </a></li> --}}
                            @for ($i = 0; $i <= $largo; $i++)
                                @if ($accesos[$i] == 'USUARIOS')
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('usuarios.inicio') }}">
                                            Usuarios </a></li>
                                @endif
                                @if ($accesos[$i] == 'ROLES')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('mostrar.roles') }}">Roles</a></li>
                                @endif
                                @if ($accesos[$i] == 'PERMISOS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('mostrar.permisos') }}"> Permisos </a></li>
                                @endif
                                @if ($accesos[$i] == 'BITACORAS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('mostrar.bitacoras') }}"> Bitácoras </a></li>
                                @endif
                                @if ($accesos[$i] == 'PARAMETROS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('parametro.inicio') }}"> Parámetros </a></li>
                                @endif

                                @if ($accesos[$i] == 'PREGUNTAS')
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('preguntas.inicio') }}"> Preguntas </a></li>
                                @endif
                            @endfor
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
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>

                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                @if (isset($newusr))
                                    
                                @foreach ($newusr as $key)
                                @if ($key['CUENTA']>0)
                                <span class="count bg-danger"></span>
                                
                                @endif
                                @endforeach
                                
                             
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                              <h6 class="p-3 mb-0">Notificaciones</h6>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item preview-item">
                                @if (isset($newusr))
                                    
                                @foreach ($newusr as $key)
                                @if ($key['CUENTA']>0)
                                <div class="preview-thumbnail">
                                  <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar text-success"></i>
                                  </div>
                                </div>
                                <div class="preview-item-content">
                                  <p class="preview-subject mb-1">Nuevo Usuario</p>
                                  <p class="text-muted ellipsis mb-0">Nuevo usuarios registrados {{ $key['CUENTA'] }} </p>
                                </div>
                                @endif
                                @endforeach
                                
                             
                                @endif
                              </a>
                                
                              {{-- <div class="dropdown-divider"></div> --}}
                              {{-- <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                  <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-danger"></i>
                                  </div>
                                </div>
                                <div class="preview-item-content">
                                  <p class="preview-subject mb-1">Settings</p>
                                  <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                </div>
                              </a> --}}
                              {{-- <div class="dropdown-divider"></div> --}}
                              {{-- <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                  <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-link-variant text-warning"></i>
                                  </div>
                                </div>
                                <div class="preview-item-content">
                                  <p class="preview-subject mb-1">Launch Admin</p>
                                  <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                </div>
                              </a> --}}
                              <div class="dropdown-divider"></div>
                              <p class="p-3 mb-0 text-center">Notificaciones</p>
                            </div>
                          </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="@yield('foto-user2')" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">@yield('Usuario-Menu')</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-content dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Opciones</h6>
                                <div class="dropdown-divider"></div>
                      
                                <div class="text-center mb-3 mt-3">
                                    <a href="{{ route('ajustes.inicio') }}"
                                        class="btn btn-outline-secondary btn-shadow ">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        Ajustes
                                    </a>
                                </div>
                                <div class="dropdown-divider"></div>
                      
                                <div class="text-center mb-3 mt-3">
                                    <a class="btn btn-outline-danger btn-shadow " onclick="presioname();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        Cerrar Sesión
                                    </a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Ajustes Avanzados</p>
                            </div>
                        </li>

                        <!-- barra de menu en modo celular -->
                    </ul>
                    <button class="navbar-toggler   navbar-toggler-right d-lg-none align-self-right" type="button"
                        data-toggle="offcanvas">
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
    {{-- datables --}}

    <!-- script para exportar a excel -->
    {{-- <script>
    const $btnExportar = document.querySelector("#btnExportar"),
        $tabla = document.querySelector("#tabla");

    $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // No queremos botones
            filename: "Reporte de prueba", //Nombre del archivo de Excel
            sheetname: "Reporte de prueba", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
    });
</script> --}}

    <input type="hidden" name="" id="filas" value="{{ Cache::get('filas') }}">



    @if (Session::has('todo'))
        <script>
            localStorage.clear()
        </script>
    @endif
    <div style="display: none;" id="number" name="number">

    </div>

    <input type="hidden" id="time" name="time">
    @yield('js')

    @routes
    <script src="{{ asset('assets/js/ab-sesionUser.js') }}"></script>

    <script src="{{ asset('assets/js/ab-tokensession.js') }}"></script>


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>
