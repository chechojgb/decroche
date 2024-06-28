<?php
require_once("../../../../Models/conexion_db.php");
require_once("../../../../Models/consultasGlobal.php");
require_once("../../../../Controllers/cargarCategoria.php");
require_once("../../../../Controllers/Administrador/mostrarPerfil.php");
require_once("../../../../Models/consultasAdmin.php")


?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>Patrones - DeCroche</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="DeCroche">
        <meta content="" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="../../../client-side/images/icono_decroche.jpeg" />

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <link href="../../../dashboard/css/lib/themify-icons.css" rel="stylesheet">
        <link href="../../../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="../../../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="../../../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="../../../dashboard/css/lib/themify-icons.css" rel="stylesheet">

        <link href="../../../dashboard/css/style.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="../../../../animacion-inicio/carrito/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="../../../../animacion-inicio/carrito/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="../../../../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../../../../animacion-inicio/carrito/css/style.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="../../../dashboard/css/lib/themify-icons.css" rel="stylesheet">

</head>

<body>

<?php include("../header.php");?>

<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top" style="box-shadow: 0px 5px 5px rgb(224, 142, 177);">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl" style="box-sizing: content-box !important;" >
                    <a href="../../../../index.php" class="navbar-brand"><div class="rounded me-4" style="width: 200px; height: 60px;"><img src="../../../client-side/images/decrocher.png" class="img-fluid rounded" alt=""></div></a>
                    
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <?php
                            // Verifica si la sesión está iniciada
                              if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                                echo '<a style="display:none;" href="./page-login.php" class="nav-item nav-link">Ingresa</a>';
                              } else {
                                echo '<a href="../../page-login.php" class="nav-item nav-link">Ingresa</a>';
                                  // Si la sesión no está iniciada, muestra el ícono de inicio de sesión
                              }
                            ?>
                            <a href="../../../../index.php" class="nav-item nav-link">Inicio</a>
                            <div class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tienda</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="../../categoria.php" class="dropdown-item">Todos los productos</a>
                                    <a href="../ropa/ropa.php" class="dropdown-item">Ropa</a>
                                    <a href="../lanas/lana.php" class="dropdown-item">Lana</a>
                                    <a href="../costura/costura.php" class="dropdown-item">Articulos de costura</a>
                                    <a href="./patrones.php" class="dropdown-item">Patrones</a>
                                </div>
                            </div>
                            <a href="../../mostrarCarrito.php" class="nav-item nav-link">Compra</a>
                            <a href="../../../servicios/servicios.php" class="nav-item nav-link">Nuestros servicios</a>
                            <div class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tus productos</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="../../../user/facturas.php" class="dropdown-item">Facturas</a>
                                    <a href="../../../user/calificacion.php" class="dropdown-item">Productos comprados</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <?php
                            // Verifica si la sesión está iniciada
                              if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                                echo '<button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal" style="margin-top: 13px!important;" ><i class="fas fa-search color-pink"></i></button>';
                              } else {
                                echo '<button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal" style="margin-top: 0px!important;" ><i class="fas fa-search color-pink"></i></button>';
                                  // Si la sesión no está iniciada, muestra el ícono de inicio de sesión
                              }
                            ?>
                            <a href="../../mostrarCarrito.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-cart-plus fa-2x" style="color:#e08eb1;" ></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px; color: #fff !important;" ><?php 
                    echo(empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                    ?></span>
                            </a>
                                <?php
                                // Verifica si la sesión está iniciada
                                  if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                                      // Si la sesión está iniciada, muestra el ícono de usuario
                                  cargarPerfil4();
                                  } else {
                                      // Si la sesión no está iniciada, muestra el ícono de inicio de sesión
                                      echo '<a href="../../page-login.php" class="my-auto"><i class="fas fa-user fa-2x"></i></a>';
                                  }
                                ?>

                        </div>
                    </div>
                </nav>
            </div>
</div>
    
        <!-- Spinner Start -->
 
        

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Busca tu producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body  align-items-center">
                      <div class="input-group w-75 mx-auto d-flex" id="buscar_producto_nav">
                        <input type="search" class="form-control p-3" placeholder="Busca tu producto" aria-describedby="search-icon-1" id="buscarProducto_a" >
                                    <button onclick="buscar_ahora_a()" class="boton_busqueda"><span id="search-icon-1" class="input-group-text p-3 busqueda_icono" ><i class="fa fa-search"></i></span></button>

                                    
                        </div>
                        <div class="col-lg-4" style="margin: auto; width: 400px" >
                            <div class="card buscador" id="caja_buscador_a" style="width: 400px" >
                                    <div class="card-title">
                                        <h4>Productos relacionados</h4>

                                    </div>
                                    <div class="card-body">
                                        <ul class="timeline" id="datos_buscador_a">
                                        </ul>
                                    </div>
                            </div>
                            <!-- /# card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->




        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5" style="margin-top: 70px;" >
            <div class="container py-5">
                <h1 class="mb-4">Seccion de patrones</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                    <div class="row g-4" style="display: block; width: 90%;" >
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
                                                <li class="">
                                                    <div class="d-flex justify-content-between fruite-name active">
                                                        <a href="../ropa/ropa.php"><i class="fas fa-star  me-2"></i>Ropa de lana</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="../lanas/lana.php"><i class="fas fa-star  me-2"></i>Lana</a>
                                                        <span>(5)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="../costura/costura.php"><i class="fas fa-star  me-2"></i>Articulos de costura</a>
                                                        <span>(2)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="./patrones.php"><i class="fas fa-star  me-2"></i>Patrones</a>
                                                        <span>(8)</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    

                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                  <?php 
                                  cargarProductosCategoriaPatrones();
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

        <?php include("../../footer.php")?>

        <!-- Back to Top -->


        
    <!-- JavaScript Libraries -->



    <script src="../busqueda.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../animacion-inicio/carrito/lib/easing/easing.min.js"></script>
    <script src="../../../../animacion-inicio/carrito/lib/waypoints/waypoints.min.js"></script>
    <script src="../../../../animacion-inicio/carrito/lib/lightbox/js/lightbox.min.js"></script>
    <script src="../../../../animacion-inicio/carrito/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../../../animacion-inicio/carrito/js/main.js"></script>
</body>

</html>