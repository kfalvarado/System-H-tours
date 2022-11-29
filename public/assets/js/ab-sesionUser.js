/**
 * Mecanismo para contar la inactividad del usuario
 */

n = 300; // 5 minutos equivale a 300 
contador = document.getElementById("number");
let id = window.setInterval(() => {
    // console.log("paso un seguno");
    document.onmousemove = function name(params) {
        // console.log("mouse se movio");
        n = 300;
    };
    contador.innerText = n;
    n--;
    if (n == 60) {
        // Swal.fire({
        // iconHtml: '؟',
        // text: 'Tu sesion a expirado'
        // })

        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: false,
            showCancelButton: false,
            iconHtml: "؟",
            text: "Tu sesion esta a punto de cerrar por inactividad, presiona extender para evitarlo",
            confirmButtonText: "Extender Sesion",
            denyButtonText: `Salir`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    text: "Tu sesion se a extendido",
                });
                
            } else if (result.isDenied) {
                Swal.fire({
                    icon: "info",
                    text: "Deberas ingresar nuevamente",
                });
                window.location.replace(route('cerrar.sesion'));
            }
        });

       
        // clearInterval(id);
    }

    //expulsion por inactividad
    if (n == 0) {
        window.location.replace(route('cerrar.sesion'));
    }
}, 1000);

//funcion para guardae en Cache El tiempo de Vencimiento del Token
function CacheTime() {
    time = document.getElementById('time').value
    // console.log(time);
    localStorage.setItem('time',time)
   
  }