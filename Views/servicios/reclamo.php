<!DOCTYPE html>

<html lang="es">
<head>


  <meta charset="utf-8">
  <title>Reclamos - DeCroche</title>

  <link rel="shortcut icon" type="image/x-icon" href="./Views/client-side/images/icono_decroche.jpeg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <meta name="theme-name" content="Decroche" />  


  <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
  <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
  <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">

  <link href="../dashboard/css/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'><link rel='stylesheet' href='https://dl.dropboxusercontent.com/u/69747888/MoGo%20carousel/font-awesome.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Playfair+Display:700|Raleway:500.700'>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../animacion-inicio/formularios/dist/style.css">
  <link href="../../animacion-inicio/carrito/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  
  
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Template Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/style.css" rel="stylesheet">
  
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="../../animacion-inicio/pqr/dist/style.css">
  

</head>
<body>

<?php include ('./header.php')?>

<div class="contenedor-formulario" style="margin-top: 150px;" >

  <main class="contenedor-formulario-content">


    <section class="section-principal-formulario">
      <h1>
        Reclamo
      </h1>
      <p>
      Si has tenido un problema con un producto o servicio, puedes presentar un reclamo. Nuestro equipo investigará la situación y trabajará para encontrar una solución satisfactoria para ti.
      </p>

      
      <form action="../../Controllers/servicios/registrarReclamo.php" method="post" id="envioPeticion" enctype="multipart/form-data">
        <div class="seccion-formulario">
          <label>Nombre</label>
          <input type="text" placeholder="Tu nombre" class="icon-left" name="nombre" id="nombre"/>
        </div>

        <div class="seccion-formulario">
          <label>Correo electronico</label>
          <input type="email" placeholder="dasdas@hotmail.com"  class="icon-left" name="email" id="email" />
        </div>

        <legend>Detalles del reclamo</legend>

        <div class="seccion-formulario">
          <label>Motivo</label>
          <select class=""  name="motivo" required id="motivo">
            <option value="" disabled selected>Seleccionar</option>
            <option value="producto">Producto</option>
            <option value="envio">Envío</option>
            <option value="cuenta">Cuenta</option>
          </select>
        </div>

        <div class="seccion-formulario">
          <label for="descripcion">Descripción o Comentarios: </label>
          <textarea  name="detalle" placeholder="Proporcione detalles adicionales..." rows="4" style="height: 100px;" id="detalle" ></textarea>
        </div>

        <div class="seccion-formulario">
          <label for="archivo">Adjuntar Archivo: </label>
          <input type="file" class="form-control" name="foto" id="foto" accept=".png,.jpg">
        </div>

        <div class="enviar_radicadop" style="margin: 20px 10px; ">
          <button type="button" onclick="registrarPeticion()" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" >Enviar reclamo</button>
        </div>

      </form>
      



    </section>

  </main>
</div>

    <script src="../extras/script.js"></script>
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
