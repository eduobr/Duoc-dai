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
        session_start();
        $CONEXION = new mysqli("localhost", "root", "", "hr");
        ?>
        <?php
        //crear arreglo si no existe
        $arreglo = array();
        $cantidad = 0;
        $unidades=1;
        if (!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = $arreglo;
            echo 'Creado por primera vez<br>';
        } else {
            $arreglo = $_SESSION["carrito"];
            $cantidad = count($arreglo);
            echo "Ya existe , Cantidad de Elementos en su interior:" . $cantidad."<br>";
        }
        $id = $_POST["txtId"];
        echo '  - Id:' . $id;
        $reg = $CONEXION->query("select * from productos where idproductos=" . $id . ";");
        $fila = mysqli_fetch_row($reg);
        echo " - Desc:" . $fila[1] . "<br>";
        
        if ($cantidad > 0) {
            //existe o no
            $pos = 0;
            foreach ($arreglo as $key => $value) {
                if ($fila[1] == $value["desc"]) {
                    //echo '<br>Producto Existe en la Canasta:'.$fila[1];
                    //echo '<br>Con Cantidad:'.$value["can"];
                    $unidades = $unidades+ $value["can"];
                    break;
                }
                $pos++;
            }
            $arreglo[$pos]["desc"] = $fila[1];
            $arreglo[$pos]["can"] = $unidades;
            $_SESSION["carrito"] = $arreglo;
        } else {
            $arreglo[$cantidad]["desc"] = $fila[1];
            $arreglo[$cantidad]["can"] = $unidades;
            $_SESSION["carrito"] = $arreglo;
        }
        //ver arreglo
        echo '<br>';
        foreach ($arreglo as $key => $value) {
            
            echo 'Valor:' . $value["desc"] . " Cantidad:" . $value["can"];        
            echo '<input type="button" value="Quitar"> <br>';
        }
        ?>


    </body>
</html>
