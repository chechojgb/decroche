
<?php 



session_start();


//  if (!isset($_SESSION['radicado'])){
//      echo'<script>alert("No tienes acceso a esta seccion")</script>';
//      echo"<script>location.href='../../index.php'</script>";
// }


$nombre = $_SESSION['nombre_radicado'];
$num_servicio = $_SESSION['num_servicio_radicado'];
$fecha = $_SESSION['fecha_radicado'];
$tipo = $_SESSION['tipo_radicado'];
$email = $_SESSION['email_radicado'];



?>

<!DOCTYPE html>

<html lang="es">
<head>


  <meta charset="utf-8">
  <title>Petición - DeCroche</title>

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
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'><link rel='stylesheet' href='https://dl.dropboxusercontent.com/u/69747888/MoGo%20carousel/font-awesome.min.css'><link rel="stylesheet" href="./animacion-inicio/presentacion/dist/style.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Playfair+Display:700|Raleway:500.700'><link rel="stylesheet" href="./animacion-inicio/cartas/dist/style.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../animacion-inicio/radicado/dist/caja.css">
  <link rel="stylesheet" href="../../animacion-inicio/formularios/dist/style.css">
  <link rel="stylesheet" href="../../animacion-inicio/pqr/dist/style.css">
  <link href="../../animacion-inicio/carrito/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="../../animacion-inicio/carrito/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


  <!-- Customized Bootstrap Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="../../animacion-inicio/carrito/css/style.css" rel="stylesheet">
  

  <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>

<?php include ('./header.php')?>

<div id="container" id="timer">
    <div id="circle">
      <i class="fa fa-check"></i> 
    </div> 
    <?php 
        echo '<p>
        Hola '.$nombre.', <br> tu '.$tipo.' ha sido generada el dia '.$fecha.' con el codigo <br>"'.$num_servicio.'"<br> (guarda este codigo para consultar tu '.$tipo.') y se respondera lo mas pronto posible, te enviaremos un correo con la respuesta al '.$email.'
        </p>
        <p class="p_servicio" style="width: 100%;
        background: #e08eb1;
        border: transparent;
        border-radius: 3%;
        padding: 10px;
        text-transform: uppercase;
        color: white;
        letter-spacing: 1px;">'.$num_servicio.'</p>'
    ?>
  </div>
    

    <?php 
    
    // unset($_SESSION['nombre_radicado']);
    // unset($_SESSION['num_servicio_radicado']);
    // unset($_SESSION['fecha_radicado']);
    // unset($_SESSION['tipo_radicado']);
    // unset($_SESSION['email_radicado']);
    // unset($_SESSION['radicado']);
    ?> 


    <script src="../extras/script.js"></script>
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
