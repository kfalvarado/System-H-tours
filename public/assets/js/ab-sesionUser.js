/**
 * Mecanismo para contar la inactividad del usuario
 */

n = 10;
contador = document.getElementById("number");
let id = window.setInterval(() => {
    console.log("paso un seguno");
    document.onmousemove = function name(params) {
        console.log("mouse se movio");
        n = 10;
    };
    contador.innerText = n;
    n--;
    if (n == 0) {
        // Swal.fire({
        // iconHtml: '؟',
        // text: 'Tu sesion a expirado'
        // })

        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            showCancelButton: false,
            iconHtml: "؟",
            text: "Tu sesion esta a punto de expirar",
            confirmButtonText: "Extender Sesion",
            denyButtonText: `Salir`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    text: "Tu sesion se a extendido",
                });
                window.location.replace(route('pruebas'));
            } else if (result.isDenied) {
                Swal.fire({
                    icon: "info",
                    text: "Deberas ingresar nuevaente",
                });
            }
        });
        clearInterval(id);
    }
}, 1000);
