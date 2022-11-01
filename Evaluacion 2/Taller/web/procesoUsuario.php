<?php
$usuario=$_POST["txtUsuario"];
$password=$_POST["txtPass1"];

$conexion=new mysqli("localhost", "root", "", "bici");//poner el nombre de la cone

$sql="insert into usuario values("."null,'$usuario','$password');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        header("Location:login.php#portfolioModal1");//nombre de donde se mostrara
    } else {
        header("Location:login.php#portfolioModal1");
        echo 'alert("No Grabo Usuario")';
    }
