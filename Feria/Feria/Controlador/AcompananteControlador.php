<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Acompanante.php';
require_once './Modelo/Metodos/AcompananteMetodos.php';
require_once './Modelo/Entidades/Interesado.php';
require_once './Modelo/Metodos/InteresadoMetodos.php';

class AcompananteControlador{

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

    function Menu()
    {
        $usuario=$this->Validar();
        $acompMetodos=new AcompananteMetodos();
        $acompanantes= $acompMetodos->Todos();

        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once './Vista/MenuAcompanante.php';
        unset($_SESSION["mensaje"]);
    }

    function Crear()
    {
        $acompanante= new Acompanante();
        $acompanante->setCedula($_POST["cedula"]);
        $acompanante->setNombre($_POST["nombre"]);
        $acompanante->setTelefono($_POST["telefono"]);
        $acompanante->setIdInteresado($_POST["idInteresado"]);
        $acompanante->setEstado(true);
        

        $acompananteMetodos = new AcompananteMeotodos();

        if($acompananteMetodos->Nuevo($acompanante))
        {
            $_SESSION["mensaje"]="Ingreso Exitoso";
            header("Location:./index.php?controlador=acompanante&accion=Menu");
        }
        else
        {
            $_SESSION["mensaje"]="Contacte con TI";
            header("Location:./index.php?controlador=acompanante&accion=Menu");
        }
    }

    function Todos()
    {
        $iM=new InteresadoMetodos();
        $aM= new AcompanantesM();
        $todosS=$aM->Todos();
        if(isset($todosS))
            foreach ($todosS as $a)
            {
                $i=new Interesado();
                $i=$iM->BuscarId($a->getIdInteresado());
                $a->setIdInteresado($i->getNombre()." ".$i->getPrimerApellido()." ".$i->getSegundoApellido());
            }
        return $todosS;
    }

    function BuscarId(){
        $iM=new InteresadoMetosdos();
        $aM= new AcompananteMetodos();
        $acompanante = $aM->BuscarId($_POST["id"]);
        if(isset($acompanante)){
            $i=new Interesado();
            $i=$iM->BuscarId($acompanante->getIdInteresado());
            $acompanante->setIdInteresado($i->getNombre()." ".$i->getPrimerApellido()." ".$i->getSegundoApellido());
            return $acompanante;
        }
        return false;

    }

    function BuscarIdAcompanante(){
        $iM=new InteresadoMetosdos();
        $aM= new AcompananteMetodos();
        $acompanantes = $aM->BuscarIdAcompanante($_POST["id"]);
        if(isset($acompanante)){
            $i=new Interesado();
            $i=$iM->BuscarId($acompanante->getIdInteresado());
            $acompanante->setIdInteresado($i->getNombre()." ".$i->getPrimerApellido()." ".$i->getSegundoApellido());
            return $acompanante;
        }
        return false;

    }

    function Actualizar()
    {
        $acompanante= new Acompanante();
        $acompanante->setId($_POST["id"]);
        $acompanante->setCedula($_POST["cedula"]);
        $acompanante->setNombre($_POST["nombre"]);
        $acompanante->setTelefono($_POST["telefomo"]);
        $acompanante->setIdInteresado($_POST["idInteresado"]);
        $acompanante->setEstado(true);

        $acompananteMetodos = new AcompananteMeotodos();

        if($acompananteMetodos->Actualizar($acompanante))
        {
            $_SESSION["mensaje"]="Ingreso Exitoso";
            header("Location:./index.php?controlador=acompanante&accion=Menu");
        }
        else
        {
            $_SESSION["mensaje"]="Contacte con TI";
            header("Location:./index.php?controlador=acompanante&accion=Menu");
        }
    }

    function Estado()
    {
        $a=$this->Validar();
        $a=new Acompanante();
        $aM=new AcompananteMetodo();
        $a->setId($_POST["id"]);
        $a->setEstado(0);
        if($aM->Estado($a))
            header("Location:./index.php?controlador=acompanante&accion=Menu");
        else
        {
            $_SESSION["mensaje"]="Comuniquese con TI";
            header("Location:./index.php?controlador=acompanante&accion=Menu");
        }


    }
}