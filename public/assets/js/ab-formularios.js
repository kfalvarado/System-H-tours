const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^[+0-9 ]{2,5} [0-9-]{4,13}[0-9-]{4,13}$/, // telefonos numeros.
    numeros: /^\d{1,10}$/, // 7 a 14 numeros.
    identidad: /^[0-9]{4}-\d{4}-\d{5}$/ // 7 a 14 numeros.
}

const campos = {
    usuario: false,
    nombre: false,
    numeros: false,
    password: false,
    correo: false,
    telefono: false
}

// validar cuentas y subcuentas 
function validarnumeros(e) {
    let cuentas = document.getElementById('num_cuenta').value;
    let div = document.getElementById('divnum');
    // console.log(cuentas);
    if (expresiones.numeros.test(cuentas)) {
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

function validarletras(e) {
    let cuentas = document.getElementById('nom_cuenta').value;
    let div = document.getElementById('divcuenta');

    if (expresiones.nombre.test(cuentas)) {
        document.getElementById('nom_cuenta').classList.remove('incorrecto') 
        document.getElementById('nom_cuenta').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('nom_cuenta').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}

// validaciones grupos 
function validarNgrupos(e) {
    let numgrupo = document.getElementById('num_grupo').value;
    let div = document.getElementById('div_num');
    // console.log(cuentas);
    if (expresiones.numeros.test(numgrupo)) {
        document.getElementById('num_grupo').classList.remove('incorrecto') 
        document.getElementById('num_grupo').classList.add('correcto') 
        console.log('correcto');
        div.innerHTML='';
    }else{
        document.getElementById('num_grupo').classList.add('incorrecto')
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
}
function validarLgrupos(e) {
    let nom_grupo = document.getElementById('nom_grupo').value;
    let div = document.getElementById('divgrupo');

    if (expresiones.nombre.test(nom_grupo)) {
        document.getElementById('nom_grupo').classList.remove('incorrecto') 
        document.getElementById('nom_grupo').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('nom_grupo').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}

// personas
function validarEdad(e) {
    let edad = document.getElementById('edad').value;
    let div = document.getElementById('divedad');
    // console.log(cuentas);
    if (expresiones.numeros.test(edad)) {
        document.getElementById('edad').classList.remove('incorrecto') 
        document.getElementById('edad').classList.add('correcto') 
        console.log('correcto');
        div.innerHTML='';
    }else{
        document.getElementById('edad').classList.add('incorrecto')
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
    
}

function validarDNI(e) {
    let dni = document.getElementById('dni').value;
    let div = document.getElementById('divdni');
    // console.log(cuentas);
    if (expresiones.identidad.test(dni)) {
        document.getElementById('dni').classList.remove('incorrecto') 
        document.getElementById('dni').classList.add('correcto') 
        console.log('correcto');
        div.innerHTML='';
    }else{
        document.getElementById('dni').classList.add('incorrecto')
        div.innerHTML='<font color="yellow"> <h5>Escriba un numero de DNI valido</h5></font>'
        console.log('incorrecto');
        
    } 
}

function validarTel(e) {
    let telefono = document.getElementById('telefono').value;
    let div = document.getElementById('divtelefono');
    // console.log(cuentas);
    if (expresiones.telefono.test(telefono)) {
        document.getElementById('telefono').classList.remove('incorrecto') 
        document.getElementById('telefono').classList.add('correcto') 
        console.log('correcto');
        div.innerHTML='';
    }else{
        document.getElementById('telefono').classList.add('incorrecto')
        div.innerHTML='<font color="yellow"> <h5>Ingresa un telefono</h5></font>'
        console.log('incorrecto');
    }
}
