<?php

class Cl_Conexion {
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $database="alojamiento";
    //objeto que guardara la conexion
    private $cone;
    
    function __construct() {
      try{
          $this->cone= mysqli_connect($this->host,$this->user, $this->pass,$this->database);
      } catch (Exception $exc){
          echo $exc->getTraceAsString();
      }
    }
    //metodo encargado de Operaciones Insert,Update,Delete
    public function sqlOperaciones($sql){
        try {
            $resp= mysqli_query($this->cone, $sql);
            return mysqli_affected_rows($this->cone);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
    //metodo encargado de Selecciones Select
        public function sqlSeleccion($sql){
            try {
                $resp= mysqli_query($this->cone, $sql);
                return $resp;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
                }
}
