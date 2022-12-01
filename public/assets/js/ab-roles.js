const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^[+0-9]{4} [0-9]{8}$/, // telefonos numeros.
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


function validarletras(e) {
    let rol = document.getElementById('rol').value;
    let div = document.getElementById('divrol');

    if (expresiones.nombre.test(rol)) {
        document.getElementById('rol').classList.remove('incorrecto') 
        document.getElementById('rol').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('rol').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}


function validardescripcion(e) {
    let des = document.getElementById('des').value;
    let div = document.getElementById('divres');

    if (expresiones.nombre.test(des)) {
        document.getElementById('des').classList.remove('incorrecto') 
        document.getElementById('des').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('des').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    } 
}

function validareditarROL(e) {
    let rol = document.getElementById('editrol').value;
    let div = document.getElementById('divroledit');

    if (expresiones.nombre.test(rol)) {
        document.getElementById('editrol').classList.remove('incorrecto') 
        document.getElementById('editrol').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('editrol').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}


function validareditarDES(e) {
    let rol = document.getElementById('editres').value;
    let div = document.getElementById('divrresedit');

    if (expresiones.nombre.test(rol)) {
        document.getElementById('editres').classList.remove('incorrecto') 
        document.getElementById('editres').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('editres').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}