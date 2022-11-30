const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    numeros: /^\d{1,10}$/ // 1 a 10 numeros.
}

const campos = {
    usuario: false,
    nombre: false,
    numeros: false,
    correo: false,
}

function validarobjeto(e) {
    let objetos = document.getElementById('objeto').value;
    let div = document.getElementById('divobjeto');

    if (expresiones.nombre.test(objetos)) {
        document.getElementById('objeto').classList.remove('incorrecto') 
        document.getElementById('objeto').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('objeto').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}

function validardescripcion(e) {
    let descripcion = document.getElementById('descripcion').value;
    let div = document.getElementById('divdescripcion');

    if (expresiones.nombre.test(descripcion)) {
        document.getElementById('descripcion').classList.remove('incorrecto') 
        document.getElementById('descripcion').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('descripcion').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}

function validartipo(e) {
    let tipobjeto = document.getElementById('tipobjeto').value;
    let div = document.getElementById('divtipo');

    if (expresiones.nombre.test(tipobjeto)) {
        document.getElementById('tipobjeto').classList.remove('incorrecto') 
        document.getElementById('tipobjeto').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('tipobjeto').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}