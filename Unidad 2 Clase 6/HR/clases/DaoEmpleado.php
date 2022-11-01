<?php

include_once '/ClConexion.php';
include_once '/ClTraza.php';
include_once '/ClEmpleado.php';;
class DaoEmpleado implements IDao {

    private $conexion;

    function __construct() {
        try {
            $cone = new ClConexion();
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
            $sql="call insertarEmpleado(@1,'@2','@3','@4','@5','@6',@7,@8,@9,@10,@11);";
            str_replace("@1", $param->getId(), $sql);
            str_replace("@2", $param->getNombre(), $sql);
            str_replace("@3", $param->getApellido(), $sql);
            str_replace("@4", $param->getE_mail(), $sql);
            str_replace("@5", $param->getFono(), $sql);
            str_replace("@6", $param->getFecha(), $sql);
            str_replace("@7", $param->getSalario(), $sql);
            str_replace("@8", $param->getComision(), $sql);
            str_replace("@9", $param->getIdTrabajo(), $sql);
            str_replace("@10", $param->getIdDepartamento(), $sql);
            str_replace("@11", $param->getIdJefe(), $sql);
            $resp= $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new ClTraza($exc->getTraceAsString());
        }
    }

    public function ListarTodo() {
        
    }

    public function Modificar($param) {
        
    }

}
