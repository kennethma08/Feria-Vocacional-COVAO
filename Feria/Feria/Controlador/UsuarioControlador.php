<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Usuario.php';
require_once './Modelo/Metodos/UsuarioMetodos.php';
require_once './Modelo/Entidades/Bitacora.php';
require_once './Modelo/Metodos/BitacoraMetodos.php';
require_once "./Modelo/Metodos/PerfilMetodos.php";
require_once './Modelo/Entidades/Perfil.php';
class UsuarioControlador
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

    function Crear()
    {
        $usuario=$this->Validar();
        
        $usu = new Usuario();
        $usuM = new UsuarioMetodos();
        $usu->setNombre($_POST["nombre"]);
        $usu->setCedula($_POST["cedula"]);
        $usu->setTelefono($_POST["telefono"]);
        $usu->setPass(password_hash("123", PASSWORD_DEFAULT));
        $usu->setEstado(true);
        //Predeterminado 2 los usurio normales, el primer usuario sera el admin con 1. Este prodra modificar este campo a otros
        $usu->setIdPerfil(2);

        $bitacoraMetodos=new BitacoraMetodos();
        
        if ($usuM->Nuevo($usu))
        {
            $detalleBitacora=$usuario->getNombre()." ingresó el usuario ".$usu->getNombre();
            if($bitacoraMetodos->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Ingreso Exitoso";
                header("Location:./index.php?controlador=usuario&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Ingresado correctamente, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=usuario&accion=Menu");
            }
        }
        else{
            $_SESSION["mensaje"]="Ingreso Fallido";
            header("Location:./index.php?controlador=usuario&accion=Meu");
        }
    }
    function CargarCrear (){
        
        $perfil = new PerfilM();
        $ArrayP = $perfil->Todos();
        require_once "../Vista/Usuario/Crear.php";
    }

    function Menu()
    {
        $usuarios=$this->Validar();
        $uM = new UsuarioMetodos();
        $usuario = $uM->Todos();
        
        $perfilMetodos = new PerfilMetodos();
        $perfil = new Perfil();
        foreach ($usuario as $s) 
        {
            $perfil = $perfilMetodos->BuscarId($s->getIdPerfil());
            $s->setIdPerfil($perfil->getNombre());
        }
        
        
        require_once "./Vista/Administrador_Usuario.php";
    }

    function CargaActualizar ()
    {
        $this->Validar();
        $usuM = new UsuarioMetodos();
        $usu = $usuM->BuscarID($_GET["id"]);
        $perfil = new PerfilM();
        $ArrayP = $perfil->Todos();
        require_once "../Vista/Usuario/Actualizar .php";

    }
    function Actualizar (){
        $usuario=$this->Validar();
        $usu = new Usuario();
        $usuM = new UsuarioMetodos();
        $usu->setId($_POST["id"]);
        $usu->setNombre($_POST["nombre"]);
        $usu->setCedula($_POST["cedula"]);
        $usu->setTelefono($_POST["telefono"]);
        //Predeterminado 2 los usurio normales, el primer usuario sera el admin con 1. Este prodra modificar este campo a otros
        $usu->setIdPerfil(2);
        $bitacoraMetodos=new BitacoraMetodos();
        if ($usuM->Actualizar($usu))
        {
            $detalleBitacora=$usuario->getNombre()." actualizó el usuario ".$usu->getNombre();
            if($bitacoraMetodos->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Actualizacion Exitosa";
                header("Location:./index.php?controlador=usuario&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Actualización correctamente, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=usuario&accion=Menu");
            }
        }
        else{
            $_SESSION["mensaje"]="Actualizacion Fallida";
            header("Location:./index.php?controlador=usuario&accion=Menu");
        }
    }
    function CambioEstado (){
        $usuario=$this->Validar();
        $usu = new Usuario();
        $usuM = new UsuarioMetodos();
        $usu->setId($_POST["id"]);
        $usu=$usuM->BuscarID($usu->getId());
        $usu->setEstado(0);
        //Predeterminado 2 los usurio normales, el primer usuario sera el admin con 1. Este prodra modificar este campo a otros
        $bitacoraMetodos=new BitacoraMetodos();
        
        if ($usuM->Estado($usu))
        {
            $detalleBitacora=$usuario->getNombre()." eliminó el usuario ".$usu->getNombre();
            if($bitacoraMetodos->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Eliminación Exitosa";
            header("Location:./index.php?controlador=usuario&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Eliminación correctamente, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=usuario&accion=Menu");
            }
        }
        else{
            $_SESSION["mensaje"]="Cambio de estado fallido, contacte con TI";
            header("Location:./index.php?controlador=usuario&accion=enu");
        }
    }
}