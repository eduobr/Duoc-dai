<?php
class Cl_CotizacionArticulo{
    private $idCotizacion;
    private $idUsuario;
    private $rutEmpleado;
    private $idArticulo;
    
    function __construct() {
        
    }
    function getIdCotizacion() {
        return $this->idCotizacion;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getRutEmpleado() {
        return $this->rutEmpleado;
    }

    function getIdArticulo() {
        return $this->idArticulo;
    }

    function setIdCotizacion($idCotizacion) {
        $this->idCotizacion = $idCotizacion;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setRutEmpleado($rutEmpleado) {
        $this->rutEmpleado = $rutEmpleado;
    }

    function setIdArticulo($idArticulo) {
        $this->idArticulo = $idArticulo;
    }


    
}


