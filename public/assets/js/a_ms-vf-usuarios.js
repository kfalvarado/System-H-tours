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
    let usr = document.getElementById('nom_usr').value;
    let div = document.getElementById('divUsuarios');

    if (expresiones.nombre.test(usr)) {
        document.getElementById('nom_usr').classList.remove('incorrecto') 
        document.getElementById('nom_usr').classList.add('correcto')
        div.innerHTML='';
        console.log(div);
        console.log('correcto');
    }else{
        document.getElementById('nom_usr').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puede ingresar letras</h5></font>'
        console.log(div);
        console.log('incorrecto');

    }
    

}

// PREGUNTAS

function validarRes(e) {
    const res = document.getElementById('res_usr').value;
    const div = document.getElementById('divRes');

    if (expresiones.nombre.test(res)) {
        document.getElementById('res_usr').classList.remove('incorrecto') 
        document.getElementById('res_usr').classList.add('correcto')
        div.innerHTML='';
        console.log(div);
        console.log('correcto');
    }else{
        document.getElementById('res_usr').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puede ingresar letras</h5></font>'
        console.log(div);
        console.log('incorrecto');

    }
    

}