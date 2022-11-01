<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';

class DaoAbogado {
    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
            //$this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function ingresarAbogado($param2) {
        try {
            $sql = "call insertarPersona(NULL,NULL,'@rut','@nombre','@apellidoP','@apellidoM',NULL,NULL,NULL,'@especialidad',@valorHora,0)";
            $sql = str_replace("@rut", $param2->getRut(), $sql);
            $sql = str_replace("@nombre", $param2->getNombre(), $sql);
            $sql = str_replace("@apellidoP", $param2->getApellidoP(), $sql);
            $sql = str_replace("@apellidoM", $param2->getApellidoM(), $sql);
            $sql = str_replace("@especialidad", $param2->getEspecialidad(), $sql);
            $sql = str_replace("@valorHora", $param2->getValorHora(), $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }
    
    public function listarAbogados() {
        try {
            $sql = "call listarAbogados();";
            $registros = $this->conexion->sqlSeleccion($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }
    
    public function despedirAbogados($rut) {
        try {
            $sql = "call despedirPersona(NULL,'@rut',0);";
            $sql = str_replace('@rut',$rut , $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }
    
    
}
