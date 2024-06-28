<?php

class GustaMetodos
{
    function Nuevo (Gusta $gusta){

        $resul  = BuscarEstudiante($gusta);
        foreach ($resul as $r){
            if ($gusta->getIdEspecialidad()==$r->getIdEspecialidad()){
                $this->Estado($gusta);
                return  true;
            }
        }
        $conexion = new Conexion();
        $query="INSERT INTO `GUSTA`( `IDESPECIALIDAD`, `IDINTERESADO`, `ESTADO`) VALUES (".$gusta->getIdEspecialidad().",".$gusta->getIdInteresado().",'".$gusta->getEstado()."')";
        $msj = $conexion->Ejecutar($query);
        $conexion->Cerrar();
        return $msj;

    }


    function BuscarEstudiante(Gusta $gusta)
    {
        $conexion = new Conexion ();
        $query = "SELECT `ID`, `IDESPECIALIDAD`, `IDINTERESADO`, `ESTADO` FROM `GUSTA` WHERE `IDINTERESADO` =".$gusta->getIdInteresado()." ";
        $resul = $conexion->Ejecutar($query);
        if(mysqli_num_rows($resul)>0){
            $gustaR = new Gusta();
            $arrayG =[];
            //Fecth_assoc obtiene una fila y mientras obtenga filas se va a repetir
            while($fila=$resul->fetch_assoc()){
                $gustaR->setId($fila["ID"]);
                $gustaR->setInteresado($fila["IDESPECIALIDAD"]);
                $gustaR->setIdEspecialidad($fila["IDINTERESADO"]);
                $gustaR->setEstado($fila["ESTADO"]);
                $arrayG []= $gustaR;
            }
            $conexion->Cerrar();
            return $arrayG;
        } else {
            $conexion->Cerrar();
            return null;
        }


    }
    function Todos (){
        $conexion = new Conexion();
        $query = "SELECT * FROM `GUSTA`";
        $resul = $conexion->Ejecutar($query);
        if(mysqli_num_rows($resul)>0){
            $gustaR  = new Gusta() ;
            $arrayG = [];
            //Fecth_assoc obtiene una fila y mientras obtenga filas se va a repetir
            while($fila=$resul->fetch_assoc()){
                $gustaR->setId($fila["ID"]);
                $gustaR->setInteresado($fila["IDESPECIALIDAD"]);
                $gustaR->setIdEspecialidad($fila["IDINTERESADO"]);
                $gustaR->setEstado($fila["ESTADO"]);
                $arrayG[]=$gustaR;
            }
            $conexion->Cerrar();
            return $arrayG;
        } else {
            $conexion->Cerrar();
            return null;
        }
    }


    function Actualizar (Gusta $gusta)
    {
        $conexion = new Conexion();
        $query = "UPDATE `GUSTA` SET `IDESPECIALIDAD`=".$gusta->getIdEspecialidad().",`IDINTERESADO`=".$gusta->getIdInteresado().",`ESTADO`='".$gusta->getEstado()."' WHERE `ID`=".$gusta->getId()."";
        $MSJ = $conexion->Ejecutar($query);
        $conexion->Close();
        return $MSJ;
    }
    function   Estado (Gusta $gusta){
        $conexion = new Conexion ();
        $query = "UPDATE `GUSTA` SET `ESTADO`='".$gusta->getEstado()."' WHERE `ID`= ".$gusta->getId()."";
        $MSJ = $conexion->Ejecutar($query);
        $conexion->Cerrar();
        return ($MSJ);
    }
}