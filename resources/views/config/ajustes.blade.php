@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Ajustes | inicio
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
{{cache::get("rol")}}
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

{{-- encabezado --}}
@section('encabezado')
  <!-- Bootstrap  -->
  {{-- encabezado de boostrap al descomentarlo pone rara la vista --}}
   {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  --}}

@endsection

@section('contenido')

@if (Session::has('contra_actual_incorrecta'))
  <script>
    Swal.fire({
    icon: 'error',
    text: 'Contraseña actual incorrecta'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif

@if (Session::has('actualizado_usr'))
  <script>
    Swal.fire({
    icon: 'success',
    text: 'El usuario se actualizo correctamente'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif

@if (Session::has('actualizado_contra'))
  <script>
    Swal.fire({
    icon: 'success',
    text: 'La contraseña se actualizo correctamente'
    // footer: '<a href="">Why do I have this issue?</a>'
  })
  </script>
@endif

<div class="container">
    <h1 class="mb-5">Ajustes</h1>
</div>
  
<main class="modal-container">
      <div class="row">
  
      <div class="col-xl-4">

        
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <h3>{{cache::get("user")}}</h3>
              <h3>{{cache::get('rol')}}</h3>
            </div>
          </div>
      </div>
  
        <div class="col-xl-8">
            <div class="card ">
                <div class="card-body pt-3">
                  <ul class="nav nav-tabs nav-tabs-bordered nav-justified ">
  
                      <li class="nav-item mr-3 mb-3">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumen</button>
                      </li>
      
                      <li class="nav-item mr-3">
                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                      </li>
                      {{-- 
                      <li class="nav-item mr-3">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Configuraciones</button>
                      </li> --}}
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar contraseña</button>
                      </li>
      
                  </ul>
  
                  <div class="tab-content pt-2">

                    @foreach ($ajustesArr as $ajustes)
                      <!-- RESUMEN -->
                      <div class="tab-pane fade show active profile-overview text-white" id="profile-overview">
                          
                          <h5 class="card-title">Detalles de perfil</h5>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Nombre</div>
                            <div class="col-lg-9 col-md-8">{{$ajustes['NOM_USR']}}</div>
                          </div>

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Estado usuario</div>
                            <div class="col-lg-9 col-md-8">{{$ajustes['EST_USR']}}</div>
                          </div>
                          
                          {{-- INICIO GÉNERO --}}
                          @if ($ajustes['SEX_PERSONA'] == "F")

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Género</div>
                            <div class="col-lg-9 col-md-8">FEMENINO</div>
                          </div>

                          @else 

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Género</div>
                            <div class="col-lg-9 col-md-8">MASCULINO</div>
                          </div>
                            
                          @endif
                          {{-- FIN GÉNERO --}}
                          
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Edad</div>
                            <div class="col-lg-9 col-md-8">{{$ajustes['EDA_PERSONAL']}}</div>
                          </div>
                          

                          @if ($ajustes['TIP_PERSONA'] == "N")

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Tipo de persona</div>
                            <div class="col-lg-9 col-md-8">NORMAL</div>
                          </div>
                          
                          @else

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Tipo de persona</div>
                            <div class="col-lg-9 col-md-8">JURIDICA</div>
                          </div>

                          @endif
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Numero ID</div>
                            <div class="col-lg-9 col-md-8">{{$ajustes['NUM_IDENTIDAD']}}</div>
                          </div>
                          
                          @if($ajustes['IND_CIVIL'] == "S")

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Estado civil</div>
                            <div class="col-lg-9 col-md-8">SOLTERO</div>
                          </div>

                          @elseif($ajustes['IND_CIVIL'] == "C")

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Estado civil</div>
                            <div class="col-lg-9 col-md-8">CASADO</div>
                          </div>

                          @elseif($ajustes['IND_CIVIL'] == "D")

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Estado civil</div>
                            <div class="col-lg-9 col-md-8">DIVORCIADO</div>
                          </div>

                          @else

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Estado civil</div>
                            <div class="col-lg-9 col-md-8">VIUDO</div>
                          </div>

                          @endif
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Teléfono</div>
                            <div class="col-lg-9 col-md-8">{{$ajustes['TELEFONO']}}</div>
                          </div>
                      
                      </div>
                    @endforeach
  
                      <!-- EDITAR PERFIL -->
                      <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
  
                          <!-- EDITAR PERFIL FORMULARIO -->
                          <form action="{{ route('ajustes.actualizar_usr') }}" >
                            @csrf @method('PUT') 
                            <input name="COD_PERSONA" type="hidden" value="{{$ajustes['COD_PERSONA']}}">
                            <input name="COD" type="hidden" value="{{$ajustes['COD_USER']}}">
        
                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre de usuario</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="NOM_USR" type="text" class="form-control text-white" id="fullName" placeholder="NOMBRE DE USUARIO" value="{{$ajustes['NOM_USR']}}">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="about" class="col-md-4 col-lg-3 col-form-label">Género</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="SEX_PERSONA" type="text" class="form-control text-white" id="about" placeholder="GÉNERO" value="{{$ajustes['SEX_PERSONA']}}" >
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="age" class="col-md-4 col-lg-3 col-form-label">Edad</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="EDA_PERSONAL" type="number" class="form-control text-white" id="age" placeholder="EDAD" value="{{$ajustes['EDA_PERSONAL']}}">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Job" class="col-md-4 col-lg-3 col-form-label">Tipo de persona</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="TIP_PERSONA" type="text" class="form-control text-white" id="Job" placeholder="TIPO DE PERSONA" value="{{$ajustes['TIP_PERSONA']}}">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="ID" class="col-md-4 col-lg-3 col-form-label">Identidad</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="NUM_IDENTIDAD" type="text" class="form-control text-white" id="ID" placeholder="Nr° ID" value="{{$ajustes['NUM_IDENTIDAD']}}">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Address" class="col-md-4 col-lg-3 col-form-label">Estado Civil</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="IND_CIVIL" type="text" class="form-control text-white" id="Address" placeholder="ESTADO CIVIL" value="{{$ajustes['IND_CIVIL']}}">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Teléfono</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="TELEFONO" type="tel" class="form-control text-white" id="Phone" placeholder="TELÉFONO" value="{{$ajustes['TELEFONO']}}">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="" class="col-md-4 col-lg-3 col-form-label">Tipo de telefono</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="TIP_TELEFONO" type="tel" class="form-control text-white" id="Email" placeholder="TIPO DE TELÉFONO" value="{{$ajustes['TIP_TELEFONO']}}">
                              </div>
                            </div>
        
                          
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-shadow">Guardar cambios</button>
                            </div>
                          </form>
                          <!-- FINAL DE EDITAR PERFIL -->
        
                      </div>
  {{-- 
                      <!-- CONFIGURAR PERFIL -->
                      <div class="tab-pane fade pt-3" id="profile-settings">
  
                          <!-- FORMULARIO DE CONFIGURAR -->
                          <form>
        
                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Configuración a accesos</label>
                              <div class="col-md-8 col-lg-8">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                  <label class="form-check-label" for="changesMade">
                                    Administrar usuarios
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                  <label class="form-check-label" for="newProducts">
                                    Informacion usuarios
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="proOffers">
                                  <label class="form-check-label" for="proOffers">
                                    Accesos
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="securityNotify">
                                  <label class="form-check-label" for="securityNotify">
                                    Modificaciones
                                  </label>
                                </div>
                              </div>
                            </div>
        
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                          </form><!-- End settings Form -->
        
                      </div>
   --}}
                      <!-- CAMBIAR CONTRASEÑA -->
                      <div class="tab-pane fade pt-3" id="profile-change-password">
                          
                          <!-- Change Password Form -->
                          <form action="{{ route('ajustes.actualizar') }}" >
                            @csrf @method('PUT') 
        
                            <div class="row mb-3">
                              <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                              <div class="col-md-8 col-lg-9">
                                <input 
                                  name="CONTRA_ACTUAL" 
                                  type="password" 
                                  {{-- type="text"  --}}
                                  class="form-control" 
                                  id="currentPassword"
                                  required>
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                              <div class="col-md-8 col-lg-9">
                                <input 
                                  name="CONTRASEGNA" 
                                  type="password"
                                  {{-- type="text"  --}}
                                  class="form-control" 
                                  id="newPassword"
                                  required>
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-ingresar nueva contraseña</label>
                              <div class="col-md-8 col-lg-9">
                                <input 
                                  name="" 
                                  type="password" 
                                  {{-- type="text" --}}
                                  class="form-control" 
                                  id="renewPassword"
                                  required>
                              </div>
                            </div>
        
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-shadow">Cambiar contraseña</button>
                            </div>
                          </form><!-- End Change Password Form -->
        
                        </div>
                      </div>
  
  
                </div>
            </div>
        </div>
  
  
      </div>

</main>


 <!-- ICONOS BOOTSTRAP -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" integrity="sha384-ejwKkLla8gPP8t2u0eQyL0Q/4ItcnyveF505U0NIobD/SMsNyXrLti6CWaD0L52l" crossorigin="anonymous">
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 
@endsection