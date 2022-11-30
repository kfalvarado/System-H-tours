//preguntas
const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    contrasegna: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^[+0-9]{4} [0-9]{4}-[0-9]{4}$/, // telefonos numeros.
    numeros: /^\d{1,10}$/, // 7 a 14 numeros.
    identidad: /^[0-9]{6}-\d{4}-\d{5}$/, // 7 a 16 numeros.
    genero: /^[M|F]$/,
    tipo_persona: /^[N|J]$/,
    direccion: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    estado_civil: /^[S|C|D|V]$/,
    tipo_telefono: /^[C|T]$/,
}

const campos = {
    usuario: false,
    nombre: false,
    numeros: false,
    password: false,
    correo: false,
    telefono: false
}




function validarRes(e) {
    let cuentas = document.getElementById('respuesta').value;
    let div = document.getElementById('divres');

    if (expresiones.nombre.test(cuentas)) {
        document.getElementById('respuesta').classList.remove('incorrecto') 
        document.getElementById('respuesta').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('respuesta').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    
}

//ajustes
//Usuario
function validarUsrConfig(e) {
    let usuario_config = document.getElementById('nom_usuario').value;
    let div = document.getElementById('divusrconfig');

    if (expresiones.nombre.test(usuario_config)) {
        document.getElementById('nom_usuario').classList.remove('incorrecto') 
        document.getElementById('nom_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('nom_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    
}

//Genero
function validarGnrConfig(e) {
    let gnr_config = document.getElementById('gnr_usuario').value;
    let div = document.getElementById('divgnrconfig');

    if (expresiones.genero.test(gnr_config)) {
        document.getElementById('gnr_usuario').classList.remove('incorrecto') 
        document.getElementById('gnr_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('gnr_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar M (MASCULINO) ó F (FEMENINO) en mayúscula</h5></font>'

        console.log('incorrecto');

    }
    
}

//Edad
function validarEdadConfig(e) {
    let edad_config = document.getElementById('edad_usuario').value;
    let div = document.getElementById('divedadconfig');

    if (expresiones.numeros.test(edad_config)) {
        document.getElementById('edad_usuario').classList.remove('incorrecto') 
        document.getElementById('edad_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('edad_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar solo numeros</h5></font>'

        console.log('incorrecto');

    }
    
}

//Tipo de persona
function validarTpConfig(e) {
    let tp_config = document.getElementById('tp_usuario').value;
    let div = document.getElementById('divtpconfig');

    if (expresiones.tipo_persona.test(tp_config)) {
        document.getElementById('tp_usuario').classList.remove('incorrecto') 
        document.getElementById('tp_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('tp_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar N (NORMAL) ó J (JURIDICA) en mayúscula</h5></font>'

        console.log('incorrecto');

    }
    
}


//Id
function validarIdConfig(e) {
    let id_config = document.getElementById('id_usuario').value;
    let div = document.getElementById('dividconfig');

    if (expresiones.identidad.test(id_config)) {
        document.getElementById('id_usuario').classList.remove('incorrecto') 
        document.getElementById('id_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('id_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar solo numeros</h5></font>'

        console.log('incorrecto');

    }
    
}

//Estado Civil
function validarEstCivilConfig(e) {
    let estcivil_config = document.getElementById('EstadoC_usuario').value;
    let div = document.getElementById('divestcconfig');

    if (expresiones. estado_civil.test(estcivil_config)) {
        document.getElementById('EstadoC_usuario').classList.remove('incorrecto') 
        document.getElementById('EstadoC_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('EstadoC_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar S (SOLTERO) ó C (CASADO) ó D (DIVORCIADO) ó V (VIUDO) en mayúscula.</h5></font>'

        console.log('incorrecto');

    }
    
}

//Teléfono
function validarTelConfig(e) {
    let tel_config = document.getElementById('tel_usuario').value;
    let div = document.getElementById('divtelconfig');

    if (expresiones.telefono.test(tel_config)) {
        document.getElementById('tel_usuario').classList.remove('incorrecto') 
        document.getElementById('tel_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('tel_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar un Nr° de teléfono (ej. +504 9090-9090).</h5></font>'

        console.log('incorrecto');

    }
    
}

//Tipo de teléfono
function validarTipoTelConfig(e) {
    let tipotel_config = document.getElementById('tiptel_usuario').value;
    let div = document.getElementById('divtiptelconfig');

    if (expresiones.tipo_telefono.test(tipotel_config)) {
        document.getElementById('tiptel_usuario').classList.remove('incorrecto') 
        document.getElementById('tiptel_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('tiptel_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar C (CELULAR) ó T (TELÉFONO FIJO) en mayúscula.</h5></font>'

        console.log('incorrecto');

    }
    
}

// Contraseña
function validarContraConfig(e) {
    let contra_config = document.getElementById('contra_usuario').value;
    let div = document.getElementById('divcontraconfig');

    if (expresiones.contrasegna.test(tipotel_config)) {
        document.getElementById('contra_usuario').classList.remove('incorrecto') 
        document.getElementById('contra_usuario').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('contra_usuario').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Debe ingresar C (CELULAR) ó T (TELÉFONO FIJO) en mayúscula.</h5></font>'

        console.log('incorrecto');

    }
    
}