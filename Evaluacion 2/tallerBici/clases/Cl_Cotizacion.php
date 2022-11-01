<?php

class Cl_Cotizacion {
    private $nombre;
    private $apellido;
    private $descripcion;
    private $tipoCotizacion;
    private $respuesta;
    
    function __construct() {
        
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getTipoCotizacion() {
        return $this->tipoCotizacion;
    }

    function getRespuesta() {
        return $this->respuesta;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setTipoCotizacion($tipoCotizacion) {
        $this->tipoCotizacion = $tipoCotizacion;
    }

    function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }



}
