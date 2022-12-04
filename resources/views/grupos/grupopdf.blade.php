<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Grupos | PDF </title>
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
    <div class="container-fluid mt-3 mb-3">
    <div class="d-grid gap-2 oculto-impresion">
    <a class="btn btn btn-outline-dark" href="javascript:window.print();">Imprimir</a>
    </div>
    </div>
 
    <center>

        <h1 id="titulo">Reporte Grupos</h1>
        <div class="row">
            <h6>Generado por : {{ Cache::get('user') }} - {{ Cache::get('rol') }}</h6>
            <h6 id="fecha">Fecha - {{date('d/m/Y')}} | Hora - {{date('H:i:s a')}}</h2>
        </div>
        <table id="datos" class="table table-bordered table-contextual table_id" style=" border: 1px ridge black;" >
            <thead>
                <th class="text-dark bg-white"> # </th>
                <th class="text-dark bg-white"> <b>Clasificación</b> </th>
                <th class="text-dark bg-white"> <b>Código</b> </th>
                <th class="text-dark bg-white"> <b>Nombre Grupo</b> </th>
            </thead>
            <tbody>
                @foreach ($grupoArr as $grupo)
          
                
                <tr>
                    <td> {{ $grupo['COD_GRUPO'] }}</td>
                    <td> {{ $grupo['NATURALEZA'] }}</td>
                    <td> {{ $grupo['NUM_GRUPO'] }} </td>
                    <td> {{ $grupo['NOM_GRUPO'] }}</td>
                </tr>
          @endforeach
         
            </tbody>
        </table>
      
    </center>
</body>

</html>