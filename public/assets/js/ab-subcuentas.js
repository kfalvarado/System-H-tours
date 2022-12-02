const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    numeros: /^\d{1,10}$/ // 1 a 10 numeros.
}


//insertar
function validarnumeros(e) {
    let subcuentas = document.getElementById('num_subcuenta').value;
    let div = document.getElementById('divnum');
    // console.log(subcuentas);
    if (expresiones.numeros.test(subcuentas)) {
        document.getElementById('num_subcuenta').classList.remove('incorrecto') 
        document.getElementById('num_subcuenta').classList.add('correcto') 
        console.log('correcto');
        div.innerHTML='';
    }else{
        document.getElementById('num_subcuenta').classList.add('incorrecto')
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
    
}    

function validarletras(e) {
    let cuentas = document.getElementById('nom_subcuenta').value;
    let div = document.getElementById('divsubcuenta');

    if (expresiones.nombre.test(cuentas)) {
        document.getElementById('nom_subcuenta').classList.remove('incorrecto') 
        document.getElementById('nom_subcuenta').classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById('nom_subcuenta').classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}


//editar
function validarnumerosEDIT(e) {
    let subcuentas = document.getElementById(`num_subcuenta-edit-${e}`).value;
    let div = document.getElementById(`divnum-edit-${e}`);
    // console.log(subcuentas);
    if (expresiones.numeros.test(subcuentas)) {
        document.getElementById(`num_subcuenta-edit-${e}`).classList.remove('incorrecto') 
        document.getElementById(`num_subcuenta-edit-${e}`).classList.add('correcto') 
        console.log('correcto');
        div.innerHTML='';
    }else{
        document.getElementById(`num_subcuenta-edit-${e}`).classList.add('incorrecto')
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
        console.log('incorrecto');
        
    }
    
}    

function validarletrasEDIT(e) {
    let cuentas = document.getElementById(`nom_subcuenta-edit-${e}`).value;
    let div = document.getElementById(`divnom-edit-${e}`);

    if (expresiones.nombre.test(cuentas)) {
        document.getElementById(`nom_subcuenta-edit-${e}`).classList.remove('incorrecto') 
        document.getElementById(`nom_subcuenta-edit-${e}`).classList.add('correcto') 
 
        div.innerHTML='';
        console.log('correcto');
    }else{
        document.getElementById(`nom_subcuenta-edit-${e}`).classList.add('incorrecto') 
      
        div.innerHTML='<font color="red"> <h5>Solo puedes ingresar letras</h5></font>'

        console.log('incorrecto');

    }
    

}
