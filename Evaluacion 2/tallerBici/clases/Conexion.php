<?php

$conexion = new mysqli('localhost', 'root', '', 'tallerbicicleta');
if ($conexion->connect_errno) {
    echo 'error al conectarse con mysql debido al error ' . $conexion->connect_error;
}

?>
