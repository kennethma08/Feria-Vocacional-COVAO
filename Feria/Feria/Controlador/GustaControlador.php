<?php
require_once "../Modelo/Entidades/Gusta.php";
require_once "../Modelo/Metodos/GustaMetodos.php";

class GustaControlador
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
    function Crear (){
        $this->Validar();
        $gustaM = new GustaMetodos();
        $gusta = new Gusta();
        $gusta->setIdInteresado($_GET["idInteresado"]);
        $gusta->setIdEspecialidad($_GET["idEspecialidad"]);
        $resul = $gustaM->Nuevo($gusta);
        require_once "../Vista/Especialidad.php";
    }
    function MisGusta(){
        $this->Validar();
        $gustaM = new GustaMetodos();
        $gusta = new Gusta ();
        $gusta->setIdInteresado($_GET["IdEstudiante"]);
        $arrayG = $gustaM->BuscarEstudiante($gusta);
        require_once "../Vista/Gusta/MisMegusta.php";
    }
    function Menu (){
        $this->Validar();
        $gustaM = new GustaMetodos();
        $arrayG = $gustaM->Todos();
        require_once "../Vista/Gusta/Menu";
    }

}