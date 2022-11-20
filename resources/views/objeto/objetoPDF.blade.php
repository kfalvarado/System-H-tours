<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>Document</title>
</head>

<body>
<button onclick="imprimir();">Imprimir</button>
    <center>
        <img id="imagen" src="{{asset('assets\images\HTOURS.png')}}" alt="logo de Htours" height="500" width="500">
        <h1 id="titulo">Reporte Objeto</h1>
        <h2 id="fecha">Fecha:{{date('m/d/Y')}}</h2>
        <table id="datos">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </thead>
            <tbody>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <th>Scarleth</th>
                    <th>Canales</th>
                </tr>
                <tr>
                    <th>2</th>
                    <th>Scarleth</th>
                    <th>Canales</th>
                </tr>
                <tr>
                    <th>3</th>
                    <th>Scarleth</th>
                    <th>Canales</th>
                </tr>
                <tr>
                    <th>4</th>
                    <th>Scarleth</th>
                    <th>Canales</th>
                </tr>
                <tr>
                    <th>5</th>
                    <th>Scarleth</th>
                    <th>Canales</th>
                </tr>
               
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
            doc.save('Reporte-Objeto.pdf');
        }
    </script>

</body>

</html>