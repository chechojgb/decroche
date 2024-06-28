<?php
require_once("../../Models/conexion_db.php");

require '../../vendor/autoload.php';






?>
<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>DeCroche - Envio</title>

  <link rel="shortcut icon" type="image/x-icon" href="./Views/client-side/images/icono_decroche.jpeg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <meta name="theme-name" content="Decroche" />  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
        <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">

        <link href="../dashboard/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../../animacion-inicio/formularios/dist/style.css">
  <link rel="stylesheet" href="../../animacion-inicio/pqr/dist/style.css">
  <link href="../../animacion-inicio/carrito/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="../../animacion-inicio/carrito/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


  <!-- Customized Bootstrap Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/style.css" rel="stylesheet">

</head>
<body>

<?php include ('./header.php')?>

<div class="contenedor-formulario" style="margin-top: 150px;" >

  <main class="contenedor-formulario-content">

    <section class="section-principal-formulario">
      <h1>
        Envio de productos
      </h1>
      <p>
        Necesitamos tu información para realizar el envio, porfavor rellena los campos que te solicitamos.
      </p>

      
      <form action="../../Controllers/pagoCompra.php?status=<?php echo isset($_GET['status']) ? $_GET['status'] : ''; ?>" method="post" id="envioDatosEnvio" enctype="multipart/form-data">

        <input type="hidden" name="status" id="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : ''; ?>">
      
        <div class="seccion-formulario">
          <label>Nombre</label>
          <input type="text" placeholder="Tu nombre" class="icon-left" name="nombre" id="nombre"/>
        </div>
        <div class="seccion-formulario">
          <label>Apellido</label>
          <input type="text" placeholder="Tu nombre" class="icon-left" name="apellido" id="apellido"/>
        </div>

        <div class="seccion-formulario">
          <label>Correo electronico</label>
          <input type="email" placeholder="dasdas@hotmail.com"  class="icon-left" name="correo" id="correo" />
        </div>

        <div class="seccion-formulario">
          <label>direccion de residencia</label>
          <input type="text" placeholder="cl 74..." class="icon-left" name="direccion" id="direccion"/>
        </div>

        <div class="seccion-formulario">
          <label>Codigo Postal</label>
          <input type="text" placeholder="F34-22" class="icon-left" name="codigoP" id="codigoP"/>
        </div>
        <div class="seccion-formulario">
          <label>Ciudad</label>
          <select class=""  name="ciudad" required id="ciudad">
            <option value="" disabled selected>Seleccionar</option>
            <option value="Bogota">Bogotá</option>
            <option value="Medellin">Medellin</option>
            <option value="Cartagena">Cartagena</option>
          </select>
        </div>

        <div class="seccion-formulario">
          <label>celular</label>
          <input type="number" placeholder="Tu celular" class="icon-left" name="celular" id="celular"/>
        </div>



        <div class="enviar_radicadop" style="margin: 20px 10px; ">

          <button type="button" onclick="registrar_envio()" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" target="_blank" >Enviar</button>
        </div>

      </form>
      



    </section>

  </main>
</div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
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