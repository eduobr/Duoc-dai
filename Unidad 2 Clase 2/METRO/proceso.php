<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          /*$miconexion=new mysqli("localhost","root","","metro");
          $resp=$miconexion->query("call insertar('$rut','$nombre','$genero','$frecuencia','$horario','$lineas','$calidad','$observaciones')");
          echo 'Resultado:'.$resp;*/
        $rut=$_POST["txtRut"];
        $nombre=$_POST["txtNombre"];
        $genero=$_POST["genero"];
        $frecuencia=$_POST["frecuencia"];
        $horario = $_POST["cboHorario"];
        $calidad=$_POST["calidad"];
        $obs=$_POST["txtObservaciones"];
        $lineas="";
        $arreglo_lineas=$_POST["Linea"];
        foreach ($arreglo_lineas as $key=>$value){
            $lineas=$lineas." ".$value;
        }
        echo 'Cantidad Seleccionada:'. count($arreglo_lineas);
        echo'Rut:'.$rut." Nombre:".$nombre." Genero:".$genero." Frecuencia:".$frecuencia." ".$horario." Calidad:".$calidad." Lineas Seleccionadas:".$lineas." Observaciones:".$obs;
        ?>
    </body>
</html>
