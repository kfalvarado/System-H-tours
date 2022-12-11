<!DOCTYPE html>
<html lang="en">
<input type="hidden" value=" {{ setlocale(LC_TIME, 'spanish') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Balance | PDF </title>
    <!-- ESTE CSS ES PARA OCULTAR DATOS EN LA IMPRESION-->
    <style>
        @media print {

            .oculto-impresion,
            .oculto-impresion * {
                display: none !important;
            }
        }
    </style>

</head>

<body>

    <main class="container">
        <div class="container-fluid mt-3 mb-3">
            <div class="d-grid gap-2 oculto-impresion">
                <a class="btn btn btn-outline-primary " href="javascript:window.print();">
                    <h3>Imprimir</h3>
                </a>
            </div>
        </div>

        <img id="imagen" style="float: right;" src="{{ asset('assets\images\HTOURS.png') }}" alt="logo de Htours"
            height="100" width="100">

        <div class="container">
            <center>
                <h3 id="titulo">Reporte de Balance General</h3>
                <div class="row">
                    <h4>Generado por : {{ Cache::get('user') }} - {{ Cache::get('rol') }}</h4>
                    <h6 id="fecha">Fecha de emisión - {{ date('d/m/Y') }} | Hora - {{ date('H:i:s a') }}</h6>
                    <h6>Al {{ date('d') }} de {{ strftime('%B') }} del año {{ date('Y') }}</h6>
                </div>

                <br>
                <div class="table">
                    <center>
                        <h4 class="card-title">Activos</h4>
                    </center>
                    <table id="datos" class="table table-bordered table-contextual table_id"
                        style=" border: 1px ridge black;">

                        <tr>
                            <td class="text-dark bg-white" colspan="3">
                                <center> <u> <b> Activos Corrientes </b></u></center>
                            </td>
                        </tr>
                        <tr class="text-dark bg-white">
                            <td class="text-dark bg-white"> <b> # </b></td>
                            <td class="text-dark bg-white"> <b> Cuentas</b></td>
                            <td class="text-dark bg-white"> <b>Total</b></td>
                        </tr>

                        <tbody>
                            @if ($activoc <= 0)
                                <tr>
                                    <td colspan="3">No hay resultados</td>

                                </tr>
                            @else
                                @foreach ($activoc as $key)
                                    <tr>
                                        <td>{{ $key['COD_CUENTA'] }}</td>
                                        <td>{{ $key['NOM_CUENTA'] }}</td>
                                        <td>{{ number_format($key['SAL_DEBE']) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <td class="text-dark bg-white" colspan="3">
                                    <center> <u> <b> Activo no corrientes</b> </u></center>
                                </td>
                            </tr>
                            @if ($activon <= 0)
                                <tr>
                                    <td colspan="3">No hay resultados</td>

                                </tr>
                            @else
                                @foreach ($activon as $key)
                                    <tr>
                                        <td>{{ $key['COD_CUENTA'] }}</td>
                                        <td>{{ $key['NOM_CUENTA'] }}</td>
                                        <td>{{ number_format($key['SAL_DEBE']) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>

                                <td class="text-dark bg-white" colspan="2">
                                    <center> <b> Total activos </b></center>
                                </td>
                                @if (count($balanceArr) <= 0)
                                    <td class="text-dark bg-white"> <b>0.00</b> </td>
                                @else
                                    @foreach ($balanceArr as $key)
                                        <td class="text-dark bg-white">
                                            <b>{{ number_format($key['TOTAL_ACTIVOS']) }}</b> </td>
                                    @endforeach
                                @endif
                            </tr>
                            <tr class="text-white bg-dark">
                                <td class="text-dark bg-white" colspan="3">
                                    <center> <u> <b>Pasivos Corrientes </b></u> </center>
                                </td>
                            </tr>
                            <tr class="text-dark bg-white">
                                <td class="text-dark bg-white"> <b> # </b></td>
                                <td class="text-dark bg-white"> <b> Cuentas</b></td>
                                <td class="text-dark bg-white"> <b>Total</b></td>
                            </tr>
                            @if ($pasivoc <= 0)
                                <tr class="text-white bg-dark">
                                    <td colspan="3">No hay resultados</td>

                                </tr>
                            @else
                                @foreach ($pasivoc as $key)
                                    <tr>
                                        <td>{{ $key['COD_CUENTA'] }}</td>
                                        <td>{{ $key['NOM_CUENTA'] }}</td>
                                        <td>{{ number_format($key['SAL_HABER']) }}</td>
                                    </tr>
                                @endforeach
                            @endif


                            <tr>
                                <td class="text-dark bg-white" colspan="3">
                                    <center> <u><b> Pasivos no corrientes </b> </u> </center>
                                </td>
                            </tr>
                            @if ($pasivon <= 0)
                                <tr class="text-white bg-dark">
                                    <td colspan="3">No hay resultados</td>
                                </tr>
                            @else
                                @foreach ($pasivon as $key)
                                    <tr>
                                        <td>{{ $key['COD_CUENTA'] }}</td>
                                        <td>{{ $key['NOM_CUENTA'] }}</td>
                                        <td>{{ number_format($key['SAL_HABER']) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <td class="text-dark bg-white" colspan="2">
                                    <center> <b>Total pasivos</b> </center>
                                </td>
                                @if (count($balanceArr) <= 0)
                                    <td class="text-dark bg-white"> <b>0.00</b> </td>
                                @else
                                    @foreach ($balanceArr as $key)
                                        <td class="text-dark bg-white">
                                            <b>{{ number_format($key['TOTAL_PASIVOS']) }}</b> </td>
                                    @endforeach
                                @endif
                            </tr>
                            <tr class="text-dark bg-white">
                                <td class="text-dark bg-white" colspan="3">
                                    <center> <u> <b> Patrimonios</b> </u></center>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-dark bg-white"> <b> #</b></td>
                                <td class="text-dark bg-white"> <b> Cuentas</b></td>
                                <td class="text-dark bg-white"> <b> Tota</b></td>
                            </tr>
                            @if ($patrimonio <= 0)
                                <tr class="text-white bg-dark">
                                    <td colspan="3">No hay resultados</td>
                                </tr>
                            @else
                                @foreach ($patrimonio as $key)
                                    <tr>
                                        <td>{{ $key['COD_CUENTA'] }}</td>
                                        <td>{{ $key['NOM_CUENTA'] }}</td>
                                        <td>{{ number_format($key['SAL_HABER']) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <td class="text-dark bg-white" colspan="2">
                                    <center><b>Total Patrimonio </b> </center>
                                </td>
                                @if (count($balanceArr) <= 0)
                                    <td class="text-dark bg-white"> <b>0.00</b> </td>
                                @else
                                    @foreach ($balanceArr as $key)
                                        <td class="text-dark bg-white">
                                            <b>{{ number_format($key['TOTAL_PATRIMONIOS']) }}</b> </td>
                                    @endforeach
                                @endif
                        </tbody>
                    </table>
                    <table id="datos" class="table table-bordered table-contextual table_id"
                        style=" border: 1px ridge black;">
                        <tr class="text-dark bg-white">
                            <td class="text-dark bg-white" colspan="4">
                                <center> <b>Saldos</b> </center>
                            </td>
                        </tr>
                        <tr class="text-dark bg-white">
                            <td class="text-dark bg-white">#</td>
                            <td class="text-dark bg-white">Periodo</td>

                            <td class="text-dark bg-white">Total Activo</td>
                            <td class="text-dark bg-white">Total Pasivo + Patrimonio</td>
                        </tr>
                        <tbody>
                            <tr>
                                <td>1</td>
                                @if (count($balanceArr) <= 0)

                                    <td>Periodo </td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                @else
                                    @foreach ($balanceArr as $key)
                                        <td>{{ $key['PERIODO'] }}</td>

                                        <td>{{ number_format($key['TOTAL_ACTIVOS']) }}</td>

                                        <td>{{ number_format($key['TOTAL_PASIVOS'] + $key['TOTAL_PATRIMONIOS']) }}</td>
                                    @endforeach
                                @endif
                            </tr>
                    </table>
                </div>
                {{-- @if (count($bitacoraArr) > 12)  --}}


                <img id="imagen" style="float: right;" src="{{ asset('assets\images\HTOURS.png') }}"
                    alt="logo de Htours" height="100" width="100">

                {{-- @endif --}}
            </center>
        </div>




        <script>
            function imprimir() {
                var titulo = document.getElementById('titulo').innerText,
                    data = document.getElementById('datos').innerText,
                    fecha = document.getElementById('fecha').innerText;
                var img = document.getElementById('imagen');

                var doc = new jsPDF();
                doc.setFontSize(22);
                doc.text('Empresa H Tours S. de R. L', 60, 10);
                doc.setFontSize(22);
                doc.text(titulo, 80, 20);
                doc.setFontSize(11);
                doc.text(fecha, 10, 30);
                doc.setFontSize(16);
                doc.addImage(img, 150, 10, 60, 30)
                doc.text(data, 10, 60);
                doc.save('Reporte-Bitacora.pdf');
            }
        </script>

    </main>

</body>

</html>
