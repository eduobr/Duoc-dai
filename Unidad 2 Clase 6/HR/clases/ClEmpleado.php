<?php

class ClEmpleado {
    private $id;
    private $nombre;
    private $apellido;
    private $e_mail;
    private $fono;
    private $fecha;
    private $salario;
    private $comision;
    private $idTrabajo;
    private $idDepartamento;
    private $idJefe;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getE_mail() {
        return $this->e_mail;
    }

    function getFono() {
        return $this->fono;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getSalario() {
        return $this->salario;
    }

    function getComision() {
        return $this->comision;
    }

    function getIdTrabajo() {
        return $this->idTrabajo;
    }

    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function getIdJefe() {
        return $this->idJefe;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setE_mail($e_mail) {
        $this->e_mail = $e_mail;
    }

    function setFono($fono) {
        $this->fono = $fono;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function setComision($comision) {
        $this->comision = $comision;
    }

    function setIdTrabajo($idTrabajo) {
        $this->idTrabajo = $idTrabajo;
    }

    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
    }

    function setIdJefe($idJefe) {
        $this->idJefe = $idJefe;
    }


}
