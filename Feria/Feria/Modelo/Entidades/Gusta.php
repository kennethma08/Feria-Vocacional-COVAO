<?php

class Gusta
{
    private $id;
    private $idEspecialidad;
    private $idInteresado;

    private $estado;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    /**
     * @param mixed $idEspecialidad
     */
    public function setIdEspecialidad($idEspecialidad): void
    {
        $this->idEspecialidad = $idEspecialidad;
    }

    /**
     * @return mixed
     */
    public function getIdInteresado()
    {
        return $this->idInteresado;
    }

    /**
     * @param mixed $idInteresado
     */
    public function setIdInteresado($idInteresado): void
    {
        $this->idInteresado = $idInteresado;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }
}