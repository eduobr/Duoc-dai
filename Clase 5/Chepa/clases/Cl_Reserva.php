<?php

class Cl_Reserva {
    private $codigo;
    private $rut;
    private $nombre;
    private $edad;
    private $mensaje;
    
    public function Cl_Reserva(){
        
    }
    
    //metodo get y set
    
    function getCodigo() {
        return $this->codigo;
    }

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEdad() {
        return $this->edad;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }


}
