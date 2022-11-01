<?php

include_once '/php/Cl_Reserva.php';
include_once '/php/Cl_Pelicula.php';
include_once '/php/DaoReserva.php';
include_once '/php/DaoPelicula.php';

if (isset($_POST["txtAccion"])) {

    $accion = $_POST["txtAccion"];

    if ($accion == "Enviar") {
        $rut = $_POST["txtRut"];
        $fono = $_POST["txtFono"];
        $sala = $_POST["txtSala"];
        $pelicula = $_POST["cboPelicula"];
        $adultos = $_POST["txtAdultos"];
        $ninos = $_POST["txtNinos"];
        $total = $_POST["txtTotal"];
        $reserva = new Cl_Reserva();
        $dao = new DaoReserva();
        $daopel = new DaoPelicula();
        $resultado = $daopel->ListarBoletos($pelicula);
        $totalBoletos = 0;
        while ($row = mysqli_fetch_array($resultado)) {
            $totalBoletos = $row[0];
        }
        $bolTotal = $totalBoletos + $ninos + $adultos;
        if ($bolTotal <= 9) {
            $reserva->setRut($rut);
            $reserva->setFono($fono);
            $reserva->setSala($sala);
            $reserva->setPelicula_codigo($pelicula);
            $reserva->setAdultos($adultos);
            $reserva->setNinos($ninos);
            $reserva->setTotal($total);
        } else {
            echo 'La  maxima cantidad de boletos para una pelicula pueden ser 9<br>';
        }

        $resp = $dao->InsertarR($reserva);
        if ($resp > 0) {
            $daopel->InsertarBoleto($pelicula, $bolTotal);
            echo 'Grabado';
        } else {
            echo 'No Grabo';
        }
    }
    if ($accion == "Eliminar") {
        $codigo = $_POST["txtCodigo"];
        $dao = new DaoReserva();
        $resp = $dao->EliminarR($codigo);
        if ($resp > 0) {
            echo 'Elimino Reserva';
        } else {
            echo 'No Elimino Reserva';
        }
    }
    if ($accion == "Listar") {
        $dao = new DaoReserva();
        $resultado = $dao->SeleccionarTodo();
        echo '<div class=container>';
        echo '<div class=row>';
        echo '<div class=col-md-12>';
        echo '<table class=table>';
        echo '<tr>';
        $archivo = fopen("listado.csv", "w");
        fwrite($archivo, "Codigo;Rut;Fono;Sala;Pelicula;Adultos;Niños;Total \n");
        echo '<td>Codigo</td>';
        echo '<td>Rut</td>';
        echo '<td>Fono</td>';
        echo '<td>Sala</td>';
        echo '<td>Pelicula</td>';
        echo '<td>Adultos</td>';
        echo '<td>Niños</td>';
        echo '<td>Total</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($resultado)) {
            echo '<tr>';
            fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . $row[0] . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '<td>' . $row[6] . '</td>';
            echo '<td>' . $row[7] . '</td>';
            echo '<td><a href="proceso.php?dato=' . $row[0] . '"> Eliminar </a> </td>';
            echo '</tr>';
        }
        echo '</table>';
        fclose($archivo);
        echo '<a href="listado.csv">Descarga en Excel</a><br>';
        echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    if ($accion == "ListarPorPeliculas") {
        $dao = new DaoReserva();
        $titulo = $_POST["txtTitulo"];
        $resp = $dao->ReservasPorPeliculas($titulo);
        //echo '<div class=container>';
        //echo '<div class=row>';
        //echo '<div class=col-md-12>';
        echo '<table class=table>';
        echo '<tr>';
        echo '<td>Codigo</td>';
        echo '<td>Rut</td>';
        echo '<td>Fono</td>';
        echo '<td>Sala</td>';
        echo '<td>Pelicula</td>';
        echo '<td>Adultos</td>';
        echo '<td>Niños</td>';
        echo '<td>Total</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($resp)) {
            echo '<tr>';
            echo '<td>' . $row[0] . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '<td>' . $row[6] . '</td>';
            echo '<td>' . $row[7] . '</td>';
            echo '</tr>';
        }
        echo '</table><br>';
        //echo '</div>';
        //echo '</div>';
        //echo '</div>';
    }

    if ($accion == "peliculas" || $accion == "ninos" || $accion == "adultos") {
        $dao = new DaoPelicula();
        $pel = $_POST["cboPelicula"];
        $ninos = $_POST["txtNinos"];
        $adultos = $_POST["txtAdultos"];
        $sql = "SELECT precio FROM pelicula where codigo=$pel";
        $link = mysqli_connect("localhost", "root", "", "cine");
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $precio = $row[0];
            $total = $precio * ($ninos + $adultos);
        }
        echo $total;
        echo '<input type="hidden" name="txtTotal" value="' . $total . '">';
    }
} else {
    if (isset($_GET["dato"])) {
        $dato = $_GET["dato"];
        $dao = new DaoReserva();
        $resp = $dao->EliminarR($dato);
        if ($resp > 0) {
            header("Location:ingresar-reserva.php?mensaje='Elimino'");
        } else {
            header("Location:ingresar-reserva.php?mensaje='No Elimino'");
        }
    }
}

