<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feria Vocacional-Login</title>

    <!-- Bootstrap v5.3 framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="./Vista/style/Login.css">
</head>
<body onload="Mensaje()">

<!-- CONTENIDO PRINCIPAL -->
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center HeightDiv">
        <div class="w-100">
            <div class="row justify-content-center align-items-center text-center ">
                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6 col-xxl-5 LandingMainDiv text-white align-items-center justify-content-center p-5">
                    <img src="./Vista/img/logo_covao.png" class="img-fluid w-25 pb-3" alt="Logo_covao">
                    <div>
                        <i class="bi bi-person"></i>
                    </div>
                    <h1 class="FuenteTitulos LandingTitulo"> <b>Iniciar sesión</b> </h1>
                    <form action="./index.php?controlador=index&accion=Login" method="post">
                        <div class="row justify-content-center">

                            <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 col-xxl-6 align-items-center justify-content-center text-center">
                                <div class="form-floating">
                                    <input type="text" class="form-control LandingInput" id="correo" placeholder="Cédula" name="cedula">
                                    <label for="correo">Cédula</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="password" class="form-control LandingInput" id="contra" placeholder="Contraseña" name="pass">
                                    <label for="contra">Contraseña</label>
                                </div>
                            </div>

                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a class="RecuperarLink me-3" data-bs-toggle="modal" data-bs-target="#modalRecuperar" >¿Olvidó su contraseña?</a>
                        </div>
                        <button class="mt-5 py-1 LandingButton" type="submit" name="button" onclick="IniciarSesion()">Aceptar</button>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5">
                        <label for="#Registrar">¿No tiene una cuenta?</label>
                        <a class="RecuperarLink" id="#Registrar" href="./index.php?controlador=index&accion=Formulario">Regístrese</a>
                    </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIN CONTENIDO PRINCIPAL -->

<!-- INICIO MODAL RECUPERAR CONTRASEÑA -->
<div class="modal fade" id="modalRecuperar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalRecuperar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body mx-4">
                <h2 class="ModalTitulo"><b>Recuperar contraseña</b></h2>
                <p>Ingrese el correo electrónico asociado a su cuenta:</p>
                <div class="form-floating mx-5">
                    <input type="email" class="form-control LandingInput" id="correoRecuperar" placeholder="Correo electrónico" name="correo" required>
                    <label for="correoRecuperar">Correo electrónico</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="CloseButton" type="button" name="button" data-bs-dismiss="modal">Cancelar</button>
                <button class="ConfirmButton" type="button" name="button" onclick="ValidarCorreo()">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL RECUPERAR CONTRASEÑA -->

    <script>
        function Mensaje()
        {
            var mensaje='<?php echo $mensaje?>';
            if(mensaje!="")
                Swal.fire                                       //Envia una alerta para completar los campos
            ({
                icon: 'error',
                title:mensaje,
                text: 'Ingrese los datos correctamente o cree una cuenta',
            })
        }
    </script>
    
<!-- Funciones Bootstrap v5.3 framework -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!--Funciones SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Funciones jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Funciones personalizadas -->
<script src="./Vista/js/Login.js"></script>

</body>
</html>
