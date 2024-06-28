<?php
class InteresadoMetodos 
{
    function Nuevo(Interesado $interesado)
    {
        $conexion=new Conexion();
        $sql="INSERT INTO `INTERESADO`(`CEDULA`, `NOMBRE`, `SEGUNDOAPELLIDO`, `PRIMERAPELLIDO`, `CORREO`, `TELEFONO`, `FECHANACIMIENTO`, `OTROCOLEGIO`, `DIRECCION`, `ASISTENCIA`, `ESTADO`, `PASS`, `IDCOLEGIO`, `IDBLOQUE`) VALUES "
                . "('".$interesado->getCedula()."','".$interesado->getNombre()."','".$interesado->getSegundoApellido()."','".$interesado->getPrimerApellido()."','".$interesado->getCorreo()."','".$interesado->getTelefono()."',"
                . "'".$interesado->getFechaNacimiento()."','".$interesado->getOtroColegio()."','".$interesado->getDireccion()."',".$interesado->getAsistencia().",".$interesado->getEstado().",'".$interesado->getPass()."'"
                . ",".$interesado->getIdColegio().",".$interesado->getIdBloque().");";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function Todos()
    {
        $retVal=array();
        $conexion=new Conexion();
        
        $sql='SELECT * FROM INTERESADO';
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $interesado=new Interesado();
                $interesado->setId($fila['ID']);
                $interesado->setCedula($fila['CEDULA']);
                $interesado->setNombre($fila['NOMBRE']);
                $interesado->setSegundoApellido($fila['SEGUNDOAPELLIDO']);
                $interesado->setPrimerApellido($fila['PRIMERAPELLIDO']);
                $interesado->setCorreo($fila['CORREO']);
                $interesado->setTelefono($fila['TELEFONO']);
                $interesado->setFechaNacimiento($fila['FECHANACIMIENTO']);
                $interesado->setOtroColegio($fila['OTROCOLEGIO']);
                $interesado->setDireccion($fila['DIRECCION']);
                $interesado->setAsistencia($fila['ASISTENCIA']);
                $interesado->setEstado($fila['ESTADO']);
                $interesado->setIdColegio($fila['IDCOLEGIO']);
                $interesado->setIdBloque($fila['IDBLOQUE']);
                $retVal[]=$interesado;
            }
        }
        else
            $retVal=null;
        
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function BuscarId(int $id)
    {
        $interesado=new Interesado();
        $conexion=new Conexion();
        $sql="SELECT * FROM `INTERESADO` WHERE `ID`=$id;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $interesado->setId($fila['ID']);
                $interesado->setCedula($fila['CEDULA']);
                $interesado->setNombre($fila['NOMBRE']);
                $interesado->setSegundoApellido($fila['SEGUNDOAPELLIDO']);
                $interesado->setPrimerApellido($fila['PRIMERAPELLIDO']);
                $interesado->setCorreo($fila['CORREO']);
                $interesado->setTelefono($fila['TELEFONO']);
                $interesado->setFechaNacimiento($fila['FECHANACIMIENTO']);
                $interesado->setOtroColegio($fila['OTROCOLEGIO']);
                $interesado->setDireccion($fila['DIRECCION']);
                $interesado->setAsistencia($fila['ASISTENCIA']);
                $interesado->setEstado($fila['ESTADO']);
                $interesado->setIdColegio($fila['IDCOLEGIO']);
                $interesado->setIdBloque($fila['IDBLOQUE']);
            }
        }
        else
            $interesado=null;
        $conexion->Cerrar();
        return $interesado;
    }
    
    function BuscarCedula($cedula)
    {
        $interesado=new Interesado();
        $conexion=new Conexion();
        $sql="SELECT * FROM `INTERESADO` WHERE `CEDULA`='$cedula';";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $interesado->setId($fila['ID']);
                $interesado->setNombre($fila['NOMBRE']);
                $interesado->setSegundoApellido($fila['SEGUNDOAPELLIDO']);
                $interesado->setPrimerApellido($fila['PRIMERAPELLIDO']);
                $interesado->setCorreo($fila['CEDULA']);
            }
        }
        else
            $interesado=null;
        $conexion->Cerrar();
        return $interesado;
    }
    
    function BuscarIngreso(Interesado $interesado)
    {
        $conexion=new Conexion();
        $retVal=false;
        $interesadoAux=new Interesado();
        $sql="SELECT * FROM `INTERESADO` WHERE `CEDULA`='".$interesado->getCedula()."';";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $interesadoAux->setPass($fila['PASS']);
            }
        }
        else
            $interesadoAux=null;
        $conexion->Cerrar();
        if($interesadoAux!=null && password_verify($interesado->getPass(), $interesadoAux->getPass()))
            $retVal=true;
        return $retVal;
    }
    
    function BuscarIdColegio(int $idColegio)
    {
        $retVal=array();
        $conexion=new Conexion();
        
        $sql="SELECT * FROM `INTERESADO` WHERE `IDCOLEGIO`= $idColegio";
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $interesado=new Interesado();
                $interesado->setId($fila['ID']);
                $interesado->setCedula($fila['CEDULA']);
                $interesado->setNombre($fila['NOMBRE']);
                $interesado->setSegundoApellido($fila['SEGUNDOAPELLIDO']);
                $interesado->setPrimerApellido($fila['PRIMERAPELLIDO']);
                $interesado->setCorreo($fila['CORREO']);
                $interesado->setTelefono($fila['TELEFONO']);
                $interesado->setFechaNacimiento($fila['FECHANACIMIENTO']);
                $interesado->setOtroColegio($fila['OTROCOLEGIO']);
                $interesado->setDireccion($fila['DIRECCION']);
                $interesado->setAsistencia($fila['ASISTENCIA']);
                $interesado->setEstado($fila['ESTADO']);
                $interesado->setIdColegio($fila['IDCOLEGIO']);
                $interesado->setIdBloque($fila['IDBLOQUE']);
                $retVal[]=$interesado;
            }
        }
        else
            $retVal=null;
        
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function BuscarIdBloque(int $idBloque)
    {
        $retVal=array();
        $conexion=new Conexion();
        
        $sql="SELECT * FROM `INTERESADO` WHERE `IDBLOQUE`= $idBloque";
        $resultado=$conexion->Ejecutar($sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $interesado=new Interesado();
                $interesado->setId($fila['ID']);
                $interesado->setCedula($fila['CEDULA']);
                $interesado->setNombre($fila['NOMBRE']);
                $interesado->setSegundoApellido($fila['SEGUNDOAPELLIDO']);
                $interesado->setPrimerApellido($fila['PRIMERAPELLIDO']);
                $interesado->setCorreo($fila['CORREO']);
                $interesado->setTelefono($fila['TELEFONO']);
                $interesado->setFechaNacimiento($fila['FECHANACIMIENTO']);
                $interesado->setOtroColegio($fila['OTROCOLEGIO']);
                $interesado->setDireccion($fila['DIRECCION']);
                $interesado->setAsistencia($fila['ASISTENCIA']);
                $interesado->setEstado($fila['ESTADO']);
                $interesado->setIdColegio($fila['IDCOLEGIO']);
                $interesado->setIdBloque($fila['IDBLOQUE']);
                $retVal[]=$interesado;
            }
        }
        else
            $retVal=null;
        
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function Actualizar(Interesado $interesado)
    {
        $conexion=new Conexion();
        $sql="UPDATE `INTERESADO` SET `CEDULA`='".$interesado->getCedula()."',`NOMBRE`='".$interesado->getNombre()."',`SEGUNDOAPELLIDO`='".$interesado->getSegundoApellido()."'"
                . ",`PRIMERAPELLIDO`='".$interesado->getPrimerApellido()."',`CORREO`='".$interesado->getCorreo()."',`TELEFONO`='".$interesado->getTelefono()."',`FECHANACIMIENTO`='".$interesado->getFechaNacimiento()."'"
                . ",`OTROCOLEGIO`='".$interesado->getOtroColegio()."',`DIRECCION`='".$interesado->getDireccion()."',`ASISTENCIA`=".$interesado->getAsistencia().",`IDCOLEGIO`=".$interesado->getIdColegio().""
                . ",`IDBLOQUE`=".$interesado->getIdBloque()." WHERE `ID`=".$interesado->getId()." ;";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();
        
        return $retVal;
    }
    
    function Estado(Interesado $interesado)
    {
        $conexion=new Conexion();
        $sql="UPDATE `INTERESADO` SET `ESTADO`=".$interesado->getEstado()." WHERE `ID`=".$interesado.getId().";";
        $retVal=$conexion->Ejecutar($sql);
        $conexion->Cerrar();
        
        return $retVal;
    }
}
