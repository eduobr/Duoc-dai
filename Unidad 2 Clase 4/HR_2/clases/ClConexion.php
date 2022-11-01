<?php

include_once '/ClTraza.php';

class ClConexion {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $base = "hr";
    private $conexion;

    function __construct() {
        try {
            $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->base);
        } catch (Exception $exc) {
            $t = new ClTraza($exc->getTraceAsString());
        }
    }

    public function SqlOpèraciones($sql) {
        try {
            $resp= $this->conexion->query($sql);
            return mysqli_affected_rows($this->conexion);
        } catch (Exception $exc) {
            $t = new ClTraza($exc->getTraceAsString());
        }
    }
    
    public function SqlSeleccion($sql){
        try {
            $resp= $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $t = new ClTraza($exc->getTraceAsString());
        }
    }

}
