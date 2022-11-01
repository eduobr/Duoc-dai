<?php

 $conexion=new mysqli("localhost", "root", "", "bici");//poner el nombre de la cone
 $nombre=$_POST["txtNombre"];
 $apellido=$_POST["txtApellido"];
 $mail=$_POST["txtMail"];
 $descripcion=$_POST["txtDescripcion"];
 $fecha=$_POST["txtFecha"];
 //incorporar la hora de manera automatica "investigar"
$sql="insert into Cotizacion values("."null,'$nombre','$apellido','$mail','$descripcion','$fecha');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        header("Location:index.php");//nombre de donde se mostrara
    } else {
        header("Location:index.php");
        echo 'No Grabo producto';
    }


