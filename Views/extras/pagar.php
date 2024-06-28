<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/carrito.php");
require_once("../../Models/seguridadCompra.php");

require '../../vendor/autoload.php';

MercadoPago\SDK::setAccessToken('TEST-3388154288094211-042822-2ef34e0b8636ea72e7b3f67d82b7b177-1788879609');

$preference = new MercadoPago\Preference();

$productos_mp = []; 

if(isset($_SESSION['carrito'])) {
    foreach($_SESSION['carrito'] as $producto) {
        
        $id_pro = $producto['id_pro'];
        $nombre = $producto['nombre'];
        $cantidad = $producto['cantidad'];
        $precio = $producto['precio'];
        
        $item = new MercadoPago\Item();
        $item->id = $id_pro;
        $item->title = $nombre;
        $item->quantity = $cantidad;
        $item->unit_price = $precio;
        $item->currency_id = 'COP';
        
        $productos_mp[] = $item; // Agregar el ítem al array
    }
}



?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago - DeCroche</title>
    <link rel="shortcut icon" type="image/x-icon" href="../client-side/images/icono_decroche.jpeg" />

    <link rel="stylesheet" href="../client-side/css/pago.css">
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
        <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
        <script src="https://sdk.mercadopago.com/js/v2"></script>

</head>
<body>
    <?php include("header.php"); ?>
    <br><br><br>
    <div class="jumbotron text-center" style="margin-top: 150px;" >
        <h1 class="display-4">¡Paso final!</h1>
        <hr class="my-4">
        <p class="lead">Estás a punto de pagar la cantidad de:
            <h4 style="font-size: 30px;"><?php echo number_format($_POST['total'], 0  ,'', '.'); ?></h4>
        </p>
        <div class="paypals">
            <div id="paypal-button-container"></div>
            <p id="result-message"></p>
        </div>
        <p style="color:#4b4b4b; font-size: 1em;">Los productos podrán ser descargados una vez que se procese el pago
            <strong>(Para aclaraciones: decrochesoporte@gmail.com)</strong>
        </p>
    </div>

    <div class="containerr mt-5 text-center">
        <h1 class="mb-4 text-center">Formas de pagar</h1>
        <div id="wallet_container"></div>
        <!-- Botón para mostrar/ocultar el formulario -->
        <!-- <button class="btn bottom-black mb-3" id="paymentBtn" style="color:#cfcfcf" >Tarjeta de débito o crédito</button> -->
        <!-- Formulario de pago -->

        <!-- <form action="../../Controllers/pagoCompra.php" method="post" class="payment-form" id="paymentForm" style="display: none;">
            <div class="mb-3">
                <input type="text" id="cardNumber" name="cardNumber" class="form-control" required placeholder="Número de la tarjeta:">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" id="expiry" name="expiry" class="form-control" required placeholder="Vencimiento:">
                </div>
                <div class="col">
                    <input type="text" id="csc" name="csc" class="form-control" required placeholder="CSC:">
                </div>
            </div>
            <div class="mb-3">
                <label for="billingAddress" class="form-label">Dirección de facturación:</label>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Nombre:">
                </div>
                <div class="col">
                    <input type="text" id="apellido" name="apellido" class="form-control" required placeholder="Apellidos:">
                </div>
            </div>
            <div class="mb-3">
                <input type="text" id="direccion" name="direccion" class="form-control" required placeholder="Dirección:">
            </div>
            <div class="mb-3">
                <input type="text" id="codigoP" name="codigoP" class="form-control" required placeholder="Codigo postal:">
            </div>
            <div class="mb-3">
                <input type="text" id="ciudad" name="ciudad" class="form-control" required placeholder="Ciudad:">
            </div>
            <div class="mb-3">
                <input type="number" id="celular" name="celular" class="form-control" required placeholder="Número de celular">
            </div>
            <div class="mb-3">
                <input type="email" id="correo" name="correo" class="form-control" required placeholder="Correo:">
            </div>

            <button style="color:#cfcfcf" type="button" class="btn bottom-black" onclick="procesarPago();">Comprar ahora</button>
        </form> -->



    </div>

    <br><br>


    
    <?php
    $preference->items = $productos_mp;
    $preference->back_urls = array(
        "success" => "http://localhost/decroche/Views/extras/recibirCompra.php",
        "failure" => "http://localhost/mercado_pago/fallo.php"
    );
    
    $preference->auto_return = "approved";
    $preference->binary_mode = true;
    
    $preference->save();
    ?>
    <?php include("./footer.php")?>

    <script>
    const mp = new MercadoPago('TEST-38d7da5d-2397-4553-b85b-adbc0629e944',{
        locale : 'es-COL'
    });

    mp.checkout({
        preference:{
            id: '<?php echo $preference->id;?>' 
        },
        render:{
            container: '#wallet_container',
            label: 'Pagar con MercadoPago'
            
        }
    }) 

    mp.bricks().create("wallet", "wallet_container", {
    initialization: {
        preferenceId: '<?php echo $preference->id;?>',
    },
    customization: {
    texts: {
    valueProp: 'smart_option',
    },
    },locale: 'es',
    modal: true
    });

    </script>

    <!-- <script>
        // JavaScript para mostrar/ocultar el formulario al hacer clic en el botón
        document.getElementById("paymentBtn").addEventListener("click", function() {
            var paymentForm = document.getElementById("paymentForm");
            if (paymentForm.style.display === "none") {
                paymentForm.style.display = "block";
            } else {
                paymentForm.style.display = "none";
            }
        });
    </script> -->

    <script src="./payment.js"></script>


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