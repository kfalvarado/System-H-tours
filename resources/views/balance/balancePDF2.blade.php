<!DOCTYPE html>
<html lang="en">
<input type="hidden" value=" {{ setlocale(LC_TIME, 'spanish') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- jspdf --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    {{-- html2canvas --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>  --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <div class="container-fluid mt-3 mb-3">
        <div class="d-grid gap-2 oculto-impresion">
            <a class="btn btn btn-outline-primary " onclick="imprimir()">
                <h3>Imprimir</h3>
            </a>
        </div>
    </div>



    <!-- Contenido de la página -->
    <div class="container" id="contenido">
        <img id="imagen" style="float: right;" src="{{ asset('assets\images\HTOURS.png') }}" alt="logo de Htours"
            height="100" width="100">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">

                <div class="container">
                    <div class="row">
                        <div id="impresion">
                            <div class="col-lg-12">

                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th colspan="4">
                                                @foreach ($balanceArr as $key)
                                                    <h2 id="empresa" class="text-center">{{ $key['NOMBRE_EMPRESA'] }}
                                                    </h2>
                                                @endforeach
                                                <div id="titulo">

                                                    <p align="center">
                                                        <strong>Balance General</strong>
                                                        <br>
                                                        <strong>Al {{ date('d') }} de {{ strftime('%B') }} del año
                                                            {{ date('Y') }}</strong>
                                                    </p>

                                                </div>

                                                <div class="row">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="">
                                                                            <table id="tabla1" class="table ">
                                                                                <tr>
                                                                                    <th colspan="2">Activos</th>

                                                                                </tr>
                                                                                <tbody>
                                                                                    <tr class="text-white bg-dark">
                                                                                        <td colspan="3">
                                                                                            <center> <u> <b> Activos
                                                                                                        corrientes
                                                                                                    </b></u>
                                                                                            </center>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="text-white bg-secondary">
                                                                                        <td> <b>
                                                                                                # </b></td>
                                                                                        <td> <b>
                                                                                                Cuentas</b></td>
                                                                                        <td>
                                                                                            <b>Total</b>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @if ($activoc <= 0)
                                                                                        <tr>
                                                                                            <td colspan="3">No hay
                                                                                                resultados</td>

                                                                                        </tr>
                                                                                    @else
                                                                                        @foreach ($activoc as $key)
                                                                                            <tr>
                                                                                                <td>{{ $key['COD_CUENTA'] }}
                                                                                                </td>
                                                                                                <td>{{ $key['NOM_CUENTA'] }}
                                                                                                </td>
                                                                                                @if (number_format($key['SAL_DEBE']) > 0)
                                                                                                    <td>{{ number_format($key['SAL_DEBE']) }}
                                                                                                    @else
                                                                                                    <td>{{ number_format($key['SAL_HABER']) }}
                                                                                                @endif
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                                    <tr class="text-white bg-dark">
                                                                                        <td colspan="3">
                                                                                            <center> <u> <b> Activo no
                                                                                                        corrientes</b>
                                                                                                </u>
                                                                                            </center>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="text-white bg-secondary">
                                                                                        <td> <b>
                                                                                                # </b></td>
                                                                                        <td> <b>
                                                                                                Cuentas</b></td>
                                                                                        <td>
                                                                                            <b>Total</b>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @if ($activon <= 0)
                                                                                        <tr>
                                                                                            <td colspan="3">No hay
                                                                                                resultados</td>

                                                                                        </tr>
                                                                                    @else
                                                                                        @foreach ($activon as $key)
                                                                                            <tr>
                                                                                                <td>{{ $key['COD_CUENTA'] }}
                                                                                                </td>
                                                                                                <td>{{ $key['NOM_CUENTA'] }}
                                                                                                </td>
                                                                                                @if (number_format($key['SAL_DEBE']) > 0)
                                                                                                    <td>{{ number_format($key['SAL_DEBE']) }}
                                                                                                    </td>
                                                                                                @else
                                                                                                    <td>{{ number_format($key['SAL_HABER']) }}
                                                                                                    </td>
                                                                                                @endif

                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                                    <tr class="text-white bg-primary">

                                                                                        <td colspan="2">
                                                                                            <center> <b> Total activos
                                                                                                </b>
                                                                                            </center>
                                                                                        </td>
                                                                                        @if (count($balanceArr) <= 0)
                                                                                            <td>
                                                                                                <b>0.00</b>
                                                                                            </td>
                                                                                        @else
                                                                                            @foreach ($balanceArr as $key)
                                                                                                <td>
                                                                                                    <b>{{ number_format($key['TOTAL_ACTIVOS']) }}</b>
                                                                                                </td>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <table class="table ">
                                                                                <tr>
                                                                                    <th>Pasivos</th>
                                                                                </tr>
                                                                                <tr class="text-white bg-dark">
                                                                                    <td colspan="3">
                                                                                        <center> <u> <b>Pasivos
                                                                                                    corrientes
                                                                                                </b></u> </center>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="text-white bg-secondary">
                                                                                    <td> <b> #
                                                                                        </b></td>
                                                                                    <td> <b>
                                                                                            Cuentas</b></td>
                                                                                    <td>
                                                                                        <b>Total</b>
                                                                                    </td>
                                                                                </tr>
                                                                                @if ($pasivoc <= 0)
                                                                                    <tr class="text-white bg-dark">
                                                                                        <td colspan="3">No hay
                                                                                            resultados
                                                                                        </td>

                                                                                    </tr>
                                                                                @else
                                                                                    @foreach ($pasivoc as $key)
                                                                                        <tr>
                                                                                            <td>{{ $key['COD_CUENTA'] }}
                                                                                            </td>
                                                                                            <td>{{ $key['NOM_CUENTA'] }}
                                                                                            </td>
                                                                                            @if (number_format($key['SAL_HABER']) > 0)
                                                                                                <td>{{ number_format($key['SAL_HABER']) }}
                                                                                                @else
                                                                                                <td>{{ number_format($key['SAL_DEBE']) }}
                                                                                                </td>
                                                                                            @endif

                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif


                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <table class="table  ">

                                                                                <tr class="text-white bg-dark">
                                                                                    <td colspan="3">
                                                                                        <center> <u><b> Pasivos no
                                                                                                    corrientes </b> </u>
                                                                                        </center>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="text-white bg-secondary">
                                                                                    <td> <b> #
                                                                                        </b></td>
                                                                                    <td> <b>
                                                                                            Cuentas</b></td>
                                                                                    <td>
                                                                                        <b>Total</b>
                                                                                    </td>
                                                                                </tr>
                                                                                @if ($pasivon <= 0)
                                                                                    <tr class="text-white bg-dark">
                                                                                        <td colspan="3">No hay
                                                                                            resultados
                                                                                        </td>
                                                                                    </tr>
                                                                                @else
                                                                                    @foreach ($pasivon as $key)
                                                                                        <tr>
                                                                                            <td>{{ $key['COD_CUENTA'] }}
                                                                                            </td>
                                                                                            <td>{{ $key['NOM_CUENTA'] }}
                                                                                            </td>
                                                                                            @if (number_format($key['SAL_HABER']) > 0)
                                                                                                <td>{{ number_format($key['SAL_HABER']) }}
                                                                                                </td>
                                                                                            @else
                                                                                                <td>{{ number_format($key['SAL_DEBE']) }}
                                                                                                </td>
                                                                                            @endif
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                <tr class="text-white bg-primary">
                                                                                    <td colspan="2">
                                                                                        <center> <b>Total pasivos</b>
                                                                                        </center>
                                                                                    </td>
                                                                                    @if (count($balanceArr) <= 0)
                                                                                        <td>
                                                                                            <b>0.00</b>
                                                                                        </td>
                                                                                    @else
                                                                                        @foreach ($balanceArr as $key)
                                                                                            <td>
                                                                                                <b>{{ number_format($key['TOTAL_PASIVOS']) }}</b>
                                                                                            </td>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </tr>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <table class="table">
                                                                                <tr class="text-white bg-dark">
                                                                                    <td colspan="3">
                                                                                        <center> <u> <b> Patrimonios</b>
                                                                                            </u></center>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="text-white bg-secondary">
                                                                                    <td> <b>
                                                                                            #</b></td>
                                                                                    <td> <b>
                                                                                            Cuentas</b></td>
                                                                                    <td> <b>
                                                                                            Tota</b></td>
                                                                                </tr>
                                                                                @if ($patrimonio <= 0)
                                                                                    <tr class="text-white bg-dark">
                                                                                        <td colspan="3">No hay
                                                                                            resultados</td>
                                                                                    </tr>
                                                                                @else
                                                                                    @foreach ($patrimonio as $key)
                                                                                        <tr>
                                                                                            <td>{{ $key['COD_CUENTA'] }}
                                                                                            </td>
                                                                                            <td>{{ $key['NOM_CUENTA'] }}
                                                                                            </td>
                                                                                            @if (number_format($key['SAL_HABER']) > 0)
                                                                                                <td>{{ number_format($key['SAL_HABER']) }}
                                                                                                @else
                                                                                                <td>{{ number_format($key['SAL_DEBE']) }}
                                                                                            @endif
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                <tr class="text-white bg-primary">

                                                                                    <td colspan="2">
                                                                                        <center><b>Total Patrimonio </b>
                                                                                        </center>
                                                                                    </td>
                                                                                    @if (count($balanceArr) <= 0)
                                                                                        <td> <b>0.00</b> </td>
                                                                                    @else
                                                                                        @foreach ($balanceArr as $key)
                                                                                            <td>
                                                                                                <b>{{ number_format($key['TOTAL_PATRIMONIOS']) }}</b>
                                                                                            </td>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </tr>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="row">
                     

                                            <table>
                                                <tr>
                                                    <th colspan="2">Total Activos</th>
                                              
                                                @if (count($balanceArr) <= 0)
                                                    <th>
                                                        <b>0.00</b>
                                                    </th>
                                                @else
                                                    @foreach ($balanceArr as $key)
                                                        <th>
                                                            <b>{{ number_format($key['TOTAL_ACTIVOS']) }}</b>
                                                        </th>
                                                    @endforeach
                                                @endif

                                   
                     
                                                    
                                                        <th>Total Pasivos + Capital:</th>
                                               
                                                    @if (count($balanceArr) <= 0)
                                                        <th>
                                                            <b>0.00</b>
                                                        </th>
                                                    @else
                                                        @foreach ($balanceArr as $key)
                                                            <th>
                                                                <b>{{ number_format($key['TOTAL_PASIVOS'] + $key['TOTAL_PATRIMONIOS']) }}</b>
                                                            </th>
                                                        @endforeach
                                                    @endif
                                                </tr>
                                                </table>

                                      

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/span-->

            <!-- Barra lateral o sidebar -->
            <?php
            // include 'sidebar.php';
            ?>

        </div>
    </div>


    <script>
        var maintable = document.getElementById('contenido'),
            pdf = document.getElementById('pdfout');

        // pdf.onclick= function () {
        //     var doc = new jsPDF();
        //     var margin = 20;
        //     var scale = (doc.internal.pageSize.width - margin * 2) / document.body.clientWidth;
        //     var scale_mobile = (doc.internal.pageSize.width - margin * 2)/ document.body.getBoundingClientRect();

        //     // checking 
        //     if (/Android|webOS|iphone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        //         //mobile
        //         doc.html(maintable,{
        //             x: margin,
        //             y:margin,
        //             html2canvas:{
        //                 scale: scale_mobile
        //             },
        //             callback: function (doc) {
        //                 doc.output('dataurlnewwindow',{
        //                     filename: "balance.pdf"
        //                 })
        //             }
        //         })
        //     }else{
        //         //pc
        //         doc.html(maintable,{
        //             x: margin,
        //             y:margin,
        //             html2canvas:{
        //                 scale: scale,
        //             },
        //             callback: function (doc) {
        //                 doc.output('dataurlnewwindow',{
        //                     filename: "balance.pdf"
        //                 })
        //             }
        //         })
        //     }
        // }
    </script>



    <script>
        function imprimir() {
            console.log('object');
            var maintable = document.getElementById('impresion');
            var margin = 20;
            // var scale = (doc.internal.pageSize. widthmargin 2) / document.body.clientWidth;
            // var scale_mobile = (doc.internal.pageSize.width - margin * 2)/ document.body.getBoundingClientRect();

            var img = document.getElementById('imagen');


            var doc = new jsPDF('l', 'pt', 'a4');

            doc.html(maintable, {
                x: margin,
                y: margin,
                // html2canvas:{
                //     scale: 1
                // },
                callback: function(doc) {
                    doc.output('dataurlnewwindow', {
                        filename: "balance.pdf"
                    })
                }
            })
        }
    </script>
    </script>
</body>

</html>
