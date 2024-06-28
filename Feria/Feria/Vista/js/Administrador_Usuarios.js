/*Se accede con getElementId al que tiene de id sidebarCollpase, en este caso es el menu de hamburguesa, al
darle click se activa la funcion que lo q hace es q oculta o activa el sidebar usando la classList.Toggle() */
document.getElementById('sidebarCollapse').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
});
function ValidarDatos() {
    // Validar datos al agregar un usuario
    var nombre = document.getElementById('nombreC').value;
    var telefono = document.getElementById('telefonoC').value;
    var cedula = document.getElementById('cedulaC').value;
    
    if ( nombre === "" || telefono === "" || cedula === "" ) {
      Swal.fire({
        icon: 'error',
        title: 'Error al guardar',
        text: 'Ingrese todos los datos que se le solicitan'
      })
      return false;
    }
  
    //validacion de la cedula
    if (!/^\d{9}$/.test(cedula)) {
      Swal.fire({
        icon: 'error',
        text: 'Ingrese un número de cédula válido'
      })
      return false;
    }
    //validacion del numero de telefono
    if (!/^\d{8}$/.test(telefono)) {
      Swal.fire({
        icon: 'error',
        text: 'Ingrese un número de télefono válido'
      })
      return false;
    }
    // Si se cumple lo anterior retorna true
    return true;
  }

  //Limpia los datos de los input
function LimpiarDatos()
    {
      document.getElementById('nombre').value = "";
      document.getElementById('telefono').value = "";
      document.getElementById('cedula').value = "";
    }
