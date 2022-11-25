@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Estado Finaciero
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
            <form action="" method="post">
              <Label>Seleccionar periodo</Label>
              <select class="form-control text-white" name="" id="">
                <option value="" selected></option>
                <option value="">periodo-2020-ene-1-001</option>
                <option value="">periodo-2021-ene-1-002</option>
                <option value="">periodo-2022-ene-1-003</option>
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
            <center> <h1>Estado de Resultado H Tours Honduras</h1> </center>
            <h5>________________________________________________________________________________________________________________</h5>
            <!-- <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"></a></li>
            </ul> -->
            <center> <h1>Periodo-2021-ene-1-001</h1>
              
              <!-- <h1 id="nombre-periodo"></h1> </center> -->
              <!-- <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"></a></li>
              </ul> -->
              
              
              <center>
                <br>
                <h3> Desde: <input  type="date"  aria-label="Disabled input example" value="2021-01-01"  readonly >  Hasta: <input type="date" value="2021-12-31" readonly></h3>
              </center>
              <p align="right" valign="baseline">
               
              </p>
              
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
             
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <center><h3 class="card-title">Detalle</h3></center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-condensed table-bordered table-hover ">
                        <thead>
                           <tr class="text-dark">
                            <th class="text-dark bg-gradient-secondary"><b>Ventas Netas</b></th>
                            <th class="text-white bg-dark" >50,000</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                           <tr class="text-white bg-dark">
                            <td class="text-dark bg-gradient-secondary"> <b>Costos de ventas</b> </td>
                            <td>10,000</td>
                             
                          </tr>
                           <tr class="text-white bg-dark">
                            <td class="text-dark bg-gradient-secondary"><B>Utilidad/perdida bruta</B></td>
                            <td>40,000</td>
                             
                          </tr>
                           <tr class="text-white bg-dark">
                            <td class="text-dark bg-gradient-secondary" ><b> Total Gastos </b></td>
                            <td>5,000</td>
                           
                            </tr>
                            <tr class="text-white bg-dark">
                              <td class="text-dark bg-gradient-secondary" ><b> Utilidad/Perdida Antes de impuestos </b></td>
                              <td>10,000</td>
                              
                              </tr>
                              <tr class="text-white bg-dark">
                                <td class="text-dark bg-gradient-secondary" ><b>Impuesto a  utilidad </b></td>
                                <td>5,250</td>
                               
                                </tr>
                                <tr class="text-white bg-dark">
                                  <td class="text-dark bg-gradient-secondary" ><b> Utilidad/Perdida Neta </b></td>
                                  <td>29,750</td>
                                  
                                  </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        


@endsection