<?php

class ColegioMetodos 
{
    
    function Nuevo(Colegio $colegio)
    {
        $conexion=new Conexion();
        $sql="INSERT INTO `COLEGIO`( `NOMBRE`, `ESTADO`) VALUES ('".$colegio->getNombre()."',".$colegio->getEstado().");";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function Todos()
    {
        $retVal=array();
        $conexion=new Conexion();
        
        $sql='SELECT * FROM COLEGIO';
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $colegio=new Colegio();
                $colegio->setId($fila['ID']);
                $colegio->setEstado($fila['ESTADO']);
                $colegio->setNombre($fila['NOMBRE']);
                $retVal[]=$colegio;
            }
        }
        else
            $retVal=null;
        
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function BuscarId(int $id)
    {
        $colegio=new Colegio();
        $conexion=new Conexion();
        $sql="SELECT * FROM `COLEGIO` WHERE `ID`=$id;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $colegio->setId($fila['ID']);
                $colegio->setEstado($fila['ESTADO']);
                $colegio->setNombre($fila['NOMBRE']);
            }
        }
        else
            $colegio=null;
        $conexion->Cerrar();
        return $colegio;
    }
    
    function Estado(Colegio $colegio)
    {
        $conexion=new Conexion();
        $sql="UPDATE `COLEGIO` SET `ESTADO`=".$colegio->getEstado()." WHERE `ID`=".$colegio.getId().";";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function Actualizar(Colegio $colegio)
    {
        $conexion=new Conexion();
        $sql="UPDATE `COLEGIO` SET `NOMBRE`='".$colegio->getNombre()."' WHERE `ID`=".$colegio->getId().";";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();
        
        return $retVal;
    }
   
}
