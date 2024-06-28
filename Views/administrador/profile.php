<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasGlobal.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../Models/seguridadAdmin.php");
require_once("../../Controllers/Administrador/mostrarPerfil.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Perfil Administrador - DeCroche</title>
  <link rel="shortcut icon" type="image/x-icon" href="../client-side/images/icono_decroche.jpeg" />
  <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

  <!-- Common -->

  <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
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


  <div class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="float-left">
            <div class="hamburger sidebar-toggle">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Hello,
                  <span>Welcome Here</span>
                </h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">App-Profile</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                <?php
                    cargarPerfilPrincipalAdmin();
                    ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /# row -->
          <div class="row">
            
            <!-- /# column -->
            <!-- /# column -->
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
                <p>2024 © Apartado administrador. -
                  <a href="#">DeCroche.com</a>
                </p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>







  <!-- Common -->
  <script src="../dashboard/js/lib/jquery.min.js"></script>
  <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>
  <script src="../dashboard/js/lib/menubar/sidebar.js"></script>
  <script src="../dashboard/js/lib/preloader/pace.min.js"></script>
  <script src="../dashboard/js/lib/bootstrap.min.js"></script>
  <script src="../dashboard/js/scripts.js"></script>

</body>

</html>