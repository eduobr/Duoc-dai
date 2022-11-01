<?php


interface IDao {
    public function Agregar($param);
    public function Eliminar($param);
    public function Modificar($param);
    public function ListarTodo();
    public function Buscar($param);
}
