<?php
	$server="localhost";
	$username="root";
	$password="";
	$db='carritocompras';
	$con=mysqli_connect($server,$username,$password)or die("no se ha podido establecer la conexion");
	$sdb=mysqli_select_db($db,$con)or die("la base de datos no existe");
?>