<?php
session_start();
$tipoUsuario = '';
$cont = 0;
$conexion = new mysqli("localhost", "root", "", "examen");
if (isset($_SESSION["usuario"])) {
    $tipoUsuario = $_SESSION["usuario"]["tipoUsuario"];
    if ($tipoUsuario == "Secretaria") {
        $regAte = $conexion->query("SELECT * FROM ATENCION WHERE TO_DAYS(fecha)-TO_DAYS(DATE_ADD(NOW(),INTERVAL 2 DAY))=0 AND ESTADO='Agendada';");
        while ($row = mysqli_fetch_array($regAte)) {
            $cont++;
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="icon" href="images/favicon.ico">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/slider.css">
        <script src="js/jquery.js"></script>
        <script src="js/jquery-migrate-1.1.1.js"></script>
        <script src="js/superfish.js"></script>
        <script src="js/jquery.equalheights.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/tms-0.4.1.js"></script>
        <script>
            $(window).load(function () {
                $('.slider')._TMS({
                    show: 0,
                    pauseOnHover: false,
                    prevBu: '.prev',
                    nextBu: '.next',
                    playBu: false,
                    duration: 800,
                    preset: 'fade',
                    pagination: true, //'.pagination',true,'<ul></ul>'
                    pagNums: false,
                    slideshow: 8000,
                    numStatus: false,
                    banners: true,
                    waitBannerAnimation: false,
                    progressBar: false
                })
            });
        </script>
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="alertifyjs/alertify.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <!-- Barra de Navegacion -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Inicio</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php#Ubicacion">Ubicacion</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="index.php#Quienes-Somos">Quienes Somos</a></li>
                </ul>
                <?php
                if (isset($_SESSION["usuario"])) {
                    if ($tipoUsuario == "Gerente" || $tipoUsuario == "Administrador" || $tipoUsuario == "Secretaria") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="listado-clientes.php">Listar Clientes</a></li>';
                        echo '</ul>';
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="listado-abogados.php">Listar Abogados</a></li>';
                        echo '</ul>';
                    }
                    if ($tipoUsuario == "Secretaria") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li>';
                        echo '<a href="ingresar-atencion.php">Ingresar Atencion</a>';
                        echo '</li>';
                        echo '</ul>';
                    }
                    if ($tipoUsuario == "Secretaria" || $tipoUsuario == "Gerente") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="listado-atenciones.php">Listar Atenciones</a></li>';
                        echo '</ul>';
                    }
                    if ($tipoUsuario == "Administrador") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li>';
                        echo '<a href="registro-cliente.php">Registrar Cliente</a>';
                        echo '</li>';
                        echo '</ul>';
                        echo '<ul class="nav navbar-nav">';
                        echo '<li>';
                        echo '<a href="registro-abogado.php">Registrar Abogado</a>';
                        echo '</li>';
                        echo '</ul>';
                    }
                    if ($tipoUsuario == "Cliente") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="atencion-cliente.php">Mis Atenciones</a></li>';
                        echo '</ul>';
                    }
                    if ($tipoUsuario == "Gerente") {
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="estadisticas-clientes.php">Estadisticas de los Clientes</a></li>';
                        echo '</ul>';
                        echo '<ul class="nav navbar-nav">';
                        echo '<li><a href="estadisticas-atenciones.php">Estadisticas de las Atenciones</a></li>';
                        echo '</ul>';
                    }
                    echo '<ul class="nav navbar-nav navbar-right">';
                    echo '<ul class="nav navbar-nav">';
                    echo '<li>';
                    echo '<a>' . $_SESSION["usuario"]["user"] . '</a>';
                    echo '</li>';
                    echo '</ul>';
                    echo '<ul class="nav navbar-nav">';
                    echo '<li>';
                    echo '<a href="cerrar_sesion.php">Cerrar Sesion</a>';
                    echo '</li>';
                    echo '</ul>';
                    echo '</ul>';
                } else {
                    echo '<ul class="nav navbar-nav navbar-right">';
                    echo '<li>';
                    echo '<a href="login.php">Ingresar</a>';
                    echo '</li>';
                    echo '</ul>';
                }
                ?>
            </div>
        </nav>
        <!-- Barra de Navegacion -->
        <header>
            <div class="container_12">
                <div class="grid_12">
                    <h1><a href="index.php"><img src="img/logo.png" alt=""></a> </h1>
                    <div class="clear"></div>
                </div>
                <div class="grid_12">
                    <?php if ($cont == 1 && $tipoUsuario == "Secretaria") { ?>
                        <div class="alert alert-danger"><button class="close" data-dismiss="alert"><span>&times;</span></button>
                            <a href="atenciones-pendientes.php">Necesita Confirmar <?php echo $cont ?> Atencion que se realizara en 2 dias</a></div>
                    <?php } ?>
                    <?php if ($cont > 1 && $tipoUsuario == "Secretaria") { ?>
                        <div class="alert alert-danger"><button class="close" data-dismiss="alert"><span>&times;</span></button>
                            <a href="atenciones-pendientes.php">Necesita confirmar <?php echo $cont ?> Atenciones que se realizaran en 2 dias</a></div>
                    <?php } ?>
                </div>
            </div>
        </header>
        <!--        <div class="container">
                    <div class="row">
                        <div class="col-md-6"><img src="./img/logo.png" ></div>
                        <div class="col-md-5">
        <?php if ($cont == 1 && $tipoUsuario == "Secretaria") { ?>
                                                    <div class="alert alert-danger"><button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                        <a href="atenciones-pendientes.php">Necesita Confirmar <?php echo $cont ?> Atencion que se realizara en 2 dias</a></div>
        <?php } ?>
        <?php if ($cont > 1 && $tipoUsuario == "Secretaria") { ?>
                                                    <div class="alert alert-danger"><button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                        <a href="atenciones-pendientes.php">Necesita confirmar <?php echo $cont ?> Atenciones que se realizaran en 2 dias</a></div>
        <?php } ?>
                        </div>
                    </div>
                </div>-->
        <form id="frmAnularAtencion" method="post">
            <?php
            $contAnu = 0;
            $regAnu = $conexion->query("SELECT * FROM ATENCION
                                        WHERE TO_DAYS(fecha)-TO_DAYS(DATE_ADD(NOW(),INTERVAL 1 DAY))=0 AND ESTADO='Agendada';");
            while ($row = mysqli_fetch_array($regAnu)) {
                echo '<input type="hidden" value="' . $row[0] . '" name="txtAtencion' . $contAnu . '">';
                $contAnu++;
            }
            echo '<input type="hidden" name="txtAnulada" value="' . $contAnu . '">';
            ?>
        </form>
    </body>
</html>
