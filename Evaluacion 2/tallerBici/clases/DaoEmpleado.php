<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';

class DaoEmpleado {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
            //$this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function liquidacion($usuario) {
        try {
            $sql = "SELECT e.RUT,CONCAT(e.NOMBRE,' ',e.APELLIDO),e.CARGO,s.SUCURSAL,IF(ISNULL(e.ANTICIPO), 0, e.ANTICIPO),e.SUELDO FROM EMPLEADO e JOIN SUCURSAL s ON e.SUCURSAL_IDSUCURSAL=s.IDSUCURSAL WHERE e.USUARIO_USER='$usuario';";
            $registros = $this->conexion->sqlSeleccion($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function anticipo($monto,$user) {
        try {
            $sql="UPDATE EMPLEADO SET ANTICIPO='$monto' WHERE USUARIO_USER='$user'";
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function renunciar($usuario) {
        try {
            $sql = "call insertarRenuncia('@user');";
            $sql = str_replace("@user", $usuario, $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

}
