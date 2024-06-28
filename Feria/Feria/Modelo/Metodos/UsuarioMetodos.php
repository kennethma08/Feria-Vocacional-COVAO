<?php

class UsuarioMetodos
{
    function Nuevo (Usuario $usu){

        if ($this->BuscarCed($usu->getCedula())>0)
        {
            return false;
        }
        else{
            $conexion = new Conexion();
            $query="INSERT INTO `USUARIO`(`CEDULA`, `NOMBRE`, `TELEFONO`, `PASS`, `ESTADO`, `IDPERFIL`) VALUES "
                ."('".$usu->getCedula()."','".$usu->getNombre()."','".$usu->getTelefono()."','".$usu->getPass()."','".$usu->getEstado()."',".$usu->getIdPerfil().")";
            $msj = $conexion->Ejecutar($query);
            $conexion->Cerrar();
            return $msj;
        }

    }

    function BuscarCed(String $ced)
    {
        $conexion = new Conexion ();
        $query = "SELECT * FROM `USUARIO` WHERE CEDULA = '$ced'";
        $resul = $conexion->Ejecutar($query);
        if(mysqli_num_rows($resul)>0){
            $usuario = new Usuario ();
            //Fecth_assoc obtiene una fila y mientras obtenga filas se va a repetir
            while($fila=$resul->fetch_assoc()){
                $usuario->setId($fila["ID"]);
                $usuario->setIdPerfil($fila["IDPERFIL"]);
                
            }
            $conexion->Cerrar();
            return $usuario;
        } else {
            $conexion->Cerrar();
            return null;
        }


    }
    function BuscarID(int $id)
    {
        $conexion = new Conexion ();
        $query = "SELECT `ID`, `CEDULA`, `NOMBRE`, `TELEFONO`, `ESTADO`, `IDPERFIL` FROM `USUARIO` WHERE ID = ".$id."";
        $resul = $conexion->Ejecutar($query);
        if(mysqli_num_rows($resul)>0){
            $usuario = new Usuario ();
            //Fecth_assoc obtiene una fila y mientras obtenga filas se va a repetir
            while($fila=$resul->fetch_assoc()){
                $usuario->setId($fila["ID"]);
                $usuario->setCedula($fila["CEDULA"]);
                $usuario->setNombre($fila["NOMBRE"]);
                $usuario->setTelefono($fila["TELEFONO"]);
                $usuario->setEstado($fila["ESTADO"]);
                $usuario->setIdPerfil($fila["IDPERFIL"]);

            }
            $conexion->Cerrar();
            return $usuario;
        } else {
            $conexion->Cerrar();
            return null;
        }


    }
    function Todos ()
    {
        $retVal=array();
        $conexion=new Conexion();
        
        $sql='SELECT * FROM USUARIO';
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $usuario  = new Usuario ();
                $usuario->setId($fila["ID"]);
                $usuario->setCedula($fila["CEDULA"]);
                $usuario->setNombre($fila["NOMBRE"]);
                $usuario->setTelefono($fila["TELEFONO"]);
                $usuario->setEstado($fila["ESTADO"]);
                $usuario->setIdPerfil($fila["IDPERFIL"]);
                $retVal[]=$usuario;
            }
        }
        else
            $retVal=null;
        
        $conexion->Cerrar();
        
        return $retVal;
    }
    function BuscarIngreso (Usuario $usuVali){
        $conexion = new Conexion();
        $query = "SELECT `PASS` FROM `USUARIO` WHERE `CEDULA` = '".$usuVali->getCedula()."'";
        $resul = $conexion->Ejecutar($query);

        if (mysqli_num_rows($resul)>0) {
            $usuario = new Usuario();

            while ($fila=$resul->fetch_assoc()){
                $usuario->setPass($fila["PASS"]);
            }

            if (password_verify($usuVali->getPass(), $usuario->getPass())){
                $conexion->Cerrar();
                return true;
            } else {
                $conexion->Cerrar();
                return false;
            }

        }else{
            $conexion->Cerrar();
            return false;
        }
    }

    function Actualizar (Usuario $usuario)
    {
        if ($this->BuscarCed($usuario->getCedula())>0)
        {
            return false;
        }
        else{
            $conexion = new Conexion();
            $query = "UPDATE `USUARIO` SET `CEDULA`='".$usuario->getCedula()."',`NOMBRE`='".$usuario->getNombre()."',"
                ."`TELEFONO`='".$usuario->getTelefono()."',`PASS`='".$usuario->getPass()."',`IDPERFIL`='".$usuario->getIdPerfil()."' WHERE `ID` = ".$usuario->getId()."";
            $MSJ = $conexion->Ejecutar($query);
            $conexion->Cerrar();
            return $MSJ;
        }

    }
    function   Estado (Usuario $usu){
        $conexion = new Conexion ();
        $query = "UPDATE `USUARIO` SET `ESTADO`='".$usu->getEstado()."' WHERE `ID`= ".$usu->getId()."";
        $MSJ = $conexion->Ejecutar($query);
        $conexion->Cerrar();
        return ($MSJ);
    }
}