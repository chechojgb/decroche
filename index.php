<?php
$_SESSION["pagoIniciado"] = False;

  require_once("Models/conexion_db.php");
  require_once("Models/consultasGlobal.php");

  require_once("Models/consultasAdmin.php");
  


?>

<!DOCTYPE html>



<html lang="es">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>DeCroche | Empresa textil</title>

  <link rel="shortcut icon" type="image/x-icon" href="./Views/client-side/images/icono_decroche.jpeg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="Decroche" />
  <link href="./Views/dashboard/css/lib/themify-icons.css" rel="stylesheet">
  <link href="./Views/dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
  <link href="./Views/dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="./Views/dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="./Views/dashboard/css/lib/themify-icons.css" rel="stylesheet">
  
  <link href="./Views/dashboard/css/style.css" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'><link rel='stylesheet' href='https://dl.dropboxusercontent.com/u/69747888/MoGo%20carousel/font-awesome.min.css'><link rel="stylesheet" href="./animacion-inicio/presentacion/dist/style.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">



  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Playfair+Display:700|Raleway:500.700'><link rel="stylesheet" href="./animacion-inicio/cartas/dist/style.css">
  
  <link rel="stylesheet" href="Views/client-side/css/style.css">
  <link href="./animacion-inicio/carrito/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="./animacion-inicio/carrito/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">



  <link href="./animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">


  <link href="./animacion-inicio/carrito/css/style.css" rel="stylesheet">
  

  


</head>

<body id="body">
	

<!-- Start Top Header Bar -->

  <?php
  include("header.php");
  ?>
  <section id="section-1" style="margin-top: 100px;" >
    <div class="content-slider">
      <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
      <input type="radio" id="banner2" class="sec-1-input" name="banner">
      <input type="radio" id="banner3" class="sec-1-input" name="banner">
      <input type="radio" id="banner4" class="sec-1-input" name="banner">
      <div class="slider">
        <div id="top-banner-1" class="banner">
          <div class="banner-inner-wrapper color-white">
            <h3>Los mejores artículos para tu comodidad</h3>
            <h2>Bienvenido a<br>DeCroche</h2>
            <div class="line"></div>
            <div class="learn-more-button"><a href="./Views/extras/categoria.php">Busca más</a></div>
          </div>
        </div>
        <div id="top-banner-2" class="banner">
          <div class="banner-inner-wrapper color-white">
            <h3>Tejidos de tradición</h3>
            <h2>Uniendo Hilos <br>Creativos</h2>
            <div class="line"></div>
            <div class="learn-more-button"><a href="./Views/extras/categoria.php">Secciones</a></div>
          </div>
        </div>
        <div id="top-banner-3" class="banner">
          <div class="banner-inner-wrapper color-white">
            <h3>Guardamos lo que necesitas</h3>
            <h2>Accede a tu <br> historial</h2>
            <div class="line"></div>
            <div class="learn-more-button"><a href="./Views/user/facturas.php">Tus compras</a></div>
          </div>
        </div>
        <div id="top-banner-4" class="banner">
          <div class="banner-inner-wrapper color-white">
            <h3>Hilos de vida</h3>
            <h2>Cada puntada <br> cuenta en el tejido <br> de nuestra vida</h2>
            <div class="line"></div>
            <div class="learn-more-button"><a href="./Views/extras/categoria.php">Ver productos top</a></div>
          </div>
        </div>
      </div>
      <nav>
        <div class="controls">
          <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span>01</span> ㅤLo mejor</label>
          <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span>02</span> ㅤㅤEsta en</label>
          <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span>03</span> ㅤDeCroche</label>
          <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span>04</span> ㅤdisfrútalo</label>
        </div>
      </nav>
    </div>
  </section>

  <h1 class="titlee">Categorías</h1>
  <div id="app" class="containerr" style="box-sizing: content-box !important;">
    <a href="./Views/extras/categoria/ropa/ropa.php">
      <card data-image="https://raw.githubusercontent.com/chechojgb/images/main/1.jpg">
        <h1 slot="header">Ropa de lana</h1>
        <p slot="content">Encuentra lo mejor en ropa aqui.</p>
      </card>
    </a>
    <a href="./Views/extras/categoria/lanas/lana.php">
      <card data-image="https://raw.githubusercontent.com/chechojgb/images/main/2.jpg">
        <h1 slot="header">Lana</h1>
        <p slot="content">De todos los estilos y colores, para que estés comodo con tus gustos.</p>
      </card>
    </a>
    <a href="./Views/extras/categoria/costura/costura.php">
      <card data-image="https://raw.githubusercontent.com/chechojgb/images/main/3.jpg">
        <h1 slot="header" style="padding: 0; margin-bottom: 55px;">Artículos de costura</h1>
        <p slot="content">Artículos para ayudarte a fabricar tus propios productos.</p>
      </card>
    </a>
    <a href="./Views/extras/categoria/patrones/patrones.php">
      <card data-image="https://raw.githubusercontent.com/chechojgb/images/main/4.jpeg">
        <h1 slot="header">Patrones</h1>
        <p slot="content">Dale vida a tus sueños de moda con nuestros patrones exquisitamente diseñados..</p>
      </card>
    </a>
  </div>


  <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white" style="padding-left:0;" >Los mejores materiales textiles</h1>
                            <p class="fw-normal display-3 text-white mb-4">En tu tienda</p>
                            <p class="mb-4 text-white">Selecciona tu producto favoríto dentro de todos los que te ofrecemos</p>
                            <a href="./Views/extras/categoria.php" class="btn border border-secondary rounded-pill px-3 text-primary text-dark py-3 px-5" style="border: 1px solid white!important">COMPRA</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="./Views/client-side/images/transpa.png" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <div class="d-flex flex-column">
                                  <span class="h2 mb-0" style="font-size: 26px;">ㅤ1x</span>
                                    <span class="h2 mb-0" style="font-size: 26px;">8.000$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--
Start Call To Action
==================================== -->
<div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4" style="font-family: 'Playfair Display';" >Todos los productos</h1>
                    <p style="font-size: 20px;" >Elige el que te guste y selecciona.</p>
                </div>
                <div class="row g-4">
                <?php
					  cargarProductosCliente2()
					?>

          
                </div>
            </div>
        </div>





<?php  include("./footer.php")?>

    <script src="./script.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <script src="./animacion-inicio/carrito/lib/easing/easing.min.js"></script>
    <script src="./animacion-inicio/carrito/lib/waypoints/waypoints.min.js"></script>
    <script src="./animacion-inicio/carrito/lib/lightbox/js/lightbox.min.js"></script>
    <script src="./animacion-inicio/carrito/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="./animacion-inicio/carrito/js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://use.fontawesome.com/8ae46bccf5.js'></script><script  src="./animacion-inicio/presentacion/dist/script.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js'></script><script  src="./animacion-inicio/cartas/dist/script.js"></script>


  </body>
  </html>
