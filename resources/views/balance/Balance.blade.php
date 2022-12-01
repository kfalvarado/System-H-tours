@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
    Balance General
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
    @if (Cache::get('genero'))
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
    {{ asset('assets/images/varon.png') }}
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
    {{ Cache::get('user') }}
@endsection
<!-- contenido de la pagina  -->
@section('contenido')
    <!-- INICIO MODAL PARA NUEVA  -->
    <div class="modal-container">
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
            <!-- COLOCARLE UN lg PARA TAMANO MEDIANO COLOCARLE UN sm PARA TAMANO PEQUENO -->
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- CABECERA DEL DIALOGO NUEVA-->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <center> Seleccionar Periodo</center>
                        </h4>
                        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    </div>
                    <!-- CUERPO DEL DIALOGO NUEVA -->
                    <div class="modal-body">
                        <center>
                            <form action="{{ route('balance.insertar') }}" method="post">
                                @csrf
                                <Label>Seleccionar periodo</Label>
                                <select class="form-control text-white" name="periodo" id="">
                                    <option value="" selected></option>
                                    @foreach ($personArr as $periodo)
                                        <option value="{{ $periodo['COD_PERIODO'] }}">{{ $periodo['NOM_PERIODO'] }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <br>
                                <a href="" class="btn btn-secondary">Cancelar</a>
                                <button class="btn btn-primary">Aceptar</button>
                            </form>
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE MODAL PARA NUEVA  -->

    <div class="content-wrapper">
        @if (count($balanceArr)>0)
        
        @foreach ($balanceArr as $key)
        <center>
            <h1>Balance General Empresa {{ $key['NOMBRE_EMPRESA'] }}</h1>
        </center>
        @endforeach

        @else
        <center>
            <h1>Balance General</h1>
        </center>
        @endif
        <h5>________________________________________________________________________________________________________________
        </h5>
        <!-- <ul class="nav nav-pills nav-stacked">
                                      <li class="active"><a href="#"></a></li>
                                    </ul> -->
        <center>
            @if (count($balanceArr) >0 )
                @foreach ($balanceArr as $key)
                    
                <h1 id="nombre-periodo">{{ $key['PERIODO'] }}</h1>
                <center>
                    <br>
                    <h3>Desde: <input type="date" aria-label="Disabled input example" value="{{ substr($key['FECHA_INICIAL'],0,10)}}" readonly> Hasta: <input
                            type="date" value="{{ substr($key['FECHA_FINAL'],0,10)}}" readonly></h3>
                </center>
                @endforeach
            @else
            <h1> Periodo </h1>
            @endif
        </center>
        <!-- <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#"></a></li>
                                      </ul> -->

       
        <br>
        <p align="right" valign="baseline">
            <a type="button" href="{{ route('mostrar.libromayor') }}" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i> Verificar</a>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#dialogo1"><i class="mdi mdi-calendar-check"></i> Periodo</button>
            <a type="button" href="{{route('periodo.pdf')}}" class="btn btn-danger btn-sm"  ><i class="mdi mdi-file-pdf"></i>Generar PDF</a>
            <button id="btnExportar" class="btn btn-success btn-sm">
                <i class="mdi mdi-file-excel"></i> Generar Excel
            </button> 
        </p>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"></a></li>
        </ul>
        <div class="page-header">

        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body ">
                        <center>
                            <h4 class="card-title">Activos</h4>
                        </center>

                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual">
                                <thead>
                                    <tr>
                                        <th class="text-dark bg-white" colspan="3">
                                            <center> Activo Corriente</center>
                                        </th>
                                    </tr>
                                    <tr class="text-dark bg-white">
                                        <th class="text-dark bg-white">#</th>
                                        <th class="text-dark bg-white">Cuenta</th>
                                        <th class="text-dark bg-white">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($activoc <= 0)
                                        <tr class="text-white bg-dark">
                                            <td colspan="3">No hay resultados</td>

                                        </tr>
                                    @else
                                        @foreach ($activoc as $key)
                                            <tr class="text-white bg-dark">
                                                <td>{{ $key['COD_CUENTA'] }}</td>
                                                <td>{{ $key['NOM_CUENTA'] }}</td>
                                                <td>{{ $key['SAL_DEBE'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td class="text-dark bg-white" colspan="3">
                                            <center><b> Activo no corrientes</b></center>
                                        </td>
                                    </tr>
                                    @if ($activon <= 0)
                                        <tr class="text-white bg-dark">
                                            <td colspan="3">No hay resultados</td>

                                        </tr>
                                    @else
                                        @foreach ($activon as $key)
                                            <tr class="text-white bg-dark">
                                                <td>{{ $key['COD_CUENTA'] }}</td>
                                                <td>{{ $key['NOM_CUENTA'] }}</td>
                                                <td>{{ $key['SAL_DEBE'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>

                                        <td class="text-dark bg-white" colspan="2">
                                            <center>Total activos</center>
                                        </td>
                                        @if (count($balanceArr) <= 0)
                                            <td class="text-dark bg-white"> <b>0.00</b> </td>
                                        @else
                                            @foreach ($balanceArr as $key)
                                                <td class="text-dark bg-white"> <b>{{ $key['TOTAL_ACTIVOS'] }}</b> </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title">Pasivos</h4>
                        </center>
                        <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual">
                                <thead>
                                    <tr>
                                        <th class="text-dark bg-white" colspan="3">
                                            <center> Pasivos Corrientes</center>
                                        </th>
                                    </tr>
                                    <tr class="text-dark bg-white">
                                        <th class="text-dark bg-white">#</th>
                                        <th class="text-dark bg-white">Cuentas</th>
                                        <th class="text-dark bg-white">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pasivoc <= 0)
                                        <tr class="text-white bg-dark">
                                            <td colspan="3">No hay resultados</td>

                                        </tr>
                                    @else
                                        @foreach ($pasivoc as $key)
                                            <tr class="text-white bg-dark">
                                                <td>{{ $key['COD_CUENTA'] }}</td>
                                                <td>{{ $key['NOM_CUENTA'] }}</td>
                                                <td>{{ $key['SAL_HABER'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td class="text-dark bg-white" colspan="3">
                                            <center>Pasivos no corrientes</center>
                                        </td>
                                    </tr>
                                    @if ($pasivon <= 0)
                                        <tr class="text-white bg-dark">
                                            <td colspan="3">No hay resultados</td>
                                        </tr>
                                    @else
                                        @foreach ($pasivon as $key)
                                            <tr class="text-white bg-dark">
                                                <td>{{ $key['COD_CUENTA'] }}</td>
                                                <td>{{ $key['NOM_CUENTA'] }}</td>
                                                <td>{{ $key['SAL_HABER'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td class="text-dark bg-white" colspan="2">
                                            <center>Total pasivos</center>
                                        </td>
                                        @if (count($balanceArr) <= 0)
                                            <td class="text-dark bg-white"> <b>0.00</b> </td>
                                        @else
                                            @foreach ($balanceArr as $key)
                                                <td class="text-dark bg-white"> <b>{{ $key['TOTAL_PASIVOS'] }}</b> </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title">Patrimonio</h4>
                        </center>
                        <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual">
                                <thead>
                                    <tr class="text-dark bg-white">
                                        <th class="text-dark bg-white">#</th>
                                        <th class="text-dark bg-white">Cuentas</th>
                                        <th class="text-dark bg-white">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($patrimonio <= 0)
                                        <tr class="text-white bg-dark">
                                            <td colspan="3">No hay resultados</td>
                                        </tr>
                                    @else
                                        @foreach ($patrimonio as $key)
                                            <tr class="text-white bg-dark">
                                                <td>{{ $key['COD_CUENTA'] }}</td>
                                                <td>{{ $key['NOM_CUENTA'] }}</td>
                                                <td>{{ $key['SAL_HABER'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td class="text-dark bg-white" colspan="2">
                                            <center>Total Patrimonio</center>
                                        </td>
                                        @if (count($balanceArr) <= 0)
                                            <td class="text-dark bg-white"> <b>0.00</b> </td>
                                        @else
                                            @foreach ($balanceArr as $key)
                                                <td class="text-dark bg-white"> <b>{{ $key['TOTAL_PATRIMONIOS'] }}</b> </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title">Saldos Balance</h4>
                        </center>
                        <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual">
                                <thead>
                                    <tr class="text-dark bg-white">
                                        <th class="text-dark bg-white">#</th>
                                        <th class="text-dark bg-white">Periodo</th>
                                 
                                        <th class="text-dark bg-white">Total Activo</th>
                                        <th class="text-dark bg-white">Total Pasivo + Patrimonio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-white bg-dark">
                                        <td>1</td>
                                        @if (count($balanceArr)<=0)
                                        
                                        <td>Periodo </td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        
                                        @else
                                        
                                        @foreach ($balanceArr as $key)
                                        <td>{{ $key['PERIODO'] }}</td>
                                        
                                        <td>{{ $key['TOTAL_ACTIVOS'] }}</td>
                                        
                                        <td>{{ $key['TOTAL_PASIVOS'] + $key['TOTAL_PATRIMONIOS']}}</td>
                                        @endforeach
                                        @endif
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
