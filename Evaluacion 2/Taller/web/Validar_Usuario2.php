<?php
session_start();
include_once '../clases/Cl_Conexion.php';
$conexion=new mysqli("localhost", "root", "", "bici");
if(isset($_POST['btnEntrar']))
{
    $usuario = $_POST['txtUsuario'];
    $pass=$_POST['txtPass'];
    $log = mysqli_query($conexion,"Select * From usuario where Usuario ='$usuario' and Password = '$pass'");
    if (mysqli_num_rows($log)>0) {
        $row= mysqli_fetch_array($log);
        $_SESSION["Usuario"] = $row['Usuario'];
        echo 'Iniciando sesion para '.$_SESSION['Usuario'].'<p>'; 
        echo '<script> window.location="ForoClave2.php"; </script>';
    }
    else
    {
        echo '<script> alert("Usuario o contraseña incorrectos");</script>';
        echo '<script> window.location="ForoClave.php"; </script>';
    }
}

