<?php

  require_once("../../Models/conexion_db.php");
  require_once("../../Models/consultasGlobal.php");
  require_once("../../Controllers/cargarCategoria.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Todos los articulos - DeCroche</title>
        <link rel="shortcut icon" type="image/x-icon" href="../client-side/images/icono_decroche.jpeg" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
        <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">

        <link href="../dashboard/css/style.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="../../animacion-inicio/carrito/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="../../animacion-inicio/carrito/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="../../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../../animacion-inicio/carrito/css/style.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </head>

    <body>
    <?php include("header.php");?>
        <!-- Spinner Start -->
 
        

        <!-- Modal Search Start -->
        
        <!-- Modal Search End -->




        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5" style="margin-top: 70px;" >
            <div class="container py-5">
                <h1 class="mb-4">Todos los productos</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4" style="display: block;" >
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex" style="margin-bottom: 15px;" id="buscar_producto">
                                    <input type="search" class="form-control p-3" placeholder="Busca tu producto" aria-describedby="search-icon-1" id="buscarProducto" >
                                    <button onclick="buscar_ahora()" style="background: none;
        border: none; padding: 0;" ><span id="search-icon-1" class="input-group-text p-3" style="height: 100%;         border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;"><i class="fa fa-search"></i></span></button>
                                </div>
                            </div>
                            <div class="col-lg-4" style="margin: 0;" >
                                <div class="card buscador" id="caja_buscador"  >
                                    <div class="card-title">
                                        <h4>Productos relacionados</h4>

                                    </div>
                                    <div class="card-body">
                                        <ul class="timeline" id="datos_buscador">
                                        </ul>
                                    </div>
                            </div>
                            <!-- /# card -->
                        </div>
                            <!-- <div class="col-xl-3 buscador" id="caja_buscador">
                                <div class="input-group w-100 mx-auto d-flex" style="margin-bottom: 15px;" >
                                    <span id="datos_buscador"></span>
                                </div>
                            </div> -->

                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categorias</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="./categoria/ropa/ropa.php"><i class="fas fa-star  me-2"></i>Ropa de lana</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="./categoria/lanas/lana.php"><i class="fas fa-star  me-2"></i>Lana</a>
                                                        <span>(5)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="./categoria/costura/costura.php"><i class="fas fa-star  me-2"></i>Articulos de costura</a>
                                                        <span>(2)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="./categoria/patrones/patrones.php"><i class="fas fa-star  me-2"></i>Patrones</a>
                                                        <span>(8)</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                                        </div>
                                    </div> -->

                                    
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                  <?php 
                                  cargarProductosCategoria();
                                  ?>
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        <!-- Footer Start -->

        <!-- Copyright End -->

        <?php include("./footer.php")?>

        <!-- Back to Top -->


        
    <!-- JavaScript Libraries -->



    <script src="./script.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../animacion-inicio/carrito/lib/easing/easing.min.js"></script>
    <script src="../../animacion-inicio/carrito/lib/waypoints/waypoints.min.js"></script>
    <script src="../../animacion-inicio/carrito/lib/lightbox/js/lightbox.min.js"></script>
    <script src="../../animacion-inicio/carrito/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../animacion-inicio/carrito/js/main.js"></script>
    </body>

</html>