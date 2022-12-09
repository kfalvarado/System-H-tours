<!DOCTYPE html>
<html lang="en">

<head>

  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTOURS | Datos personales</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- iconos boostrap  --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        {{-- sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/formularios.css') }}">
    {{-- Campo de iconos del telefono --}}
    <style>
        .iti-flag {
            background-image: url("img/flgs.png");
        }

        @media (-webkit-min-device-pixe-ratio: 2),
        (min-resolution: 192dpi) {
            .iti-flag {
                background-image: url('img/flag02x.png');
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"
        integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- icono  --}}
    <link rel="icon" href="{{ asset('assets/images/HTOURS.png') }}" />
</head>

<body onbeforeunload="return donotgo();" oncopy="return false" onpaste="return false" style="background-color: #145666">

    @if (Session::has('misma'))
        <script>
            Swal.fire({
                icon: 'error',
                text: 'No puedes ingresar tu anterior Contraseña'
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    <div class="mt-7 conatiner">
        <div class="text-center p-1 mb-1" style="background-color: #029d2988;">
            <h3 class="text-light">Bienvenido {{ Cache::get('user') }} a SystemHtours</h3>
            <h5 class="text-light">Por favor ingresa los siguientes datos</h5>

        </div>
        <div class=" d-flex align-items-center justify-content-center">
            <div class="col-md-4" style=" background-color: #029d2988;">
                <div class="p-4 rounded shadow-md">
                    <form action="{{ route('primer.acceso') }}" method="post">
                        @csrf
                        <center>

                            <div class="row" style="background-color: #0778b199">
                                <label for="">
                                    <font color='white'>
                                        <h5><i class="bi bi-gender-ambiguous"></i> Género </h5>
                                    </font>
                                    <select class="form-select form-select-md mb-3" name="genero" id="genero"
                                        required>
                                        <option hidden selected>Seleccionar</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </label>
                            </div>
                        </center>
                        <br>
                        <center>
                            <div class="row" style="background-color: #0778b199">

                                <label for="">

                                    <font color='white'>
                                        <h5>
                                            <i class="bi bi-person-badge"></i>
                                            Estado
                                            Civil
                                        </h5>
                                    </font>
                                    <Select id="civil" name="civil" class="form-select form-select-md mb-3"
                                        required>
                                        <option hidden selected>Seleccionar</option>
                                        <option value="S">Soltero</option>
                                        <option value="V">Viudo</option>
                                        <option value="C">Casado</option>
                                        <option value="D">Divorciado</option>
                                    </Select>
                                </label>
                            </div>
                        </center>
                        <br>
                        <div class="row" style="background-color: #0778b199">


                            <center>
                                <label>
                                    <h5>

                                        <font color='white'> <i class="bi bi-people"></i> Tipo de persona</font>
                                    </h5>
                            </center>
                            <Select class="form-select form-select-md mb-3" id="tipoPersona" name="tipoPersona"
                                required>
                                <option hidden selected>Seleccionar</option>
                                <option value="N">Normal</option>
                                <option value="J">Jurídica</option>
                            </Select>
                            </label>
                        </div>
                        <br>
                        <center>
                            <div class="row">
                                <div class="col-12">

                                    <label for="" style="background-color: #0778b199">
                                        <center>

                                            <font color='white'> <i class="bi bi-person-vcard"></i> Identidad </font>
                                        </center>
                                        <input type="tel" onclick="tipopersona();"minlength="0" min="0"
                                            placeholder="0801-2000-09115"
                                            pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}"id="identidad" name="identidad"
                                            onkeypress="return validarprimercampo(event);"
                                            class="form-control p_input text-dark bg-white" required>
                                    </label>
                                </div>
                            </div>
                        </center>
                        <br>
                        <center>

                            <div class="row">
                                <div class="col-12">

                                    <label for="" style="background-color: #0778b199">
                                        <center>

                                            <font color='white'> <i class="bi bi-person-plus"></i> Edad </font>
                                        </center>
                                        <input type="number" id="edad" name="edad" placeholder="0"
                                            onkeyup="myedad()" onclick="validarSelect()" min="16" max="100"
                                            class="form-control" required>
                                        <div id="divedad"></div>
                                </div>
                                </label>

                            </div>
             
                </center>
                <br>
              

                <div class="row">
                    <center>


                        <div class="col-6">

                            <label style="background-color: #0778b199">
                                <center>

                                    <font color='white'><i class="bi bi-telephone"></i> Teléfono </font>
                                </center>
                                <input type="tel" id="telefono" name="telefono"
                                    class="form-control p_input text-dark bg-white" placeholder="+504 9021-3300"
                                    pattern="[+0-9 ]{2,5} [0-9-]{4,13}[0-9-]{4,13}" required>
                            </label>
                        </div>
                    </center>
                </div>
                <br>
                <center>
                <div class="row" style="background-color: #0778b199;">
                    <label>
                        <center>
                            <h5>

                                <font color='white'> <i class="bi bi-telephone-plus"></i> Tipo de Teléfono</font>
                            </h5>
                        </center>
                        <Select class="form-select form-select-md mb-3" id="tipotelefono" name="tipotelefono" required>
                            <option hidden selected>Seleccionar</option>
                            <option value="C">Celular</option>
                            <option value="T">Teléfono Fijo</option>
                        </Select>
                    </label>
                </div>
                </center>
            </div>
                <br>
                <div class="form-group">
                    <label style="background-color: #0778b199">
                        <h5>

                            <font color='white'><i class="bi bi-clipboard"></i> Ingresar una nueva Contraseña </font>
                        </h5>

                    </label>
                
                    <div class="form-row">
                        <div class="col">
                            <div class="input-group mb-3">
                                
                                <input class="form-control p_input text-dark bg-white" onchange="Contraseña();"
                                onkeyup="muestra_seguridad_clave(this.value, this.form)" placeholder="Contraseña"
                                type="password" name="password1" id="password1" required>
                                <span class="input-group-text" id="basic-addon1"> <i id="ojo1" class="bi bi-eye-fill" onclick="mostrarContra1()"></i></span>
                              </div>
                             
                            </div>
                    </div>
                    <label>
                        <font color='white'><b><i class="bi bi-shield-lock"></i> Seguridad de Contraseña</b> </font>
                    </label>
                    <input id="seguridad" name="seguridad" type="text"
                        style="background: transparent; border: none; color: #ffffff; " onfocus="blur()">

                    <br>
                    <br>
                    <!-- END CONTRASEÑA -->
                    <!-- 2 CAMPO DE CONTRASEÑA DE LOGIN MOSTRAR MEDIANTE ICONO CANDADO -->

                    <label style="background-color: #0778b199">
                        <h5>

                            <font color='white'><i class="bi bi-clipboard-check"></i> Repetir Contraseña </font>
                        </h5>
                    </label>
                    <div class="form-row">
                        <div class="col">
                            <div class="input-group mb-3">
                            <input class="form-control p_input text-dark bg-white" placeholder="Repetir Contraseña"
                                type="password" onchange="comparar();" name="password2" id="password2" required>
                                <span class="input-group-text" id="basic-addon1"> <i id="ojo2" class="bi bi-eye-fill" onclick="mostrarContra2()"></i></span>
                              
                            </div>
                        </div>
                    </div>
                    <br>
                    <center>
                        <button class="btn btn-outline-info  text-white" onclick="validar();"
                            type="submit">Guardar</button>
                    </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/ab-valpersonas.js') }}"></script>
</body>

</html>
