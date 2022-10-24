@extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Balance General
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

<div class="main-panel">
          <div class="content-wrapper">
            <center> <h1>Balance General H Tours Honduras</h1> </center>
            <h5>________________________________________________________________________________________________________________</h5>
            <!-- <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"></a></li>
            </ul> -->
            <center> <h1>Periodo</h1>
              
              <h1 id="nombre-periodo">1-2021-ene-1-001</h1> </center>
              <!-- <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"></a></li>
              </ul> -->
              
              
              <center>
                <br>
                <h3>Desde: <input  type="date"  aria-label="Disabled input example" value="2021-01-01"  readonly >  Hasta: <input type="date" value="2021-12-31" readonly></h3>
              </center>
              <p align="right" valign="baseline">
                <a type="button" href="libro_mayor.html" class="btn btn-success">Verificar</a> 
                <button type="button"  class="btn btn-success"  data-toggle="modal" data-target="#dialogo1">Periodo</button> 
             <a type="button"  class="btn btn-success" href="javascript:window.print();">Generar PDF</a>
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
                    <center><h4 class="card-title">Activos</h4></center>
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                           <tr class="text-dark bg-white">
                            <th class="text-dark bg-white">Libro Mayor</th>
                            <th class="text-dark bg-white">Cuenta</th>
                            <th class="text-dark bg-white">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                           <tr class="text-white bg-dark">
                            <td>1</td>
                            <td>Bancos</td>
                            <td>5000</td>
                            
                          </tr>
                           <tr class="text-white bg-dark">
                            <td>2</td>
                            <td>Caja</td>
                            <td>6000</td>
                            
                          </tr>
                           <tr class="text-white bg-dark">
                            <td>3</td>
                            <td>Efectivo</td>
                            <td>7000</td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <center><h4 class="card-title">Pasivos</h4></center>
                    <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr class="text-dark bg-white">
                            <th class="text-dark bg-white">Libro Mayor</th>
                            <th class="text-dark bg-white">Cuentas</th>
                             <th class="text-dark bg-white">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td>4</td>
                            <td>Proveedores</td>
                            <td>1000</td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>5</td>
                            <td>Documentos por pagar</td>
                            <td>3000</td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>6</td>
                            <td>Prestamos Bancarios</td>
                            <td>3000</td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <center><h4 class="card-title">Patrimonio</h4></center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr class="text-dark bg-white">
                            <th class="text-dark bg-white">Libro Mayor</th>
                            <th class="text-dark bg-white">Cuentas</th>
                             <th class="text-dark bg-white">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td>7</td>
                            <td>Capital</td>
                            <td>3000</td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>8</td>
                            <td>Reserva Legal</td>
                            <td>3000</td>
                          </tr>
                          <tr class="text-white bg-dark">
                            <td>9</td>
                            <td>Otras Reservas</td>
                            <td>7000</td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <center><h4 class="card-title">Saldos Balance</h4></center>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr class="text-dark bg-white">
                            <th class="text-dark bg-white">#</th>
                            <th class="text-dark bg-white">Periodo</th>
                             <th class="text-dark bg-white">Fecha</th>
                             <th class="text-dark bg-white">Total Activo</th>
                             <th class="text-dark bg-white">Total Pasivo + Patrimonio</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-white bg-dark">
                            <td>1</td>
                            <td>1-2021-ene-1-001</td>
                            <td>31/12/2021</td>
                            <td>18,000</td>
                            <td>18,000</td>
                          </tr>
                      </table>
                    </div>
                  </div>
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

@endsection