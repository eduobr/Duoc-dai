<?php 
session_start();
include_once '../clases/Cl_Conexion.php';
if(isset($_SESSION["Usuario"]))
{
    echo '<script> window.location="index.php"; </script>';
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
        <link href="../css/blanco.css" rel="stylesheet">

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
        <script>
                                    function validaPass() {
                                        var p1 = document.getElementById("txtP1").value;
                                        var p2 = document.getElementById("txtP2").value;
                                        if (p1 == p2) {
                                            return true;
                                        } else {
                                            alert('contrase??as incorrectas');
                                            return false;
                                        }
                                    }
                                </script>

        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php#page-top">Taller de Bicicletas</a>
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
                            <a class="page-scroll" href="index.php#team">Team</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="index.php#contact">Cotizacion</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="CarroCompra.php">Carro Compras</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="login.php">Login</a>
                        </li>
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
                    <div class="container">
            <div class="row" >
                
            </div>
            <center>
                <div class="blanco">
                    <div class="blanco">
                    <h3 class="section-subheading text-muted" style="font-size: 50px; color: #fed136">ingrese los datos</h3>
                </div>
                    <div class="blanco">
                        <form method="post" action="Validar_Usuario.php">
                            <table> 
                                <tr class="form-group">
                                    <td class="form-group">
                                        <input style="width: 500px;" type="text" name="txtUsuario" class="form-control" placeholder="Usuario *" required data-validation-required-message="Campo Vacio">
                                        <p class="help-block text-danger"></p>
                                    </td>
                                    <td class="form-group">
                                        <input style="width: 500px;" type="password" name="txtPass" class="form-control" placeholder="Password *" required data-validation-required-message="Campo Vacio">
                                        <p class="help-block text-danger"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="form-group">
                                        <button type="submit" name="btnEntrar" class="btn btn-default">ENTRAR</button>                                        
                                        <a  href="#portfolioModal1" class="portfolio-link" data-toggle="modal" style="color: #000; font-size: 16px;">crear cuenta</a>
                                    </td>                               
                                </tr> 
                            </table> 
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>
                    <!--<div class="intro-lead-in" style="font-size: 150px; color: cyan">Bienvenido</div>-->
                    <!--                    <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>-->
                </div>
            </div>
        </header>

        

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
                                <center>
                                <h2>crea tu cuenta</h2>
                                <form method="post" onsubmit="return validaPass()" action="procesoUsuario.php"  >
                                    <table class="row" border="6">
                                        <tr class="form-group">
                                            <td class="form-group">
                                                <input style="width: 500px;" type="text" name="txtUsuario" class="form-control" placeholder="Usuario *" required data-validation-required-message="Campo Vacio">
                                                <p class="help-block text-danger"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="form-group">
                                                <input style="width: 500px;" type="password" name="txtPass1" id="txtP1" class="form-control" placeholder="Password *" required data-validation-required-message="Campo Vacio">
                                                <p class="help-block text-danger"></p>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td class="form-group">
                                                <input style="width: 500px;" type="password" name="txtPass2" id="txtP2" class="form-control" placeholder="Repetir Password *" required data-validation-required-message="Campo Vacio">
                                                <p class="help-block text-danger"></p>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-times"></i>Crear Cuenta</button>
                                            </td>
                                        </tr>
                                    </table>                                     
                                </form>
                                </center>
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

