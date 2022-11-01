<?php

class Cl_Compra{
    private $idCompra;
private $Total;
private $idUsuario;


function __construct() {
    
}

function getIdCompra() {
    return $this->idCompra;
}

function getTotal() {
    return $this->Total;
}

function getIdUsuario() {
    return $this->idUsuario;
}

function setIdCompra($idCompra) {
    $this->idCompra = $idCompra;
}

function setTotal($Total) {
    $this->Total = $Total;
}

function setIdUsuario($idUsuario) {
    $this->idUsuario = $idUsuario;
}


}

