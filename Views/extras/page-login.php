<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Logueo - DeCroche</title>
        <link rel="shortcut icon" type="image/x-icon" href="../client-side/images/icono_decroche.jpeg" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="../../animacion-inicio/carrito/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Template Stylesheet -->
        <link href="../../animacion-inicio/carrito/css/style.css" rel="stylesheet">
        <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
        <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
        <link href="../dashboard/css/style.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </head>



    <body class="bg-primary">

<?php include("header.php");?>

    <div class="unix-login" style="margin-top: 55px;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="../../index.php"><span><img src="../client-side/images/decrochea.png"  ></span></a>
                        </div>
                        <div class="login-form" style="position: relative" >
                            <h4>Iniciar sesión</h4>
                            <form action="../../Controllers/iniciarSesion.php" method="POST" id="formularioLogueo">
                                <div class="form-group">
                                    <label >Email:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" id="correoLogueo">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña:</label>
                                    <input type="password" name="clave" class="form-control" placeholder="Password" id="contraseñaLogueo">
                                </div>
                                <div class="checkbox">
                                    
                                    <label class="pull-right">
										<a href="page-reset-password.html">Olvidaste tu contraseña?</a>
									</label>

                                </div>
                                <button type="button" class="btn btn-primary btn-flat m-b-30 m-t-30" id="btnIniciarSesion" onclick="logueo();">Iniciar sesión</button>

                                
                                <div class="register-link m-t-15 text-center">
                                    <p>No tienes una cuenta ? <a href="page-register.php"> Registrate</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="./sesion.js"></script>

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