/*Se accede con getElementId al que tiene de id sidebarCollpase, en este caso es el menu de hamburguesa, al
 darle click se activa la funcion que lo q hace es q oculta o activa el sidebar usando la classList.Toggle() */
document.getElementById('sidebarCollapse').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('active');
});
$(document).ready(function () {
    $('#myTable').DataTable({
        scrollY: 200,
        scrollX: true,
        "bPaginate": false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
    });
});


function CargarId(id)
{
    document.getElementById("id").value = id;
}

//Limpia los datos de los input
function LimpiarDatos()
{
    document.getElementById('dia').value = "";
    document.getElementById('horaInicio').value = "";
    document.getElementById('cantidadPersonas').value = "";
    document.getElementById('horaFinal').value = "";
    }
function CargarIdEliminar(id, fecha)
{
    document.getElementById("idEliminar").value = id;
    document.querySelector('.txtEliminar').textContent = "Esta seguro de eliminar el bloque de la fecha " + fecha + "?";

}