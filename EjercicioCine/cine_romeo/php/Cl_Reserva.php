<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cl_Reserva
 *
 * @author LC1300XXXX
 */
class Cl_Reserva {
    private $codigo;
    private $rut;
    private $fono;
    private $sala;
    private $pelicula;
    private $adultos;
    private $ninos;
    private $total;
    
    function __construct() {
        
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getRut() {
        return $this->rut;
    }

    function getFono() {
        return $this->fono;
    }

    function getSala() {
        return $this->sala;
    }

    function getPelicula() {
        return $this->pelicula;
    }

    function getAdultos() {
        return $this->adultos;
    }

    function getNinos() {
        return $this->ninos;
    }

    function getTotal() {
        return $this->total;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setFono($fono) {
        $this->fono = $fono;
    }

    function setSala($sala) {
        $this->sala = $sala;
    }

    function setPelicula($pelicula) {
        $this->pelicula = $pelicula;
    }

    function setAdultos($adultos) {
        $this->adultos = $adultos;
    }

    function setNinos($ninos) {
        $this->ninos = $ninos;
    }

    function setTotal($total) {
        $this->total = $total;
    }
}
