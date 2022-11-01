<?php


include_once '../clases/Cl_Conexion.php';
include_once '../clases/Cl_Traza.php';
include_once '../clases/Cl_Boleta.php.php';

class DaoBoleta implements IDao
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
            $sql="call insertarBoleta(@1,'@2','@3','@4');";
            str_replace("@1", $param->getCantidad(), $sql);
            str_replace("@2", $param->getIdUsuario(), $sql);
            str_replace("@3", $param->getIdCompra(), $sql);
            str_replace("@4", $param->getIdCompraUsu(), $sql);   
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