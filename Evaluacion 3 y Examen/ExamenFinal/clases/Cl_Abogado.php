<?php

class Cl_Abogado {
    private $rut;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $especialidad;
    private $valorHora;
    
    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidoP() {
        return $this->apellidoP;
    }

    function getApellidoM() {
        return $this->apellidoM;
    }

    function getEspecialidad() {
        return $this->especialidad;
    }

    function getValorHora() {
        return $this->valorHora;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidoP($apellidoP) {
        $this->apellidoP = $apellidoP;
    }

    function setApellidoM($apellidoM) {
        $this->apellidoM = $apellidoM;
    }

    function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

    function setValorHora($valorHora) {
        $this->valorHora = $valorHora;
    }


}
