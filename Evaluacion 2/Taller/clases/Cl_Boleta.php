<?php

class Cl_Boleta
{
    private $cantidad;
    private $idUsuario;
    private $idCompra;
    private $idCompraUsu;
    
    function __construct() {
        
    }
    function getCantidad() {
        return $this->cantidad;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdCompra() {
        return $this->idCompra;
    }

    function getIdCompraUsu() {
        return $this->idCompraUsu;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdCompra($idCompra) {
        $this->idCompra = $idCompra;
    }

    function setIdCompraUsu($idCompraUsu) {
        $this->idCompraUsu = $idCompraUsu;
    }


            
}

