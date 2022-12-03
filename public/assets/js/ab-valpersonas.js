/*
 * ============================================
 * Detener el intento de registro tercer Bloque
 * ============================================
 */
function comparar() {
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    if (password1 != password2) {
        swal.fire(
            {
                icon: 'error',
                text: 'Las contraseña no Coinciden'
            }
        )
        window.location.document.getElementById("password2").className =
        "form-control p_input text-dark bg-warning";;
    }
}

function validarSelect() {
    let genero = document.getElementById('genero').value
    let civil = document.getElementById('civil').value
    let tipoPersona = document.getElementById('tipoPersona').value
    // alert(genero+civil+tipoPersona)

    if (genero == 'Seleccionar') {
        Swal.fire({
            icon: 'warning',
            text: 'No has seleccionado un genero'
            // footer: '<a href="">Why do I have this issue?</a>'
        })
    }else{
        // console.log('seleccionado esta');
        if (civil == 'Seleccionar') {
            Swal.fire({
                icon: 'warning',
                text: 'No has seleccionado un  estado civil'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        }
        else { 
    
            if(tipoPersona == 'Seleccionar') {
                Swal.fire({
                    icon: 'warning',
                    text: 'No has seleccionado un Tipo Persona'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        } 
    }

}


function validar() {
    let genero = document.getElementById("genero").value;
    let civil = document.getElementById("civil").value;
    let tipoPersona = document.getElementById("tipoPersona").value;
    let tipotelefono = document.getElementById("tipotelefono").value;
    let seguridad = document.getElementById("seguridad").value;
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
   
    if (genero == "Seleccionar") {
        alert("No selecciono un genero");
        document.getElementById("genero").className =
            "form-select form-select text-dark bg-warning";
        document.getElementById("genero").value = "";
        document.location.href = "#genero";

    }
    if (civil == "Seleccionar") {
        alert("No selecciono un Estado Civil");
        document.getElementById("civil").className =
            "form-select form-select text-dark bg-warning";
        document.getElementById("civil").value = "";
        document.location.href = "#civil";
    }
    if (tipoPersona == "Seleccionar") {
        alert("No selecciono un tipo de persona");
        document.getElementById("tipoPersona").className =
            "form-select form-select text-dark bg-warning";
        document.getElementById("tipoPersona").value = "";
        document.location.href = "#tipoPersona";
    }
    if (tipotelefono == "Seleccionar") {
        alert("No selecciono un tipo de Telefono");
        document.getElementById("tipotelefono").className =
        "form-select form-select text-dark bg-warning";
        document.getElementById("tipotelefono").value = "";
        document.location.href = "#tipotelefono";
    }
    if (seguridad != "100%") {
        alert("Por favor ingresa un Contraseña Segura");
        document.getElementById("password1").className =
            "form-control p_input text-dark bg-warning";
            document.getElementById("password1").value = "";
        document.location.href = "#password1";
    }
    if (password1 != password2) {
        swal.fire(
            {
                icon: 'error',
                text: 'Las contraseña no Coinciden'
            }
        )
        event.preventDefault()
        document.location.href = "#password2";
    }
    // desactivar proteccion anti cierre
    window.onbeforeunload = null;
}
function check() {
    let pregunta = document.getElementById('pregunta').value
    let respuesta = document.getElementById('respuesta').value

    if (pregunta == '') {
        Swal.fire({
            icon: 'warning',
            text: 'No has ingresado una pregunta'
            // footer: '<a href="">Why do I have this issue?</a>'
        })
        event.preventDefault()
       
    }
    if (respuesta == '') {
        Swal.fire({
            icon: 'warning',
            text: 'No has ingresado una respuesta'
            // footer: '<a href="">Why do I have this issue?</a>'
        })
        event.preventDefault()
    }
    window.onbeforeunload = null;
}

function donotgo() {
    return "!!Estas seguro de salir sin guardar se perderan los cambios realizados!!";
}
/**
 * Solo numeros edad
 */
function myedad() {
    let edad = document.getElementById('num_cuenta').value;
    let div = document.getElementById('divnum');
    // console.log(cuentas);
    if (expresiones.numeros.test(edad)) {
        document.getElementById('num_cuenta').classList.remove('incorrecto') 
        document.getElementById('num_cuenta').classList.add('correcto') 
        console.log('correcto');
        div.innerHTML='';
    }else{
        document.getElementById('num_cuenta').classList.add('incorrecto')
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
    
}


function mostrarContra1 () {

        var tipo = document.getElementById("password1");
        var ojo = document.getElementById("ojo1");
        if (tipo.type == "password") {
            tipo.type = "text";
            ojo.className = 'bi bi-eye-slash-fill';
        } else {
            tipo.type = "password";
            ojo.className = 'bi bi-eye-fill';
        }
    
}

function mostrarContra2 () {

    var tipo = document.getElementById("password2");
    var ojo = document.getElementById("ojo2");
    if (tipo.type == "password") {
        tipo.type = "text";
        ojo.className = 'bi bi-eye-slash-fill';
    } else {
        tipo.type = "password";
        ojo.className = 'bi bi-eye-fill';
    }

}



/**
 * Validar si tien numeros
 */
 var numeros="0123456789";

 function tiene_numeros(texto){
    for(i=0; i<texto.length; i++){
       if (numeros.indexOf(texto.charAt(i),0)!=-1){
          return 1;
       }
    }
    return 0;
 }


 /**
  * Validar si tiene letras minusculas
  */

  var letras = "abcdefghyjklmnñopqrstuvwxyz";

  function tiene_minusculas(texto) {
      for (i = 0; i < texto.length; i++) {
          if (letras.indexOf(texto.charAt(i), 0) != -1) {
              return 1;
          }
      }
      return 0;
  }

  /**
   * Tiene Letrass
   * @param {*} texto 
   * @returns 
   */
  function tiene_letras(texto){
    texto = texto.toLowerCase();
    for(i=0; i<texto.length; i++){
       if (letras.indexOf(texto.charAt(i),0)!=-1){
          return 1;
       }
    }
    return 0;
 }
  /**
   * Validar si tiene MAYUSCULAS
   */
   var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

   function tiene_mayusculas(texto){
      for(i=0; i<texto.length; i++){
         if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
            return 1;
         }
      }
      return 0;
   }



   /**
    * Ver si la Clave es Segura o insegura
    */
    function seguridad_clave(clave) {
        var seguridad = 0;
        if (clave.length != 0) {
            if (tiene_numeros(clave) && tiene_letras(clave)) {
                seguridad += 30;
            }
            if (tiene_minusculas(clave) && tiene_mayusculas(clave)) {
                seguridad += 30;
            }
            if (clave.length >= 4 && clave.length <= 5) {
                seguridad += 10;
            } else {
                if (clave.length >= 6 && clave.length <= 8) {
                    seguridad += 30;
                } else {
                    if (clave.length > 8) {
                        seguridad += 40;
                    }
                }
            }
        }
        return seguridad;
    }   


    function muestra_seguridad_clave(clave,formulario){
        seguridad=seguridad_clave(clave);
        formulario.seguridad.value=seguridad + "%";
     }

     var input = document.querySelector("#telefono");
     var iti = window.intlTelInput(input, {
         utilsScript: "/js/utils.js",
     });