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

@if (Session::has('actualizado'))
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
  
              <img src="" alt="Profile" class="rounded-circle" width="150">
              <h3>Usuario</h3>
              <h3>Administrador</h3>
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
      
                      <li class="nav-item mr-3">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Configuraciones</button>
                      </li>
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar contraseña</button>
                      </li>
      
                  </ul>
  
                  <div class="tab-content pt-2">
                      <!-- RESUMEN -->
                      <div class="tab-pane fade show active profile-overview text-white" id="profile-overview">
                          <h5 class="card-title">Resumen</h5>
                          <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
                      
                          <h5 class="card-title">Detalles de perfil</h5>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Nombre</div>
                            <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                          </div>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Empresa</div>
                            <div class="col-lg-9 col-md-8">hTours</div>
                          </div>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Cargo</div>
                            <div class="col-lg-9 col-md-8">Administrador</div>
                          </div>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">País</div>
                            <div class="col-lg-9 col-md-8">Honduras</div>
                          </div>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Dirección</div>
                            <div class="col-lg-9 col-md-8"></div>
                          </div>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Telefono</div>
                            <div class="col-lg-9 col-md-8">+504 9999-0000</div>
                          </div>
                      
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Correo electronico</div>
                            <div class="col-lg-9 col-md-8">ejemplo@gmail.com</div>
                          </div>
                      
                      </div>
  
                      <!-- EDITAR PERFIL -->
                      <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
  
                          <!-- EDITAR PERFIL FORMULARIO -->
                          <form>
                            <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagen de perfil</label>
                              <div class="col-md-8 col-lg-9">
                                <img src="" alt="Profile" width="100">
                                <div class="pt-2">
                                  <a href="#" class="btn btn-primary btn-sm mr-2" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                  <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                </div>
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="fullName" type="text" class="form-control" id="fullName" value="Paola">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="about" class="col-md-4 col-lg-3 col-form-label">Resumen</label>
                              <div class="col-md-8 col-lg-9">
                                <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Empresa</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="company" type="text" class="form-control text-white" id="company" value="H Tours">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Job" class="col-md-4 col-lg-3 col-form-label">Cargo</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="job" type="text" class="form-control" id="Job" value="Administrador">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">País</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="country" type="text" class="form-control" id="Country" value="HN">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Address" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="address" type="text" class="form-control" id="Address" value="Ciudad">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="phone" type="text" class="form-control" id="Phone" value="+504 9999-0000">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="Email" class="col-md-4 col-lg-3 col-form-label">Correo electronico</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="Email" value="paola@gmail.com">
                              </div>
                            </div>
        
                          
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-shadow">Guardar cambios</button>
                            </div>
                          </form>
                          <!-- FINAL DE EDITAR PERFIL -->
        
                      </div>
  
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
                                  class="form-control" 
                                  id="currentPassword">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                              <div class="col-md-8 col-lg-9">
                                <input 
                                  name="CONTRASEGNA" 
                                  type="password" 
                                  class="form-control" 
                                  id="newPassword">
                              </div>
                            </div>
        
                            <div class="row mb-3">
                              <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-ingresar nueva contraseña</label>
                              <div class="col-md-8 col-lg-9">
                                <input 
                                  name="" 
                                  type="password" 
                                  class="form-control" 
                                  id="renewPassword">
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