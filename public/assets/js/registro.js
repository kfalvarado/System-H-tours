/*
 ============================================
    Detener el intento de registro tercer Bloque
 ============================================
*/
const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,25}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/,
    telefono: /^[+0-9 ]{2,5} [0-9-]{4,13}[0-9-]{4,13}$/, // telefonos numeros.
    numeros: /^\d{1,10}$/, // 7 a 14 numeros.
    identidad: /^[0-9]{4}-\d{4}-\d{5}$/ // 7 a 14 numeros.
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
        event.preventDefault();
    }
    if (correo == "") {
        alert("No escribio su correo");
        document.getElementById("correo").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#correo";
        event.preventDefault();
    }
    if (password1 == "") {
        alert("No escribio una contraseña");
        document.getElementById("password1").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#password1";
        event.preventDefault();
    }
    if (password2 == "") {
        alert("No escribio una contraseña");
        document.getElementById("password2").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#password2";
        event.preventDefault();
    }
    if (seguridad != "100%") {
        alert("Por favor ingresa un Contraseña Segura");
        document.getElementById("password1").className =
            "form-control p_input text-dark bg-warning";
            document.getElementById("password1").value = "";
        document.location.href = "#password1";
        event.preventDefault();
    }
    if (password1 != password2 ) {
        alert("Las contraseñas no coinciden");
        document.location.href = "#password2";
        event.preventDefault();
    }

}

function comparar() {
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    if (password1 != password2) {
        alert("Las contraseña no Coinciden ");
        // document.getElementById("password2").value = "";
        document.location.href = "#password2";
        
        
    }
}

function go() {
    // desactivar proteccion anti cierre
    window.onbeforeunload = null;
}

function donotgo() {
    return "!!Estas seguro de salir sin guardar se perderan los cambios realizados!!";
}
//validar letras de nombre
function validarletrasNom(e) {
    let nom = document.getElementById('nombre').value;
    let div = document.getElementById('nomdiv');

    if (expresiones.nombre.test(nom)) {
        document.getElementById('nombre').classList.remove('incorrecto') 
        document.getElementById('nombre').classList.add('correcto') 
 
        div.innerHTML='';
        // console.log('correcto');
    }else{
        document.getElementById('nombre').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5 style="background-color:pink;">Solo puedes ingresar letras</h5></font>'

        // console.log('incorrecto');

    }
    

}

function validarletrasUSR(e) {
    let cuentas = document.getElementById('user').value;
    let div = document.getElementById('usrdiv');

    if (expresiones.usuario.test(cuentas)) {
        document.getElementById('user').classList.remove('incorrecto') 
        document.getElementById('user').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('user').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5 style="background-color:pink;">No puedes ingresar caracteres especiales</h5></font>'

        console.log('incorrecto');

    }
    

}


function validarletrasEMAIL(e) {
    let cuentas = document.getElementById('correo').value;
    let div = document.getElementById('divCorreo');

    if (expresiones.correo.test(cuentas)) {
        document.getElementById('correo').classList.remove('incorrecto') 
        document.getElementById('correo').classList.add('correcto') 
 
        div.innerHTML='';
        // console.log('correcto');
    }else{
        document.getElementById('correo').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5 style="background-color:pink;">Ingresa un correo valido</h5></font>'

        // console.log('incorrecto');

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