<?php

class Colegio 
{
    private $id;
    private $nombre;
    private $estado;
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }


}
