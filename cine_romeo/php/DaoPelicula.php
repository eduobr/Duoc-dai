<?php

class DaoPelicula {

    private $cone;

    function __construct() {
        try {
            $this->cone=new Cl_Conexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function InsertarP($pelicula){
        $sql="insert into pelicula values(null,'@titulo','@genero','@categoria',@precio)";
        $sql=  str_replace('@titulo', $pelicula->getTitulo(), $sql);
        $sql=  str_replace('@genero', $pelicula->getGenero(), $sql);
        $sql=  str_replace('@categoria', $pelicula->getCategoria(), $sql);
        $sql=  str_replace('@precio', $pelicula->getPrecio(), $sql);
        $num_reg=$this->cone->sqlOperaciones($sql);
        return $num_reg;
    }
    
    public function EliminarP($codigo){
        try {
            $sql = "delete from pelicula where codigo=$codigo";
            $num_reg = $this->cone->sqlOperaciones($sql);
            return $num_reg;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }
    
    public function ListarP(){
        try {
            $sql = "select * from pelicula";
            $registros = $this->cone->sqlSeleccion($sql);
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }

}
