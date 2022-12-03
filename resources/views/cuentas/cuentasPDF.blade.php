<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Cuentas | PDF </title>
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

    <img id="imagen" style="float: right;" src="{{ asset('assets\images\HTOURS.png') }}" alt="logo de Htours"
        height="100" width="100">

    <div class="d-grid gap-2 oculto-impresion">
        <a class="btn btn btn-outline-dark" href="javascript:window.print();">Imprimir</a>
    </div>

    <center>

        <h1 id="titulo">Catalago de Cuentas</h1>
        <br>
        <h2 id="fecha">Fecha:{{ date('m/d/Y') }}</h2>
        <br>
        <table id="datos">
            <thead>
                <th class="text-dark bg-white">  </th>
                <th class="text-dark bg-white"> <b></b> </th>
                <th class="text-dark bg-white"> </b></b> </th>
           
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" style="  text-align: center;"> <b> Activos corrientes </b> </td>
                </tr>
                <thead>
                    <th class="text-dark bg-white"> Código </th>
                    <th class="text-dark bg-white text-center"> <b>Cuenta</b> </th>
                    <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
               
                </thead>
                @foreach ($cuentas as $acorrientes)
                    <tr>
                        @if ($acorrientes['NOM_GRUPO'] == 'Activos Corrientes' ||
                            $acorrientes['NOM_GRUPO'] == 'ACTIVOS CORRIENTES' ||
                            $acorrientes['NOM_GRUPO'] == 'ACTIVO CORRIENTE' ||
                            $acorrientes['NOM_GRUPO'] == 'ACTIVOS CORRIENTE' ||
                            $acorrientes['NOM_GRUPO'] == 'ACTIVO CORRIENTES')
                            <td> {{ $acorrientes['NUM_CUENTA'] }}</td>
                            <td> {{ $acorrientes['NOM_CUENTA'] }}</td>
                            <td> {{ $acorrientes['NATURALEZA'] }} </td>
                        @endif
                    </tr>
                @endforeach

                <tr>
                    <td colspan="4" style="  text-align: center;"> <b> Activos no corrientes </b> </td>
                </tr>
                <thead>
                    <th class="text-dark bg-white"> Código </th>
                    <th class="text-dark bg-white text-center"> <b>Cuenta</b> </th>
                    <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
               
                </thead>

                @foreach ($cuentas as $acnnocorrientes)
                    @if ($acnnocorrientes['NOM_GRUPO'] == 'Activo No Corriente' ||
                        $acnnocorrientes['NOM_GRUPO'] == 'ACTIVOS NO CORRIENTES' ||
                        $acnnocorrientes['NOM_GRUPO'] == 'ACTIVO NO CORRIENTE' ||
                        $acnnocorrientes['NOM_GRUPO'] == 'ACTIVOS NO CORRIENTE' ||
                        $acnnocorrientes['NOM_GRUPO'] == 'ACTIVO NO CORRIENTES' ||
                        $acnnocorrientes['NOM_GRUPO'] == 'activo no corriente' ||
                        $acnnocorrientes['NOM_GRUPO'] == 'Activo no corrientes' ||
                        $acnnocorrientes['NOM_GRUPO'] == 'Activo no corriente')
                        <tr>

                            <td> {{ $acnnocorrientes['NUM_CUENTA'] }}</td>
                            <td> {{ $acnnocorrientes['NOM_CUENTA'] }}</td>
                            <td> {{ $acnnocorrientes['NATURALEZA'] }} </td>

                        </tr>
                    @endif
                @endforeach
                <tr>

                    <td colspan="4" style="  text-align: center;"> <b> Pasivos corrientes </b> </td>

                </tr>
                <thead>
                    <th class="text-dark bg-white"> Código </th>
                    <th class="text-dark bg-white text-center"> <b>Cuenta</b> </th>
                    <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
               
                </thead>

                @foreach ($cuentas as $pasivoscorr)
                    @if ($pasivoscorr['NOM_GRUPO'] == 'Pasivo corriente' ||
                        $pasivoscorr['NOM_GRUPO'] == 'Pasivo  corriente' ||
                        $pasivoscorr['NOM_GRUPO'] == 'PASIVO CORRIENTES' ||
                        $pasivoscorr['NOM_GRUPO'] == 'PASIVOS  CORRIENTE' ||
                        $pasivoscorr['NOM_GRUPO'] == 'PASIVO  CORRIENTES' ||
                        $pasivoscorr['NOM_GRUPO'] == 'PASIVO  CORRIENTE' ||
                        $pasivoscorr['NOM_GRUPO'] == 'pasivo  corriente' ||
                        $pasivoscorr['NOM_GRUPO'] == 'Pasivo  corrientes' ||
                        $pasivoscorr['NOM_GRUPO'] == 'Pasivos  Corrientes' ||
                        $pasivoscorr['NOM_GRUPO'] == 'Pasivos  corrientes')
                        <tr>

                            <td> {{ $pasivoscorr['NUM_CUENTA'] }}</td>
                            <td> {{ $pasivoscorr['NOM_CUENTA'] }}</td>
                            <td> {{ $pasivoscorr['NATURALEZA'] }} </td>

                        </tr>
                    @endif
                @endforeach
                <tr>

                    <td colspan="4" style="  text-align: center;"> <b> Pasivos no corrientes </b> </td>

                </tr>
                <thead>
                    <th class="text-dark bg-white"> Código </th>
                    <th class="text-dark bg-white text-center"> <b>Cuenta</b> </th>
                    <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
               
                </thead>
                @foreach ($cuentas as $pasivosnocorr)
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

                            <td> {{ $pasivosnocorr['NUM_CUENTA'] }}</td>
                            <td> {{ $pasivosnocorr['NOM_CUENTA'] }}</td>
                            <td> {{ $pasivosnocorr['NATURALEZA'] }} </td>

                        </tr>
                    @endif
                @endforeach
                <tr>

                    <td colspan="4" style="  text-align: center;"> <b> Patrimonios </b> </td>

                </tr>
                <thead>
                    <th class="text-dark bg-white"> Código </th>
                    <th class="text-dark bg-white text-center"> <b>Cuenta</b> </th>
                    <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
               
                </thead>
                @foreach ($cuentas as $patrimonios)
                    @if ($patrimonios['NOM_GRUPO'] == 'Patrimonio' ||
                        $patrimonios['NOM_GRUPO'] == 'PATRIMONIO' ||
                        $patrimonios['NOM_GRUPO'] == 'Patrimonios' ||
                        $patrimonios['NOM_GRUPO'] == 'PATRIMONIOS')
                        <tr>

                            <td> {{ $patrimonios['NUM_CUENTA'] }}</td>
                            <td> {{ $patrimonios['NOM_CUENTA'] }}</td>
                            <td> {{ $patrimonios['NATURALEZA'] }} </td>

                        </tr>
                    @endif
                @endforeach

                <tr>

                    <td colspan="4" style="  text-align: center;"> <b> Descuentos Ingresos </b> </td>

                </tr>
                <thead>
                    <th class="text-dark bg-white"> Código </th>
                    <th class="text-dark bg-white text-center"> <b>Cuenta</b> </th>
                    <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
               
                </thead>
                @foreach ($cuentas as $descuentosi)
                    @if ($descuentosi['NOM_GRUPO'] == 'Patrimonio' ||
                        $descuentosi['NOM_GRUPO'] == 'PATRIMONIO' ||
                        $descuentosi['NOM_GRUPO'] == 'Patrimonios' ||
                        $descuentosi['NOM_GRUPO'] == 'PATRIMONIOS')
                        <tr>

                            <td> {{ $descuentosi['NUM_CUENTA'] }}</td>
                            <td> {{ $descuentosi['NOM_CUENTA'] }}</td>
                            <td> {{ $descuentosi['NATURALEZA'] }} </td>

                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="4" style="  text-align: center;"> <b> Sueldos </b> </td>

                </tr>
                <thead>
                    <th class="text-dark bg-white"> Código </th>
                    <th class="text-dark bg-white text-center"> <b>Cuenta</b> </th>
                    <th class="text-dark bg-white"> </b>Naturaleza</b> </th>
               
                </thead>
                @foreach ($cuentas as $sueldos)
                    @if ($sueldos['NOM_GRUPO'] == 'Sueldos empleados' ||
                        $sueldos['NOM_GRUPO'] == 'Sueldos' ||
                        $sueldos['NOM_GRUPO'] == 'SUELDOS' ||
                        $sueldos['NOM_GRUPO'] == 'SUELDOS Empleados')
                        <tr>

                            <td> {{ $sueldos['NUM_CUENTA'] }}</td>
                            <td> {{ $sueldos['NOM_CUENTA'] }}</td>
                            <td> {{ $sueldos['NATURALEZA'] }} </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @if (count($cuentas) > 12)
            <img id="imagen" style="float: right;position:relative;top: -760px;"
                src="{{ asset('assets\images\HTOURS.png') }}" alt="logo de Htours" height="500" width="500">
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
            doc.addImage(img, 150, 10, 60, 30)
            doc.text(data, 10, 60);
            doc.save('Reporte-Periodo.pdf');
        }
    </script>

</body>

</html>
