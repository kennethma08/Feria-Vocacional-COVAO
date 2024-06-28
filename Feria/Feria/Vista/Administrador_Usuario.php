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
    <link rel="stylesheet" href="./Vista/style/StyleUsuario.css">
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
        <div class="col-12 col-md-10 p-5">
          <h1 class="text-center">Usuarios</h1>
          <div class="row justify-content-lg-center align-items-lg-center text-lg-center justify-content-md-center align-items-md-center text-md-center justify-content-sm-center align-items-sm-center text-sm-center justify-content-xs-center align-items-xs-center text-xs-center p-3">
              <div class="col-12 col-md-10 text-black align-items-center justify-content-center opacity-75">
                <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">


                    <div class="table-responsive">
                      <table class="table" id="myTable">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Perfil</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>  
                          <!-- Valida si el objeto está vacío,luego recorre la lista y colaca en cada celda de la tabla los datos que se quieran observar -->  
                        <?php
                               if($usuario!=null)
                               {
                                   foreach ($usuario as $u)
                                   {
                          ?>
                          <tr class="text-center">
                                  <td><?php echo $u->getCedula() ?></td>
                                  <td><?php echo $u->getNombre() ?></td>
                                  <td><?php echo $u->getTelefono() ?></td>
                                  <td><?php echo $u->getIdPerfil() ?></td>
                            <td >
                              <!-- Boton que llama al modal editar -->
                                <a onclick="CargarId(<?php echo $u->getId() ?>, '<?php echo $u->getCedula() ?>' ,'<?php echo $u->getNombre() ?>' ,'<?php echo $u->getTelefono() ?>' ,)" class="btn btn-xs " data-bs-toggle="modal" data-bs-target="
                                #editarUsuario">
                                   <i class="bi bi-vector-pen"></i>
                                </a>
                                <!-- Boton que llama al modal eliminar -->
                                <a onclick="CargarIdEliminar(<?php echo $u->getId()?> , '<?php echo $u->getNombre()?>' )" class="btn btn-xs " data-bs-toggle="modal" data-bs-target="
                                #eliminarUsuario">
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

                    </div>
                    <!-- Boton que llama al modal crear -->
                    <button type="button" class="btnCrear w-100" data-bs-toggle="modal" data-bs-target="#crearUsuario">
                      <i class="bi bi-plus-lg text-white"></i>
                    </button>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready( function () {
        $('#myTable').DataTable({
          scrollY: 200,
          scrollX: true,
          "bPaginate": false,
          language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
        });
      } );
      </script>
      
      <script>
            function CargarId(id , cedula, nombre, telefono)
            {
                document.getElementById("id").value=id;
                document.getElementById("nombreE").value=nombre;
                document.getElementById("telefonoE").value=telefono;
                document.getElementById("cedulaE").value=cedula;
            }
      </script>
      <script>
            function CargarIdEliminar(id , nombre )
            {
                document.getElementById("idEliminar").value=id;
                document.querySelector('.txtEliminar').textContent = "Esta seguro de eliminar a "+nombre+"?";
                
            }
      </script>
      
      <script src="./Vista/js/Administrador_Usuarios.js"></script>
      
</body>

<!-- Modal para editar un usuario -->
<div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
          <div class="modal-body mx-4">
              <form action="./index.php?controlador=usuario&&accion=Actualizar" method="POST">
                  <h2 class="ModalTitulo"><b>Editar usuario</b></h2>
              <div class="row pt-2 mx-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 log-xl-6 col-xxl-6">
                  <h5>Nombre: </h5>
                  <input class="form-control" type="text" name="nombre" id="nombreE" required>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 log-xl-6 col-xxl-6">
                  <h5>Telefono: </h5>
                  <input class="form-control" type="text" name="telefono" id="telefonoE" required>
                </div>
              </div>
              <div class="row pt-3 mx-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 log-xl-6 col-xxl-6">
                  <h5>Cedula: </h5>
                  <input  class="form-control" type="text" name="cedula" id="cedulaE" required>
                </div>
              </div>
              <div class="row">
                  <input type="hidden" class="form-control" name="id" id="id">
              </div>
              <div class="row pt-4">
                <div class="modal-footer">
                  <button class="BotonCancelar px-5 py-1" type="button" name="button" onclick="LimpiarDatos()" data-bs-dismiss="modal">Cancelar</button>
                  <button class="BotonAceptar px-5 py-1" type="submit" name="button" >Aceptar</button>
                </div>
              </div>
              </form>
          </div>
      </div>
  </div>
</div>
<!-- Fin del primer modal-->

<!-- Modal para crear un usuario -->
<div class="modal fade" id="crearUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCrear" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-body px-3">
              
              <h2 class="ModalTitulo"><b>Agregar Usuario</b></h2>
              <form action="./index.php?controlador=usuario&&accion=Crear" method="POST">
                  <div class="row pt-2 mx-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 log-xl-6 col-xxl-6">
                  <h5>Nombre: </h5>
                  <input type="text" name="nombre" id="nombreC">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 log-xl-6 col-xxl-6">
                  <h5>Cédula: </h5>
                  <input type="text" name="telefono" id="telefonoC">
                </div>
              </div>
              <div class="row pt-3 mx-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 log-xl-6 col-xxl-6">
                  <h5>Teléfono: </h5>
                  <input type="text" name="cedula" id="cedulaC">
                </div>
              </div>
              <div class="row pt-4">
                <div class="modal-footer">
                  <button class="BotonCancelar px-5 py-1" type="button" name="button" onclick="LimpiarDatos()" data-bs-dismiss="modal">Cancelar</button>
                  <button class="BotonAceptar px-5 py-1" type="submit" name="button" onclick="ValidarDatos()">Aceptar</button>
                </div>
              </div>
              </form>
          </div>
      </div>
  </div>
</div>
<!-- Fin del segundo modal-->

<!-- Modal eliminar Usuario -->

<div class="modal fade justify-content-center align-items-center text-center" id="eliminarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body mx-4">
          <h1 class="ModalTitulo" id="txt">Eliminar Usuario</h1>
          <p class="txtEliminar"></p>
      </div>
        <form action="./index.php?controlador=usuario&accion=CambioEstado" method="post">
        <div class="row">
            <input type="hidden" class="form-control" name="id" id="idEliminar">
        </div>
        <div class="modal-footer">
            <button type="button" class="BotonCancelar px-3 "  data-bs-dismiss="modal">Cancelar</button>

            <button type="submit" class="BotonAceptar px-3 " data-bs-dismiss="modal">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin del segundo modal-->

</html>
