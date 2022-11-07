 @extends('layouts.vistapadre')

<!-- titulo de la pagina  -->
@section('titulo')
Balance General
@endsection
<!-- foto de la barra lateral debajo del nombre HTOURS  -->
@section('foto-user1')
assets/images/varon.png
@endsection

<!-- nombre del usuario de la barra lateral  -->
@section('Usuario-Lateral')
Emerson
@endsection
<!-- rol del usuario de la barra lateral  -->
@section('rol-usuario')
Administrador
@endsection

<!-- foto del menu de la derecha -->
@section('foto-user2')
assets/images/varon.png
@endsection
<!-- nombre del menu de la derecha  -->
@section('Usuario-Menu')
Emerson
@endsection
<!-- contenido de la pagina  -->
@section('contenido')
<input type="text" id="myinput" onclick="oye();">

<script>
    function oye() { 
        let input = document.getElementById('myinput').style.background = "red";
    }
</script>
{{ $data = 5 -6; }}

@if ($data < 0)
 Numero negativo
@else
 Numero positivo
@endif




@endsection 


      
