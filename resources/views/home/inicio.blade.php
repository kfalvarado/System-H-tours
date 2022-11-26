@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Casa | inicio
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    @if (Cache::get('genero') == 'M')
        {{ asset('assets/images/varon.png') }}
    @else
        {{ asset('assets/images/dama.png') }}
    @endif
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
<!-- contenido de la pagina  -->
@section('contenido')
    <div class="row">
        <!-- usuarios  -->
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">

                            @foreach ($newconteo as $array)
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">Usuarios registrados</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">{{ $array['USUARIOS'] }}</p>
                                </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Cantidad de usuarios activos en el sistema </h6>
                </div>
            </div>
        </div>
        <!-- cuentas  -->
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">Cuentas Registradas</h3>
                                <p class="text-success ml-2 mb-0 font-weight-medium">{{ $array['CUENTAS'] }}</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Cantidad de Cuentas ingresadas en el sistema</h6>
                </div>
            </div>
        </div>
        <!-- subcuentas -->
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">Subcuentas Registradas</h3>
                                <p class="text-success ml-2 mb-0 font-weight-medium">{{ $array['SUBCUENTAS'] }}</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Cantidad de subcuentas ingresadas en el sistema</h6>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">Periodo Activo</h3>
                                <p class="text-success ml-lg-2 mb-0 font-weight-medium">{{ substr($array['PERIODO'], 19) }}
                                </p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Periodo contable actualmente Activo </h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <center>
        <img src="{{ asset('assets/images/HTOURS.png') }}" width="400" height="400">
    </center>
@endsection
