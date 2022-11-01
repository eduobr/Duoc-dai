<?php

$nombre=$_POST["txtArticulo"];
$descripcion=$_POST["txtDescripcion"];
$precio=$_POST["txtPrecio"];
$archivo=$_FILES["filFoto"]["tmp_name"];
$nombre_archivo=$_FILES["filFoto"]["name"];

$conexion=new mysqli("localhost", "root", "", "bici");

if (copy($archivo, "../img/".$nombre_archivo)) {
    $sql="insert into productos values("
            . "null,'$nombre','$descripcion',$precio,'$nombre_archivo',idUsuario,idUsuarioComprador);";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        header("Location:listado_productos.php");
    } else {
        echo 'No Grabo producto';
    }
} else {
    echo 'No Subio Imagen';
}

