<?php

class EspecialiadMetodos
{

    function Todos (){
        $conexion = new Conexion();
        $query ="SELECT `ID`, `NOMBRE` FROM `ESPECIALIDAD` ";
        $resul = $conexion->Ejecutar($query);
        if (mysqli_num_rows($resul)>0){
            $esp = new Especialidad();
            $espA =[];
            while ($fila=$resul->fetch_assoc()){
                $esp->setId($fila["ID"]);
                $esp->setNombre($fila["NOMBRE"]);
                $espA[] = $esp;
            }
            return $espA;
        }else{
            return null;
        }
        $conexion->Cerrar();
    }
    function BuscarId($id){
        $conexion = new Conexion();
        $query ="SELECT `ID`, `NOMBRE` FROM `ESPECIALIDAD` WHERE 'ID' = ".$id."";
        $resul = $conexion->Ejecutar($query);
        $conexion->Cerrar();
        if (mysqli_num_rows($resul)>0){
            $esp = new Especialidad();
            while ($fila=$resul->fetch_assoc()){
                $esp->setId($fila["ID"]);
                $esp->setNombre($fila["NOMBRE"]);

            }
            return $resul;
        }else{
            return null;
        }
    }
}