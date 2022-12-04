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

                <h1 id="titulo">Reporte Estado de Resultado</h1>
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
                        <tbody>
                            <tr class="text-dark">
                                <td class="text-dark bg-gradient-secondary"><b>Ventas Netas</b></td>
                                @if (count($resultado) <= 0)
                                    <td class="text-white bg-dark">0,000</td>
                                @else
                                    @foreach ($resultado as $key)
                                        <td >{{ number_format($key['VENTAS_NETAS']) }}</td>
                                    @endforeach
                                @endif

                            </tr>
                            <tr >
                                <td class="text-dark bg-gradient-secondary"> <b>Costos de ventas</b> </td>
                                @if (count($resultado) <= 0)
                                    <td >0,000</td>
                                @else
                                    @foreach ($resultado as $key)
                                        <td >{{ number_format($key['COS_VENTAS']) }}</td>
                                    @endforeach
                                @endif

                            </tr>
                            <tr >
                                <td class="text-dark bg-gradient-secondary"><B>Utilidad/perdida bruta</B></td>
                                @if (count($resultado) <= 0)
                                    <td >0,000</td>
                                @else
                                    @foreach ($resultado as $key)
                                        <td >{{ number_format($key['UTI_BRUTA'] )}}</td>
                                    @endforeach
                                @endif

                            </tr>
                            <tr >
                                <td class="text-dark bg-gradient-secondary"><b> Total Gastos </b></td>
                                @if (count($resultado) <= 0)
                                    <td >0,000</td>
                                @else
                                    @foreach ($resultado as $key)
                                        <td >{{ number_format($key['TOT_GASTOS']) }}</td>
                                    @endforeach
                                @endif

                            </tr>
                            <tr >
                                <td class="text-dark bg-gradient-secondary"><b> Utilidad/Perdida Antes de
                                        impuestos </b></td>
                                @if (count($resultado) <= 0)
                                    <td >0,000</td>
                                @else
                                    @foreach ($resultado as $key)
                                        <td >{{ number_format($key['UTI_ANTIMP']) }}</td>
                                    @endforeach
                                @endif
                            </tr>
                            <tr >
                                <td class="text-dark bg-gradient-secondary"><b>Impuesto a utilidad </b></td>
                                @if (count($resultado) <= 0)
                                    <td >0,000</td>
                                @else
                                    @foreach ($resultado as $key)
                                        <td >{{ number_format($key['IMP_UTILIDAD'] )}}</td>
                                    @endforeach
                                @endif
                            </tr>
                            <tr >
                                <td class="text-dark bg-gradient-secondary"><b> Utilidad/Perdida Neta </b></td>
                                @if (count($resultado) <= 0)
                                    <td >0,000</td>
                                @else
                                    @foreach ($resultado as $key)
                                        <td>{{ number_format($key['UTI_NETA']) }}</td>
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