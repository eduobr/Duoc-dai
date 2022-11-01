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
    
    public function Insertar($reserva){
        try {
            $sql="insert into reserva values(null,'@rut','@fono','@sala','@pelicula','@adultos','@ninos','@total')";
            $sql= str_replace("@rut", $reserva->getRut(), $subject);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }

}
