<?php

$des=$_POST["txtDesc"];
$precio=$_POST["txtPrecio"];
$stock=$_POST["txtStock"];
$archivo=$_FILES["filFoto"]["tmp_name"];
$nom=$_FILES["filFoto"]["name"];
$conexion=new mysqli("localhost", "root","","prueba2");
//copiar la foto en la carpeta img
if (copy($archivo,"../img/".$nom)) {
    $sql="insert into productos "
            . "values(null,'$des',$precio,$stock,'$nom');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        header("location:listar_productos.php");
    } else {
        echo 'No Grabo';
    }
} else {
    echo "no se puede cargar la foto";
}
