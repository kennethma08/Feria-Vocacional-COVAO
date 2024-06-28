<?php

class Conexion 
{
    private $mysqli;
    
    function Ejecutar($query)
    {
        $name="prueba12c";
        $user="prueba12c";
        $pass="51N8zk%8e";
        
        if(!$this->mysqli=new mysqli('localhost',$user,$pass,$name))
        {
            die('Error de conexion ('. mysqli_connect_error().')'. mysqli_connect_error());
        }
        
        $this->mysqli->autocommit(TRUE);
        $resultado= $this->mysqli->query($query);
        return $resultado;       
    }
    
    function Cerrar()
    {
        $this->mysqli->close();
    }
}