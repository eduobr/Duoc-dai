<?php 
session_start();
include_once '../clases/Cl_Conexion.php';
if(!isset($_SESSION["Usuario"]))
{
    echo '<script> window.location="ForoClave2.php"; </script>';
}
?>
<html lang="en">

    <head>
        

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Agency - Start Bootstrap Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Theme CSS -->
        <link href="../css/agency.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php">Taller de Bicicletas</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <!--                        <li>
                                                    <a class="page-scroll" href="#services">Servicios</a>
                                                </li>-->
                        <li>
                            <a class="page-scroll" href="index.php#portfolio">Catalogo</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php#about">Foro</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php#contact">Cotizacion</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="CarroCompra.php">Carro Compras</a>
                        </li>
                        <?php if(isset($_SESSION["Usuario"]))
                          {
                            echo '<li>
                                <a class="page-scroll" href="Logout.php">Logout</a>
                                </li>';
                          } else{
                            echo '<li>
                                  <a class="page-scroll" href="login.php">Login</a>
                                </li>';
                          }
                          ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header style="background-color: #000; height: 150px;">
            <div class="container">
                <div class="intro-text">
                    <!--<div class="intro-lead-in" style="font-size: 150px; color: cyan">Bienvenido</div>-->
                    <!--                    <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>-->
                </div>
            </div>
        </header>

        <section id="team" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">CARRO COMPRAS</h2>
                        <h3 class="section-subheading text-muted">Administra tus compras</h3>
                    </div>
                </div>
                <div>
                    <table>
                        <div>
                            <center>
                                <nav class="navbar navbar-inverse">
                                    <div class="container-fluid">
                                        <div class="navbar-header">
                                            <a class="navbar-brand" href="index.php#portfolio">Sigue Comprando</a>
                                        </div>
                                        <ul class="nav navbar-nav">  
                                            <li><a href="index.php#portfolio">Bicicletas</a></li>
                                            <li><a href="Asiento.php">Asiento</a></li>
                                            <li><a href="Bombin.php">Bombin</a></li>
                                            <li><a href="Candado.php">Candado</a></li>
                                            <li><a href="Luces.php">Luces</a></li>
                                            <li><a href="Hidratacion.php">Hidratacion</a>     
                                        </ul>
                                    </div>
                                </nav>
                            </center>
                        </div>
                        <tr><td><h2 class="section-subheading text-muted">Mis compras</h2></td></tr>
                        
        <?php
        session_start();
        $CONEXION = new mysqli("localhost", "root", "", "bici");

        //crear arreglo si no existe
        $arreglo = array();
        $cantidad = 0;
        $unidades=1;
        if (!isset($_SESSION["carro"])) {
            $_SESSION["carro"] = $arreglo;
            //echo 'Creado por primera vez<br>';
        } else {
            $arreglo = $_SESSION["carro"];
            $cantidad = count($arreglo);
            //echo "Ya existe , Cantidad de Elementos en su interior:" . $cantidad."<br>";
        }
        $id = $_POST["txtId"];
        //echo '  - Id:' . $id;
        $reg = $CONEXION->query("select * from articulo where idArticulo=" . $id . ";");
        $fila = mysqli_fetch_row($reg);
        //echo " - Desc:" . $fila[1] . "<br>";
        
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
            $arreglo[$pos]["id"] = $fila[0];
            $arreglo[$pos]["precio"] = $fila[2];
            $arreglo[$pos]["can"] = $unidades;
            $arreglo[$pos]["foto"] = $fila[4];
            $_SESSION["carrito"] = $arreglo;
        } else {
            $arreglo[$cantidad]["desc"] = $fila[1];
            $arreglo[$cantidad]["id"] = $fila[0];
            $arreglo[$cantidad]["precio"] = $fila[2];
            $arreglo[$cantidad]["can"] = $unidades;
            $arreglo[$cantidad]["foto"] = $fila[4];
            $_SESSION["carrito"] = $arreglo;
        }
        //ver arreglo
        echo '<br>';$t=0;
        foreach ($arreglo as $key => $value) {
            
            echo '<img src="../img/'.$value["foto"].'.jpg" width="50" height="50">  Valor:' . $value["desc"] . " Cantidad:" . $value["can"];        
            echo '<input type="button" value="Quitar"> <br>';
            $t+=$value["can"]*$value["precio"];
        }
        echo '<br>Total:'.$t;
        ?>
        
                        <a href="index.php">Volver</a>
        <input type="button" value="Grabar Pedido" onclick="grabarPedido()">
        <script>
            function grabarPedido(){
                document.location="grabar_pedido.php";
            }
        </script>
                    </table>
                </div>
            </div>
        </section>





        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

        <!-- Contact Form JavaScript -->
        <script src="../js/jqBootstrapValidation.js"></script>
        <script src="../js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="../js/agency.min.js"></script>

    </body>

</html>


