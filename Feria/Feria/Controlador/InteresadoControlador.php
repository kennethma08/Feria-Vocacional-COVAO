<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Interesado.php';
require_once './Modelo/Metodos/InteresadoMetodos.php';
require_once './Modelo/Metodos/AcompananteMetodos.php';
require_once './Modelo/Entidades/Colegio.php';
require_once './Modelo/Metodos/ColegioMetodos.php';
require_once './Modelo/Entidades/Bloque.php';
require_once './Modelo/Metodos/BloqueMetodos.php';
require_once './Modelo/Entidades/Usuario.php';
require_once './Modelo/Metodos/UsuarioMetodos.php';

class InteresadoControlador 
{
    private function Validar()
    {
        if(isset($_SESSION['idUsuario']))
        {
            $idUsuario=$_SESSION['idUsuario'];
            $usuario= new Usuario();
            $usuarioMetodo= new UsuarioMetodos();
            
            $usuario=$usuarioMetodo->BuscarId($idUsuario);
            if($usuario==null || $usuario->getIdPerfil()==2)
                header('Location: index.php');
        }
        else
            header('Location: index.php');
        return $usuario;
    }
    private function ValidarInteresado()
    {
        if(isset($_SESSION['idInteresado']))
        {
            $idInteresado=$_SESSION['idInteresado'];
            $interesado= new Interesado();
            $interesadoMetodo= new InteresadoMetodos();
            
            $interesado=$interesadoMetodo->BuscarId($idInteresado);
            if($interesado==null)
                header('Location: index.php');
        }
        else
            header('Location: index.php');
        return $interesado;
    }
    function Menu()
    {
        $usuario=$this->Validar();
        $interesadoMetodos=new InteresadoMetodos();
        $colegioMetodos=new ColegioMetodos();
        $bloqueMetodos=new BloqueMetodos();
        $todosInteresados=$interesadoMetodos->Todos();
        if($todosInteresados!=null)
        {
            foreach($todosInteresados as $interesado)
            {
                $colegio=$colegioMetodos->BuscarId($interesado->getIdColegio());
                $interesado->setIdColegio($colegio->getNombre());
                if($interesado->getIdBloque()!=0)
                {
                    $bloque=$bloqueMetodos->BuscarId($interesado->getIdBloque());
                    $interesado->setIdBloque($bloque->getFecha().", ".$bloque->getHoraInicio());
                }
            }
        }
        
        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once './Vista/Administrador_Inscripciones.php';
        unset($_SESSION["mensaje"]);
    }

