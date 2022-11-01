<?php

$usuario=$_POST["txtUsuario"];
$titulo=$_POST["txtTitulo"];
$descripcion=$_POST["txtDescripcion"];
$archivo=$_FILES["filFoto"]["tmp_name"];
$nombre_archivo=$_FILES["filFoto"]["name"];

$conexion=new mysqli("localhost", "root", "", "bici");//poner el nombre de la cone

if (copy($archivo, "../img/".$nombre_archivo)) {
    $sql="insert into productos values("
            . "null,'$usuario',$titulo,$descripcion,'$nombre_archivo');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        header("Location:ForoClave2.php");//nombre de donde se mostrara
    } else {
        echo 'No Grabo producto';
    }
} else {
    echo 'No Subio Imagen';
}

