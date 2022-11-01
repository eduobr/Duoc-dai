<?php

$usuario=$_POST["txtUsuario"];
$titulo=$_POST["txtTitulo"];
$descripcion=$_POST["txtDescripcion"];

$conexion=new mysqli("localhost", "root", "", "bici");//poner el nombre de la cone

$sql="insert into Foro values("."null,'$usuario','$titulo','$descripcion');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        header("Location:ForoLibre.php");//nombre de donde se mostrara
    } else {
        echo 'No Grabo producto';
    }

