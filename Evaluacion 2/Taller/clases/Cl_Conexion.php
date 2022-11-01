<?php
include_once '/Cl_Traza.php';
class Cl_Conexion {

    private $server = "localhost";
    private $base = "Bici";
    private $usuario = "root";
    private $pass = "";
    private $conexion;
    public function Cl_Conexion() {
        try {
            $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->base);
        } catch (Exception $exc) {
           $traza=new Cl_Traza("Error Conexion:".$exc->getTraceAsString());
        }        
    }
    public function ObtenerConexion() {
        return $this->conexion;
    }

}