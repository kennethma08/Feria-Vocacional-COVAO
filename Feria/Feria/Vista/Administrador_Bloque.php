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
    <link rel="stylesheet" href="./Vista/style/StyleBloques.css">
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
        <!-- en este apartado se encuentra la tabla de los bloques -->
        <div class="col-12 col-md-10 p-5"> <!---->
          <h1 class="text-center">Bloques</h1>
          <div class="row justify-content-lg-center align-items-lg-center text-lg-center justify-content-md-center align-items-md-center text-md-center justify-content-sm-center align-items-sm-center text-sm-center justify-content-xs-center align-items-xs-center text-xs-center p-3">
            <div class="col-12 col-md-10 text-black align-items-center justify-content-center opacity-75">
              <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="table-responsive">
                  <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Aforo actual</th>
                        <th scope="col">Aforo máximo</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                      <tbody>
                        <?php
                               if($bloque!=null)
                               {
                                   foreach ($bloque as $b)
                                   {
                          ?>
                        <tr>
                          <td><?php echo $b->getFecha() ?></td>
                          <td><?php echo $b->getHoraInicio()." - ".$b->getHoraFinal() ?></td>
                          <td>50</td>
                          <td><?php echo $b->getCantidadPersonas() ?></td>
                          <td class="text-center">
                            <a onclick="CargarId(<?php echo $b->getId() ?>)" data-bs-toggle="modal" data-bs-target="#modalEditar" style="text-decoration: none; color: #000">
                                <i class="bi bi-vector-pen"></i>
                            </a>
                             <a onclick="CargarIdEliminar(<?php echo $b->getId()?> , '<?php echo $b->getFecha()?>' )" class="btn btn-xs " data-bs-toggle="modal" data-bs-target="
                                #modalEliminar">
                                   <i class="bi bi-trash3"></i>
                                </a>
                          </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>
                      </tbody>
                  </table>
                  <!-- Boton que llama al modal crear -->
                  <button type="button" class="btnCrear w-100" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                    <i class="bi bi-plus-lg text-white"></i>
                  </button>
                  </div>
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
    <script src="./Vista/js/functionsBloque.js"></script>    
</body>

    <!-- Modal agregar bloque-->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar bloque</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./index.php?controlador=bloque&&accion=Nuevo">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Día</label>
                            <input type="date" class="form-control" name="dia" required>
                        </div>
                        <div class="col-md-6">
                            <label>Hora inicio</label>
                            <input type="time" class="form-control" name="horaInicio" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Aforo máximo</label>
                            <input type="number" class="form-control" value="0" name="cantidadPersonas" required>
                        </div>
                        <div class="col-md-6">
                            <label>Hora final</label>
                            <input type="time" class="form-control" name="horaFinal" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="BtnCerrarModal btn" data-bs-dismiss="modal" onclick="LimpiarDatos()">Cerrar</button>
                    <button type="submit" class="BtnAceptarModal btn">Aceptar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    
    <!-- Modal editar bloque -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Bloque</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./index.php?controlador=bloque&&accion=Editar" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Día</label>
                            <input type="date" class="form-control" name="dia" required>
                        </div>
                        <div class="col-md-6">
                            <label>Hora inicio</label>
                            <input type="time" class="form-control" name="horaInicio" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Aforo máximo</label>
                            <input type="number" class="form-control" value="0" name="cantidadPersonas" required>
                        </div>
                        <div class="col-md-6">
                            <label>Hora final</label>
                            <input type="time" class="form-control" name="horaFinal" required>
                        </div>
                    </div>
                    <div class="row">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $b->getId() ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="BtnCerrarModal btn" data-bs-dismiss="modal" onclick="LimpiarDatos()">Cerrar</button>
                    <button type="submit" class="BtnAceptarModal btn">Aceptar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    
    <!-- Modal eliminar bloque -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Bloque</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./index.php?controlador=bloque&&accion=Estado" method="post">
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <p class="txtEliminar"></p>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" class="form-control" name="id" id="idEliminar"" readonly>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="BtnCerrarModal btn" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="BtnAceptarModal btn">Aceptar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</html>