/* if (isset($_POST["cboPelicula"])) {
  $pel=$_POST["cboPelicula"];
  $link = mysqli_connect("localhost", "root", "","cine");
  $sql = "SELECT precio FROM pelicula where codigo=$pel";
  $result = mysqli_query($link,$sql);
  while ($row = mysqli_fetch_array($result)) {
  echo $row[0];
  }
  } */

if (isset($_POST["txtAccionP"])) {
    $accion = $_POST["txtAccionP"];
    if ($accion == "Enviar") {
        $titulo = $_POST["txtTitulo"];
        $genero = $_POST["txtGenero"];
        $categoria = $_POST["cboCategoria"];
        $precio = $_POST["txtPrecio"];
        $pelicula = new Cl_Pelicula();

        $pelicula->setTitulo($titulo);
        $pelicula->setGenero($genero);
        $pelicula->setCategoria($categoria);
        $pelicula->setPrecio($precio);

        $dao = new DaoPelicula();
        $resp = $dao->InsertarP($pelicula);
        if ($resp > 0) {
            echo 'Grabo Pelicula';
        } else {
            echo 'No Grabo Pelicula';
        }
    }
    if ($accion == "Eliminar") {
        $codigo = $_POST["txtCodigo"];
        $dao = new DaoPelicula();
        $resp = $dao->EliminarP($codigo);
        if ($resp > 0) {
            echo 'Elimino';
        } else {
            echo 'No Elimino';
        }
    }
    if ($accion == "Listar") {
        $dao = new DaoPelicula();
        $resultado = $dao->ListarP();
        echo '<table class=table>';
        $archivo = fopen("listado-peliculas.csv", "w");
        fwrite($archivo, "Codigo;Titulo;Genero;Categoria;Precio;Boletos \n");
        echo '<tr>';
        echo '<td>Codigo</td>';
        echo '<td>Titulo</td>';
        echo '<td>Genero</td>';
        echo '<td>Categoria</td>';
        echo '<td>Precio</td>';
        echo '<td>Boletos</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($resultado)) {
            echo '<tr>';
            fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . "\n");
            echo '<td>' . $row[0] . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '<td><a href="proceso.php?datoP=' . $row[0] . '"> Eliminar </a> </td>';
            echo '</tr>';
        }
        echo '</table>';
        fclose($archivo);
        echo '<a href="listado-peliculas.csv">Descarga en Excel</a><br>';
        echo '<a href="PDFPeliculas.php">Vista PDF</a>';
    }
} else {
    if (isset($_GET["datoP"])) {
        $dato = $_GET["datoP"];
        $dao = new DaoPelicula();
        $resp = $dao->EliminarP($dato);
        if ($resp > 0) {
            header("Location:ingresar-pelicula.php?mensaje='Elimino'");
        } else {
            header("Location:ingresar-pelicula.php?mensaje='No Elimino'");
        }
    }
}

