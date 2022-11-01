<?php

class Cl_Atencion {
    private $rutCli;
    private $rutAbo;
    private $fecAtencion;
    private $estado;
    
    function __construct() {
        
    }
    
    function getRutCli() {
        return $this->rutCli;
    }

    function getRutAbo() {
        return $this->rutAbo;
    }

    function getFecAtencion() {
        return $this->fecAtencion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setRutCli($rutCli) {
        $this->rutCli = $rutCli;
    }

    function setRutAbo($rutAbo) {
        $this->rutAbo = $rutAbo;
    }

    function setFecAtencion($fecAtencion) {
        $this->fecAtencion = $fecAtencion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
}
