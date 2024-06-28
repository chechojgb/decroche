<!DOCTYPE html>

<html lang="es">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Consulta PQR | DeCroche</title>

  <link rel="shortcut icon" type="image/x-icon" href="./Views/client-side/images/icono_decroche.jpeg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="Decroche" />  
      <!-- Main Stylesheet -->

  
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'><link rel='stylesheet' href='https://dl.dropboxusercontent.com/u/69747888/MoGo%20carousel/font-awesome.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Playfair+Display:700|Raleway:500.700'>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
  <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
  <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">

  <link href="../dashboard/css/style.css" rel="stylesheet">


  <link rel="stylesheet" href="../../animacion-inicio/contacto/dist/style.css">
  <link rel="stylesheet" href="../../animacion-inicio/pqr/dist/style.css">


  <link rel="stylesheet" href="../../animacion-inicio/formularios/dist/style.css">
  
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Template Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../../animacion-inicio/buscar_pqr/dist/style.css">
  

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

</head>
<body>

<?php include("./header.php")?>


<p class="titulo_consulta">Consulta tu pqr</p>
<form  id="envioPeticion"  class="busqueda_form" method="post" >
  <input type="search"class="busqueda" id="id_consulta">
  <button type="button"  id="enviarConsulta" onclick="consultar_peticion();"><i class="fa fa-search icono_busqueda" ></i></button>
</form>

<div class="contenedor-formulario" style="margin-top: 230px; display:none;" id="consulta_peticion">

  <main class="contenedor-formulario-content">


    <section class="section-principal-formulario">
      <h1>Tipo : <span id="tipo_servicio"></span></h1>

      <p>
        Aqui se muestra toda la información de tu <span id="tipo_titulo"></span> hecha el dia <span id="fecha"></span>
      </p>

      
      <form  id="envioPeticion">

        <div class="seccion-formulario">
        <label>Estado</label>
        <input type="text" placeholder="Tu nombre" class="icon-left" name="estado" id="estado" readonly/>
        </div>

        <div class="seccion-formulario">
          <label>Nombre</label>
          <input type="text" placeholder="Tu nombre" class="icon-left" name="nombre" id="nombre" readonly/>
        </div>

        <div class="seccion-formulario">
          <label>Correo electronico</label>
          <input type="email" placeholder="dasdas@hotmail.com"  class="icon-left" name="email" id="email" readonly/>
        </div>

        <legend>Detalles de la <span id="tipo"></span></legend>

        <div class="seccion-formulario">
        <label>Motivo</label>
        <input type="text" id="motivo" name="motivo" readonly>
        </div>

        <div class="seccion-formulario">
          <label for="descripcion">Descripción: </label>
          <textarea  name="detalles" placeholder="Proporcione detalles adicionales..." rows="2" style="height: 100%;" id="detalles" readonly></textarea>
        </div>
        <div class="seccion-formulario">
          <label for="descripcion">Respuesta: </label>
          <textarea  name="respuesta" rows="4" style="height: 100%;" id="respuesta" readonly></textarea>
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
