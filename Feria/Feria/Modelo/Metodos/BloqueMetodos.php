<?php
class BloqueMetodos{
    function Nuevo(Bloque $bloque)
    {
        $conexion=new Conexion();
        $sql="INSERT INTO `BLOQUE`(`FECHA`, `HORAINICIO`, `HORAFINAL`, `ESTADO`, `CANTIDADPERSONAS`) VALUES "
            . "('".$bloque->getFecha()."','".$bloque->getHoraInicio()."','".$bloque->getHoraFinal()."',".$bloque->getEstado().",".$bloque->getCantidadPersonas().");";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();

        return $retVal;
    }

    function BuscarId($id)
    {
        $conexion=new Conexion();
        $sql="SELECT * FROM `BLOQUE` WHERE `ID`=$id;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $bloque=new Bloque();
                $bloque->setId($fila['ID']);
                $bloque->setFecha($fila['FECHA']);
                $bloque->setHoraInicio($fila['HORAINICIO']);
                $bloque->setHoraFinal($fila['HORAFINAL']);
                $bloque->setEstado($fila['ESTADO']);
                $bloque->setCantidadPersonas($fila['CANTIDADPERSONAS']);
            }
        }
        else
            $bloque=null;
        $conexion->Cerrar();
        return $bloque;
    }

    function BuscarFecha($fecha)
    {
        $retVal=array();
        $conexion=new Conexion();
        $sql="SELECT * FROM `BLOQUE` WHERE `FECHA`=$fecha;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $bloque=new Bloque();
                $bloque->setId($fila['ID']);
                $bloque->setFecha($fila['FECHA']);
                $bloque->setHoraInicio($fila['HORAINICIO']);
                $bloque->setHoraFinal($fila['HORAFINAL']);
                $bloque->setEstado($fila['ESTADO']);
                $bloque->setCantidadPersonas($fila['CANTIDADPERSONAS']);
                $retVal[]=$bloque;
            }
        }
        else
            $retVal=null;

        $conexion->Cerrar();
        return $retVal;
    }

    function Todos()
    {
        $retVal=array();
        $conexion=new Conexion();
        $sql="SELECT * FROM `BLOQUE`;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $bloque=new Bloque();
                $bloque->setId($fila['ID']);
                $bloque->setFecha($fila['FECHA']);
                $bloque->setHoraInicio($fila['HORAINICIO']);
                $bloque->setHoraFinal($fila['HORAFINAL']);
                $bloque->setEstado($fila['ESTADO']);
                $bloque->setCantidadPersonas($fila['CANTIDADPERSONAS']);
                $retVal[]=$bloque;
            }
        }
        else
            $retVal=null;

        $conexion->Cerrar();
        return $retVal;
    }

    function Actualizar(Bloque $bloque)
    {
        $conexion=new Conexion();
        $sql="UPDATE `BLOQUE` SET `FECHA`='".$bloque->getFecha()."',`HORAINICIO`='".$bloque->getHoraInicio()."',`HORAFINAL`='".$bloque->getHoraFinal()."',`ESTADO`=".$bloque->getEstado()."',`CANTIDADPERSONAS`='".$bloque->getCantidadPersonas()." WHERE `ID`=".$bloque->getId()." ;";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();

        return $retVal;
    }

    function Estado(Bloque $bloque)
    {
        $conexion=new Conexion();
        $sql="UPDATE `BLOQUE` SET `ESTADO`=".$bloque->getEstado()." WHERE `ID`=".$bloque.getId().";";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();

        return $retVal;
    }

}