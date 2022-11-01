<?php
interface IDao {
    public function Guardar($param);
    public function Eliminar($param);
    public function ListarTodo();
    public function Modificar($param);
    public function Buscar($param);
}
