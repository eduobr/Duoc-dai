<?php

include_once '/ClConexion.php';
include_once '/ClTraza.php';
include_once '/ClUsuario.php';
include_once '/IDao.php';

class DaoUsuario implements IDao {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new ClConexion();
        } catch (Exception $exc) {
            $t = new ClTraza($exc->getTraceAsString());
        }
    }

    public function Agregar($param) {
        try {
            $sql="call insertarUsuario('@1','@2');";
            $sql= str_replace("@1", $param->getUser(), $sql);
            $sql= str_replace("@2", $param->getPass(), $sql);
            return $this->conexion->SqlOpèraciones($sql);
        } catch (Exception $exc) {
            $t = new ClTraza($exc->getTraceAsString());
        }
    }

    public function Buscar($param) {
        
    }

    public function Eliminar($param) {
        
    }

    public function ListarTodo() {
        
    }

    public function Modificar($param) {
        
    }

}
