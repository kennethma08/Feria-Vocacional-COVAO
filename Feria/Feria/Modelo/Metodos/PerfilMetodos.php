<?php
class PerfilMetodos{
    function BuscarId($id)
    {
        $conexion=new Conexion();
        $sql="SELECT * FROM `PERFIL` WHERE `ID`=$id;";
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $perfil=new Perfil();
                $perfil->setId($fila['ID']);
                $perfil->setNombre($fila['NOMBRE']);
            }
        }
        else
            $perfil=null;
        $conexion->Cerrar();
        return $perfil;
    }

    function Todos()
    {
        $retVal=array();
        $conexion=new Conexion();

        $sql='SELECT * FROM PERFIL';
        $resultado=$conexion->Ejecutar($sql);

        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $perfil=new Perfil();
                $perfil->setId($fila['ID']);
                $perfil->setNombre($fila['NOMBRE']);
                $retVal[]=$perfil;
            }
        }
        else
            $retVal=null;

        $conexion->Cerrar();

        return $retVal;
    }
}