<?php
    require_once './Core/Rutas.php';
    require_once './Core/RutaFija.php';
    
    $rutas = new Rutas();
    if(isset($_GET['controlador']))
    {
        $controlador=$rutas->CargarControlador($_GET['controlador']);
        if(isset($_GET['accion']))
        {
            $rutas->CargarAccion($controlador, $_GET['accion']);
        }
        else
        {
            $rutas->CargarAccion($controlador, $_GET['accion']);
        }
    }
    else
    {
        $controlador=$rutas->CargarControlador(CAP);
        $rutas->CargarAccion($controlador, CAP);
    }
