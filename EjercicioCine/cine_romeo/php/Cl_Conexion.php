<?php

class Cl_Conexion {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "cine";
    private $cone;

    function __construct() {
        try {
            $this->cone = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function sqlOperaciones($sql) {
        try {
            $resp = mysqli_query($this->cone, $sql);
            return mysqli_affected_rows($resp);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function sqlSeleccion($sql) {
        try {
            $resp = mysqli_query($this->cone, $sql);
            return resp;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
