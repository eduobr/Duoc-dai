<?php

include_once '../clases/Cl_Conexion.php';
include_once '../clases/Cl_Traza.php';
include_once '../clases/Cl_ArticuloVenta.php.php';

class DaoArticuloVenta implements IDao
{
    private $conexion;
    
    function __construct() {
        try {
            $cone = new Cl_Conexion();
            $this->conexion=$cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
        
    }

    public function Buscar($param) {
        
    }

    public function Eliminar($param) {
        
    }

    public function Guardar($param) {
        try {
            $sql="call insertarArticuloVenta(@1,'@2','@3','@4','@5','@6');";
            str_replace("@1", $param->getIdVentaUsu(), $sql);
            str_replace("@2", $param->getNombre(), $sql);
            str_replace("@3", $param->getDescripcion(), $sql);
            str_replace("@4", $param->getPrecio(), $sql);
            str_replace("@5", $param->getIdUsuario(), $sql);
            str_replace("@6", $param->getFoto(), $sql);
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