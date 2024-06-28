<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>[Proyecto RRHH 2023]</title>

        <!-- Bootstrap v5.3 framework -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- Fuentes -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">

        <!-- Iconos -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- Estilos personalizados -->
        <link rel="stylesheet" href="./Vista/style/Portero_Escaner.css">
    </head>
    <body class="h-100vh">

        <!-- CONTENIDO PRINCIPAL -->
        <div class="container-fluid p-5 ">
            <div class="d-flex justify-content-center align-items-center">
                <div class="w-100">
                    <div class="row justify-content-center align-items-center text-center ">
                        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6 col-xxl-5 text-white align-items-center justify-content-center p-5">

                            <h1>Escanear Qr</h1>


                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center text-center ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 col-xxl-5 text-white align-items-center justify-content-center p-3 Box">
                             <!-- Imagen donde va el escaner -->
                            <img src="./Vista/img/esca.PNG">

                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center text-center ">
                        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6 col-xxl-5 align-items-center justify-content-center p-5 ">
                             <!-- Boton para cerrar la sesion -->
                            <button class="BotonCerrarSesion px-4" type="button" data-bs-toggle="modal" data-bs-target="#mymodal">
                                Cerrar Sesion
                            </button>
                              <!-- INICIO MODAL -->
                            <div class="modal" id="mymodal" tabindex="-1" role="dialog" data-bs-backdrop="static"> <!-- backdrop sirve para que no salga del modal 
                                                                                                                     tocando otro lado de la pantalla -->
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                         <!-- Encabezado del modal -->
                                        <div class="modal-header justify-content-center">
                                            <h5 class="TituloModal"><b>Cerrar Sesion</b></h5>
                                        </div>
                                         <!-- Cuerpo del modal -->
                                        <div class="CuerpoModal">
                                            <p>¿Está seguro que desea cerrar sesion?</p>
                                        </div>
                                         <!-- Botones del modal -->
                                        <div class="modal-footer">
                                            <button type="button" class="BotonCancelarModal px-4" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="">
                                                <button type="submit" class="BotonAceptarModal px-4">Aceptar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!-- FIN MODAL -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FIN CONTENIDO PRINCIPAL -->

        <!-- Funciones Bootrstrap v5.3 framework -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <!-- Funciones personalizadas -->
        <script src="./Vista/js/Portero_Escaner.js"></script>

    </body>
</html>