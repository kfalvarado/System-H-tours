<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Subcuentas | PDF </title>
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

       
        <h1 id="titulo">Catalago de Subuentas</h1>
        <div class="row">
            <h6>Generado por : {{ Cache::get('user') }} - {{ Cache::get('rol') }}</h6>
            <h6 id="fecha">Fecha - {{date('d/m/Y')}} | Hora - {{date('H:i:s a')}}</h6>
        </div>
        <table id="datos" class="table table-bordered table-contextual table_id" style=" border: 1px ridge black;">
            <thead>
                <th class="text-dark bg-white"> <b>Código</b> </th>
                <th class="text-dark bg-white"> <b>Subcuenta</b> </th>
                <th class="text-dark bg-white"> </b>Código Cuenta</b> </th>
                <th class="text-dark bg-white"> </b>Cuenta</b> </th>
                <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
                <th class="text-dark bg-white"> </b>Grupo</b> </th>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6"> <center>Activos Corrientes</center> </td>
                </tr>
               
                
                <tr>
                    @foreach ($subcuenta as $subcuentas)
                    @if ($subcuentas['NOM_GRUPO'] == 'Activos Corrientes' )      
                    <td> {{$subcuentas ['NUM_SUBCUENTA'] }}</td>
                    <td> {{$subcuentas ['NOM_SUBCUENTA'] }}</td>
                    <td>{{$subcuentas ['NUM_CUENTA'] }} </td>
                    <td>{{$subcuentas ['NOM_CUENTA'] }} </td>
                    <td> {{$subcuentas ['NATURALEZA'] }}</td>
                    <td> {{$subcuentas ['NOM_GRUPO'] }}</td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                    <td colspan="6"> <center> <b> Activos no corrientes </b></center> </td>
                </tr>
                    
                @foreach ($subcuenta as $acnnocorrientes)
                @if ($acnnocorrientes['NOM_GRUPO'] == 'Activo No Corriente' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'ACTIVOS NO CORRIENTES' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'ACTIVO NO CORRIENTE' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'ACTIVOS NO CORRIENTE' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'ACTIVO NO CORRIENTES' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'activo no corriente' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'Activo no corrientes' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'Activos no corrientes' ||
                    $acnnocorrientes['NOM_GRUPO'] == 'Activo no corriente')
                    <tr>

                        <td> {{$acnnocorrientes ['NUM_SUBCUENTA'] }}</td>
                    <td> {{$acnnocorrientes ['NOM_SUBCUENTA'] }}</td>
                    <td>{{$acnnocorrientes ['NUM_CUENTA'] }} </td>
                    <td>{{$acnnocorrientes ['NOM_CUENTA'] }} </td>
                    <td> {{$acnnocorrientes ['NATURALEZA'] }}</td>
                    <td> {{$acnnocorrientes ['NOM_GRUPO'] }}</td>

                    </tr>
                @endif
            @endforeach
            <tr>

                <td colspan="6" style="  text-align: center;"> <b> Pasivos corrientes </b> </td>

            </tr>
            <thead>
                <th class="text-dark bg-white"> <b>Código</b> </th>
                <th class="text-dark bg-white"> <b>Subcuenta</b> </th>
                <th class="text-dark bg-white"> </b>Código Cuenta</b> </th>
                <th class="text-dark bg-white"> </b>Cuenta</b> </th>
                <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
                <th class="text-dark bg-white"> </b>Grupo</b> </th>
           
            </thead>

            @foreach ($subcuenta as $pasivoscorr)
                @if ($pasivoscorr['NOM_GRUPO'] == 'Pasivo corriente' ||
                    $pasivoscorr['NOM_GRUPO'] == 'Pasivo  corriente' ||
                    $pasivoscorr['NOM_GRUPO'] == 'PASIVO CORRIENTES' ||
                    $pasivoscorr['NOM_GRUPO'] == 'PASIVOS  CORRIENTE' ||
                    $pasivoscorr['NOM_GRUPO'] == 'PASIVO  CORRIENTES' ||
                    $pasivoscorr['NOM_GRUPO'] == 'PASIVO  CORRIENTE' ||
                    $pasivoscorr['NOM_GRUPO'] == 'pasivo  corriente' ||
                    $pasivoscorr['NOM_GRUPO'] == 'Pasivo  corrientes' ||
                    $pasivoscorr['NOM_GRUPO'] == 'Pasivo  corrientes' ||
                    $pasivoscorr['NOM_GRUPO'] == 'Pasivos  Corrientes' ||
                    $pasivoscorr['NOM_GRUPO'] == 'Pasivos corrientes' ||
                    $pasivoscorr['NOM_GRUPO'] == 'Pasivos  corrientes')
                    <tr>

                        <td> {{$pasivoscorr ['NUM_SUBCUENTA'] }}</td>
                    <td> {{$pasivoscorr ['NOM_SUBCUENTA'] }}</td>
                    <td>{{$pasivoscorr ['NUM_CUENTA'] }} </td>
                    <td>{{$pasivoscorr ['NOM_CUENTA'] }} </td>
                    <td> {{$pasivoscorr ['NATURALEZA'] }}</td>
                    <td> {{$pasivoscorr ['NOM_GRUPO'] }}</td>

                    </tr>
                @endif
            @endforeach
            <tr>

                <td colspan="6" style="  text-align: center;"> <b> Pasivos no corrientes </b> </td>

            </tr>
            <thead>
                <th class="text-dark bg-white"> <b>Código</b> </th>
                <th class="text-dark bg-white"> <b>Subcuenta</b> </th>
                <th class="text-dark bg-white"> </b>Código Cuenta</b> </th>
                <th class="text-dark bg-white"> </b>Cuenta</b> </th>
                <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
                <th class="text-dark bg-white"> </b>Grupo</b> </th>
           
            </thead>
            @foreach ($subcuenta as $pasivosnocorr)
            @if ($pasivosnocorr['NOM_GRUPO'] == 'Pasivo no corriente' ||
                $pasivosnocorr['NOM_GRUPO'] == 'Pasivo no corriente' ||
                $pasivosnocorr['NOM_GRUPO'] == 'PASIVO NO CORRIENTES' ||
                $pasivosnocorr['NOM_GRUPO'] == 'PASIVOS NO CORRIENTE' ||
                $pasivosnocorr['NOM_GRUPO'] == 'PASIVO NO CORRIENTES' ||
                $pasivosnocorr['NOM_GRUPO'] == 'PASIVO NO  CORRIENTE' ||
                $pasivosnocorr['NOM_GRUPO'] == 'pasivo no corriente' ||
                $pasivosnocorr['NOM_GRUPO'] == 'Pasivo no corrientes' ||
                $pasivosnocorr['NOM_GRUPO'] == 'Pasivos no Corrientes' ||
                $pasivosnocorr['NOM_GRUPO'] == 'Pasivos No Corrientes' ||
                $pasivosnocorr['NOM_GRUPO'] == 'Pasivo No corriente' ||
                $pasivosnocorr['NOM_GRUPO'] == 'Pasivos no corrientes')
                <tr>

                    <td> {{$pasivosnocorr ['NUM_SUBCUENTA'] }}</td>
                    <td> {{$pasivosnocorr ['NOM_SUBCUENTA'] }}</td>
                    <td>{{$pasivosnocorr ['NUM_CUENTA'] }} </td>
                    <td>{{$pasivosnocorr ['NOM_CUENTA'] }} </td>
                    <td> {{$pasivosnocorr ['NATURALEZA'] }}</td>
                    <td> {{$pasivosnocorr ['NOM_GRUPO'] }}</td>

                </tr>
            @endif
        @endforeach

        <td colspan="6" style="  text-align: center;"> <b> Patrimonios </b> </td>

    </tr>
    <thead>
        <th class="text-dark bg-white"> <b>Código</b> </th>
        <th class="text-dark bg-white"> <b>Subcuenta</b> </th>
        <th class="text-dark bg-white"> </b>Código Cuenta</b> </th>
        <th class="text-dark bg-white"> </b>Cuenta</b> </th>
        <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
        <th class="text-dark bg-white"> </b>Grupo</b> </th>
    </thead>
    @foreach ($subcuenta as $patrimonios)
    @if ($patrimonios['NOM_GRUPO'] == 'Patrimonio' ||
        $patrimonios['NOM_GRUPO'] == 'PATRIMONIO' ||
        $patrimonios['NOM_GRUPO'] == 'Patrimonios' ||
        $patrimonios['NOM_GRUPO'] == 'PATRIMONIOS')
        <tr>

            <td> {{$pasivosnocorr ['NUM_SUBCUENTA'] }}</td>
            <td> {{$pasivosnocorr ['NOM_SUBCUENTA'] }}</td>
            <td>{{$pasivosnocorr ['NUM_CUENTA'] }} </td>
            <td>{{$pasivosnocorr ['NOM_CUENTA'] }} </td>
            <td> {{$pasivosnocorr ['NATURALEZA'] }}</td>
            <td> {{$pasivosnocorr ['NOM_GRUPO'] }}</td>

        </tr>
    @endif
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