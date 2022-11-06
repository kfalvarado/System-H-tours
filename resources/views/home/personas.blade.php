<!DOCTYPE html>
<html lang="en">

    <head>
        
        <style>
            body{
                background-image: url('/assets/images/Login_bg.jpg');
            }
        </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HTOURS | RECUPERACION</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <div class="mt-5 conatiner">
            <div class="text-center">
                <h3 class="text-light">Bienvenido {{ Cache::get('user') }}  a SystemHtours</h3>
                <h5 class="text-light">Porfavor ingresa los siguientes datos</h5>
            
            </div> 
            <div class=" d-flex align-items-center justify-content-center">
                <div class="col-md-4" style=" background-color: #029d2988;">
                    <div class="p-4 rounded shadow-md">
                      <form action="{{ route('primer.acceso') }}" method="post">
                        @csrf
                      <center>
                        
                        <label for="">
                          <div style="background-color: #0778b199">
                            <font color='white'><h5> Genero</h5></font>
                          </div>
                            <label for="masculino" >
                              <input type="radio" id="genero" name="genero" value="M" class="form-check-input">
                            <font color='white'>Masculino</font>  
                            </label>                 
                            <label for="femenino">
                            <input type="radio" id="genero" name="genero" value="F" class="form-check-input">
                            <font color='white'>Femenino</font>
                          </label>
                        </center>
                          <br>
                           <table>
                            <thead>
                              <th>
                                <label for="civil">
                                  <label for="civil"  style="background-color: #0778b199">
                                    <center><font color='white'>&nbsp;&nbsp;&nbsp;Estado Civil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font> </center>
                                  </label>
                                    <Select id="civil" name="civil" class="form-select form-select-md mb-3" id="tipoPersona" name="tipoPersona" required>
                                      <option hidden selected>Seleccionar</option>
                                      <option value="S">Soltero</option>
                                      <option value="V">Viudo</option>
                              <option value="C">Casado</option>
                              <option value="D">Divorciado</option>
                            </Select>
                          </th>
                           <th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
                       <th>

                      </label> 
                      <center>
                        <label style="background-color: #0778b199"> <font color='white'>  Tipo de persona</font>
                        </center>
                        <Select onchange="validacion1();" class="form-select form-select-md mb-3" id="tipoPersona" name="tipoPersona" required>
                          <option hidden selected>Seleccionar</option>
                          <option value="N">Normal</option>
                          <option value="J">Juridica</option>
                        </Select>
                      </label>
                    </th>
                        </thead>
                      </table>
                          <div class="form-group">
                            <table>
                              <thead>
                                <th>

                                  <label for="" style="background-color: #0778b199"> <font color='white'> &nbsp;  Edad </font>  
                                    <input type="number" id="edad" name="edad" min="0" max="100" class="form-control" required>
                                  </label>  
                                </th>
                                <th></th>
                                <th>

                                  <label for="" style="background-color: #0778b199"> <font color='white'> &nbsp; Identidad </font> 
                                    <input type="number" onclick="tipopersona();"minlength="0" min="0" pattern="[09]+" id="identidad" name="identidad" onkeypress="return validarprimercampo(event);" class="form-control p_input text-dark bg-white" size="100" required>
                                  </label> 
                                </th>
                                <th></th>
                                <th>
                                  <label  style="background-color: #0778b199"> <font color='white'>&nbsp; Telefono </font>
                                    <input type="number" id="telefono" name="telefono" class="form-control p_input text-dark bg-white" required>
                                  </label>
                                </th>
                              </thead>
                            </table>
                      </div>   
                      <br>
                      <div class="form-group">
                      <label style="background-color: #0778b199">
                                <font color='white'>&nbsp;&nbsp;Tipo de Telefono &nbsp;&nbsp;</font>
                      </label>
                                <Select class="form-select form-select mb-3" id="tipotelefono" name="tipotelefono" required>
                                  <option hidden selected>Seleccionar</option>
                                  <option value="C">Celular</option>
                                  <option value="T">Telefono Fijo</option>
                                </Select>
                      </div> 
                      <div class="form-group">
                        <label style="background-color: #0778b199">
                          <font color='white'>Ingresar una nueva Contraseña </font>
                          
                        </label>
                        <div class="form-row">
                          <div class="col">
                            <input class="form-control p_input text-dark bg-white" placeholder="Contraseña" type="password" name="password1" id="password1" required>
                          </div>
                        </div>
      
      
                        <br>
                        <!-- END CONTRASEÑA -->
                        <!-- 2 CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->
      
                        <label style="background-color: #0778b199">
                          <font color='white'> Repetir Contraseña </font>
                        </label>
                        <div class="form-row">
                          <div class="col">
                            <input class="form-control p_input text-dark bg-white" placeholder="Repetir Contraseña" type="password" onchange="validacion3();" name="password2" id="password2" required>
                          </div>
      
                      </div> 
                      <br>
                      <center>
                        <button class="btn btn-outline-info  text-white" type="submit">Guardar</button>
                      </center>
                    </form>           
                </div>
            </div>
        </div>
        </div>

        <script>
          
        </script>
    </body>
</html>
