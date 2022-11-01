<?php

include_once '/clases/Cl_Conexion.php';
include_once '/clases/Cl_Usuario.php';
include_once '/clases/DaoUsuario.php';
include_once '/clases/DaoEmpleado.php';
include_once '/clases/Cl_Cotizacion.php';
include_once '/clases/DaoCotizacion.php';
include_once '/clases/Cl_Producto.php';
include_once '/clases/DaoProducto.php';

//ingresar cotizacion
if (isset($_POST["txtAccionCot"])) {
    $accion = $_POST["txtAccionCot"];
    if ($accion == "cotizacion") {
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $tipoCot = $_POST["cboTipoCot"];
        $descripcion = $_POST["txtDescripcion"];
        $cotizacion = new Cl_Cotizacion();
        $cotizacion->setNombre($nombre);
        $cotizacion->setApellido($apellido);
        $cotizacion->setDescripcion($descripcion);
        $cotizacion->setTipoCotizacion($tipoCot);
        $daoCot = new DaoCotizacion();
        $resp = $daoCot->ingresarCotizacion($cotizacion);
        if ($resp > 0) {
            //echo json_encode(array('error' => false));
            echo 'agrego cotizacion';
        } else {
            echo 'no agrego cotizacion';
            //echo json_encode(array('error' => true));
        }
    }
}

//registrar Cliente
if (isset($_POST["txtAccionReg"])) {
    $accion = $_POST["txtAccionReg"];
    if ($accion == "registrar") {
        $user = $_POST["txtUsuario"];
        $pass = $_POST["txtPass"];
        $rut = $_POST["txtRut"];
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $direccion = $_POST["txtDireccion"];
        $email = $_POST["txtEmail"];
        $telefono = $_POST["txtTelefono"];
        $conexion = new Cl_Conexion();
        $con = $conexion->ObtenerConexion();
        $sql = "call insertarCliente('$user','$pass','$rut','$nombre','$apellido','$direccion','$email','$telefono');";
        $resp = $con->query($sql);
        if ($resp > 0) {
            echo 'Se registro al cliente';
        } else {
            echo 'No se pudo registrar al cliente';
        }
    }
}

