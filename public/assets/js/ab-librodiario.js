const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    numeros: /^\d.{1,10}$/, // 1 a 10 numeros.


}

// INICIO MODAL EDITAR 
let valit2 = /^[\w ]*$/i;

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
    /* Expresión regular de ejemplo (letras, números, _ y espacios) */
   
    let nombresubcuentas = document.getElementById(`nom_subcuenta_edit-${e}`).value;
    let div = document.getElementById(`divnom_edit-${e}`);

    // console.log(nombresubcuentas,div);
    if (expresiones.nombre.test(nombresubcuentas)) {
        document.getElementById(`nom_subcuenta_edit-${e}`).classList.remove('incorrecto')
        document.getElementById(`nom_subcuenta_edit-${e}`).classList.add('correcto')

        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById(`nom_subcuenta_edit-${e}`).classList.add('incorrecto')

        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
}


function validarnumerossaldo(e) {
    let saldoe = document.getElementById(`saldo-${e}`).value;
    let dive = document.getElementById(`divsaldoe-${e}`);
    // console.log(cuentas);
    if (expresiones.numeros.test(saldoe)) {
        document.getElementById(`saldo-${e}`).classList.remove('incorrecto') 
        document.getElementById(`saldo-${e}`).classList.add('correcto') 
        console.log('correcto');
        dive.innerHTML='';
    }else{
        document.getElementById(`saldo-${e}`).classList.add('incorrecto')
        dive.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
    
}  

// FINAL MODAL EDITAR


// INICIO MODAL NUEVO


function validarnumeroscargo(e) {
    let carg = document.getElementById('cargo').value;
    let divcarg = document.getElementById('divcargo');
    // console.log(cuentas);
    if (expresiones.numeros.test(carg)) {
        document.getElementById('cargo').classList.remove('incorrecto') 
        document.getElementById('cargo').classList.add('correcto') 
        console.log('correcto');
        divcarg.innerHTML='';
    }else{
        document.getElementById('cargo').classList.add('incorrecto')
        divcarg.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
    
}  


function validarnumerosabono(e) {
    let abono = document.getElementById('abono').value;
    let divabono = document.getElementById('divabono');
    // console.log(cuentas);
    if (expresiones.numeros.test(abono)) {
        document.getElementById('abono').classList.remove('incorrecto') 
        document.getElementById('abono').classList.add('correcto') 
        console.log('correcto');
        divabono.innerHTML='';
    }else{
        document.getElementById('abono').classList.add('incorrecto')
        divabono.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
    
}  

// FINAL MODAL NUEVO



