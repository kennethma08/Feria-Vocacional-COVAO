<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[Proyecto RRHH 2023]</title>
    
    <link rel="stylesheet" href="./Vista/style/Formulario.css">

    <!-- Bootstrap v5.3 framework -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Estilos personalizados -->
    
  </head>
  <body>

    <!-- CONTENIDO PRINCIPAL -->

    <div class="container FormularioContainer">
      <div class="card FormularioCard">
        <div class="card-body my-5 my-sm-5 my-md-4 my-lg-0 my-xl-0 my-xxl-0">
          <h2 class="card-title">Formulario de inscripción</h2>
          <div class="progress-bar-container">
            <div class="progress-bar-circle active"><i class="bi bi-check"></i></div>
            <div class="progress-bar-line"></div>
            <div class="progress-bar-circle"><i class="bi bi-check"></i></div>
            <div class="progress-bar-line"></div>
            <div class="progress-bar-circle"><i class="bi bi-check"></i></div>
            <div class="progress-bar-line"></div>
            <div class="progress-bar-circle"><i class="bi bi-check"></i></div>
          </div>
          <form id="multiStepForm" method="POST" action="">
            <div id="step1">
              <h4 class="text-center">Información personal</h4>
              <div class="container-fluid mt-4">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-4 col-xxl-4">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" autocomplete="given-name" name="nombre">  <!-- AYUDA NO SE COMO HACER QUE SE PONGA EL AUTOFILL DE GOOGLE -->
                      <label for="nombre">Nombre</label>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-4 col-xxl-4">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="apellido1" placeholder="Primer apellido" autocomplete="additional-name" name="primerApellido">
                      <label for="apellido1">Primer apellido</label>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-4 col-xxl-4">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="apellido2" placeholder="Segundo apellido" autocomplete="family-name" name="segundoApellido">
                      <label for="apellido2">Segundo apellido</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="cedula" placeholder="Cedula" autocomplete="national-id" name="cedula">
                      <label for="cedula">Cedula</label>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="correoElectronico" placeholder="Correo electronico" autocomplete="email" name="correo">
                      <label for="correoElectronico">Correo electronico</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="form-floating mb-3">
                      <input type="tel" class="form-control" id="numeroTelefono" placeholder="Numero de telefono" autocomplete="tel" name="telefono">
                      <label for="numeroTelefono">Numero de telefono</label>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                    <select class="form-select mb-3 dropdowncolegios" aria-label="Default select example" id="colegios-select" name="colegio" onchange="showFormColegio()">
                      <option selected>--Colegio de procedencia--</option>
                      <option value="1">Otro</option>
                    </select>
                  </div>
                
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="form-floating mb-3">
                      <textarea class="form-control direccionlabel" placeholder="Dirección" id="direccion" style="height: 80px" autocomplete="address" name="direccion"></textarea>
                      <label for="direccion">Dirección</label>
                    </div>
                  </div>
                  
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                    <div id="colegio-form-section" class="form-section">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombreOtroColegio" placeholder="Nombre" autocomplete="off">
                            <label for="nombreAcompanante1">Nombre del colegio</label>
                        </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                      <!-- Aqui va el date picker para la fecha de nacimiento -->
                  </div>
                </div>
              </div>


              <div class="d-flex justify-content-end mt-4">
                <button type="button" class="btn btn-primary next-step botonAcciones px-5" onclick="validateForm()">Siguiente</button>
              </div>
            </div>

            <div id="step2" style="display: none;">
              <h4 class="text-center">Acompañantes</h4>
              <div class="row justify-content-center">
                <div class="col-12 text-center">
                  <div class="form-group">
                    <select class="form-select" id="acompanantes-select" aria-label="Default select example" onchange="showFormSections()">
                      <option selected>--Numero de acompañantes--</option>
                      <option value="0">Sin acompañantes</option>
                      <option value="1">1 acompañante</option>
                    </select>
                  </div>
                </div>
              </div>

              <div id="form-section-1" class="form-section">
                <h3 class="mt-5">Información del acompañante</h3>
                <div class="row">
                  <div class="col-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="nombreAcompanante1" placeholder="Nombre" autocomplete="off">
                      <label for="nombreAcompanante1">Nombre completo</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="cedulaAcompanante1" placeholder="Nombre" autocomplete="off">
                      <label for="cedulaAcompanante1">Cedula</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="telefonoAcompanante1" placeholder="Nombre" autocomplete="off">
                      <label for="telefonoAcompanante1">Telefono</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-primary prev-step botonAcciones px-5">Anterior</button>
                <button type="button" class="btn btn-primary next-step botonAcciones px-5" onclick="validateForm()">Siguiente</button>
              </div>
            </div>

            <div id="step3" style="display: none;">
              <h4 class="text-center">Bloque de asistencia</h4>

                <div class="row my-4">
                  <div class="col-4 text-center column-divider">
                    <h6 class="text-center">Jueves 6 Jul</h6>
                    <div class="form-check mt-4">
                      <input class="form-check-input" type="checkbox" value="" id="dia1Hora1">
                      <label class="form-check-label" for="dia1Hora1">
                        9:00am
                      </label>
                    </div>
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" value="" id="dia1Hora2">
                      <label class="form-check-label" for="dia1Hora2">
                        11:00am
                      </label>
                    </div>
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" value="" id="dia1Hora3">
                      <label class="form-check-label" for="dia1Hora3">
                        2:00pm
                      </label>
                    </div>
                  </div>
                  <div class="col-4 text-center column-divider">
                    <h6 class="text-center">Viernes 7 Jul</h6>
                    <div class="form-check mt-4">
                      <input class="form-check-input" type="checkbox" value="" id="dia2Hora1">
                      <label class="form-check-label" for="dia2Hora1">
                        9:00am
                      </label>
                    </div>
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" value="" id="dia2Hora2">
                      <label class="form-check-label" for="dia2Hora2">
                        11:00am
                      </label>
                    </div>
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" value="" id="dia2Hora3">
                      <label class="form-check-label" for="dia2Hora3">
                        2:00pm
                      </label>
                    </div>
                  </div>
                  <div class="col-4 text-center">
                    <h6 class="text-center">Sabado 8 Jul</h6>
                    <div class="form-check mt-4">
                      <input class="form-check-input" type="checkbox" value="" id="dia3Hora1">
                      <label class="form-check-label" for="dia3Hora1">
                        9:00am
                      </label>
                    </div>
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" value="" id="dia3Hora2">
                      <label class="form-check-label" for="dia3Hora2">
                        11:00am
                      </label>
                    </div>
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" value="" id="dia3Hora3">
                      <label class="form-check-label" for="dia3Hora3">
                        2:00pm
                      </label>
                    </div>
                  </div>
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
              <div class="d-flex justify-content-between mt-5">
                <button type="button" class="btn btn-primary prev-step botonAcciones px-5">Anterior</button>
                <button type="button" class="btn btn-primary next-step botonAcciones px-5" onclick="validateForm(); storeFormData(); displayFormData();">Siguiente</button>
              </div>
            </div>

            <div id="step4" style="display: none;" class="text-center">
              <h4 class="text-center">Información de la cita</h4>

                <p class="mb-5">Favor confirmar que los datos sean correctos</p>

                <div id="step4-data-container"></div>

              <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-primary prev-step botonAcciones px-5">Anterior</button>
                <button type="button" class="btn btn-success botonAcciones px-5" onclick="modalTrigger()">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal exito -->
    <div class="modal fade" id="exitoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-12 text-center">
                <h1 class="text-center text-white">Felicidades</h1>
                <p class="text-white">Su cita se ha agendado con exito!</p>
                <div class="codigoQR text-danger">
                  [QR va aqui]
                </div>
                <p class="text-white mt-3">Se le ha enviado una contraseña a su correo electronico para poder ingresar al sistema, lo esperamos!</p>
              </div>
              <div class="col-12 text-center">
                <button type="button" class="btn btn-primary botonAcciones">Iniciar sesion</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal error -->
    <div class="modal fade" id="errormodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-12 text-center">
                <h1 class="text-center text-white">Oops!</h1>
                <p class="text-white">Ha ocurrido un error al intentar agendar su cita :(</p>
              </div>
              <div class="col-12 text-end">
                <button type="button" class="btn btn-primary botonAcciones">Volver</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- FIN CONTENIDO PRINCIPAL -->

    <!-- Funciones Bootrstrap v5.3 framework -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Funciones personalizadas -->
    <script src="./Vista/js/Formulario.js"></script>

  </body>
</html>