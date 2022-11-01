<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';

class DaoCotizacion {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
            //$this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function ingresarCotizacion($param) {
        try {
            $sql="call insertarCotizacion('@nombre','@apellido','@descripcion','@tipoCot');";
            $sql=  str_replace("@nombre", $param->getNombre(), $sql);
            $sql=  str_replace("@apellido", $param->getApellido(), $sql);
            $sql=  str_replace("@descripcion", $param->getDescripcion(), $sql);
            $sql=  str_replace("@tipoCot", $param->getTipoCotizacion(), $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }
}
