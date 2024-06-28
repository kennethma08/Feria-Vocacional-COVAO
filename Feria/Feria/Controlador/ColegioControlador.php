<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Colegio.php';
require_once './Modelo/Metodos/ColegioMetodos.php';
require_once './Modelo/Entidades/Bitacora.php';
require_once './Modelo/Metodos/BitacoraMetodos.php';
require_once './Modelo/Entidades/Usuario.php';
require_once './Modelo/Metodos/UsuarioMetodos.php';

class ColegioControlador 
{
    private function Validar()
    {
        if(isset($_SESSION['idUsuario']))
        {
            $idUsuario=$_SESSION['idUsuario'];
            $usuario= new Usuario();
            $usuarioMetodo= new UsuarioMetodos();
            
            $usuario=$usuarioMetodo->BuscarId($idUsuario);
            if($usuario==null || $usuario->getIdPerfil()==1)
                header('Location: index.php');
        }
        else
            header('Location: index.php');
        return $usuario;
    }
    function Menu()
    {
        $usuario=$this->Validar();
        $colegioMetodos=new ColegioMetodos();
        $todosColegios= $colegioMetodos->Todos();
        
        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once './Vista/MenuColegio.php';
        unset($_SESSION["mensaje"]);
    }
    function Crear()
    {
        $usuario=$this->Validar();
        
        $colegio= new Colegio();
        $colegio->setNombre($_POST["nombre"]);
        $colegio->setEstado(true);
        
        $colegioMetodos=new ColegioMetodos();
        $bitacoraMetodo=new BitacoraMetodos();
        if($colegioMetodos->Nuevo($colegio))
        {
            $detalleBitacora=$usuario->getNombre()." ".$usuario->getApellido1()." ".$usuario->getApellido2()." ingresó el colegio ".$colegio->getNombre();
            if($bitacoraMetodo->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Colegio Ingresado correctamente";
                header("Location:./index.php?controlador=colegio&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Colegio Ingresado correctamente, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=colegio&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Error al ingresar el nuevo colegio, contacte con TI";
            header("Location:./index.php?controlador=colegio&accion=Menu");
        }
    }
    function Actualizar()
    {
        $usuario=$this->Validar();
        
        $id=$_POST["id"];
        if(isset($id))
        {
            $colegioMetodos=new ColegioMetodos();
            $colegio= new Colegio();
            $colegio=$colegioMetodos->BuscarId($id);
            $bitacoraMetodo=new BitacoraMetodos();
            if($colegio!=null)
            {
                $nombreColegio=$colegio->getNombre();
                $colegio->setNombre($_POST["nombre"]);
                
                if($colegioMetodos->Actualizar($colegio))
                {
                    $detalleBitacora=$usuario->getNombre()." ".$usuario->getApellido1()." ".$usuario->getApellido2()." actualizó el colegio ".$colegio->getNombre();
                    if($bitacoraMetodo->AgregarBitacora($detalleBitacora, $usuario->getId()))
                    {
                        $_SESSION["mensaje"]="Colegio Actualizado correctamente";
                        header("Location:./index.php?controlador=colegio&accion=Menu");
                    }
                    else
                    {
                        $_SESSION["mensaje"]="Colegio Actualizado correctamente, pero error al agregar bitacora comuniquese con TI";
                        header("Location:./index.php?controlador=colegio&accion=Menu");
                    }
                }
                else
                {
                    $_SESSION["mensaje"]= "Error al actualizar el colegio, contacte con TI";
                    header("Location:./index.php?controlador=colegio&accion=Menu");
                }
            }
            else
            {
                $_SESSION["mensaje"]="El colegio no existe";
                header("Location:./index.php?controlador=colegio&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Error al seleccionar el colegio a actualizar";
            header("Location:./index.php?controlador=colegio&accion=Menu");
        }
    }
    function Desactivar()
    {
        $usuario=$this->Validar();
        
        $colegio=new Colegio();
        $colegioMetodos=new ColegioMetodos();
        
        $bitacoraMetodo=new BitacoraMetodos();
        $colegio=$colegioMetodos->BuscarId($_POST["id"]);
        $colegio->setEstado(0);
        if($colegioMetodos->Estado($colegio))
        {
            $detalleBitacora=$usuario->getNombre()." ".$usuario->getApellido1()." ".$usuario->getApellido2()." eliminó el colegio ".$colegio->getNombre();
            if($bitacoraMetodo->AgregarBitacora($detalleBitacora, $usuario->getId()))
            {
                $_SESSION["mensaje"]="Colegio eliminado correctamente";
                header("Location:./index.php?controlador=colegio&accion=Menu");
            }
            else
            {
                $_SESSION["mensaje"]="Colegio eliminado correctamente, pero error al agregar bitacora comuniquese con TI";
                header("Location:./index.php?controlador=colegio&accion=Menu");
            }
        }
        else
        {
            $_SESSION["mensaje"]="Comuniquese con TI";
            header("Location:./index.php?controlador=colegio&accion=Menu");
        }
    }
}
