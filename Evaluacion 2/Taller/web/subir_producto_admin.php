<?php
$nombre=$_POST["txtNombre"];
$precio=$_POST["txtPrecio"];
$stock=$_POST["txtStock"];
$marca=$_POST["txtMarca"];
$descripcion=$_POST["txtDescripcion"];
$archivo=$_FILES["filFoto"]["tmp_name"];
$nombre_archivo=$_FILES["filFoto"]["name"];

$articulo=$_POST["txtArticulo"];

$conexion=new mysqli("localhost", "root", "", "bici");

if (copy($archivo, "../img/".$nombre_archivo)) {
    $sql="insert into productos values("
            . "null,'$nombre','$precio','$stock','$marca',$descripcion','$nombre_archivo','$articulo',idUsuario,idUsuarioComprador);";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        header("Location:listado_productos.php");
    } else {
        echo 'No Grabo producto';
    }
} else {
    echo 'No Subio Imagen';
}

