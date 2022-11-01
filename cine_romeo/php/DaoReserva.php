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

    public function InsertarR($reserva) {
        try {
            $sql = "insert into reserva values(null,'@rut','@fono',@sala,@pelicula_codigo,@adultos,@ninos,@total)";
            $sql = str_replace("@rut", $reserva->getRut(), $sql);
            $sql = str_replace("@fono", $reserva->getFono(), $sql);
            $sql = str_replace("@sala", $reserva->getSala(), $sql);
            $sql = str_replace("@adultos", $reserva->getAdultos(), $sql);
            $sql = str_replace("@ninos", $reserva->getNinos(), $sql);
            $sql = str_replace("@total", $reserva->getTotal(), $sql);
            $sql = str_replace("@pelicula_codigo", $reserva->getPelicula_codigo(), $sql);
            $num_reg = $this->cone->sqlOperaciones($sql);
            return $num_reg;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function EliminarR($codigo) {
        try {
            $sql = "delete from reserva where codigo=$codigo";
            $num_reg=$this->cone->sqlOperaciones($sql);
            return $num_reg;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function SeleccionarTodo(){
        $sql="select r.codigo,r.rut,r.fono,r.sala,p.titulo,r.adultos,r.ninos,r.total "
                . "from reserva r join pelicula p on r.pelicula_codigo=p.codigo";
        $registros=$this->cone->sqlSeleccion($sql);
        return $registros;
    }
    
    public function ReservasPorPeliculas($titulo){
        $sql="select r.codigo,r.rut,r.fono,r.sala,p.titulo,r.adultos,r.ninos,r.total "
                . "from reserva r join pelicula p on r.pelicula_codigo=p.codigo where p.titulo='$titulo'";
        $registros=$this->cone->sqlSeleccion($sql);
        return $registros;
    }
    
    public function calcularBoletos($codigo){
        $sql="SELECT SUM(ninos)+SUM(adultos) FROM reserva where pelicula_codigo=$codigo";
        $registros=$this->cone->sqlSeleccion($sql);
    }

}
