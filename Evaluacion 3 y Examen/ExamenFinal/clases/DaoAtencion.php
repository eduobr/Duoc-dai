<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';

class DaoAtencion {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
            //$this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function ingresarAtencion($param) {
        try {
            $sql = "call insertarAtencion('@rutCli','@rutAbo','@fecAtencion','@estado');";
            $sql = str_replace('@rutCli', $param->getRutCli(), $sql);
            $sql = str_replace('@rutAbo', $param->getRutAbo(), $sql);
            $sql = str_replace('@fecAtencion', $param->getFecAtencion(), $sql);
            $sql = str_replace('@estado', $param->getEstado(), $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function listarAtenciones() {
        try {
            $sql = "call listarAtenciones();";
            $registros = $this->conexion->sqlSeleccion($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function estadisticasAtenciones($opcion, $fec1, $fec2) {
        $sql = "call estadisticasAtenciones(@opcion,'@fec1','@fec2');";
        $sql = str_replace('@opcion', $opcion, $sql);
        $sql = str_replace('@fec1', $fec1, $sql);
        $sql = str_replace('@fec2', $fec2, $sql);
        $registros = $this->conexion->sqlSeleccion($sql);
        return $registros;
    }
    

}
