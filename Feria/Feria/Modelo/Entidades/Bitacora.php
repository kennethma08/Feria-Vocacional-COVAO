<?php

class Bitacora 
{
    private $id;
    private $fecha;
    private $detalle;
    private $idUsuario;
    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getDetalle() {
        return $this->detalle;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setDetalle($detalle): void {
        $this->detalle = $detalle;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }


}
