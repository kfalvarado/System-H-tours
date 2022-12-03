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

function validarclasificacion(e) {
    let clasificacion = document.getElementById('clasificacion').value;
    let div = document.getElementById('divclasi');

    if (expresiones.nombre.test(clasificacion)) {
        document.getElementById('clasificacion').classList.remove('incorrecto') 
        document.getElementById('clasificacion').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('clasificacion').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}

function validarclasificacionEDIT(e) {
    let clasificacion = document.getElementById(`clasificacion-edit-${e}`).value;
    let div = document.getElementById(`divclasificacion-${e}`);


    if (expresiones.nombre.test(clasificacion)) {
        document.getElementById(`clasificacion-edit-${e}`).classList.remove('incorrecto') 
        document.getElementById(`clasificacion-edit-${e}`).classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById(`clasificacion-edit-${e}`).classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }

}