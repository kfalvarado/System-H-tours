/*
 ============================================
    Detener el intento de registro tercer Bloque
 ============================================
*/
function validacion() {
    let user = document.getElementById("user").value;
    let correo = document.getElementById("correo").value;
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    let seguridad = document.getElementById("seguridad").value;
    if (user == "") {
        alert("No escribio su nombre de Usuario");
        document.getElementById("user").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#user";
    }
    if (correo == "") {
        alert("No escribio su correo");
        document.getElementById("correo").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#correo";
    }
    if (password1 == "") {
        alert("No escribio una contraseña");
        document.getElementById("password1").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#password1";
    }
    if (password2 == "") {
        alert("No escribio una contraseña");
        document.getElementById("password2").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#password2";
    }
    if (seguridad != "100%") {
        alert("Por favor ingresa un Contraseña Segura");
        document.getElementById("password1").className =
            "form-control p_input text-dark bg-warning";
            document.getElementById("password1").value = "";
        document.location.href = "#password1";
    }

}

function comparar() {
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    if (password1 != password2) {
        alert("Las contraseña no Coinciden ");
        document.getElementById("password2").value = "";
    }
}

function go() {
    // desactivar proteccion anti cierre
    window.onbeforeunload = null;
}

function donotgo() {
    return "!!Estas seguro de salir sin guardar se perderan los cambios realizados!!";
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