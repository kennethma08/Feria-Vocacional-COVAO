<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>[Proyecto RRHH 2023]</title>

  <!-- Bootstrap v5.3 framework -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Fuentes -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">

  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="./Vista/style/Estudiante_MiCita.css">
</head>

<body>

  <!-- CONTENIDO PRINCIPAL -->
  <div class="container-fluid" id="contenedor">
    <div class="row d-flex justify-content-center align-items-center contenedorCards ">
      <div class="">
        <h1 class="TitleMiCita justify-content-center align-items-center text-center"> <b>Mi Cita</b> </h1>
        <div class="row justify-content-evenly align-items-center text-center p-2">

          <div
            class="col-10 col-sm-12 col-md-5 col-lg-8 col-xl-5 col-xxl-5 DivPrincipal text-white align-items-center justify-content-center p-3 m-3">
            <h1 class="Titulos "> <b>Datos de Mi Cita</b> </h1>
            <p class="ParrafoInformacion">Estudiante</p>
            <p class="letra">
              <?php echo $interesado->getNombre() ?>
              <?php echo $interesado->getPrimerApellido() ?>
              <?php echo $interesado->getSegundoApellido() ?>
              <?php echo $interesado->getCedula() ?>
              <?php echo $interesado->getCorreo() ?>
              <?php echo $interesado->getTelefono() ?>
            </p>

            <p class="ParrafoInformacion">Bloque Agendado</p>
            <p class="letra">
              <?php echo $interesado->getIdBloque() ?>
            </p>
            
            <div class="row justify-content-around">
              <button class="col-5  mt-5 py-1 ButtonCeleste" type="button" name="button" data-bs-toggle="modal" data-bs-target="#ModalQR">Codigo QR</button>
              <button class="col-5  mt-5 py-1 ButtonCeleste" type="button" name="button" data-bs-toggle="modal" data-bs-target="#ModalEditarCita">Editar Cita</button>
            </div>
          </div>


          <div
            class="col-10 col-sm-12 col-md-5 col-lg-8 col-xl-5 col-xxl-5 DivPrincipal text-white align-items-center justify-content-center p-3 m-3">
            <h1 class="Titulos"> <b>Acompañantes</b> </h1>
            <p class="ParrafoInformacionAcompanantes">
                        <?php
                        $interesado-> getId();
                        if($interesado != null)
                        {
                          echo $interesado->getNombre() ."&nbsp". $interesado->getPrimerApellido()."&nbsp". $interesado->getSegundoApellido();

                        }
                        else
                        {
                          echo "Parece que no vas a visitar la institucion con acompañantes";
                        }
                      ?>
            </p>

          </div>
        </div>

        <div class="row justify-content-center  text-center ">
          <button class="ButtonCancelar col-6 col-sm-4 m-4 col-xl-2" type="button" name="button" data-bs-toggle="modal"
            data-bs-target="#ModalCancelarCita">Cancelar Cita</button>
        </div>
            
      </div>

        
        
      <!-- Modal Ver QR -->
        <div class="modal fade justify-content-center align-items-center text-center" id="ModalQR" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="ModalQRContent">
                <div class="EncabezadoModal">
                  <h1 class="TitleModalMiQR ">Mi código QR</h1>
                </div>
                <div class="ParrafoModal">
                  ¡Presenta este código a la entrada de la institución al ingresar!
                </div>
                <div class="FinModal">
                  <button type="button" class="ButtonVolverQR justify-content-center align-items-center text-center"
                    data-bs-dismiss="modal">Volver</button>
                </div>
              </div>
            </div>  
        </div>
            <!-- Modal Cancelar Cita -->

      <div class="modal fade justify-content-center align-items-center text-center" id="ModalCancelarCita" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="ModalCancelarCitaContent">
            <div class="EncabezadoModal">
              <h1 class="TitleModalCancelarCita ">Cancelar mi cita</h1>
            </div>
            <form action="./index.php?controlador=interesado&accion=CancelarCita" method="POST">
              <div class="ParrafoModalCancelarCita">
                ¿Esta seguro de que desea cancelar su cita agendada para el
                <?php echo $bloque->getFecha() ?> 
                <?php echo $bloque->getHoraInicio() ?> ?
              </div>
                <button type="submit" class="ButtonAceptarCancelacion justify-content-center align-items-center text-center">Aceptar</button>
                <button type="button"  class="ButtonCancelarCancelacionCita justify-content-center align-items-center text-center"
                  data-bs-dismiss="modal">Cancelar</button>
            </form>
          </div>
        </div>
      </div>
            
                 <!-- Modal Editar Cita -->
      <div class="modal fade" id="ModalEditarCita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cita</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./index.php?controlador=interesado&&accion=EditarCita" method="post">
              <div class="modal-body row justify-content-evenly ParrafoModalEditarCita">
                <?php
                $dia=1;
                while($dia<8)
                {

                  $contenido=null;
                  $diaB = "";
                  foreach($todosBloque as $b)
                  {
                    $fecha=strtotime($b->getFecha());

                    if($dia==date("N",$fecha))
                    {

                      switch ($dia){

                        case 1:
                          $diaB= $contenido."<p>Lunes</p>";
                          break;
                        case 2:
                          $diaB= $contenido."<p>Martes</p>";
                          break;
                        case 3:
                          $diaB= $contenido."<p>Miercoles</p>";
                          break;
                        case 4:
                          $diaB= $contenido."<p>Jueves</p>";
                          break;
                        case 5:
                          $diaB= $contenido."<p>Viernes</p>";
                          break;
                        case 6:
                          $diaB= $contenido."<p>Sabado</p>";
                          break;
                        case 7:
                          $diaB= $contenido."<p>Domingo</p>";
                          break;

                      }

                      $contenido = '<div class="col-3"id="'.$dia.'">'. $diaB.'<div class="row"><input type="radio" name="idBloque" id="'.$b->getId().'"class="HorasCheck col-1" value="'.$b->getId().'"><label class="col-11" for="'.$b->getId().'">'.$b->getHoraInicio().'</label></div></div>';
                    }
                  }
                  echo $contenido;
                  $dia++;
                }
                ?>
              </div>
              <div class="modal-footer">
                <button type="submit" class="ButtonAceptarCancelacion justify-content-center align-items-center text-center" data-bs-dismiss="modal">Aceptar</button>
                <button type="button" class="ButtonCancelarCancelacionCita justify-content-center align-items-center text-center" data-bs-dismiss="modal">Cancelar</button>
              </div>
            </form>

          </div>
        </div>
      </div>





    </div>
  </div>

  <!-- FIN CONTENIDO PRINCIPAL -->

  <!-- Funciones Bootrstrap v5.3 framework -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <!-- Funciones personalizadas -->
  <!--<script src="Functions.js"></script>-->
</body>

</html>