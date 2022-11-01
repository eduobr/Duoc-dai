<?php

class Cl_DetalleCompra{
    
    private $idCompraUsu;
private $usuario;
private $idArticulo;
private $idUser2;

function __construct() {
    
}
function getIdCompraUsu() {
    return $this->idCompraUsu;
}

function getUsuario() {
    return $this->usuario;
}

function getIdArticulo() {
    return $this->idArticulo;
}

function getIdUser2() {
    return $this->idUser2;
}

function setIdCompraUsu($idCompraUsu) {
    $this->idCompraUsu = $idCompraUsu;
}

function setUsuario($usuario) {
    $this->usuario = $usuario;
}

function setIdArticulo($idArticulo) {
    $this->idArticulo = $idArticulo;
}

function setIdUser2($idUser2) {
    $this->idUser2 = $idUser2;
}


}

