<?php

class Cl_Productos{ 
    private $idArticulo;
    private $nombreArt;
    private $precio;
    private $stock;
    private $marca;
    private $descripcion;
    
    function __construct() {
        
    }
    function getIdArticulo() {
        return $this->idArticulo;
    }

    function getNombreArt() {
        return $this->nombreArt;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getMarca() {
        return $this->marca;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdArticulo($idArticulo) {
        $this->idArticulo = $idArticulo;
    }

    function setNombreArt($nombreArt) {
        $this->nombreArt = $nombreArt;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}
