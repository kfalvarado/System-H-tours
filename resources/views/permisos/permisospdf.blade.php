<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>PERMISOS | PDF </title>
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
    
    <img id="imagen"  style="float: right;" src="{{asset('assets\images\HTOURS.png')}}" alt="logo de Htours" height="100" width="100">
 
    <div class="d-grid gap-2 oculto-impresion">
    <a class="btn btn btn-outline-dark" href="javascript:window.print();">Imprimir</a>
    </div>
 
    <center>

        <h1 id="titulo">Reporte Permisos</h1>
        <div class="row">
            <h2>Generado por : {{ Cache::get('user') }} - {{ Cache::get('rol') }}</h2>
            <h2 id="fecha">Fecha - {{date('d/m/Y')}} | Hora - {{date('H:i:s a')}}</h2>
        </div>
        <table id="datos" class="table table-bordered table-contextual table_id" style=" border: 1px ridge black;">
            <thead>
                <th class="text-dark bg-white">#</th>
                <th class="text-dark bg-white"><center> Pantalla </center></th>
                <th class="text-dark bg-white"> <center> ROL</center></th>
                <th class="text-dark bg-white">Permiso Insercion</th>
                <th class="text-dark bg-white">Permiso Eliminacion</th>
                <th class="text-dark bg-white">Permiso Actualizacion</th>
                <th class="text-dark bg-white">Permiso Consultar</th>
            </thead>
            <tbody>
                @foreach ($permisos as $key)
          
                
                <tr>
        
                  
                            <td>{{ $key['COD_PERMISO'] }}</td>
                            <td>{{ $key['OBJETO'] }}</td>
                            <td>{{ $key['ROL'] }}</td>
                            <td>


                                @if ($key['PER_INSERCION'] == '1')
                                    SI
                                @else
                                    NO
                                @endif
                            </td>
                            <td>
                                @if ($key['PER_ELIMINACION'] == '1')
                                    SI
                                @else
                                    NO
                                @endif
                            </td>
                            <td>
                                @if ($key['PER_ACTUALIZACION'] == '1')
                                    SI
                                @else
                                    NO
                                @endif
                            </td>
                            <td>
                                @if ($key['PER_CONSULTAR'] == '1')
                                    SI
                                @else
                                    NO
                                @endif
                            </td>
           
                </tr>
          @endforeach
         
            </tbody>
        </table>

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