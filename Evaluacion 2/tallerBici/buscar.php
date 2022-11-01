<?php

$tipoUsuario = '';
$conexion = new mysqli("localhost", "root", "", "tallerbicicleta");
    $sql = "SELECT * FROM PRODUCTO WHERE CLIENTE_RUT IS NULL;";

//if (isset($_POST["buscarBici"])) {
//    $sql = "SELECT * FROM PRODUCTO WHERE CLIENTE_RUT IS NULL AND TIPOBICICLETA IS NOT NULL;;";
//}
//if (isset($_POST["caja_busqueda"])) {
//    $q = $_POST["caja_busqueda"];
//    if (isset($_POST["buscarProd"])) {
//        $sql = "SELECT * FROM PRODUCTO WHERE NOMBRE LIKE '%" . $q . "%' OR "
//                . "TIPOBICICLETA LIKE '%" . $q . "%' OR MARCA LIKE '%" . $q . "%' OR MODELO LIKE '%" . $q . "%'"
//                . " AND CLIENTE_RUT IS NULL ORDER BY IDPRODUCTO DESC LIMIT 12;";
//    }
//    if (isset($_POST["buscarBici"])) {
//        $sql = "SELECT * FROM PRODUCTO WHERE NOMBRE LIKE '%" . $q . "%' OR "
//                . "TIPOBICICLETA LIKE '%" . $q . "%' OR MARCA LIKE '%" . $q . "%' OR MODELO LIKE '%" . $q . "%'"
//                . " AND CLIENTE_RUT IS NULL AND TIPOBICICLETA IS NOT NULL;";
//    }
//}
$reg = $conexion->query($sql);
echo '<div class="container">';
echo '<h1>Ultimos Productos</h1>';
echo '<div class="row">';
if ($reg->num_rows > 0) {
    while ($row = mysqli_fetch_array($reg)) {
        echo '<div class="col-md-3" >';
        echo '<table class="table table-condensed centro">';
        echo '<tr>';
        echo '<td><img class="thumbnail" src="img/' . $row[11] . '" width="200" height="150" style="margin-left: 8%;"></td>';
        echo '</tr>';
        echo'<tr>';
        echo '<td>Nombre:' . $row[1] . '</td>';
        echo'</tr>';
        echo'<tr>';
        echo '<td>';
        if ($row[8] > 0) {
            echo 'Dscto:' . $row[8] . '%';
            echo 'Precio final:' . ($row[6] - ($row[6] * ($row[8] / 100)));
        } else {
            echo 'Precio:$' . $row[6];
        }
        echo '</td>';
        echo '</tr>';
        if ($tipoUsuario == "Cliente" || !isset($_SESSION["usuario"])) {
            echo '<tr>';
            echo '<td><button href="#detalle' . $row[0] . '" class="btn btn-warning form-control" data-toggle="modal">Especificaiones</button> </td>';
            echo '</tr>';
            echo '<tr>';
            //echo '<form action="carrito-de-compras.php" method="post">';
            echo '<td><a type="button" class="form-control btn-info" href="carrito-de-compras.php?id=' . $row[0] . '" class="form-control">Agregar al carrito</a></td>';
            //echo '<td><input type="hidden" name="id" value="' . $row[0] . '"></td>';
            // echo '</form>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<div class="container">';
        echo '<div class="modal fade" id="detalle' . $row[0] . '">';
        echo '<div class="modal-dialog">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        echo '<h4 class="modal-title">Detalles del Producto</h4>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<table class="table table-condensed" style="text-align: center; color: #2394D5" >';
        echo '<tr>';
        echo '<td><img src="img/' . $row[11] . '" width="200" height="150" style="margin-left: 0%;"></td>';
        echo'</tr>';
        echo'<tr>';
        echo '<td>Nombre:' . $row[1] . '</td>';
        echo '</tr>';
        if ($row[2] != '') {
            echo '<tr>';
            echo '<td>Tipo Bicicleta:' . $row[2] . '</td>';
            echo '</tr>';
        }
        if ($row[3] != '') {
            echo '<tr>';
            echo '<td>Aro:' . $row[3] . '</td>';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td>Marca:' . $row[4] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Modelo:' . $row[5] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Precio:' . $row[6] . '</td>';
        echo '</tr>';
        if ($row[8] > 0) {

            echo '<tr>';
            echo '<td>Descuento:' . $row[8] . '%</td>';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td>Stock:' . $row[9] . '</td>';
        echo '</tr>';
        echo '<tr>';
        //echo '<form action="carrito-de-compras.php" method="post">';
        echo '<td><a type="button" class="form-control btn-info" href="carrito-de-compras.php?id=' . $row[0] . '" class="form-control">Agregar al carrito</a></td>';
        //echo '<td><input type="hidden" name="id" value="' . $row[0] . '"></td>';
        //echo '</form>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<h1>No hay Productos<h1>';
}
echo '</div>';
echo '</div>';



