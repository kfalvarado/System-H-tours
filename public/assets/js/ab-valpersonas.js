/*
 * ============================================
 * Detener el intento de registro tercer Bloque
 * ============================================
 */
function comparar() {
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    if (password1 != password2) {
        alert("Las contraseña no Coinciden ");
        document.getElementById("password2").value = "";
    }
}

function validar() {
    let genero = document.getElementById("genero").value;
    let civil = document.getElementById("civil").value;
    let tipoPersona = document.getElementById("tipoPersona").value;
    let tipotelefono = document.getElementById("tipotelefono").value;

    if (genero == "Seleccionar") {
        alert("No selecciono un genero");
        document.getElementById("genero").className =
            "form-select form-select text-dark bg-warning";
        document.location.href = "#genero";
    }
    if (civil == "Seleccionar") {
        alert("No selecciono un Estado Civil");
        document.getElementById("civil").className =
            "form-select form-select text-dark bg-warning";
        document.location.href = "#civil";
    }
    if (tipoPersona == "Seleccionar") {
        alert("No selecciono un tipo de persona");
        document.getElementById("tipoPersona").className =
            "form-select form-select text-dark bg-warning";
        document.location.href = "#tipoPersona";
    }
    if (tipotelefono == "Seleccionar") {
        alert("No selecciono un tipo de Telefono");
        document.getElementById("tipotelefono").className =
            "form-select form-select text-dark bg-warning";
        document.location.href = "#tipotelefono";
    }
    // desactivar proteccion anti cierre
    window.onbeforeunload = null;
}
function check() {
    window.onbeforeunload = null;
}

function donotgo() {
    return "!!Estas seguro de salir sin guardar se perderan los cambios realizados!!";
}


