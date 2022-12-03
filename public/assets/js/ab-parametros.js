const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{1,25}$/, // Letras, numeros, guion y guion_bajo
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

function validarparametro(e) {
    let parametro = document.getElementById('parametro').value;
    let div = document.getElementById('divparame');

    if (expresiones.usuario.test(parametro)) {
        document.getElementById('parametro').classList.remove('incorrecto') 
        document.getElementById('parametro').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('parametro').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>No se  admiten caracteres</h5></font>'

        console.log('incorrecto');

    }
    

}

function validarvalor(e) {
    let valor = document.getElementById('valor').value;
    let div = document.getElementById('divvalor');

    if (expresiones.usuario.test(valor)) {
        document.getElementById('valor').classList.remove('incorrecto') 
        document.getElementById('valor').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('valor').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}

function validarparametrosEDIT(e) {
    let parametro = document.getElementById(`parametro-edit-${e}`).value;
    let div = document.getElementById(`divparametro-${e}`);


    if (expresiones.nombre.test(parametro)) {
        document.getElementById(`parametro-edit-${e}`).classList.remove('incorrecto') 
        document.getElementById(`parametro-edit-${e}`).classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById(`parametro-edit-${e}`).classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }

}

function validarvalorEDIT(e) {
    let valor = document.getElementById(`valor-edit-${e}`).value;
    let div = document.getElementById(`divvalor-${e}`);


    if (expresiones.nombre.test(valor)) {
        document.getElementById(`valor-edit-${e}`).classList.remove('incorrecto') 
        document.getElementById(`valor-edit-${e}`).classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById(`valor-edit-${e}`).classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }

}

function validarfechacreacionEDIT(e) {
    let fechacrea = document.getElementById(`fecha-edit-${e}`).value;
    let div = document.getElementById(`divfecha-${e}`);


    if (expresiones.nombre.test(fechacrea)) {
        document.getElementById(`fecha-edit-${e}`).classList.remove('incorrecto') 
        document.getElementById(`fecha-edit-${e}`).classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById(`fecha-edit-${e}`).classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }

}