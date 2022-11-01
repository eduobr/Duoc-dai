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

    public function ingresarCliente($param1, $param2) {
        try {
            $sql = "call insertarPersona('@user','@pass','@rut','@nombre','@apellidoP','@apellidoM','@direccion','@tipoPersona','@telefono',NULL,NULL,1)";
            $sql = str_replace("@user", $param1->getUser(), $sql);
            $sql = str_replace("@pass", $param1->getPass(), $sql);
            $sql = str_replace("@rut", $param2->getRut(), $sql);
            $sql = str_replace("@nombre", $param2->getNombre(), $sql);
            $sql = str_replace("@apellidoP", $param2->getApellidoP(), $sql);
            $sql = str_replace("@apellidoM", $param2->getApellidoM(), $sql);
            $sql = str_replace("@direccion", $param2->getDireccion(), $sql);
            $sql = str_replace("@tipoPersona", $param2->getTipoPersona(), $sql);
            $sql = str_replace("@telefono", $param2->getTelefono(), $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function listarClientes() {
        try {
            $sql = "call listarClientes();";
            $registros = $this->conexion->sqlSeleccion($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function estadisticasClientes($opcion) {
        $sql = "call estadisticasClientes(@opcion);";
        $sql = str_replace('@opcion', $opcion, $sql);
        $registros = $this->conexion->sqlSeleccion($sql);
        return $registros;
    }

    public function eliminarClientes($usuario) {
        try {
            $sql = "call despedirPersona('@user',NULL,1);";
            $sql = str_replace('@user',$usuario , $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

}
