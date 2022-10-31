/*
 ============================================
    Detener el intento de registro tercer Bloque
 ============================================
*/
function validacion() {
    let user = document.getElementById("user").value;
    let correo = document.getElementById("correo").value;
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    if (user == "") {
        alert("No escribio su nombre de Usuario");
        document.getElementById("user").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#user";
    }
    if (correo == "") {
        alert("No escribio su correo");
        document.getElementById("correo").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#correo";
    }
    if (password1 == "") {
        alert("No escribio una contraseña");
        document.getElementById("password1").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#password1";
    }
    if (password2 == "") {
        alert("No escribio una contraseña");
        document.getElementById("password2").className =
            "form-control p_input text-dark bg-warning";
        document.location.href = "#password2";
    }
}
function comparar() {
    let password1 = document.getElementById("password1").value;
    let password2 = document.getElementById("password2").value;
    if (password1 != password2) {
        alert("Las contraseña no Coinciden ");
        document.getElementById("password2").value = "";
    }
}
