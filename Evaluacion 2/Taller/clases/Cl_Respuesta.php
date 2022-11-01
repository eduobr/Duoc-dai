<?php

class Cl_Respuesta{
private $idRespuesta;
private $nombreRes;
private $respuesta;
private $foro;


function __construct() {
    
}
function getIdRespuesta() {
    return $this->idRespuesta;
}

function getNombreRes() {
    return $this->nombreRes;
}

function getRespuesta() {
    return $this->respuesta;
}

function getForo() {
    return $this->foro;
}

function setIdRespuesta($idRespuesta) {
    $this->idRespuesta = $idRespuesta;
}

function setNombreRes($nombreRes) {
    $this->nombreRes = $nombreRes;
}

function setRespuesta($respuesta) {
    $this->respuesta = $respuesta;
}

function setForo($foro) {
    $this->foro = $foro;
}






}




