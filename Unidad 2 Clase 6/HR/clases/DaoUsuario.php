<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';
include_once '/ClUsuario.php';
class DaoUsuario {

    private $conexion;

    function __construct() {
        try {
            $cone = new Cl_Conexion();
            $this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function Guardar($param) {
        try {
            $sql="call insertarUsuario('@1','@2');";
            str_replace("@1", $param->getUsuario(), $sql);
            str_replace("@2", $param->getPassword(), $sql);
            return $this->conexion->query($sql);
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }
    
    

}
