<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Bloque.php';
require_once './Modelo/Metodos/BloqueMetodos.php';
require_once './Modelo/Entidades/Bitacora.php';
require_once './Modelo/Metodos/BitacoraMetodos.php';
require_once './Modelo/Entidades/Usuario.php';
require_once './Modelo/Metodos/UsuarioMetodos.php';

class BloqueControlador
{

    private function Validar()
    {
        if (isset($_SESSION['idUsuario'])) {
            $idUsuario = $_SESSION['idUsuario'];
            $usuario = new Usuario();
            $usuarioMetodo = new UsuarioMetodos();

            $usuario = $usuarioMetodo->BuscarId($idUsuario);
            if ($usuario == null || $usuario->getIdPerfil() == 2)
                header('Location: index.php');
        } else
            header('Location: index.php');
        return $usuario;
    }

    function Menu()
    {
        $usuario=$this->Validar();
        $bloqueMetodos=new BloqueMetodos();
        $bloque= $bloqueMetodos->Todos();

        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once './Vista/Administrador_Bloque.php';
        unset($_SESSION["mensaje"]);
    }

    function Crear()
    {
        $usuario=$this->Validar();
        
        $bloque= new Bloque();
        $bloque->setFecha($_POST["fecha"]);
        $bloque->setHoraIncio($_POST["horaInicio"]);
        $bloque->setHoraFinal($_POST["horaFinal"]);
        $bloque->setCantidadPersonas($_POST["cantidadPersonas"]);
        $bloque->setEstado(true);

        $bloqueMetodos = new BloqueMetodos();
        $bitacoraMetodos=new BitacoraMetodos();
        if($bloqueMetodos->Nuevo($bloque))
        {
            $detalleBitacora=$usuario->getNombre()." ".$usuario->getApellido1()." ".$usuario->getApellido2()." ingresó un bloque para el día ".$bloque->getFecha()." de ".$bloque->getHoraInicio()." a ".$bloque->getHoraFinal();
            if($bitacoraMetodos->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Ingreso Exitoso";
                header("Location:./index.php?controlador=bloque&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Ingresado correctamente, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=bloque&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Contacte con TI";
            header("Location:./index.php?controlador=bloque&accion=Menu");
        }
    }

    function BuscarId(){
        $bloqueMetodos = new BloqueMetodos();
        $bloque = $bloqueMetodos->BuscarId($_POST["id"]);
        if(isset($bloque)){
            return $bloque;
        }
        return false;
    }

    function BuscarFecha(){
        $bloqueMetodos = new BloqueMetodos();
        $bloque = $bloqueMetodos->BuscarFecha($_POST["fecha"]);
        if(isset($bloque)){
            return $bloque;
        }
        return false;
    }

    private function Todos()
    {
        $bloqueMetodos = new BloqueMetodos();
        $bloques=$bloqueMetodos->Todos();
        return $bloques;
    }

    function Actualizar()
    {
        $usuario=$this->Validar();
        $bloqueMetodos = new BloqueMetodos();

        $bloque= new Bloque();
        $bloque->setId($_POST["id"]);
        $bloque = $bloqueMetodos -> BuscarId($bloque->setId($_POST["id"]));
        $bloquePasado=$bloque;
        $bloque->setFecha($_POST["fecha"]);
        $bloque->setHoraIncio($_POST["horaInicio"]);
        $bloque->setHoraFinal($_POST["horaFinal"]);
        $bloque->setCantidadPersonas($_POST["cantidadPersonas"]);
        $bloque->setEstado(true);

        $bitacoraMetodos=new BitacoraMetodos();

        if($bloqueMetodos->Actualizar($bloque))
        {
            $detalleBitacora=$usuario->getNombre()." ".$usuario->getApellido1()." ".$usuario->getApellido2()." actualizó el bloque del día ".$bloquePasado->getFecha()." de ".$bloquePasado->getHoraInicio()." a ".$bloquePasado->getHoraFinal();
            if($bitacoraMetodos->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Actualización Exitosa";
                header("Location:./index.php?controlador=bloque&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Actualización Exitosa, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=bloque&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Contacte con TI";
            header("Location:./index.php?controlador=bloque&accion=Menu");
        }
    }

    function Estado()
    {
        $usuario=$this->Validar();
        
        $bloque=new Bloque();
        $bloqueMetodos=new BloqueMetodos();
        $bloque->setId($_POST["id"]);
        $bloque->setEstado(0);
        if($bloqueMetodos->Estado($bloque))
        {
            $detalleBitacora=$usuario->getNombre()." ".$usuario->getApellido1()." ".$usuario->getApellido2()." eliminó un bloque";
            if($bitacoraMetodos->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Eliminación Exitosa";
                header("Location:./index.php?controlador=bloque&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Eliminación Exitosa, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=bloque&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Comuniquese con TI";
            header("Location:./index.php?controlador=bloque&accion=Menu");
        }


    }
}