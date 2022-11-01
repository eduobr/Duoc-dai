<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';

class DaoCliente {
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
            $sql = "call insertarCliente('@rut','@nombre','@apellido','@direccion','@email','@telefono','@usuario');";
            $sql = str_replace("@rut", $param->getRut(), $sql);
            $sql = str_replace("@nombre", $param->getNombre(), $sql);
            $sql = str_replace("@apellido", $param->getApellido(), $sql);
            $sql = str_replace("@direccion", $param->getDireccion(), $sql);
            $sql = str_replace("@email", $param->getEmail(), $sql);
            $sql = str_replace("@telefono", $param->getTelefono(), $sql);
            $sql = str_replace("@usuario", $param->getUsuario(), $sql);
            return $this->conexion->SqlOperaciones($sql);
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }
}
