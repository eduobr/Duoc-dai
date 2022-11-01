<?php

include_once '../clases/Cl_Conexion.php';
include_once '../clases/Cl_Traza.php';
include_once '../clases/Cl_Foro.php';

class DaoForo implements IDao
{
    private $conexion;
    
    function __construct() {
        try {
            $cone = new Cl_Conexion();
            $this->conexion=$cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
        
    }

    public function Buscar($param) {
        
    }

    public function Eliminar($param) {
        
    }

    public function Guardar($param) {
         try {
            $sql="call insertarForo(@1,'@2','@3');";
            str_replace("@1", $param->getIdForo(), $sql);
            str_replace("@2", $param->getNombre(), $sql);
            str_replace("@3", $param->getTitulo(), $sql);
            $resp= $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        } 
        
    }

    

    public function ListarTodo() {
        
    }

    public function Modificar($param) {
        
    }

}
