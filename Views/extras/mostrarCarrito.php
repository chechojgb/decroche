<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/carrito.php");
require_once("../../Controllers/cargarCompra.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - DeCroche</title>
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
        <?php
        include("header.php");
        ?>



        


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1" style="margin-bottom: 10px;" >
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->




        <!-- Cart Page Start -->
        <div class="contenedor-principal" >
            <div class="container-fluid  tabla"  >
                <div class="container py-5"  >


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio unitario</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Eliminar producto</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            cargarCompra()
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
                cargarTotal();
            ?>
        </div>
        <!-- Cart Page End -->



        <?php include("./footer.php")?>


    


<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnPagar').addEventListener('click', function(e) {
                e.preventDefault(); // Evita que se envíe el formulario por defecto

                // Verifica si la sesión está iniciada
                <?php
                if(!isset($_SESSION['carrito']) ||count($_SESSION['carrito']) == 0){
                    echo 'swalerror("No hay ningun producto registrado porfavor selecciona alguno de nuestro catalogo")';
                }else{

                    if (isset($_SESSION['id']) && !empty($_SESSION['id']) && count($_SESSION['carrito']) >=1) {
                        echo 'document.getElementById("formPago").submit();';
                    } else {
                        // Si la sesión está iniciada, envía el formulario
                        echo 'swalerror("Primero debes iniciar sesion");';
                    }
                }

                ?>
            });
        });
    </script>
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
