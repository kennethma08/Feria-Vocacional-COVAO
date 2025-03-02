<?php

class Rutas 
{
    function CargarControlador($controlador)
    {
        $nombreControlador= ucwords($controlador)."Controlador";
        $archivoControlador="./Controlador/".ucwords($controlador)."Controlador.php";
        if(!is_file($archivoControlador))
        {
            $archivoControlador='./Controlador/IndexControlador.php';
            $nombreControlador='IndexControlador';
        }
        require_once $archivoControlador;
        return new $nombreControlador();
        
    }
    function CargarAccion($controlador,$accion)
    {
        if(isset($accion) && method_exists($controlador, $accion))
        {
            $controlador->$accion();
        }
        else
        {
            require_once './Controlador/IndexControlador.php';
            $controlador=new IndexControlador();
            $controlador->Index();
        }
    }
}
