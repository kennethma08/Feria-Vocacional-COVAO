<?php

class BitacoraMetodos 
{
    function Nuevo(Bitacora $bitacora)
    {
        $conexion=new Conexion();
        $sql="INSERT INTO `BITACORA`(`FECHA`, `DETALLE`, `IDUSUARIO`) VALUES ('".$bitacora->getFecha()."','".$bitacora->getDetalle()."',".$bitacora->getIdUsuario().");";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function Todos()
    {
        $retVal=array();
        $conexion=new Conexion();
        
        $sql='SELECT * FROM BITACORA';
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $bitacora=new Bitacora();
                $bitacora->setId($fila['ID']);
                $bitacora->setFecha($fila['FECHA']);
                $bitacora->setDetalle($fila['DETALLE']);
                $bitacora->setIdUsuario($fila['IDUSUARIO']);
                $retVal[]=$bitacora;
            }
        }
        else
            $retVal=null;
        
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function BuscarUsuario(int $idUsuario)
    {
        $retVal=array();
        $conexion=new Conexion();
        
        $sql="SELECT * FROM BITACORA WHERE `IDUSUARIO`=$idUsuario;";
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $bitacora=new Bitacora();
                $bitacora->setId($fila['ID']);
                $bitacora->setFecha($fila['FECHA']);
                $bitacora->setDetalle($fila['DETALLE']);
                $bitacora->setIdUsuario($fila['IDUSUARIO']);
                $retVal[]=$bitacora;
            }
        }
        else
            $retVal=null;
        
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function AgregarBitacora($detalleBitacora,$idUsuario)
    {
        $bitacora=new Bitacora();
        $bitacora->setFecha(date("Y-m-d"));
        $bitacora->setDetalle($detalleBitacora);
        $bitacora->setIdUsuario($idUsuario);
        if($this->Nuevo($bitacora))
            $retVal=True;
        else
            $retVal=False;
        return $retVal;
    }
    
}
