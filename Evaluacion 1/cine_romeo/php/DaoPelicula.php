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
        $sql="insert into pelicula values(null,'@titulo','@genero','@categoria',@precio,0)";
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
    public function ListarBoletos($codigo){
        try {
            $sql = "select boletos from pelicula where codigo=$codigo";
            $registros = $this->cone->sqlSeleccion($sql);
            return $registros;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function InsertarBoleto($cod_pel,$boleto) {
        /*$sql2 = "select boletos from pelicula where codigo=$cod_pel";
        $resultado = $this->cone->sqlSeleccion($sql2);
        $totalBol=0;
         while ($row = mysqli_fetch_array($resultado)){
             $totalBol=$row[0];
         }
        $boleto+=$totalBol;*/
        $sql = "update pelicula set boletos=$boleto where codigo=$cod_pel";
        $num_reg = $this->cone->sqlOperaciones($sql);
        return $num_reg;
    }

}
