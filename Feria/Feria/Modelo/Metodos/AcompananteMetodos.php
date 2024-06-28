<?php
class AcompananteMetodos{
    function Nuevo(Acompanante $acompanante)
    {
        $conexion=new Conexion();
        $sql="INSERT INTO `ACOMPANANTE`(`CEDULA`, `NOMBRE`, `TELEFONO`, `ESTADO`, `IDINTERESADO`) VALUES "
            . "('".$acompanante->getCedula()."','".$acompanante->getNombre()."','".$acompanante->getTelefono()."',".$acompanante->getEstado().",".$acompanante->getIdInteresado().");";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();

        return $retVal;
    }

    function Todos()
    {
        $retVal=array();
        $conexion=new Conexion();

        $sql='SELECT * FROM ACOMPANANTE';
        $resultado=$conexion->Ejecutar($sql);

        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $acompanante=new Acompanante();
                $acompanante->setId($fila['ID']);
                $acompanante->setCedula($fila['CEDULA']);
                $acompanante->setNombre($fila['NOMBRE']);
                $acompanante->setTelefono($fila['TELEFONO']);
                $acompanante->setEstado($fila['ESTADO']);
                $acompanante->setIdInteresado($fila['IDINTERESADO']);
                $retVal[]=$acompanante;
            }
        }
        else
            $retVal=null;

        $conexion->Cerrar();

        return $retVal;
    }

    function BuscarId($id)
    {
        $conexion=new Conexion();
        $sql="SELECT * FROM `ACOMPANANTE` WHERE `ID`=$id;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $acompanante=new Acompanante();
                $acompanante->setId($fila['ID']);
                $acompanante->setCedula($fila['CEDULA']);
                $acompanante->setNombre($fila['NOMBRE']);
                $acompanante->setTelefono($fila['TELEFONO']);
                $acompanante->setEstado($fila['ESTADO']);
                $acompanante->setIdInteresado($fila['IDINTERESADO']);
            }
        }
        else
            $acompanante=null;
        $conexion->Cerrar();
        return $acompanante;
    }

    function BuscarIdInteresado($idInteresado)
    {
        $retVal=array();
        $conexion=new Conexion();
        $sql="SELECT * FROM ACOMPANANTE WHERE `IDINTERESADO`= $idInteresado;";
        $resultado=$conexion->Ejecutar($sql);

        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $acompanante=new Acompanante();
                $acompanante->setId($fila['ID']);
                $acompanante->setCedula($fila['CEDULA']);
                $acompanante->setNombre($fila['NOMBRE']);
                $acompanante->setTelefono($fila['TELEFONO']);
                $acompanante->setEstado($fila['ESTADO']);
                $acompanante->setIdInteresado($fila['IDINTERESADO']);
                $retVal[]=$acompanante;
            }
        }
        else
            $retVal=null;

        $conexion->Cerrar();

        return $retVal;
    }

    function Actualizar(Acompanante $acompanante)
    {
        $conexion=new Conexion();
        $sql="UPDATE `ACOMPANANTE` SET `CEDULA`='".$acompanante->getCedula()."',`NOMBRE`='".$acompanante->getNombre()."',`TELEFONO`='".$acompanante->getTelefono()."',`IDACOMPANANTE`=".$acompanante->getIdAcompanante()." WHERE `ID`=".$acompanante->getId()." ;";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();

        return $retVal;
    }

    function Estado(Acompanante $acompanante)
    {
        $conexion=new Conexion();
        $sql="UPDATE `ACOMPANANTE` SET `ESTADO`=".$acompanante->getEstado()." WHERE `ID`=".$acompanante.getId().";";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();

        return $retVal;
    }
}