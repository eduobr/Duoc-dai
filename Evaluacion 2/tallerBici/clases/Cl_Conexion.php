<?php

class Cl_Conexion {
    private $server = "localhost";
    private $base = "tallerbicicleta";
    private $usuario = "root";
    private $pass = "";
    private $conexion;
    
    public function Cl_Conexion() {
        try {
            $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->base);
        } catch (Exception $exc) {
           $traza=new ClTraza("Error Conexion:".$exc->getTraceAsString());
        }        
    }
    public function ObtenerConexion() {
        return $this->conexion;
    }
    
    public function SqlOperaciones($sql) {
        try {
            $resp= $this->conexion->query($sql);
            return mysqli_affected_rows($this->conexion);
        } catch (Exception $exc) {
            $t = new ClTraza($exc->getTraceAsString());
        }
    }
    
    public function sqlSeleccion($sql) {
        try {
            $resp = mysqli_query($this->conexion, $sql);
            return $resp;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
