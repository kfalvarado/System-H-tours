@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Personas | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    @if (Cache::get('genero') == 'M')
        {{ asset('assets/images/varon.png') }}
    @else
        {{ asset('assets/images/dama.png') }}
    @endif
@endsection
@section('encabezado')
    <link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
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


{{-- encabezado o head --}}
@section('encabezado')
@endsection


<!-- contenido de la pagina  -->
@section('contenido')

    @if (Session::has('insertado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Persona registrada correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('actualizado'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Persona se actualizado correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if (Session::has('desactivada'))
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Persona se desactivo correctamente'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    <div class="page-header">
        </nav>
    </div>
    <center>
        <h1>Mantenimiento Personas</h1>
    </center>
    <br>
    <p align="right" valign="baseline">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
        <a type="button" href="{{ route('personas.pdf') }}" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> Generar
            PDF</a>
        {{-- cambiar la ruta de perido.pdf a periodo.excel  --}}
        <button type="button" href="{{ route('periodo.pdf') }}" id="btnExportar" class="btn btn-success"><i
                class="mdi mdi-file-excel"></i> Generar Excel</button>
    </p>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <center>Personas Registradas</center>
                    </h4>
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input class="form-control me-2 light-table-filter text-white" data-table="table_id" type="text"
                            placeholder="Buscar una personas">
                    </form>

                    <div class="table-responsive">
                        <table id="tabla"
                            class="table table-striped table-bordered table-condensed table-hover table_id" cellspacing="0"
                            cellpadding="0" width="100%">
                            <thead>
                                <tr>

                                    <th class="text-dark bg-white">#</th>
                                    <th class="text-dark bg-white"> Usuario</th>
                                    <th class="text-dark bg-white"> Género</th>
                                    <th class="text-dark bg-white"> Edad </th>
                                    <th class="text-dark bg-white"> Civil </th>
                                    <th class="text-dark bg-white"> Tipo </th>
                                    <th class="text-dark bg-white"> Identidad </th>
                                    <th class="text-dark bg-white"> Teléfono </th>
                                    <th class="text-dark bg-white"> Tipo </th>
                                    <th class="text-dark bg-white"> Estado </th>
                                    <th class="text-dark bg-white"> Registro</th>
                                    <th class="text-dark bg-white"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($personasArray) <= 0)
                                    <tr>
                                        <td class="fila">No hay resultados</td>
                                    </tr>
                                @else
                                    @foreach ($personasArray as $persona)
                                        <tr class="text-white bg-dark">
                                            <td class="fila">{{ $persona['COD_PERSONA'] }} </td>
                                            <td class="fila">{{ $persona['NOM_USR'] }}</td>
                                            <td class="fila">{{ $persona['SEX_PERSONA'] }}</td>
                                            <td class="fila">{{ $persona['EDA_PERSONAL'] }}</td>
                                            <td class="fila">{{ $persona['IND_CIVIL'] }}</td>
                                            <td class="fila">{{ $persona['TIP_PERSONA'] }}</td>
                                            <td class="fila">{{ $persona['NUM_IDENTIDAD'] }}</td>
                                            <td class="fila">{{ $persona['TELEFONO'] }}</td>
                                            <td class="fila">{{ $persona['TIP_TELEFONO'] }}</td>
                                            <td class="fila">{{ $persona['EST_USR'] }}</td>
                                            <td class="fila">{{ substr($persona['FEC_REGISTRO'], 0, 10) }}</td>
                                            <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#modal-editar-{{ $persona['COD_PERSONA'] }}"> <i
                                                        class="mdi mdi-table-edit"></i> Editar</button> <button
                                                    type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $persona['COD_PERSONA'] }}"><i
                                                        class="mdi mdi-delete-forever"></i> Eliminar</button> </td>
                                        </tr>


                                        <!-- INICIO MODAL PARA EDITAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-md"
                                                id="modal-editar-{{ $persona['COD_PERSONA'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Persona</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO EDITAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('personas.actualizar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')
                                                                    <label class="form-label">
                                                                        <input type="hidden" name="cod"
                                                                            value="{{ $persona['COD_PERSONA'] }}">
                                                                        <b>Usuario</b>
                                                                        <input type='text' value="{{ $persona['USR'] }}"
                                                                            name='user'
                                                                            class="form-control bg-dark text-white" required
                                                                            readonly>
                                                                    </label>
                                                                    <label class="form-label">

                                                                        <b>Nombre de Usuario</b>
                                                                        <input type='text'
                                                                            value="{{ $persona['NOM_USR'] }}"
                                                                            name='nombre'
                                                                            class="form-control bg-dark text-white" required
                                                                            readonly>
                                                                    </label>
                                                            </center>
                                                            {{-- div contenedor  --}}
                                                            <div
                                                                style="background-color:#2b4e821c;   justify-content: center; align-items: center;">
                                                                <br>
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                <label class="form-label"
                                                                    style="background-color: #0778b199">
                                                                    <center> Género</center>
                                                                    <select class="form-control bg-white text-dark"
                                                                        name="genero" id="genero" required>
                                                                        <option value="{{ $persona['SEX_PERSONA'] }}" hidden selected>
                                                                            {{ $persona['SEX_PERSONA'] }}</option>
                                                                        <option value="F">Femenino</option>
                                                                        <option value="M">Masculino</option>
                                                                    </select>
                                                                </label>
                                                                <label style="background-color: #0778b199">
                                                                    <font color='white'> Tipo de persona</font>
                                                                    </center>
                                                                    <Select class="form-control bg-white text-dark"
                                                                        id="tipoPersona" name="tipoPersona" required>
                                                                        <option value="{{ $persona['TIP_PERSONA'] }}" hidden selected>
                                                                            {{ $persona['TIP_PERSONA'] }}</option>
                                                                        <option value="N">Normal</option>
                                                                        <option value="J">Jurídica</option>
                                                                    </Select>
                                                                </label>

                                                                <label for="civil" style="background-color: #0778b199">
                                                                    <center>
                                                                        <font color='white'>&nbsp;&nbsp;&nbsp;Estado
                                                                            Civil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font>
                                                                    </center>
                                                                    <Select id="civil" name="civil"
                                                                        class="form-control bg-white text-dark" required>
                                                                        <option value="{{ $persona['IND_CIVIL'] }}" hidden selected>{{ $persona['IND_CIVIL'] }}
                                                                        </option>
                                                                        <option value="S">Soltero</option>
                                                                        <option value="V">Viudo</option>
                                                                        <option value="C">Casado</option>
                                                                        <option value="D">Divorciado</option>
                                                                    </Select>
                                                                </label>
                                                                <br>
                                                                {{-- centrado  --}}
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;

                                                                {{-- fin centrado --}}
                                                                <center>

                                                                    <label for="" style="background-color: #0778b199">
                                                                        <font color='white'> &nbsp; Edad </font>
                                                                    <input type="number" id="edad-edit-{{  $persona['COD_PERSONA'] }}" name="edad"
                                                                    placeholder="0" min="0" max="100" onkeyup="validarEdadEdit({{  $persona['COD_PERSONA'] }})"
                                                                        class="form-control bg-white text-dark"
                                                                        value="{{ $persona['EDA_PERSONAL'] }}" required>
                                                                </label>
                                                                <div id="div-editar-{{ $persona['COD_PERSONA'] }}"></div>
                                                               
                                                                <label for="" style="background-color: #0778b199">
                                                                    <font color='white'> &nbsp; Identidad </font>
                                                                    <input type="tel"
                                                                        value="{{ $persona['NUM_IDENTIDAD'] }}"
                                                                        id="indentidad-edit-{{  $persona['COD_PERSONA']  }}"
                                                                        onclick="tipopersona();"minlength="0"
                                                                        onkeyup="validarDNIedit({{  $persona['COD_PERSONA'] }})"
                                                                        min="0" placeholder="0801-2000-09115"
                                                                        pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}"
                                                                        name="identidad"
                                                                        class="form-control p_input text-dark bg-white"
                                                                        required>
                                                                </label>
                                                                <div id="divedit-{{   $persona['COD_PERSONA']}}"></div>
                                                               
                                                                {{-- centrado  --}}
                                                             
                                                             

                                                                {{-- fin centrado --}}
                                                                <label style="background-color: #0778b199">
                                                                    <font color='white'>Teléfono </font>
                                                                    <input type="tel"
                                                                    value="{{ $persona['TELEFONO'] }}"
                                                                    id="telefono-edit-{{ $persona['COD_PERSONA'] }}" name="telefono"
                                                                    class="form-control p_input text-dark bg-white"
                                                                    placeholder="+504 9021-3300"
                                                                    pattern="[+0-9 ]{2,5} [0-9-]{4,13}[0-9-]{4,13}" required>
                                                                    <div id="perteledit-{{ $persona['COD_PERSONA']}}"></div>
                                                                </label>
                                                               
                                                                <label style="background-color: #0778b199">
                                                                    <font color='white'>&nbsp;&nbsp;Tipo de Teléfono
                                                                        &nbsp;&nbsp;</font>
                                                                        <Select class="form-control bg-white text-dark"
                                                                        id="tipotelefono" name="tipotelefono" required>
                                                                        <option value="{{ $persona['TIP_TELEFONO'] }}" hidden selected>
                                                                            {{ $persona['TIP_TELEFONO'] }}</option>
                                                                            <option value="C">Celular</option>
                                                                            <option value="T">Teléfono Fijo</option>
                                                                        </Select>
                                                                    </label>
                                                                </center>
                                                                    <center>
                                                                        
                                                                        <label style="background-color: #0778b199">
                                                                            <font color='white'>&nbsp;&nbsp;Estado
                                                                                &nbsp;&nbsp;</font>
                                                                        <Select class="form-control bg-white text-dark"
                                                                            id="estado" name="estado" required>
                                                                            <option value=" {{ $persona['EST_USR'] }}" hidden selected>
                                                                                {{ $persona['EST_USR'] }}</option>
                                                                            <option value="ACTIVO">ACTIVO</option>
                                                                            <option value="INACTIVO">INACTIVO</option>
                                                                            <option value="BLOQUEADO">BLOQUEADO</option>
                                                                        </Select>
                                                                    </label>
                                                                </center>
                                                                <br>
                                                                {{-- centrado  --}}
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;

                                                                {{-- fin centrado --}}
                                                            </div>
                                                            <center>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Aceptar</button>
                                                            </center>
                                                            </form>
                                                        </div>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN DE MODAL PARA EDITAR  -->



                                        <!-- INICIO MODAL PARA BORRAR  -->
                                        <div class="modal-container">
                                            <div class="modal fade bd-example-modal-lg"
                                                id="modal-eliminar-{{ $persona['COD_PERSONA'] }}">
                                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <!-- CABECERA DEL DIALOGO EDITAR -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar Persona</h4>
                                                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                        <!-- CUERPO DEL DIALOGO BORRAR -->
                                                        <div class="modal-body">
                                                            <center>
                                                                <form action="{{ route('personas.eliminar') }}"
                                                                    method="post">
                                                                    @csrf @method('PUT')
                                                                    <label class="form-label">
                                                                        <i class="mdi mdi-delete-forever"
                                                                            style="font-size: 100px;"></i>
                                                                        <input type="hidden" name="cod"
                                                                            value="{{ $persona['COD_PERSONA'] }}">
                                                                        <br>
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
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            </tbody>
            </table>
        </div>
        <div id="paginador" class=""></div>
    </div>
    </div>


    <!-- INICIO MODAL PARA INSERTAR  -->
    <div class="modal-container">
        <div class="modal fade bd-example-modal-md" id="dialogo1">
            <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- CABECERA DEL DIALOGO EDITAR -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ingresar Persona</h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO EDITAR -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('personas.insertar') }}" method="post">
                                @csrf
                                <label class="form-label">
                                    <b>Seleccionar Usuario</b>
                                    <select class="form-control bg-dark text-white" name="user" id="user"
                                        required>
                                        <option hidden selected>Seleccionar</option>
                                        @foreach ($usuariosArray as $user)
                                            <option value="{{ $user['USR'] }}">{{ $user['USR'] }}</option>
                                        @endforeach

                                    </select>
                                </label>
                        </center>
                        {{-- div contenedor  --}}
                        <div style="background-color:#2b4e821c;   justify-content: center; align-items: center;">
                            <br>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <label class="form-label" style="background-color: #0778b199">
                                <center> Género</center>
                                <select class="form-control bg-white text-dark" name="genero" id="genero" required>
                                    <option hidden selected>Seleccionar</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </label>
                            <label style="background-color: #0778b199">
                                <font color='white'> Tipo de persona</font>
                                </center>
                                <Select class="form-control bg-white text-dark" id="tipoPersona" name="tipoPersona"
                                    required>
                                    <option hidden selected>Seleccionar</option>
                                    <option value="N">Normal</option>
                                    <option value="J">Jurídica</option>
                                </Select>
                            </label>

                            <label for="civil" style="background-color: #0778b199">
                                <center>
                                    <font color='white'>&nbsp;&nbsp;&nbsp;Estado Civil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </font>
                                </center>
                                <Select id="civil" name="civil" class="form-control bg-white text-dark" required>
                                    <option hidden selected>Seleccionar</option>
                                    <option value="S">Soltero</option>
                                    <option value="V">Viudo</option>
                                    <option value="C">Casado</option>
                                    <option value="D">Divorciado</option>
                                </Select>
                            </label>

                            <br>
                            {{-- centrado  --}}
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;

                            {{-- fin centrado --}}
                            <center>

                                <label for="" style="background-color: #0778b199">
                                    <font color='white'> &nbsp; Edad </font>
                                    <input type="number" id="edad" name="edad" onkeyup="validarEdad(this)"
                                    placeholder="0" min="0" max="100"
                                    class="form-control bg-white text-dark" required>
                                </label>
                                <div id="divedad"></div>
                                <br>
                            <label for="" style="background-color: #0778b199">
                                <font color='white'> &nbsp; Identidad </font>
                                <input type="tel" onclick="tipopersona();"minlength="0" id="dni"
                                    onkeyup="validarDNI(this)" min="0" placeholder="0801-2000-09115"
                                    pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}"id="identidad" name="identidad"
                                    class="form-control p_input text-dark bg-white" required>
                                </label>
                                <div id="divdni"></div>
                            <br>
                            {{-- centrado  --}}
                         
                            {{-- fin centrado --}}
                            <label style="background-color: #0778b199">
                                <font color='white'>Teléfono </font>
                                <input type="tel" id="telefono" name="telefono" onkeyup="validarTel(this)"
                                    class="form-control p_input text-dark bg-white" placeholder="+504 9021-3300"
                                    pattern="[+0-9 ]{2,5} [0-9-]{4,13}[0-9-]{4,13}" required>
                                <div id="divtelefono"></div>
                            </label>
                            <br>
                            <label style="background-color: #0778b199">
                                <font color='white'>&nbsp;&nbsp;Tipo de Teléfono &nbsp;&nbsp;</font>
                                <Select class="form-control bg-white text-dark" id="tipotelefono" name="tipotelefono"
                                required>
                                <option hidden selected>Seleccionar</option>
                                <option value="C">Celular</option>
                                <option value="T">Teléfono Fijo</option>
                            </Select>
                            </label>
                            <br>
                        </center>
                            {{-- centrado  --}}
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;

                            {{-- fin centrado --}}
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </center>
                        </form>
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE MODAL PARA EDITAR  -->


    {{-- datables --}}
    <!-- script para exportar a excel -->
    <script>
        const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#tabla");

        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "Reporte de Personas", //Nombre del archivo de Excel
                sheetname: "Reporte de Personas", //Título de la hoja
                ignoreCols: 11,
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType,
                preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento
                .merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>



@section('js')
    <script src="{{ asset('assets/js/ab-formularios.js') }}"></script>
    <script src="{{ asset('assets/js/ab-buscador.js') }}"></script>
    {{-- Enlace a paginador de javascript --}}
    <script src="{{ asset('assets/js/ab-page.js') }}"></script>



    {{-- Script que valida lo que estan escribiendo --}}
    <script>
        document.addEventListener("keyup", (e) => {

            // e.target.matches('#buscador')


            if (e.target.matches('#buscador')) {
                console.log(e.target.value);
                document.querySelectorAll('.fila').forEach(element => {
                    element.textContent.toLowerCase().includes(e.target.value.toLowerCase()) ?
                        element.classList.remove('filtro') :
                        element.classList.add("filtro")
                });
            }
        })
    </script>
@endsection


@endsection
