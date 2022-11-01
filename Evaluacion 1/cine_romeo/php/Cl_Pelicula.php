<?php


class Cl_Pelicula {
    private $codigo;
    private $titulo;
    private $genero;
    private $sala;
    private $categoria;
    private $precio;
    private $boleto;
    
    function __construct() {
        
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getGenero() {
        return $this->genero;
    }

    function getSala() {
        return $this->sala;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setSala($sala) {
        $this->sala = $sala;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    function getBoleto() {
        return $this->boleto;
    }

    function setBoleto($boleto) {
        $this->boleto = $boleto;
    }



}
