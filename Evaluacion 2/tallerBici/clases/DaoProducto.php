<?php

include_once '/Cl_Conexion.php';
include_once '/Cl_Traza.php';

class DaoProducto {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
            //$this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function ingresarBicicletaEmp($param) {
        try {
            $sql="call insertarProducto('@tipoBici','@aro','@marca','@modelo','@precio','@promocion',NULL,'@rutEmp')";
            $sql=  str_replace("@tipoBici",$param->getTipoBici() , $sql);
            $sql=  str_replace("@aro",$param->getAro() , $sql);
            $sql=  str_replace("@marca",$param->getMarca() , $sql);
            $sql=  str_replace("@modelo",$param->getModelo() , $sql);
            $sql=  str_replace("@precio",$param->getPrecio(), $sql);
            $sql=  str_replace("@promocion",$param->getPromocion() , $sql);
            $sql=  str_replace("@rutCli",$param->getRutCli() , $sql);
            $sql=  str_replace("@rutEmp",$param->getRutEmp() , $sql);
            $registros = $this->conexion->SqlOperaciones($sql);
            return $registros;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

}
