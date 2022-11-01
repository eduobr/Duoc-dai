<?php
session_start();
include_once '../clases/Cl_Conexion.php';
if (isset($_SESSION["Usuario"])) {
    
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
                    <div class="logo">
                        <a href="index.php"><img src="../img/taller.jpg" alt=""/></a>
                    </div>
                    <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">Taller Negro Toño</a>-->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top">Inicio</a>
                        </li>
                        <!--                        <li>
                                                    <a class="page-scroll" href="#services">Servicios</a>
                                                </li>-->
                        <li>
                            <a class="page-scroll" href="#portfolio">Catalogo</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">Foro</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Cotizacion</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="CarroCompra.php">Carro Compras</a>
                        </li>                        
                        <li>
                            <a class="page-scroll" href="admin.php">admin</a>
                        </li>
                        <?php
                        if (isset($_SESSION["Usuario"])) {
                            echo '<li>
                                <a class="page-scroll" href="Logout.php">Logout</a>
                                </li>';
                        } else {
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
        <header style="background-image: url('../img/PISTA_03.jpg')">
            <div class="container">
                <div class="intro-text">
                    <!--<div class="intro-lead-in" style="font-size: 150px; color: cyan">Bienvenido</div>-->
                    <!--                    <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>-->
                </div>
            </div>
        </header>

        <!-- Services Section -->
        <!--        <section id="services">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2 class="section-heading">Servicios</h2>
                            </div>
                        </div>
                        <div class="row text-center">
                            <center>
                                <table>
                                    <tr>
                                        <td>    
                                            <span class="glyphicon glyphicon-shopping-cart"></span>
                                            <h4 class="service-heading">Venta Bicicletas</h4>
                                            <p class="text-muted">Encuentra distintos modelos y gamas para pedalear comodamente</p> 
                                            <span class="glyphicon glyphicon-cog"></span>
                                            <h4 class="service-heading">Reparaciones</h4>
                                            <p class="text-muted">Solucionaremos los problemas de tu bicicleta para que mejores tu </p>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </div>            
                </section>-->

        <!-- catalogo --> <!-- catalogo --><!-- catalogo --><!-- catalogo --><!-- catalogo --><!-- catalogo -->
        <section id="portfolio" class="bg-light-gray">            
            <div class="container">                
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Catalogo</h2>                        
                    </div>
                </div>
                <table>
                    <?php
                    $CONEXION = new mysqli("localhost", "root", "", "bici");
                    $reg = $CONEXION->query("select * from articulo where Tipo = 'Bicicleta';");
                    $modal = 1;
                    ?>
                    <center>
                        <!--mtb-->  
                        <tr><td><h2 class="section-subheading text-muted">Bicicletas</h2></td></tr>
                        <?php while ($row = mysqli_fetch_array($reg)) { ?>
                            <tr> 
                                <td class="col-md-4 col-sm-6 portfolio-item">
                                    <a  href="#portfolioModal<?php echo $modal ?>" class="portfolio-link" data-toggle="modal" >
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content">
                                                <i class="fa fa-plus fa-3x"></i>
                                            </div>
                                        </div>
                                        <img style="width: 640px; height: 340px;" src="../img/bici/<?php echo $row[6]; ?>.jpg" class="img-responsive" alt="">
                                    </a>
                                    <div class="portfolio-caption">
                                        <h4><?php echo $row[1]; ?></h4>
                                        <p class="text-muted">$<?php echo $row[2]; ?></p>
                                    </div>
                                </td>  
                            </tr>
                            <?php $modal++;
                        }
                        ?>
                        <!--accesorios o articulos-->
                        <div>
                            <center>
                                <nav class="navbar navbar-inverse">
                                    <div class="container-fluid">
                                        <div class="navbar-header">
                                            <a class="navbar-brand" href="index.php#portfolio">Bicicletas</a>
                                        </div>
                                        <ul class="nav navbar-nav">       
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
                    </center>
                </table>
            </div>
        </section>



        <!-- foro --><!-- foro --><!-- foro --><!-- foro --><!-- foro --><!-- foro --><!-- foro -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Foro</h2>
                        <h3 class="section-subheading text-muted">Temas de la comunidad</h3>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center>

                            <table>

                                <tr>
                                    <td>                                      
                                        <a href="ForoClave.php"> <h4 class="subheading">Compra y venta de bicicletas</h4></a>
                                    </td>                             
                                </tr>  
                                <tr>
                                    <td>                                      
                                        <a href="ForoLibre.php"> <h4 class="subheading">Foro Libre</h4></a>
                                    </td>                                    
                                </tr>                                 
                            </table>                            
                        </center>
                    </div>
                </div>
            </div>
        </section>


        <!-- Clients Aside -->
        <aside class="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="../img/logos/envato.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="../img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="../img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="../img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        <!-- cotizacion--><!-- cotizacion--><!-- cotizacion--><!-- cotizacion--><!-- cotizacion--><!-- cotizacion-->
        <section id="contact" style="background-image: url('../img/final.jpg')">
            <center>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Cotizacion</h2>
                            <h3 class="section-subheading text-muted" style="font-size: 50px; color: #fed136">Llene el formulario para generar cotizacion</h3>
                        </div>
                    </div>
                    <center>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="grabar_cotizacion" method="post">
                                    <table class="row">
                                        <tr class="form-group">
                                            <td class="form-group">
                                                <input style="width: 300px;" name="txtNombre" type="text" class="form-control" placeholder="Nombre *" required data-validation-required-message="Campo Vacio">
                                                <p class="help-block text-danger"></p>
                                            </td>                                            
                                        </tr>
                                        <tr>
                                            <td class="form-group">
                                                <input style="width: 300px;" name="txtApellido" type="text" class="form-control" placeholder="Apellido *" required data-validation-required-message="Campo Vacio">
                                                <p class="help-block text-danger"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="form-group">
                                                <input style="width: 300px;" name="txtMail" type="text" class="form-control" placeholder="Mail *" required data-validation-required-message="Campo Vacio">
                                                <p class="help-block text-danger"></p>
                                            </td>                                            
                                        </tr> 
                                        <tr>
                                            <td class="form-group">
                                                <textarea class="form-control" name="txtDescripcion" placeholder="Descripcion *" id="message" required data-validation-required-message="Campo Vacio"></textarea>
                                                <p class="help-block text-danger"></p>
                                            </td>                                            
                                        </tr>

                                        <tr>
                                            <td class="form-group">
                                                <input type="hidden" name="txtFecha" value="<?php date("d/m/y") ?>">
                                                <button type="submit" class="btn btn-xl">Enviar Mensaje</button>
                                            </td>
                                        </tr>
                                    </table> 
                                </form>
                            </div>
                        </div>
                    </center>
                </div>
                </div>
            </center>
        </section>    

        <!-- Portfolio Modals -->
        <!-- Use the modals below to showcase details about your portfolio projects! -->

        <!-- mtb1 -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Bicicleta MTB X-Caliber 9 Azul Trek 2017</h2>
                                    <img class="img-responsive img-centered" src="../img/bici/mb1-marlin_4_azul_29_3.jpg" alt="">
                                    <p>Especificaciones</p>
                                    <p>Cuadro: Alpha Gold Aluminium geometria G2</p>
                                    <p>Suspensión Delantera: RockShox Recon Silver RL 100mm y 13.5” 80mm de recorrido</p>
                                    <p>Cassette: Shimano HG50 11-36, 10 velocidades</p>
                                    <p>Volante: Race Face Ride 36/22</p>
                                    <p>Desviador Delantero: Sram X7</p>
                                    <p>Pedales: Wellgo nylon platform</p>
                                    <p>Cambio: Shimano Deore XT, Shadow</p>
                                    <p>Manilla de Cambio: Shimano Deore, 10 velocidades</p>
                                    <p>Neumáticos: Bontrager XR2, Del. 27.5 o 29” x2.20“ Tras. 27.5” o 29”x2.0</p>
                                    <p>Ruedas: Bontrager Mustang Elite Tubeless Ready 28 hoyos</p>
                                    <p>Frenos: Shimano M395 Hidraulico</p>
                                    <p>Manubrio: Bontrager 31,8mm, 5mm altura</p>
                                    <p>Juego Dirección: 1-1/8" threadless</p>
                                    <p>Asiento: Bontrager Evoke 1.5</p>
                                    <p>Tubo Asiento: Bontrager SSR, 2-bolt head, 27.2mm, 12mm offset</p>
                                    <p>Tee: Bontrager Elite, 31.8mm, angulo 7 grados</p>
                                    <p>Grips: Bontrager Race</p>
                                    <form>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>COMPRAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- mtb 2 -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2>Bicicleta MTB Natron Altitude 2017</h2>
                                    <img class="img-responsive img-centered" src="../img/bici/mb2-natronamarillo2.jpg" alt="">
                                    <p> Especificaciones</p>
                                    <p>Cuadro: Altitude Aluminio</p>
                                    <p>Suspensión Delantera: Suntour XCT, bloqueo, 100 mm de recorrido</p>
                                    <p>Volante: Aleacion 22/32/44T</p>
                                    <p>Desviador Delantero: Shimano RD-M360, 3 velocidades</p>
                                    <p>Cambio: Shimano MDHB-023, 8 velocidades</p>
                                    <p>Manilla de Cambio: Shimano M360</p>
                                    <p>Neumáticos: Compass 27.5x2.1</p>
                                    <p>Ruedas: Aluminio doble pared 27.5” 36 hoyos</p>
                                    <p>Frenos: Disco Mecánico 160mm</p>
                                    <p>Manubrio: Aleación 31.8, 15mm altura, 680mm largo</p>
                                    <p>Tubo Asiento: 27.2mm y 350mm de largo</p>
                                    <p>Tee: MDHS-030, 90mm de largo</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>COMPRAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 3 -->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Bicicleta Urbana Electra Sugar Skulls 3i Lady</h2>
                                    <img class="img-responsive img-centered" src="../img/bici/pa1-167139_sugar_skulls.jpg" alt="">
                                    <p>Especificaciones</p>
                                    <p>Marco: Electra Boomerang 6061-T6 Alloy Flat Foot Technology</p>
                                    <p>Horquilla: High Tensile Steel Uni-Crown</p>
                                    <p>Manillas Cambio: Shimano Nexus 3-Speed Twist</p>
                                    <p>PIÑON: Electra Custom Alloy 3-Piece 170mm</p>
                                    <p>Frenos: Coaster Break</p>
                                    <p>Ruedas: Electra Retrorunner 26" X 2.125"œ / Electra Custom Alloy Painted 36H</p>
                                    <p>Colores: Negro</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>COMPRAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 4 -->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Bicicleta Urbana Electra Karma 3i Lady</h2>
                                    <img class="img-responsive img-centered" src="../img/bici/pa2-8466350215594_1_1_1.jpg" alt="">
                                    <p>Especificaciones</p>
                                    <p> Marco: Electra Boomerang 6061-T6 Alloy Flat Foot Technology</p>
                                    <p>Horquilla: High Tensile Steel Uni-Crown w/Front Struts</p>
                                    <p>Manillas Cambio: Shimano Nexus 3-Speed Twist</p>
                                    <p>PIÑON: Electra Custom Alloy 3-Piece 170mm</p>
                                    <p>Frenos: Coaster Break</p>
                                    <p>Ruedas: Electra Retrorunner 26" X 2.125 / Electra Custom Alloy Painted 36H</p>
                                    <p>Colores: Purpura</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>COMPRAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 5 -->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Bicicleta Ruta Émonda SL 5 Trek 2017</h2>
                                    <img class="img-responsive img-centered" src="../img/bici/r1-ane_alr_4_rojo1.jpg" alt="">
                                    <p>Especificaciones</p>
                                    <p> Cuadro: Ultra 500 Series OCLV Carbon, E2, DuoTRap compatible</p>
                                    <p> Horquilla: Emonda carbono</p>
                                    <p> Cassette: Shimano 105 11-28, 11 velocidades</p>
                                    <p> Volante: Shimano 105 50/34 compacto</p>
                                    <p> Desviador Delantero: Shimano 105</p>
                                    <p> Cambio: Shimano 105</p>
                                    <p> Manilla de Cambio: Shimano 105 11 velocidades</p>
                                    <p> Neumáticos: Bontrager R2, Hard Case Lite , aramid 700x25c</p>
                                    <p> Ruedas: Bontrager Race Tubeless Ready</p>
                                    <p>Frenos: Shimano 105</p>
                                    <p>Manubrio: Bontrager Race VR-C 31.8mm</p>
                                    <p>Juego Dirección: Integrada 1-1/8“ arriba y 1.5”abajo</p>
                                    <p>Asiento: Bontrager Montrose Comp</p>
                                    <p>Tubo Asiento: Bontrager Ride Tuned Carbono, 20 mm offset</p>
                                    <p>Tee: Bontrager Pro, 31.8mm, angulo 7 grados</p>
                                    <p>Grips: Bontrager Microfibra Tape</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>COMPRAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 6 -->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Bicicleta Ciclocross Crockett 5 Disc Trek 2018</h2>
                                    <img class="img-responsive img-centered" src="../img/bici/r2-crockett_5_disc1.jpg" alt="">
                                    <p>Especificaciones</p>
                                    <p> Cuadro: Aluminio Alpha Serie 300, tubo de dirección perfilado E2</p>
                                    <p> Horquilla: Disco de carbono íntegro Trek IsoSpeed Cross, tubo de la horquilla E2</p>
                                    <p> Llantas: Disco Bontrager Tubeless Ready</p>
                                    <p> Cubiertas: Bontrager CX3 Team Issue, 120 tpi, aro de aramida, 700x32c</p>
                                    <p> Manillas de cambio: SRAM Rival, 11 velocidades</p>
                                    <p> Cambio trasero: SRAM Rival 1</p>
                                    <p> Cassette: SRAM PG-1130, 11-32, 11 velocidades</p>
                                    <p> Sillín: Bontrager Montrose Comp</p>
                                    <p> Manubrio: Bontrager Race VR-C, 31,8 mm</p>
                                    <p> Juego de dirección: Integrado, rodamiento de cartucho, sellado, 1-1/8” en la parte superior y 1,5" en la inferior</p>
                                    <p> Juego de frenos: Disco mecánico Flat Mount TEKTRO Spyre</p>

                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>COMPRAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

