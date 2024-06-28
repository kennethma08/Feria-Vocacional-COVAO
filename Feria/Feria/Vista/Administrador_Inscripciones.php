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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="./Vista/style/StyleInscripciones.css">
  </head>
  <body style="background-image: url(./Vista/img/fondo.png);">
    <div class="container-fluid">
      <div class="row">
        <div class="col-0 col-md-2">
            <div class="wrapper fixed-left">
              <nav id="sidebar" style="display: flex; flex-direction: column; justify-content: center;">
                <div class="sidebar-header">
                  <img src="./Vista/img/logo_covao.png" class="img-fluid p-5" alt="">
                </div>
        
                <!-- estas son las opciones de la barra de navegación
                list-unstyled es para quitarle el estilo a la lista -->
        
                <ul class="list-unstyled opciones">
                  <li>
                    <a class="opcInscripcion" href="./index.php?controlador=interesado&accion=Menu" onclick=" ">Inscripciones</a>
                  </li>
                  <li>
                    <a class="opcBloques" href="./index.php?controlador=bloque&accion=Menu" onclick=" ">Bloques</a>
                  </li>
                  <li>
                    <a class="opcUsuarios" href="./index.php?controlador=usuario&accion=Menu" onclick=" ">Usuarios</a>
                  </li>
                  <li>
                    <a class="opcBitácora" href="./index.php?controlador=bitacora&accion=Menu" onclick=" ">Bitácora</a>
                  </li>
                </ul>
        
                <!--Boton de logout, btn-unstyled para quitarle todo el estilo
                predeterminado que tiene  y  el icono de logout-->
                <div style="margin-top: auto;" class="mb-5">
                  <div class="logout">
                    <button class="btn-unstyled">
                      <i class="bi bi-box-arrow-left logoutIcon" style="color: white;"></i>
                    </button>
                  </div>
                </div>
              </nav>
          </div>
        </div>
        <!-- en este apartado se encuentra la tabla de la inscripciones -->
        <div class="col-12 col-md-10 p-5"> <!---->
          <h1 class="text-center">Inscripciones</h1>
          <div class="row justify-content-lg-center align-items-lg-center text-lg-center justify-content-md-center align-items-md-center text-md-center justify-content-sm-center align-items-sm-center text-sm-center justify-content-xs-center align-items-xs-center text-xs-center p-3">
            <div class="col-12 col-md-10 text-black align-items-center justify-content-center opacity-75">
              <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="table-responsive">
                  <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Acompañantes</th>
                        <th scope="col" style="visibility:collapse; display:none;">Bloques</th>
                      </tr>
                    </thead>
                      <tbody>
                        <?php
                          $todosInteresados;
                          if(isset($todosInteresados))
                          foreach($todosInteresados as $interesado)
                        ?>
                        <tr>
                          <td ><?php echo $interesado->getNombre()."".$interesado->getPrimerApellido()."".$interesado->getSegundoApellido()?></td>
                          <td ><?php echo $interesado->getCedula() ?></td>
                          <td ><?php echo $interesado->getCorreo() ?></td>
                          <td ><?php echo $interesado->getCedula() ?></td>
                          <td ><?php echo $interesado->getEstado() ?></td>
                          <td style="visibility:collapse; display:none;"><?php echo $interesado->getIdBloque() ?></td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CONTENIDO PRINCIPAL -->

    <!--  barra de navegación sidebar | fixed-left es una clase de bootstrap para
    q el contenedor principal que tiene de nombre "wrapper" para identificar la barra
    de navegacion se ponga en el lado izquierdo de la página" -->



        <!-- Boton de hamburguesa para q muestre o oculte el sidebar cuando esta responsive -->
        <button class="btn btn-hamburguesa" type="button" id="sidebarCollapse" >
            <i class="bi bi-list" ></i>
        </button>
    </div>

        
    <!-- FIN CONTENIDO PRINCIPAL -->

    <!-- Funciones Bootrstrap v5.3 framework -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Funciones personalizadas -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="./Vista/js/functionInscripciones.js"></script>
</body>
</html>
