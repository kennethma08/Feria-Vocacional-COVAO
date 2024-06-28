<?php
session_start();
require_once './Modelo/Conexion.php';
require_once "./Modelo/Entidades/Perfil.php";
require_once "./Modelo/Metodos/PerfilMetodos.php";
require_once './Modelo/Entidades/Usuario.php';
require_once './Modelo/Metodos/UsuarioMetodos.php';

class PerfilControlador{

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

    function BuscarId(){
        $pM=new PerfilMetodos();
        $perfil= new Perfil();
        $perfil = $pM->BuscarId($_POST["idPerfil"]);
        if(isset($perfil)){
            return $perfil;
        }
        return false;
    }

    private function Todos()
    {
        $pM=new PerfilMetodos();
        $perfil=$pM->Todos();
        return $perfil;
    }

}

