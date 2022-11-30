const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    numeros: /^\d.{1,10}$/, // 1 a 10 numeros.


}




// INICI MODAL EDITAR


function validarnumerossaldo(e) {
    let saldoem = document.getElementById('saldo').value;
    let divem = document.getElementById('divsaldoem');
    // console.log(cuentas);
    if (expresiones.numeros.test(saldoem)) {
        document.getElementById('saldo').classList.remove('incorrecto') 
        document.getElementById('saldo').classList.add('correcto') 
        console.log('correcto');
        divem.innerHTML='';
    }else{
        document.getElementById('saldo').classList.add('incorrecto')
        divem.innerHTML='<font color="red"> <h5>Solo puedes ingresar numeros</h5></font>'
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


