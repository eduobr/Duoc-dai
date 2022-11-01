<?php

include_once '/clases/Cl_Conexion.php';
include_once '/clases/Cl_Usuario.php';
include_once '/clases/Cl_Cliente.php';
include_once '/clases/Cl_Abogado.php';
include_once '/clases/Cl_Atencion.php';
include_once '/clases/DaoCliente.php';
include_once '/clases/DaoAbogado.php';
include_once '/clases/DaoAtencion.php';

function encriptar($cadena) {
    $key = '';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
}

function desencriptar($cadena) {
    $key = '';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

function rutConDV($rut) {
    $mult = 3;
    if (strlen($rut) == 7) {
        $mult = 2;
    }
    $suma = 0;
    $x = "";
    $rutDv = "";
    for ($i = 0; $i < strlen($rut); $i++) {
        $x = substr($rut, $i, 1);

        if (strlen($rut) == 7) {
            if ($i == 1 || $i == 4) {
                $rutDv.="." . $x;
            } else {
                $rutDv.=$x;
            }
        } elseif (strlen($rut) == 8) {
            if ($i == 2 || $i == 5) {
                $rutDv.="." . $x;
            } else {
                $rutDv.=$x;
            }
        }
        $suma+=($x * $mult);
        $mult--;
        if ($mult == 1) {
            $mult = 7;
        }
    }
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if ($dv == 10) {
        $dv = 'K';
    } elseif ($dv == 11) {
        $dv = 0;
    }
    return $rutDv . "-" . $dv;
}

if (isset($_POST["txtAccion"])) {
    $accion = $_POST["txtAccion"];
    if ($accion == "registrarCli") {
        $usuario = $_POST["txtUsuario"];
        $pass = $_POST["txtPass"];
        $rut = $_POST["txtRut2"];
        $nombre = $_POST["txtNombre"];
        $apellidoP = $_POST["txtApellidoP"];
        $apellidoM = $_POST["txtApellidoM"];
        $tipoPersona = $_POST["cboTipoPersona"];
        $direccion = $_POST["txtDireccion"];
        $telefono = $_POST["txtTelefono"];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $direcEncript = encriptar($direccion);
        $user = new Cl_Usuario();
        $user->setUser($usuario);
        $user->setPass($hash);
        $cliente = new Cl_Cliente();
        $cliente->setRut($rut);
        $cliente->setNombre($nombre);
        $cliente->setApellidoP($apellidoP);
        $cliente->setApellidoM($apellidoM);
        $cliente->setTipoPersona($tipoPersona);
        $cliente->setDireccion($direcEncript);
        $cliente->setTelefono($telefono);
        $daoCliente = new DaoCliente();
        $resp = $daoCliente->ingresarCliente($user, $cliente);
        if ($resp > 0) {
            echo '<script>alertify.success("Ingreso Cliente");</script>';
        } else {
            echo '<script>alertify.error("No Ingreso Cliente");</script>';
        }
    }
    if ($accion == "ingresar") {
        session_start();
        $conexion = new Cl_Conexion();
        $con = $conexion->ObtenerConexion();
//echo 'VALIDA';
//$usuarios=$con->query("SELECT u.user,u.tipoUsuario FROM USUARIO u JOIN EMPLEADO e ON u.user=e.Usuario_user WHERE user='".$_POST["txtUsuario"]."' AND password='".$_POST["txtPass"]."' AND e.fecRenuncia IS NULL");
        $resultado = $conexion->sqlSeleccion("SELECT pass FROM USUARIO WHERE user='" . $_POST["txtUsuario"] . "' AND ACTIVO='SI'");
        $pass = '';
        while ($row2 = mysqli_fetch_array($resultado)) {
            $pass = $row2[0];
        }
        if (password_verify($_POST["txtPass"], $pass)) {
            $usuarios = $con->query("SELECT user,tipoUsuario FROM USUARIO WHERE user='" . $_POST["txtUsuario"] . "' AND ACTIVO='SI'");
            if ($usuarios->num_rows == 1) {
                $datos = $usuarios->fetch_assoc();
                $_SESSION["usuario"] = $datos;
                echo '<script>location.href="index.php";</script>';
            } else {
                echo '<script>alertify.error("No Existe el usuario");</script>';
            }
        } else {
            echo '<script>alertify.error("Contraseña incorrecta");</script> ';
        }
        $usuarios = $con->query("SELECT user,tipoUsuario FROM USUARIO WHERE user='" . $_POST["txtUsuario"] . "' AND pass='" . $_POST["txtPass"] . "' AND ACTIVO='SI'");
        if ($usuarios->num_rows == 1) {
            $datos = $usuarios->fetch_assoc();
            $_SESSION["usuario"] = $datos;
            echo '<script>location.href="index.php";</script>';
        } else {
            echo 'No existe el usuario';
        }
    }
    if ($accion == "registrarAbo") {
        $rut = $_POST["txtRut2"];
        $nombre = $_POST["txtNombre"];
        $apellidoP = $_POST["txtApellidoP"];
        $apellidoM = $_POST["txtApellidoM"];
        $especialidad = $_POST["cboEspecialidad"];
        $valorHora = $_POST["numValor"];
        $abogado = new Cl_Abogado();
        $abogado->setRut($rut);
        $abogado->setNombre($nombre);
        $abogado->setApellidoP($apellidoP);
        $abogado->setApellidoM($apellidoM);
        $abogado->setEspecialidad($especialidad);
        $abogado->setValorHora($valorHora);
        $daoAbogado = new DaoAbogado();
        $resp = $daoAbogado->ingresarAbogado($abogado);

        if ($resp > 0) {
            echo '<script>alertify.success("Ingreso Abogado");</script>';
        } else {
            echo '<script>alertify.error("No Ingreso Abogado");</script>';
        }
    }
    if ($accion == "ingresarAte") {
        $rutCli = $_POST["txtRutAte1"];
        $rutAbo = $_POST["txtRutAte2"];
        $fecAtencion = $_POST["dtFecAtencion"];
        $horaAtencion = $_POST["tHoraAtencion"];
        $fecha = $fecAtencion . " " . $horaAtencion;
        $estado = $_POST["cboEstado"];
        $atencion = new Cl_Atencion();
        $atencion->setRutCli($rutCli);
        $atencion->setRutAbo($rutAbo);
        $atencion->setFecAtencion($fecha);
        $atencion->setEstado($estado);
        $daoAtencion = new DaoAtencion();
        $resp = $daoAtencion->ingresarAtencion($atencion);
        if ($resp > 0) {
            echo '<script>alertify.success("Ingreso Atencion");</script>';
        } else {
            echo '<script>alertify.error("No Ingreso Atencion");</script>';
        }
    }
    if ($accion == "listarAte") {
        session_start();
        $tipoUsuario = $_SESSION["usuario"]["tipoUsuario"];
        $daoAtencion = new DaoAtencion();
        $resultado = $daoAtencion->listarAtenciones();
        echo '<form method="post" action="proceso.php">';
        echo '<div class=col-md-12>';
        echo '<table class=table>';
        echo '<tr>';
        //$archivo = fopen("listado.csv", "w");
        //fwrite($archivo, "Codigo;Rut;Fono;Sala;Pelicula;Adultos;Niños;Total \n");
        echo '<td>RUT Cliente</td>';
        echo '<td>Nombre Cliente</td>';
        echo '<td>RUT Abogado</td>';
        echo '<td>Nombre Abogado</td>';
        echo '<td>Fecha de la Atencion</td>';
        echo '<td>Estado</td>';
        if ($tipoUsuario == "Secretaria") {
            echo '<td>Cambiar Estado de Atencion</td>';
        }
        echo '</tr>';
        $contador = 0;
        $contador2 = 0;
        while ($row = mysqli_fetch_array($resultado)) {
            echo '<tr>';
            //fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . rutConDV($row[0]) . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . rutConDV($row[2]) . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td>' . $row[5] . '</td>';
            //echo '<td><a href="proceso.php?dato=' . $row[0] . '"> Eliminar </a> </td>';
            if ($tipoUsuario == "Secretaria") {
                echo '<td>' .
                '<select class="form-control" name="cboActEstado' . $contador . '" id="cboActEstado' . $contador . '">' .
                '<option value="Agendada"';
                if ($row[5] == "Agendada") {
                    echo 'selected';
                }echo '>Agendada</option>' .
                '<option value="Confirmada"';
                if ($row[5] == "Confirmada") {
                    echo 'selected';
                }echo '>Confirmada</option>' .
                '<option value="Anulada"';
                if ($row[5] == "Anulada") {
                    echo 'selected';
                }echo '>Anulada</option>' .
                '<option value="Perdida"';
                if ($row[5] == "Perdida") {
                    echo 'selected';
                }echo '>Perdida</option>' .
                '<option value="Realizada"';
                if ($row[5] == "Realizada") {
                    echo 'selected';
                }echo '>Realizada</option>' .
                '</select>' .
                '<input type="hidden" name="txtAtencion' . $contador2 . '" value="' . $row[6] . '">' .
                '</td>';
                $contador++;
                $contador2++;
                echo '</tr>';
            }
        }
        echo '</table>';
        //fclose($archivo);
        //echo '<a href="listado.csv">Descarga en Excel</a><br>';
        //echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
        if ($tipoUsuario == "Secretaria") {
            echo '<input type="hidden" name="txtIteracion" value="' . $contador . '">';
            echo '<center><input type="submit" class="form-control btn-primary" name="btnAccion" id="btnAccion" value="Actualizar Estado"></center>';
        }
        echo '</form>';
    }
    if ($accion == "listarCli") {
        $daoCliente = new DaoCliente();
        $resultado = $daoCliente->listarClientes();
        echo '<div class="col-md-12">';
        echo '<table class="table table-condensed">';
        echo '<tr>';
        //$archivo = fopen("listado.csv", "w");
        //fwrite($archivo, "Codigo;Rut;Fono;Sala;Pelicula;Adultos;Niños;Total \n");
        echo '<td>RUT Cliente</td>';
        echo '<td>Nombre Cliente</td>';
        echo '<td>Fecha de Incorporacion</td>';
        echo '<td>Tipo Persona</td>';
        echo '<td>Direccion</td>';
        echo '<td>Telefono</td>';
        echo '<td>Activo</td>';
        echo '<td>Descactivar</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($resultado)) {
            echo '<tr>';
            //fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . rutConDV($row[0]) . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . desencriptar($row[4]) . '</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '<td>' . $row[7] . '</td>';
            if ($row[7] == "SI") {
                echo '<td><a class="btn" role="button" href="proceso.php?dato=' . $row[6] . '&opcion=1"> Desactivar </a> </td>';
            } else {
                echo '<td></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        //fclose($archivo);
        //echo '<a href="listado.csv">Descarga en Excel</a><br>';
        //echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
    }

    if ($accion == "listarAbo") {
        $daoAbogado = new DaoAbogado();
        $resultado = $daoAbogado->listarAbogados();
        echo '<div class=col-md-12>';
        echo '<table class=table>';
        echo '<tr>';
        //$archivo = fopen("listado.csv", "w");
        //fwrite($archivo, "Codigo;Rut;Fono;Sala;Pelicula;Adultos;Niños;Total \n");
        echo '<td>RUT</td>';
        echo '<td>Nombre</td>';
        echo '<td>Fecha de Contratacion</td>';
        echo '<td>Especialidad</td>';
        echo '<td>Valor Hora</td>';
        echo '<td>Activo</td>';
        echo '<td>Despedir</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($resultado)) {
            echo '<tr>';
            //fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . ";" . $row[4] . ";" . $row[5] . ";" . $row[6] . ";" . $row[7] . "\n");
            echo '<td>' . rutConDV($row[0]) . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '<td><a class="btn" role="button" href="proceso.php?dato=' . $row[0] . '&opcion=0"> Despedir </a></td>';
            echo '</tr>';
        }
        echo '</table>';
        //fclose($archivo);
        //echo '<a href="listado.csv">Descarga en Excel</a><br>';
        //echo '<a href="PDFReserva.php">Vista PDF</a>';
        echo '</div>';
    }
    if ($accion == "estadisticasCli") {
        $opcion = $_POST["cboEstadisticasCli"];
        if ($opcion == 0) {
            echo '';
        } else {
            $daoCliente = new DaoCliente();
            $daoCliente2 = new DaoCliente();
            $resp = $daoCliente->estadisticasClientes($opcion);
            echo '<div class="container">';
            echo '<div id="container" style="height: 400px"></div>';
            echo '<script type="text/javascript">';
            echo "Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {";
            if ($opcion == 1) {
                echo "text: 'Rango de Antiguedad(meses)'";
            }
            if ($opcion == 2) {
                echo "text: 'Tipo Persona'";
            }
            if ($opcion == 3) {
                echo "text: 'Cantidad de Atenciones'";
            }

            echo "},
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                        type: 'pie',";
            if ($opcion == 1) {
                echo "name: 'Rango de Antiguedad en Meses',";
            }
            if ($opcion == 2) {
                echo "name: 'Tipo Persona',";
            }
            if ($opcion == 3) {
                echo "name: 'Cantidad de Atenciones',";
            }
            echo "data: [";
            while ($row1 = mysqli_fetch_array($resp)) {
                echo "['$row1[0]', $row1[1]],";
            }
            ;
            echo "]
                    }]
            });
        </script>";
            $resp2 = $daoCliente2->estadisticasClientes($opcion);
            echo '<table class="table">';
            echo '<tr>';
            if ($opcion == 1) {
                echo '<td>Cliente</td>';
                echo '<td>Antiguedad en Meses</td>';
            }
            if ($opcion == 1) {
                echo '<td>Cliente</td>';
                echo '<td>Antiguedad en Meses</td>';
            }
            if ($opcion == 2) {
                echo '<td>Tipo Persona</td>';
                echo '<td>Cantidad de Clientes</td>';
            }
            if ($opcion == 3) {
                echo '<td>Cliente</td>';
                echo '<td>Cantidad de Atenciones</td>';
            }
            echo '</tr>';
            while ($row3 = mysqli_fetch_array($resp2)) {
                echo '<tr>';
                echo '<td>';
                echo $row3[0];
                echo '</td>';
                echo '<td>';
                echo $row3[1];
                echo '</td>';
                echo '</tr>';
            }
            echo '<table>';
        }
    }
    if ($accion == "estadisticasAte") {
        $opcion = $_POST["cboEstadisticasAte"];
        if ($opcion == 0) {
            echo '';
        } else {
            $daoAtencion = new DaoAtencion();
            $daoAtencion2 = new DaoAtencion();
            $daoAtencion3 = new DaoAtencion();
            $fec1 = "2000-06-01";
            $fec2 = "2000-12-30";
            if ($opcion == 1) {
                $fec1 = $_POST["dtFecEst1"];
                $fec2 = $_POST["dtFecEst2"];
            }
            echo '<div class="container">';
            echo '<div id="container" style="height: 400px"></div>';
            echo '<script type="text/javascript">';
            echo "Highcharts.chart('container', {
                chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        }
    },
                title: {";
            if ($opcion == 1) {
                echo "text: 'Rango de Fechas'";
            }
            if ($opcion == 2) {
                echo "text: 'Meses'";
            }
            if ($opcion == 3) {
                echo "text: 'Especialidad'";
            }
            if ($opcion == 4) {
                echo "text: 'Abogado'";
            }
            if ($opcion == 5) {
                echo "text: 'Estado'";
            }

            echo "},
                subtitle: {
        text: ''
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: [";
            $resp2 = $daoAtencion2->estadisticasAtenciones($opcion, $fec1, $fec2);
            while ($row1 = mysqli_fetch_array($resp2)) {
                echo "['$row1[0]]'],";
            }
            //echo "['1'],['2'],['3']";

            echo "]
    },
    yAxis: {
        title: {
            text: null
        }
    },
                series: [{
                        name: 'Cantidad de Atenciones',";
//            if ($opcion == 1) {
//                echo "name: 'Rango de Fechas',";
//            }
//            if ($opcion == 2) {
//                echo "name: 'Meses',";
//            }
//            if ($opcion == 3) {
//                echo "name: 'Cantidad de Atenciones',";
//            }
            //echo "data: [2, 3, null, 4, 0, 5, 1, 4, 6, 3]";
            echo "data: [";
            $resp = $daoAtencion->estadisticasAtenciones($opcion, $fec1, $fec2);
            while ($row1 = mysqli_fetch_array($resp)) {
                echo "$row1[1],";
            }

            echo " ]";
            echo"      }]
            });
        </script>";
            $resp3 = $daoAtencion3->estadisticasAtenciones($opcion, $fec1, $fec2);
            $fecha1 = date("d-m-Y", strtotime($fec1));
            $fecha2 = date("d-m-Y", strtotime($fec2));
            if ($resp==TRUE) {
                echo '<table class="table">';
                echo '<tr>';
                if ($opcion == 1) {
                    echo '<td>Nombre del Abogado</td>';
                    echo '<td>Cantidad de atenciones entre las fechas '.$fecha1.' - '.$fecha2.'</td>';
                }
                if ($opcion == 2) {
                    echo '<td>Meses</td>';
                    echo '<td>Cantidad de Atenciones</td>';
                }
                if ($opcion == 3) {
                    echo '<td>Especialidad</td>';
                    echo '<td>Cantidad de Atenciones</td>';
                }
                if ($opcion == 4) {
                    echo '<td>Abogado</td>';
                    echo '<td>Cantidad de Atenciones</td>';
                }
                if ($opcion == 5) {
                    echo '<td>Estado</td>';
                    echo '<td>Cantidad de Atenciones</td>';
                }
                echo '</tr>';
                while ($row3 = mysqli_fetch_array($resp3)) {
                    echo '<tr>';
                    echo '<td>';
                    echo $row3[0];
                    echo '</td>';
                    echo '<td>';
                    echo $row3[1];
                    echo '</td>';
                    echo '</tr>';
                }
                echo '<table>';
            }  else {
                echo 'no hay datos';
            }
        }
    }
}
if (isset($_GET["dato"])) {
    if ($_GET["opcion"] == 1) {
        $usuario = $_GET["dato"];
        $daoCliente = new DaoCliente();
        $resp = $daoCliente->eliminarClientes($usuario);
        if ($resp > 0) {
            header("Location:listado-clientes.php?mensaje='Elimino Cliente'");
        } else {
            header("Location:listado-clientes.php?mensaje='No se pudo eliminar el cliente'");
        }
    } else {
        $rut = $_GET["dato"];
        $daoAbogado = new DaoAbogado();
        $resp = $daoAbogado->despedirAbogados($rut);
        if ($resp > 0) {
            header("Location:listado-abogados.php?mensaje='Despidio Abogado'");
        } else {
            header("Location:listado-abogados.php?mensaje='No se pudo despedir el abogado'");
        }
    }
}
if (isset($_POST["btnAccion"])) {
    $iteracion = $_POST["txtIteracion"];
    $contador = 0;
    for ($i = 0; $i < $iteracion; $i++) {
        $estadoNuevo = $_POST["cboActEstado" . $i];
        $idAtencion = $_POST["txtAtencion" . $i];
        $sql = "UPDATE ATENCION SET ESTADO='$estadoNuevo' WHERE IDATENCION=$idAtencion";
        $conexion = new Cl_Conexion();
        //$con = $conexion->ObtenerConexion();
        $actEstado = $conexion->SqlOperaciones($sql);
        if ($actEstado > 0) {
            $contador++;
        }
    }
    header("Location:listado-atenciones.php?mensaje='Actualizo " . $contador . " registros'");
    //echo 'Actualizo '.$contador.' registros';
}
if (isset($_POST["txtAnulada"])) {
    $conexion = new Cl_Conexion();
    $iteracion = $_POST["txtAnulada"];
    for ($i = 0; $i < $iteracion; $i++) {
        $idAtencion = $_POST["txtAtencion" . $i];
        $sql = "UPDATE ATENCION SET ESTADO='Anulada' WHERE IDATENCION=$idAtencion";
        $conexion->SqlOperaciones($sql);
    }
}