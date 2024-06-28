<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Interesado.php';
require_once './Modelo/Metodos/InteresadoMetodos.php';
require_once './Modelo/Entidades/Usuario.php';
require_once './Modelo/Metodos/UsuarioMetodos.php';
require_once './Modelo/Entidades/Acompanante.php';
require_once './Modelo/Metodos/AcompananteMetodos.php';

class IndexControlador 
{
    function Index()
    {
        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        require_once './Vista/Login.php';
        unset($_SESSION["mensaje"]);
    }
    function Login()
    {
        $pass=$_POST['pass'];
        $cedula=$_POST['cedula'];
        $interesadoMetodo = new InteresadoMetodos();
        $interesado=new Interesado();
        $interesado->setCedula($cedula);
        $interesado->setPass($pass);
        if($interesadoMetodo->BuscarIngreso($interesado))
        {
            $interesado=$interesadoMetodo->BuscarCedula($interesado->getCedula());
            $_SESSION["idInteresado"]=$interesado->getId();
            header('Location: index.php?controlador=interesado&accion=MiCita');
        }
        else
        {
            $usuario=new Usuario();
            $usuarioMetodo=new UsuarioMetodos();
            $usuario->setCedula($cedula);
            $usuario->setPass($pass);
            if($usuarioMetodo->BuscarIngreso($usuario))
            {
                $usuario=$usuarioMetodo->BuscarCed($usuario->getCedula());
                $_SESSION['idUsuario']=$usuario->getId();
                if($usuario->getIdPerfil()==1)
                {
                    header('Location: index.php?controlador=bloque&accion=Menu');
                }
                else
                {
                    require_once './Vista/Portero_Escaner.php';
                }
            }
            else
            {
                $_SESSION["mensaje"]="Datos Incorrectos";
                header('Location: index.php?controlador=index&accion=Index');
            }
        }

    }
    function Registrarse()
    {
        $interesado= new Interesado();
        $interesado->setCedula($_POST["cedula"]);
        $interesado->setNombre($_POST["nombre"]);
        $interesado->setSegundoApellido($_POST["apellido2"]);
        $interesado->setPrimerApellido($_POST["apellido1"]);
        $interesado->setCorreo($_POST["correoElectronico"]);
        $interesado->setTelefono($_POST["numeroTelefono"]);
        $interesado->setFechaNacimiento($_POST["fechaNacimiento"]);
        $interesado->setOtroColegio($_POST["otroColegio"]);
        $interesado->setDireccion($_POST["direccion"]);
        $interesado->setAsistencia(false);
        $interesado->setIdColegio($_POST["colegio"]);
        $interesado->setIdBloque($_POST["idBloque"]);
        $interesado->setEstado(true);
        
        
        $interesadoMetodo = new InteresadoMetodos();
        if($interesadoMetodo ->Nuevo($interesado)){
            
            if($_POST["numAcomp"]!=0)
            {
                $acompanante= new Acompanante();
                $interesado = $interesadoMetodo->BuscarMail($interesado->getCorreo());
                $acompanante->setIdInteresado($interesado->getId());
                $acompanante->setCedula($_POST["cedula"]);
                $acompanante->setNombre($_POST["nombreAcompanante1"]);
                $acompanante->setTelefono($_POST["telefonoAcompanante1"]);
                $acompanante->setIdInteresado($_POST["idInteresado"]);
                $acompanante->setEstado(true);
                
                $acompananteMetodos = new AcompananteMeotodos();

                if($acompananteMetodos->Nuevo($acompanante))
                {
                    $_SESSION["mensaje"]="Ingreso Exitoso";
                }
                else
                {
                    $_SESSION["mensaje"]="Contacte con TI";
                    header("Location:./index.php?controlador=index&accion=Menu");
                }
            }
            else
                $_SESSION["mensaje"]="Ingreso Exitoso";
        }
        else{
               $_SESSION["mensaje"]="Contacte con TI";
               header("Location:./index.php?controlador=index&accion=Menu");
        }
    }
    
    function Formulario(){
        require_once './Vista/Formulario.php';
    }
}
