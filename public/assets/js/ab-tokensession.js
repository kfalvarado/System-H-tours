 /**
 * Mecanismo de tiempo de vida del token
 */
// console.log('tokensession'); Confirmacion token session

function salir() {
    window.location.replace(route('cerrar.sesion'));
}



if (localStorage.getItem("time")) {
    // console.log('tokenCahce'); //confirmacion tokenCache
let time = document.getElementById('time');
token = localStorage.getItem("time");
let life = window.setInterval(() => {
  //   console.log("paso un segundo de token");
    time.value = token;
    token--;
    if (token == 60) {
        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            showCancelButton: false,
            iconHtml: "؟",
            text: "Tu sesion esta a punto de caducar, Quieres extender la sesion?",
            confirmButtonText: "Extender Sesion",
            denyButtonText: `Salir`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    text: "Tu sesion se a extendido",
                });
                //metodo para refrescar el token
               
                window.location.replace(route('refreshToken'));
            } else if (result.isDenied) {
                Swal.fire({
                    icon: "info",
                    text: "Deberas ingresar nuevamente",
                });
               
                salir();
            }
        });

       
        // clearInterval(id);
    }

    //expulsion por inactividad
    if (token == 0) {
       
        salir();
    }
}, 1000);


    
} else {
    

let time = document.getElementById('time');
  token = 3000; //60 minutos equivale a 3600 segundos  50 minutos son 3000 pedira un refresh token antes de que se agote el tiempo
  let life = window.setInterval(() => {
    //   console.log("paso un segundo de token");
      time.value = token;
      token--;
      if (token == 60) {
          Swal.fire({
              title: "Do you want to save the changes?",
              showDenyButton: true,
              showCancelButton: false,
              iconHtml: "؟",
              text: "Tu sesion esta a punto de caducar, Quieres extender la sesion?",
              confirmButtonText: "Extender Sesion",
              denyButtonText: `Salir`,
          }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                  Swal.fire({
                      icon: "success",
                      text: "Tu sesion se a extendido",
                  });
                  //metodo para refrescar el token
                 
                  window.location.replace(route('refreshToken'));
              } else if (result.isDenied) {
                  Swal.fire({
                      icon: "info",
                      text: "Deberas ingresar nuevamente",
                  });
                 
                  salir();
              }
          });
  
         
          // clearInterval(id);
      }
  
      //expulsion por inactividad
      if (token == 0) {
       
          salir();
      }
  }, 1000);

}