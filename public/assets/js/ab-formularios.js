const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    numeros: /^\d{1,10}$/ // 7 a 14 numeros.
}

const campos = {
    usuario: false,
    nombre: false,
    password: false,
    correo: false,
    telefono: false
}

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

function validarNgrupos(e) {
    let cuentas = document.getElementById('num_grupo').value;
    let div = document.getElementById('div_num');
    // console.log(cuentas);
    if (expresiones.numeros.test(cuentas)) {
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
