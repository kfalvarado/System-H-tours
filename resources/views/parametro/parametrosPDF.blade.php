<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Parámetros | PDF </title>
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
    
    <img id="imagen"  style="float: right;" src="{{asset('assets\images\HTOURS.png')}}" alt="logo de Htours" height="300" width="300">
 
    <div class="d-grid gap-2 oculto-impresion">
    <a class="btn btn btn-outline-dark" href="javascript:window.print();">Imprimir</a>
    </div>
 
    <center>

        <h1 id="titulo">Reporte Parámetros</h1>
        <h2>Generado por : {{ Cache::get('user') }} - {{ Cache::get('rol') }}</h2>
        <h2 id="fecha">Fecha - {{date('d/m/Y')}} | Hora - {{date('H:i:s a')}}</h2>
      
        <table id="datos"  class="table table-bordered table-contextual table_id" style=" border: 1px ridge black;">
            <thead>
                <th class="text-dark bg-white">#</th>
                <th class="text-dark bg-white">Parámetros</th>
                <th class="text-dark bg-white">Valor</th>
                <th class="text-dark bg-white">Usuario</th>
                <th class="text-dark bg-white">Fecha de creación</th>
                <th class="text-dark bg-white">Fecha de modificación</th>
            </thead>
            <tbody>
                @foreach ($parametros as $parametros)
          
                
                <tr>
                    <td> {{ $parametros['COD_PARAMETRO'] }} </td>
                    <td>{{ $parametros['PARAMETRO'] }}</td>
                    <td>{{ $parametros['VALOR'] }}</td>
                    <td>{{ $parametros['COD_USR'] }}</td>
                    <td>{{ substr($parametros['FEC_CREACION'], 0, 10) }}</td>
                    <td>{{ substr($parametros['FEC_MODIFICACION'], 0, 10) }}</td>
                </tr>
          @endforeach
         
            </tbody>
        </table>
        @if (count($parametros)> 12)

        <img id="imagen"  style="float: right;position:relative;top: -760px;" src="{{asset('assets\images\HTOURS.png')}}" alt="logo de Htours" height="300" width="300">
    
        @endif
    </center>
    
    
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
            doc.save('Reporte-Periodo.pdf');
        }
    </script>

</body>

</html>