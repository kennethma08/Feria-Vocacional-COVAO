<?php

class Acompanante{
    private $id;
    private $cedula;
    private $nombre;
    private $telefono;
    private $estado;
    private $idInteresado;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }


    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
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

    public function getIdInteresado()
    {
        return $this->idInteresado;
    }

    public function setIdInteresado($idInteresado)
    {
        $this->idInteresado = $idInteresado;
        return $this;
    }


}