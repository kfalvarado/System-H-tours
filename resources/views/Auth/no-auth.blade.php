<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 404 Error Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="d-flex align-items-center justify-content-center vh-100 bg-primary">
      <!-- <img src="https://i.pinimg.com/474x/07/60/46/076046d25bb654bb578f7a5b1988ab8e--ab-initio-robots.jpg" alt=""> -->
        <h1 class="display-1 fw-bold text-white">No tienes Autorizacion para estar aqui debes indentificarte </h1>
        
        <a class="btn btn-success " href="{{route('Auth.login')}}">Auntenticarse</a>
    </div>
  </body>

</html>