<?php

include_once '../clases/Cl_Conexion.php';
include_once '../clases/Cl_Traza.php';
include_once '../clases/Cl_Respuesta.php';

class DaoRespuesta implements IDao
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
            $sql="call insertarRespuesta(@1,'@2','@3','@4');";
            str_replace("@1", $param->getIdRespuesta(), $sql);
            str_replace("@2", $param->getNombreRes(), $sql);
            str_replace("@3", $param->getRespuesta(), $sql);
            str_replace("@4", $param->getForo(), $sql);
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