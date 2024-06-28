<?php
class Bloque{
    private $id;
    private $fecha;
    private $horaInicio;
    private $horaFinal;
    private $cantidadPersonas;
    private $estado;

   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
        return $this;
    }

    public function getHoraFinal()
    {
        return $this->horaFinal;
    }

    public function setHoraFinal($horaFinal)
    {
        $this->horaFinal = $horaFinal;
        return $this;
    }

    public function getCantidadPersonas()
    {
        return $this->cantidadPersonas;
    }

    public function setCantidadPersonas($cantidadPersonas)
    {
        $this->cantidadPersonas = $cantidadPersonas;
        return $this;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }


}