    function MiCita()
    {
        $interesado=$this->ValidarInteresado();

        $interesadoMetodo=new InteresadoMetodos();
        $colegioMetodos=new ColegioMetodos();
        $bloqueMetodos=new BloqueMetodos();
        
        
        
        
        $colegio=$colegioMetodos->BuscarId($interesado->getIdColegio());
        
        $acM = new AcompananteMetodos();
        $acompanantes = $acM->BuscarIdInteresado($interesado->getId());
        
        $interesado->setIdColegio($colegio->getNombre());
        $todosBloque=$bloqueMetodos->Todos();
        
        if($interesado->getIdBloque()!=0)
        {
            $bloque=$bloqueMetodos->BuscarId($interesado->getIdBloque());
            $interesado->setIdBloque($bloque->getFecha().", ".$bloque->getHoraInicio());
        }
        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once "./Vista/Estudiante_MiCita.php";
        unset($_SESSION["mensaje"]);
    }
    function EditarCita()
    {
        $interesado=$this->ValidarInteresado();
        
        $idBloque=$_POST["idBloque"];
        if(isset($idBloque))
        {
            $interesadoMetodos=new InteresadoMetodos();
            $interesado->setIdBloque($idBloque);
            if($interesadoMetodos->Actualizar($interesado))
            {
                $_SESSION["mensaje"]="Actualizacion exitosa";
                header("Location:./index.php?controlador=interesado&accion=MiCita");
            }
            else
            {
                $_SESSION["mensaje"]="ERROR!, contacte con TI";
                header("Location:./index.php?controlador=interesado&accion=MiCita");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Error al editar la cita";
            header("Location:./index.php?controlador=interesado&accion=MiCita");
        }
    }
    function CancelarCita()
    {
        $interesado=$this->ValidarInteresado();
        
        $interesadoMetodos=new InteresadoMetodos();
        
        $interesado->setIdBloque(0);
        if($interesadoMetodos->Actualizar($interesado))
        {
            $_SESSION["mensaje"]="Cancelacion exitosa";
            header("Location:./index.php?controlador=interesado&accion=MiCita");
        }
        else
        {
            $_SESSION["mensaje"]="ERROR!, contacte con TI";
            header("Location:./index.php?controlador=interesado&accion=MiCita");
        }
    }
    function BuscarBloque()
    {
        $usuario=$this->Validar();
        
        $idBloque=$_POST["idBloque"];
        $interesadoMetodos=new InteresadoMetodos();
        $todosInteresados=$interesadoMetodos->BuscarIdBloque($idBloque);
        if($todosInteresados!=null)
        {
            foreach($todosInteresados as $interesado)
            {
                $colegio=$colegioMetodos->BuscarId($interesado->getIdColegio());
                $interesado->setIdColegio($colegio->getNombre());
            }
        }
        
        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once './Vista/MenuInteresado.php';
        unset($_SESSION["mensaje"]);
    }
    
    function Actualizar()
    {
        $usuario=new Usuario();
        $usuario=$this->Validar();
        
        $id=$_POST["id"];
        if(isset($id))
        {
            $interesadoMetodos=new InteresadoMetodos();
            $interesado= new Colegio();
            $interesado=$interesadoMetodos->BuscarId($id);
            if($interesado!=null)
            {
                $interesado->setCedula($_POST["cedula"]);
                $interesado->setNombre($_POST["nombre"]);
                $interesado->setSegundoApellido($_POST["segundoApellido"]);
                $interesado->setPrimerApellido($_POST["primerApellido"]);
                $interesado->setCorreo($_POST["correo"]);
                $interesado->setTelefono($_POST["telefono"]);
                $interesado->setFechaNacimiento($_POST["fechaNacimiento"]);
                $interesado->setOtroColegio($_POST["otroColegio"]);
                $interesado->setDireccion($_POST["direccion"]);
                $interesado->setIdColegio($_POST["idColegio"]);
                $interesado->setIdBloque($_POST["idBloque"]);
                
                if($interesadoMetodos->Actualizar($interesado))
                {
                    $_SESSION["mensaje"]="Actualizacion exitosa";
                    header("Location:./index.php?controlador=colegio&accion=Menu");
                }
                else
                {
                    $_SESSION["mensaje"]= "Error al actualizar, contacte con TI";
                    header("Location:./index.php?controlador=colegio&accion=Menu");
                }
            }
            else
            {
                $_SESSION["mensaje"]="El usuario no existe";
                header("Location:./index.php?controlador=colegio&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Error al seleccionar el usuario a actualizar";
            header("Location:./index.php?controlador=colegio&accion=Menu");
        }
    }
    function Desactivar()
    {
        $usuario=$this->Validar();
        $interesado=new Interesado();
        $interesadoMetodos=new InteresadoMetodos();
        $interesado->setId($_POST["id"]);
        $interesado->setEstado(0);
        if($interesadoMetodos->Estado($interesado))
        {
            $_SESSION["mensaje"]="Usuario eliminado correctamente";
            header("Location:./index.php?controlador=colegio&accion=Menu");
        }
        else
        {
            $_SESSION["mensaje"]="Comuniquese con TI";
            header("Location:./index.php?controlador=colegio&accion=Menu");
        }
    }
    
    function Crear()
    {
        $interesado= new Interesado();
        $interesado->setCedula($_POST["cedula"]);
        $interesado->setNombre($_POST["nombre"]);
        $interesado->setSegundoApellido($_POST["segundoApellido"]);
        $interesado->setPrimerApellido($_POST["primerApellido"]);
        $interesado->setCorreo($_POST["correo"]);
        $interesado->setTelefono($_POST["telefono"]);
        $interesado->setFechaNacimiento($_POST["fechaNacimiento"]);
        $interesado->setOtroColegio($_POST["otroColegio"]);
        $interesado->setDireccion($_POST["direccion"]);
        $interesado->setAsistencia(false);
        $interesado->setPass($_POST["pass"]);
        $interesado->setIdColegio($_POST["idColegio"]);
        $interesado->setIdBloque($_POST["idBloque"]);
        $interesado->setEstado(true);
        
        $interesadoMetodos=new InteresadoMetodos();
        $interesadoAux=$interesadoMetodos->BuscarMail($interesado->getMail());
        if($interesadoAux==null)
        {
            if($interesadoMetodos->Nuevo($interesado))
            {
                $_SESSION["mensaje"]="Ingreso Exitoso";
                header("Location:./index.php?controlador=usuario&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Contacte con TI";
                header("Location:./index.php?controlador=usuario&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="El correo ingresado ya lo tiene otro usuario";
            header("Location:./index.php?controlador=usuario&accion=Menu");
        }
    }
}
