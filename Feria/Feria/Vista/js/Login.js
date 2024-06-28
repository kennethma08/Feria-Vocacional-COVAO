// INICIO VALIDACION DE DATOS COMPLETOS //

function IniciarSesion()
{
    var correo = document.getElementById("correo").value;
    var contra = document.getElementById("contra").value;

    if (contra.trim() === "" || correo.trim() === "")   //Si losa campos estan incompletos
    {
        Swal.fire                                       //Envia una alerta para completar los campos
        ({
            icon: 'error',
            title: 'Datos incompletos',
            text: 'Por favor, complete todos los campos disponibles para continuar',
        })
        return false;
    }

    return true;
}
// FIN VALIDACION DE DATOS COMPLETOS //

// INICIO VALIDACION DE CORREO CORRECTO //
function ValidarCorreo()
{
    var correo = document.getElementById("correoRecuperar").value;

    var signos = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;          //Signos permitidos para crear un correo

    if (!signos.test(correo))
    {
        Swal.fire                                       //Envia un sweet alert de error si el
        ({                                              // correo incumple con los signos anteriores
            icon: 'error',
            title: 'Correo incorrecto',
            text: 'Por favor, ingrese un correo válido',
        })
        return;
    }
    else
    {
        Swal.fire                                   //Envia un sweet alert si lo cumple,
        ({                                          // avisa del envio de la nueva contraseña al usuario
            icon: 'success',
            title: 'Nueva contraseña',
            text: 'Se le ha enviado su nueva contraseña por correo electrónico',
        })

        $('#modalRecuperar').modal('hide');         //Oculta el modal por medio de una funcion de jQuery
    }
}
// FIN VALIDACION DE CORREO CORRECTO //