<?php

class Cl_CompraUsu{
    
    private $idCompra;
    private $idUsuario;
    
    function __construct() {
        
    }
    
    function getIdCompra() {
        return $this->idCompra;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdCompra($idCompra) {
        $this->idCompra = $idCompra;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }



}
