<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Usuario.php';
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

    public function Guardar($param) {
        try {
            $sql = "call insertarUsuario('@user','@pass');";
            $sql = str_replace("@user", $param->getUser(), $sql);
            $sql = str_replace("@pass", $param->getPass(), $sql);
            return $this->conexion->SqlOperaciones($sql);
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

}
