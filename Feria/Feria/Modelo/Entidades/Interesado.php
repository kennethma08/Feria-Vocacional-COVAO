<?php
class Interesado 
{
    private $id;
    private $cedula;
    private $nombre;
    private $segundoApellido;
    private $primerApellido;
    private $correo;
    private $telefono;
    private $fechaNacimiento;
    private $otroColegio;
    private $direccion;
    private $asistencia;
    private $estado;
    private $pass;
    private $idColegio;
    private $idBloque;
    public function getId() {
        return $this->id;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getSegundoApellido() {
        return $this->segundoApellido;
    }

    public function getPrimerApellido() {
        return $this->primerApellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getOtroColegio() {
        return $this->otroColegio;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getAsistencia() {
        return $this->asistencia;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getIdColegio() {
        return $this->idColegio;
    }

    public function getIdBloque() {
        return $this->idBloque;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setCedula($cedula): void {
        $this->cedula = $cedula;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setSegundoApellido($segundoApellido): void {
        $this->segundoApellido = $segundoApellido;
    }

    public function setPrimerApellido($primerApellido): void {
        $this->primerApellido = $primerApellido;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setFechaNacimiento($fechaNacimiento): void {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setOtroColegio($otroColegio): void {
        $this->otroColegio = $otroColegio;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setAsistencia($asistencia): void {
        $this->asistencia = $asistencia;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setPass($pass): void {
        $this->pass = $pass;
    }

    public function setIdColegio($idColegio): void {
        $this->idColegio = $idColegio;
    }

    public function setIdBloque($idBloque): void {
        $this->idBloque = $idBloque;
    }


}
