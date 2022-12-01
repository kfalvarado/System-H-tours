@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Preguntas | inicio
@endsection
@section('encabezado')
<link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
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
{{cache::get('user')}}
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
{{cache::get('user')}}
@endsection

@section('contenido')

@if (Session::has('actualizado'))
  <script>
    Swal.fire({
    icon: 'success',
    text: 'Pregunta y respuesta actualizada correctamente'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif

<main class="container">
        <!-- INICIO PANEL PREGUNTAS  --> 
        <div class="container-scroller">
        <div class="content-wrapper p-1" >
          <center> <h1>Preguntas H Tours Honduras</h1> </center>

          {{-- <marquee 
            behavior="scroll" 
            direction="right" 
            scrollamount="100" 
            scrolldelay="200"
            bgcolor = gray>---</marquee> --}}
          <!-- <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"></a></li>
          </ul> -->
          {{-- <p align="right" valign="baseline">
            <button type="button"  class="btn btn-success mr-3"  data-toggle="modal" data-target="#dialogo1">(+) Nuevo</button>
          </p> --}}
          
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"></a></li>
            </ul>
            
            
          
            
          
         
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <center><h4 class="card-title">Registros de Preguntas</h4></center>
                  <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                  </p>
                  <div class="table-responsive">
                    <table id="tabla" class="table table-bordered table-contextual">
                      <thead>
                        <tr class="text-dark bg-white">
                          {{-- <th class="text-dark bg-white">#</th> --}}
                          <th class="text-dark bg-white">Preguntas</th>
                          <th class="text-dark bg-white">Usuarios</th>
                          <th class="text-dark bg-white">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>

                        @if (count($pregArr) <= 0)
                            <tr>
                              <td colspan="6">Sin resultados</td>
                            </tr>
                        @else

                        @foreach ( $pregArr as $preg)
                        <tr class="text-white bg-dark">
                          {{-- <td>{{$preg['COD_PREG']}}</td> --}}
                          <td>{{$preg['PREGUNTA']}}</td>
                          <td>{{$preg['USR']}}</td>
                          <td class="text-center">
                              <button type="button" 
                                      class="btn btn-info"  
                                      data-toggle="modal" 
                                      data-target="#modal-editar-{{$preg['COD_PREG']}}">Editar
                              </button>
                          </td>          
                        </tr>

                        <!-- INICIO MODAL PARA NUEVA  -->
                        <div class="modal-container">
                          <div class="modal fade bd-example-modal-lg" id="modal-editar-{{$preg['COD_PREG']}}">
                                <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                          <div class="modal-dialog modal-md">
                          <div class="modal-content">
                                <!-- CABECERA DEL DIALOGO NUEVA-->
                          <div class="modal-header">
                          <h4 class="modal-title">Editar Preguntas y Respuestas</h4>
                                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                          </div>
                                <!-- CUERPO DEL DIALOGO NUEVA -->
                          <div class="modal-body">
                          <center>
                          <form action="{{ route('preguntas.actualizar') }}" method="post">
                          @csrf @method('PUT')
                          <input name="COD_USR" type="hidden" value="{{$preg['COD_PREG']}}">
                          <label class="form-label">
                            Preguntas
                            <input 
                              type='text' 
                              name='PREGUNTA'
                              id="pregunta"
                              onkeyup="validarPreg(this)"
                              size="50" maxlength="100" 
                              class="form-control text-white"
                              value="{{$preg['PREGUNTA']}}"  
                              required>
                              <center>
                                <div style="background-color: white; opacity: 0.5;" id="divpreg"></div>
                              </center>
                          </label>
                          <br>
                          <label class="form-label">
                                Nueva respuesta
                            <input 
                              type='text' 
                              name='RESPUESTA'
                              id="respuesta"
                              onkeyup="validarRes(this)"
                              size="50" maxlength="100" 
                              class="form-control text-white"
                              value=""  
                              required>
                              <center>
                                <div style="background-color: white; opacity: 0.5;" id="divcres"></div>
                              </center>
                            </label>
                          <label class="form-label">
                          </label>
                          <br>

                          <a href="" class="btn btn-secondary">Cancelar</a>
                          <button type="submit" class="btn btn-primary">Aceptar</button>
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
                              {{-- <div class="modal-container">
                                <div class="modal fade bd-example-modal-lg" id="dialogo2">
                                      <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
                                  <div class="modal-dialog modal-sm">
                                  
                                  <div class="modal-content">
                                      <!-- CABECERA DEL DIALOGO EDITAR -->
                                  <div class="modal-header ">
                                  <h4 class="modal-title">Editar Preguntas</h4>
                                      <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                  </div>
                                
                                      <!-- CUERPO DEL DIALOGO EDITAR -->
                                  <div class="modal-body">
                                  <center>
                                  <form action="" method="post">
                                  <label class="form-label">
                                  Preguntas
                                  <input 
                                    type='text' 
                                    name='PREGUNTAS' 
                                    class="form-control text-white" required></input> 
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
                              </div> --}}
                              <!-- FIN DE MODAL PARA EDITAR  -->

                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                  <div id="paginador"></div>
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
  
        </div>
        <!-- FINAL PANEL PREGUNTAS  -->

        
 
        {{-- <!-- INICIO MODAL PARA BORRAR  --> 
        <div class="modal-container">
             <div class="modal fade bd-example-modal-lg" id="dialogo3">
                   <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
              <div class="modal-dialog modal-sm">
              <div class="modal-content">
                   <!-- CABECERA DEL DIALOGO EDITAR -->
              <div class="modal-header">
              <h4 class="modal-title">Eliminar preguntas</h4>
                   <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
              </div>
                   <!-- CUERPO DEL DIALOGO BORRAR -->
              <div class="modal-body">
              <center>
              <form action="" method="post">
              <label class="form-label">¿ Desea eliminar pregunta ?</label>
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
        </div> --}}
        <!-- FIN DE MODAL PARA BORRAR  -->
</main>
          @section('js')
          <script src="{{ asset('assets/js/ab-usuarios.js') }}"></script>
          <script src="{{ asset('assets/js/ab-page.js') }}"></script>
          @endsection
@endsection