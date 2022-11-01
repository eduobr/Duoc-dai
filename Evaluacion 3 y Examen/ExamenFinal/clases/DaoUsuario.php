<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';

class DaoUsuario {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
            //$this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function validarUsuario($param) {
        try {
            $sql = "call validarUsuario('@user','@pass');";
            $sql = str_replace("@user", $para->getUser(), $sql);
            $sql = str_replace("@pass", $param->getPass, $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

}
