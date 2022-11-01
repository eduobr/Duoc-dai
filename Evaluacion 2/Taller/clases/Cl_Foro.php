<?php

class Cl_Foro{
    private $idForo;
private $nombre;
private $titulo;
private $descripcion;


 function __construct() {
        
    }
    
    function getIdForo() {
        return $this->idForo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdForo($idForo) {
        $this->idForo = $idForo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


        
    }