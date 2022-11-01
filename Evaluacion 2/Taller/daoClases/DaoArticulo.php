<?php
include_once '../clases/Cl_Conexion.php';
include_once '../clases/Cl_Traza.php';
include_once '../clases/Cl_Productos.php';

class DaoArticulo implements IDao
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
            $sql="call insertarArticulo(@1,'@2','@3','@4','@5','@6');";
            str_replace("@1", $param->getIdArticulo(), $sql);
            str_replace("@2", $param->getNombreArt(), $sql);
            str_replace("@3", $param->getPrecio(), $sql);
            str_replace("@4", $param->getStock(), $sql);
            str_replace("@5", $param->getMarca(), $sql);
            str_replace("@6", $param->getDescripcion(), $sql);
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