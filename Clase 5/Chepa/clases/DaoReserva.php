<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Reserva.php';

class DaoReserva {

    private $cone;

    function __construct() {
        try {
            $this->cone = new Cl_Conexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function Eliminar($codigo) {
        try {
            $sql = "delete from reserva where codigo=$codigo";
            $num_reg = $this->cone->sqlOperaciones($sql);
            return $num_reg;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function Insertar($reserva) {
        try {
            $sql = "insert into reserva values(null,'@rut','@nom',@ed,'@men')";
            $sql = str_replace("@rut", $reserva->getRut(), $sql);
            $sql = str_replace("@nom", $reserva->getNombre(), $sql);
            $sql = str_replace("@ed", $reserva->getEdad(), $sql);
            $sql = str_replace("@men", $reserva->getMensaje(), $sql);
            $num_reg = $this->cone->sqlOperaciones($sql);
            return $num_reg;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function SeleccionarTodo() {
        try {
            $sql = "select * from reserva";
            $registros = $this->cone->sqlSeleccion($sql);
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
