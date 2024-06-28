<?php
    require_once("../../Models/conexion_db.php");
    require_once("../../Models/consultasGlobal.php");
    require_once("../../Models/consultasAdmin.php");
    require_once("../../Models/seguridadAdmin.php");
    require_once("../../Controllers/Administrador/mostrarPerfil.php"); 
    require_once("../../Controllers/Administrador/pequeConsu.php");
    require_once("../../Controllers/Administrador/rueda.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador - DeCroche</title>
    <link rel="shortcut icon" type="image/x-icon" href="../client-side/images/icono_decroche.jpeg" />
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" type="image/x-icon" href="../../Views/client-side/images/favicon.png" />
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="../dashboard/css/style.css" rel="stylesheet">
</head>

<body>

        <?php
            include("menu.php");
        ?>
    <!-- /# sidebar -->




    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hola, <span>Bienvenido al apartado de administrador</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Menu principal</a></li>
                                    <li class="breadcrumb-item active">Inicio</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total de ventas</div>
                                        <div class="stat-digit"><?php
                                        cargarVentasPeque();
                                        ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total de usuarios registrados</div>
                                        <div class="stat-digit"><?php
                                        cargarUsersPeque();
                                        ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"  >Total productos</div>
                                        <div class="stat-digit"><?php
                                        cargarProductsPeque();
                                        ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">


                        <div class="col-lg-12" style="padding: 30px;">
                            <div class="card" style="height: 100%;" >

                                <div class="card-body">
                                    <h2 style="text-align: center; margin: 25px" >Diagrama Sectorial de ventas de productos top</h2>
                                    <div class="ct-pie-chart">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card bg-pink">
                                <div class="testimonial-widget-one">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i>Bienvenido al corazón de nuestra operación! Aquí es donde tus ideas se convierten en acción, donde la creatividad se encuentra con la estrategia y donde juntos construimos el futuro de nuestra empresa. Adelante, ¡haz realidad tus sueños y lleva nuestro negocio hacia nuevos horizontes  <i class="fa fa-quote-right"></i>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> Aquí, tu creatividad y liderazgo impulsan nuestro progreso. ¡Bienvenido! <i class="fa fa-quote-right"></i>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> En este panel de administración, no solo encuentras herramientas y datos, sino un reflejo de nuestro compromiso con la excelencia, la innovación y el crecimiento. Aquí es donde la visión se convierte en realidad, y donde cada clic y decisión importa. ¡Bienvenido a nuestro espacio de posibilidades infinitas! <i class="fa fa-quote-right"></i>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>

    









    </script>


  <!-- jquery vendor -->
  <script src="../dashboard/js/lib/jquery.min.js"></script>
    <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../dashboard/js/lib/menubar/sidebar.js"></script>
    <script src="../dashboard/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="../dashboard/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="../dashboard/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.init.js"></script>



    <script src="../dashboard/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../dashboard/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="../dashboard/js/lib/chartist/chartist.min.js"></script>
    <script src="../dashboard/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../dashboard/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="../dashboard/js/dashboard2.js"></script>
</body>

</html>