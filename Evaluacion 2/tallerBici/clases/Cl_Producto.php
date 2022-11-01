<?php

class Cl_Producto {
    private $tipoBici;
    private $aro;
    private $marca;
    private $modelo;
    private $precio;
    private $promocion;
    private $foto;
    private $rutCli;
    private $rutEmp;
    
    function __construct() {
        
    }
    
    function getTipoBici() {
        return $this->tipoBici;
    }

    function getAro() {
        return $this->aro;
    }

    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getPromocion() {
        return $this->promocion;
    }

    function getFoto() {
        return $this->foto;
    }

    function getRutCli() {
        return $this->rutCli;
    }

    function getRutEmp() {
        return $this->rutEmp;
    }

    function setTipoBici($tipoBici) {
        $this->tipoBici = $tipoBici;
    }

    function setAro($aro) {
        $this->aro = $aro;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setPromocion($promocion) {
        $this->promocion = $promocion;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setRutCli($rutCli) {
        $this->rutCli = $rutCli;
    }

    function setRutEmp($rutEmp) {
        $this->rutEmp = $rutEmp;
    }



}
