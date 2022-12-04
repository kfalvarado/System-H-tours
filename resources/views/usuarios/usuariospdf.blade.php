<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Usuarios | PDF </title>
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
    <main class="container">
       <div class="container-fluid mt-3 mb-3">
        <div class="d-grid gap-2 oculto-impresion">
            <a class="btn btn btn-outline-primary " href="javascript:window.print();"><h3>Imprimir</h3></a>
        </div>
       </div>
       
       <img id="imagen"  style="float: right;" src="{{asset('assets\images\HTOURS.png')}}" alt="logo de Htours" height="100" width="100">
    
     <div class="container">
        <center>
    
            <h1 id="titulo">Reporte Usuarios </h1>
            <div class="row">
                <h2>Generado por : {{ Cache::get('user') }} - {{ Cache::get('rol') }}</h2>
                <h2 id="fecha">Fecha - {{date('d/m/Y')}} | Hora - {{date('H:i:s a')}}</h2>
            </div>
            
            <br>
            <div class="table">
                <table id="datos" class="table table-bordered table-contextual table_id" style=" border: 1px ridge black;">
                    <thead>
                        <th class="text-dark bg-white"># Código</th>
                        <th class="text-dark bg-white">Usuario</th>
                        <th class="text-dark bg-white">Nombre usuario</th>
                        <th class="text-dark bg-white">Estado</th>
                        <th class="text-dark bg-white">Rol</th>
                        <th class="text-dark bg-white">Tipo</th>
                        <th class="text-dark bg-white">Ultima Conexión</th>
                        {{-- <th class="text-dark bg-white">Preguntas contestadas</th> --}}
                        <th class="text-dark bg-white">Ingresos</th>
                        <th class="text-dark bg-white">Correo Electronico</th>
                    </thead>
                    <tbody>
                        @foreach ($usrArr as $usuario)
                
                        
                        <tr>
                            <td>{{$usuario['CODIGO_USUARIO']}}</td>
                            <td>{{$usuario['USUARIO']}}</td>
                            <td>{{$usuario['NOMBRE_USUARIO']}}</td>
                            <td>{{$usuario['ESTADO_USUARIO']}}</td>
                            <td>{{$usuario['COD_ROL']}}</td>
                            <td>{{$usuario['TIPO']}}</td>
                            <td>{{ substr($usuario['FECHA_ULTIMO_ACCESO'],0,10)}}</td>
                            {{-- <td>{{$usuario['PREGUNTA_RESPONDIDA']}}</td> --}}
                            <td>{{$usuario['PRIMER_ACCESO']}}</td>
                            <td>{{$usuario['CORREO_ELECTRONICO']}}</td>
                        </tr>
                    
                @endforeach
                
                    </tbody>
                </table>
            </div>
            @if (count($usuario)> 12)
    
            <img id="imagen"  style="float: right;position:relative;top: -760px;" src="{{asset('assets\images\HTOURS.png')}}" alt="logo de Htours" height="500" width="500">
        
            @endif
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
                doc.save('Usuarios-Reporte.pdf');
            }
        </script>
    

    </main>
    
</body>

</html>