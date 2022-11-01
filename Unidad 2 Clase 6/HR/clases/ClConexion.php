<?php
include_once '/ClTraza.php';
class ClConexion {

    private $server = "localhost";
    private $base = "hr";
    private $usuario = "root";
    private $pass = "";
    private $conexion;
    public function ClConexion() {
        try {
            $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->base);
        } catch (Exception $exc) {
           $traza=new ClTraza("Error Conexion:".$exc->getTraceAsString());
        }        
    }
    public function ObtenerConexion() {
        return $this->conexion;
    }
    
    

}
