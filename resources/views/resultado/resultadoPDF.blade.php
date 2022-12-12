<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Resultado | PDF </title>
        <!-- ESTE CSS ES PARA OCULTAR DATOS EN LA IMPRESION-->
  <style>
    
    @media print{
      .oculto-impresion, .oculto-impresion *{
        display: none !important;
      }
    }
    </style>

</head>

<body>
    <input type="hidden" value=" {{ setlocale(LC_TIME,"spanish");  }}">
    <main class="container">
        <div class="container-fluid mt-3 mb-3">
            <div class="d-grid gap-2 oculto-impresion">
                <a class="btn btn btn-outline-primary " href="javascript:window.print();"><h3>Imprimir</h3></a>
            </div>
        </div>
       
        <img id="imagen"  style="float: right;" src="{{asset('assets\images\HTOURS.png')}}" alt="logo de Htours" height="100" width="100">
    
        <div class="container">
            <center>
                @foreach ($resultado as $key)
                <h1 id="titulo">Reporte Estado de Resultado EMPRESA {{ $key['EMPRESA'] }}</h1>
                @endforeach
                <div class="row">
                    <h4>Generado por : {{ Cache::get('user') }} - {{ Cache::get('rol') }}</h4>
                    <h6 id="fecha">Fecha - {{date('d/m/Y')}} | Hora - {{date('H:i:s a')}}</h6>
                    <h6>Al {{ date('d') }} de {{ strftime('%B') }} del año {{ date('Y') }}</h6>
                </div>
                
                <br>
                <div class="table">
                    <table id="datos" class="table table-bordered table-contextual table_id" style=" border: 1px ridge black;">
                        <thead>
                        <th colspan="2">REPORTE DE ESTADO RESULTADO</th>
                        </thead>
                        <tr class="text-dark">
                            <th ><b>Ventas Totales</b></th>
                            @if (count($resultado) <= 0)
                                <th>0,000</th>
                            @else
                                @foreach ($resultado as $key)
                                    <th>{{ number_format($key['VENTAS_TOTALES']) }}
                                    </th>
                                @endforeach
                            @endif
                        </tr>
                        <thead>
                            <tr class="text-dark">
                                <th ><b>Descuentos Ventas</b></th>
                                @if (count($resultado) <= 0)
                                    <th>0,000</th>
                                @else
                                    @foreach ($resultado as $key)
                                        <th>{{ number_format($key['DES_VENTAS']) }}
                                        </th>
                                    @endforeach
                                @endif
                            </tr>
                            <tr class="text-dark">
                                <th ><b>Devoluciones Ventas</b></th>
                                @if (count($resultado) <= 0)
                                    <th>0,000</th>
                                @else
                                    @foreach ($resultado as $key)
                                        <th>{{ number_format($key['DEV_VENTAS']) }}
                                        </th>
                                    @endforeach
                                @endif
                            </tr>
                        <tr class="text-dark">
                            <th ><b>Ventas Netas</b></th>
                            @if (count($resultado) <= 0)
                                <th class="text-white bg-success">0,000</th>
                            @else
                                @foreach ($resultado as $key)
                                    <th >{{ number_format($key['VENTAS_NETAS']) }}
                                    </th>
                                @endforeach
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-dark">
                            <th class="text-dark bg-gradient-secondary"><b>Compras Totales</b></th>
                            @if (count($resultado) <= 0)
                                <th>0,000</th>
                            @else
                                @foreach ($resultado as $key)
                                    <th>{{ number_format($key['COMPRAS_TOTALES']) }}
                                    </th>
                                @endforeach
                            @endif

                        </tr>
                        <tr class="text-dark">
                            <th class="text-dark bg-gradient-secondary"><b>Descuentos Compras</b></th>
                            @if (count($resultado) <= 0)
                                <th>0,000</th>
                            @else
                                @foreach ($resultado as $key)
                                    <th>{{ number_format($key['DES_COMPRAS']) }}
                                    </th>
                                @endforeach
                            @endif

                        </tr>
                        <tr class="text-dark">
                            <th class="text-dark bg-gradient-secondary"><b>Devoluciones Compras</b></th>
                            @if (count($resultado) <= 0)
                                <th>0,000</th>
                            @else
                                @foreach ($resultado as $key)
                                    <th>{{ number_format($key['DEV_COMPRAS']) }}
                                    </th>
                                @endforeach
                            @endif

                        </tr>
                        <tr>
                            <td class="text-dark bg-gradient-success"> <b>Costos de ventas</b> </td>
                            @if (count($resultado) <= 0)
                                <td>0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td class="text-white bg-success">{{ number_format($key['COS_VENTAS']) }}</td>
                                @endforeach
                            @endif

                        </tr>
                        <tr>
                            <td class="text-dark bg-gradient-primary"><B>Utilidad/Pérdida bruta</B></td>
                            @if (count($resultado) <= 0)
                                <td class="text-white bg-primary">0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td class="text-white bg-primary">{{ number_format($key['UTI_BRUTA']) }}</td>
                                @endforeach
                            @endif

                        </tr>
                        <tr>
                            <td class="text-dark bg-gradient-secondary"><b> Sueldos y Salarios </b></td>
                            @if (count($resultado) <= 0)
                                <td>0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td>{{ number_format($key['SUEL_SALARI']) }}</td>
                                @endforeach
                            @endif

                        </tr>
                        <tr>
                            <td class="text-dark bg-gradient-secondary"><b> Gastos Ventas </b></td>
                            @if (count($resultado) <= 0)
                                <td>0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td>{{ number_format($key['GAST_VENTAS']) }}</td>
                                @endforeach
                            @endif

                        </tr>
                        <tr>
                            <td class="text-dark bg-gradient-secondary"><b> Gastos Administración </b></td>
                            @if (count($resultado) <= 0)
                                <td>0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td>{{ number_format($key['GAST_ADMINIS']) }}</td>
                                @endforeach
                            @endif

                        </tr>

                        <tr>
                            <td class="text-dark bg-gradient-success"><b> Total Gastos </b></td>
                            @if (count($resultado) <= 0)
                                <td class="text-white bg-success">0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td class="text-white bg-success">{{ number_format($key['TOT_GASTOS']) }}</td>
                                @endforeach
                            @endif

                        </tr>
                        <tr>
                            <td class="text-dark bg-gradient-secondary"><b> Utilidad/Pérdida Antes de
                                    impuestos </b></td>
                            @if (count($resultado) <= 0)
                                <td>0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td>{{ number_format($key['UTI_ANTIMP']) }}</td>
                                @endforeach
                            @endif
                        </tr>
                        <tr>
                            <td class="text-dark bg-gradient-secondary"><b>Impuesto a utilidad </b></td>
                            @if (count($resultado) <= 0)
                                <td>0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td>{{ number_format($key['IMP_UTILIDAD']) }}
                                    </td>
                                @endforeach
                            @endif
                        </tr>
                        <tr class="text-white bg-success">
                            <td class="text-dark bg-gradient-success"><b> Utilidad/Pérdida Neta </b></td>
                            @if (count($resultado) <= 0)
                                <td class="text-white bg-success">0,000</td>
                            @else
                                @foreach ($resultado as $key)
                                    <td class="text-dark bg-success">{{ number_format($key['UTI_NETA']) }}</td>
                                @endforeach
                            @endif
                        </tr>
                       
                    
                        </tbody>
                    </table>
                </div>
             
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
                doc.addImage(img,150,10,60,30)
                doc.text(data, 10, 60);
                doc.save('Reporte-Bitacora.pdf');
            }
        </script>

    </main>
       
</body>

</html>