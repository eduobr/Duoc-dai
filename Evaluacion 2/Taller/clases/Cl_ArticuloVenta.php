<?php

class Cl_ArticuloVenta{
    
    private $idVentaUsu;
    private $nombre;
    private $descripcion;
    private $precio;
    private $idUsuario;
    private $foto;
            
    function __construct() {
        
    }

    function getIdVentaUsu() {
        return $this->idVentaUsu;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getFoto() {
        return $this->foto;
    }

    function setIdVentaUsu($idVentaUsu) {
        $this->idVentaUsu = $idVentaUsu;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

}

