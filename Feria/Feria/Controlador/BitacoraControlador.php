<?php  
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Bitacora.php';
require_once './Modelo/Metodos/BitacoraMetodos.php';
require_once './Modelo/Entidades/Usuario.php';
require_once './Modelo/Metodos/UsuarioMetodos.php';

class BitacoraControlador 
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
    function Menu()
    {
        $usuario=$this->Validar();
        $bitacoraMetodos=new BitacoraMetodos();
        $todasBitacoras= $bitacoraMetodos->Todos();
        
        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once './Vista/Administrador_Bitacora.php';
        unset($_SESSION["mensaje"]);
    }
    function BitacoraUsuario()
    {
        $usuario=$this->Validar();
        $idUsuario=$_POST["idUsuario"];
        $bitacoraMetodos=new BitacoraMetodos();
        $todasBitacoras= $bitacoraMetodos->BuscarUsuario($idUsuario);
        
        if(isset($_SESSION["mensaje"]))
            $mensaje=$_SESSION["mensaje"];
        else
            $mensaje=null;
        require_once './Vista/MenuBitacoraUsuario.php';
        unset($_SESSION["mensaje"]);
    }
}