//Anticipo
if (isset($_POST["txtAccion"])) {
    $accion = $_POST["txtAccion"];
    if ($accion == "anticipo") {
        $usuario = $_POST["txtUsuario"];
        $monto = $_POST["txtAnticipo"];
        $daoEmp = new DaoEmpleado();
        $resp = $daoEmp->anticipo($monto, $usuario);
        if ($resp > 0) {
            echo '<script>alert("Actualizo su anticipo")</script>';
            echo '<script>location.reload()</script>';
        } else {
            echo 'No se pudo actualizar el anticipo';
        }
    }
}
//Ingresar Productos
if (isset($_POST["txtAccionProd"])) {
    $accion = $_POST["txtAccionProd"];
    if ($accion == "ingresarProd") {
        session_start();
        $conexion = new Cl_Conexion();
        $con = $conexion->ObtenerConexion();
        $tipoProd = $_POST["cboTipoProd"];
        $nombre = $_POST["txtNombre"];
        $usuario = $_SESSION["usuario"]["user"];
        if ($_SESSION["usuario"]["tipoUsuario"] == "Empleado") {
            $sql = "SELECT RUT FROM EMPLEADO WHERE USUARIO_USER='$usuario'";
        } elseif ($_SESSION["usuario"]["tipoUsuario"] == "Cliente") {
            $sql = "SELECT RUT FROM CLIENTE WHERE USUARIO_USER='$usuario'";
        }
        $resp = mysqli_query($con, $sql);
        $rut;
        if ($tipoProd == "Bicicleta") {
            $tipoBici = $_POST["cboTipoBici"];
            $aro = $_POST["numAro"];
            $marca = $_POST["txtMarca"];
            $modelo = $_POST["txtModelo"];
            $precio = $_POST["numPrec"];
            $promocion = $_POST["numPromocion"];
            $stock = $_POST["numStock"];
            $archivo = $_FILES["filImagen"]["tmp_name"];
            $nomImagen = $_FILES["filImagen"]["name"];
            while ($row = mysqli_fetch_array($resp)) {
                $rut = $row[0];
            }
            if (copy($archivo, "img/" . $nomImagen)) {
                //$sql = "INSERT INTO PRODUCTO VALUES(NULL,'$tipoBici',$aro,'$marca','$modelo',$precio,NOW(),$promocion,'NO','$nomImagen',NULL,'$usuario');";
                if ($_SESSION["usuario"]["tipoUsuario"] == "Empleado") {
                    $sql = "call insertarProducto('$nombre','$tipoBici',$aro,'$marca','$modelo',$precio,$promocion,$stock,'$nomImagen',NULL,'$rut');";
                } elseif ($_SESSION["usuario"]["tipoUsuario"] == "Cliente") {
                    $sql = "call insertarProducto('$nombre','$tipoBici',$aro,'$marca','$modelo',$precio,$promocion,$stock,'$nomImagen','$rut',NULL);";
                }
                //$sql = "call insertarProducto('$nombre','$tipoBici',$aro,'$marca','$modelo',$precio,$promocion,$stock,'$nomImagen',NULL,'$rutEmp');";
                $resp = $con->query($sql);
                if ($resp > 0) {
                    header("Location: ingresar-producto.php?mensaje='Grabo Producto'");
                } else {
                    header("Location: ingresar-producto.php?mensaje='No Grabo Producto'");
                }
            } else {
                header("Location: ingresar-producto.php?mensaje='No se puede cargar la Imagen'");
            }
        }
        if ($tipoProd == "Accesorio") {
            $marca = $_POST["txtMarca"];
            $modelo = $_POST["txtModelo"];
            $precio = $_POST["numPrec"];
            $promocion = $_POST["numPromocion"];
            $stock = $_POST["numStock"];
            $archivo = $_FILES["filImagen"]["tmp_name"];
            $nomImagen = $_FILES["filImagen"]["name"];
            while ($row = mysqli_fetch_array($resp)) {
                $rut = $row[0];
            }
            if (copy($archivo, "img/" . $nomImagen)) {
                //$sql = "INSERT INTO PRODUCTO VALUES(NULL,'$tipoBici',$aro,'$marca','$modelo',$precio,NOW(),$promocion,'NO','$nomImagen',NULL,'$usuario');";
                if ($_SESSION["usuario"]["tipoUsuario"] == "Empleado") {
                    $sql = "call insertarProducto('$nombre',NULL,NULL,'$marca','$modelo',$precio,$promocion,$stock,'$nomImagen',NULL,'$rut');";
                } elseif ($_SESSION["usuario"]["tipoUsuario"] == "Cliente") {
                    $sql = "call insertarProducto('$nombre',NULL,NULL,'$marca','$modelo',$precio,$promocion,$stock,'$nomImagen','$rut',NULL);";
                }
                $resp = $con->query($sql);
                if ($resp > 0) {
                    header("Location: ingresar-producto.php?mensaje='Grabo Producto'");
                } else {
                    header("Location: ingresar-producto.php?mensaje='No Grabo Producto'");
                }
            } else {
                header("Location: ingresar-producto.php?mensaje='No se puede cargar la Imagen'");
            }
        }
    }
}
//Listar Productos
if (isset($_POST["txtListarProd"])) {
    $conexion = new Cl_Conexion();
    $sql = "SELECT * FROM PRODUCTO";
    $reg = $conexion->sqlSeleccion($sql);
    echo '<table class="table table-bordered">';
    echo '<tr>';
    echo '<td>Nombre</td>';
    echo '<td>Tipo Bicicleta</td>';
    echo '<td>Aro</td>';
    echo '<td>Marca</td>';
    echo '<td>Modelo</td>';
    echo '<td>Precio</td>';
    echo '<td>Fecha Producto</td>';
    echo '<td>Promocion</td>';
    echo '<td>Stock</td>';
    echo '<td>Foto</td>';
    echo '</tr>';
    $archivo = fopen("listadoProductos.csv", "w");
    fwrite($archivo, "Nombre;Tipo Bicicleta;Aro;Marca;Modelo;Precio;Fecha Producto;Promocion;Stock;Foto \n");
    while ($row1 = mysqli_fetch_array($reg)) {
        echo '<tr>';
        fwrite($archivo, $row1[1] . ";" . $row1[2] . ";" . $row1[3] . ";" . $row1[4] . ";" . $row1[5] . ";" . $row1[6] . ";" . $row1[7] . ";" . $row1[8] . ";" . $row1[9] . ";img/" . $row1[11] . "\n");
        echo '<td>' . $row1[1] . '</td>';
        echo '<td>' . $row1[2] . '</td>';
        echo '<td>' . $row1[3] . '</td>';
        echo '<td>' . $row1[4] . '</td>';
        echo '<td>' . $row1[5] . '</td>';
        echo '<td>' . $row1[6] . '</td>';
        echo '<td>' . $row1[7] . '</td>';
        echo '<td>' . $row1[8] . '</td>';
        echo '<td>' . $row1[9] . '</td>';
        echo '<td><img src="img/' . $row1[11] . '" width="100" height="100"></td>';
        echo '</tr>';
    }
    echo '</table>';
    fclose($archivo);
    echo '<a href="listadoProductos.csv">Descarga en Excel</a><br>';
}

//cotizacion
if (isset($_POST["btnRespuestaCot"])) {
    $conexion = new Cl_Conexion();
    $idCot = $_POST["txtId"];
    $respuesta = $_POST["txtRespuesta"];
    $con = $conexion->ObtenerConexion();
    $sql = "UPDATE COTIZACION SET RESPUESTA='$respuesta' WHERE IDCOTIZACION=$idCot;";
    $resp = $con->query($sql);
    if ($resp > 0) {
        header("Location: respuesta-cotizacion.php?mensaje='Grabo Respuesta'");
    } else {
        header("Location: respuesta-cotizacion.php?mensaje='No Grabo Respuesta'");
    }
}

//Renuncia
if (isset($_POST["btnRenunciar"])) {
    $usuario = $_POST["txtUsuario"];
    $daoEmpleado = new DaoEmpleado();
    $resp = $daoEmpleado->renunciar($usuario);
    if ($resp > 0) {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}

//Dar de baja Producto
if (isset($_POST["btnDarBaja"])) {
    $conexion = new Cl_Conexion();
    $con = $conexion->ObtenerConexion();
    $id = $_POST["txtDarBaja"];
    $url = $_POST["txtUrl"];
    $sql = "UPDATE PRODUCTO SET DARBAJA='SI' WHERE IDPRODUCTO=$id;";
    $resp = $con->query($sql);
    if ($resp > 0) {
        header("Location:" . $url . "?mensaje='Dio de baja Producto'");
    } else {
        header("Location: " . $url . "?mensaje='No se pudo dar de baja el producto'");
    }
}

