<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro - DeCroche</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>

    
    
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
                            <a href="../../index.php"><span><img src="../client-side/images/decrochea.png"  style=" object-fit: cover;"></span></a>
                        </div>
                        <div class="contenedor">
                            <input type="checkbox" id="register">

                            <div class="tarjetas">
                                <div class="login-form cliente" >
                                    <div class="titulo" id="tituloCliente">
                                        <button class="btn btn-primary btn-flat m-b-30 m-t-30 boton"><label for="register">Registro para vendedor</label></button>
                                        <button class="btn btn-primary btn-flat m-b-30 m-t-30 boton"><label>Registro para cliente</label> </button>
                                    </div>
                                    <form action="../../Controllers/registroUserExterno.php" method="POST" id="formularioRegistro">
                                    <h4>Registro de cliente</h4>
                                    <div class="row">
                                        <!-- <div class="form-group col-md-6">   
                                            <label>Documento</label>
                                            <input type="number" class="form-control" placeholder="Ej:102758694" name="documento"> 
                                        </div> -->
                                        <div class="form-group col-md-6"">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" placeholder="Ej:Jonh" name="nombres" id="nombres">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" placeholder="Ej:Giglioli" name="apellidos" id="apellidos">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Ej:carolahindiaz@gmail.com"
                                            id="email">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Clave</label>
                                            <input type="password" class="form-control" name="clave"  placeholder="Ej:****" id="clave">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Confirmar clave</label>
                                            <input type="password" class="form-control" name="cclave"   placeholder="Ej:****" id="cclave">
                                        </div>
                                        <!-- <div class="form-group col-md-6"">
                                            <label>Rol</label>
                                            <select name="rol" id="rol" class="form-control">
                                                <option>Seleccione una opcion</option>
                                                <option value="Cliente">Cliente</option>
                                            </select>
                                        </div> -->
                                        <!-- <div class="form-group col-md-6"">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" name="" placeholder="Ej:activo">
                                        </div> -->
                                        <div class="form-group col-md-6"">
                                            <label>Telefono</label>
                                            <input type="number" class="form-control" name="telefono"   placeholder="Ej:3209925728" id="telefono">
                                        </div>
                                        <button type="button" href="page-login.php" class="btn btn-primary btn-flat m-b-30 m-t-30" onclick="registro()"">Registrar</button>
                                        <div class="register-link m-t-15 text-center" style="margin: auto;" >
                                            <p>Ya tienes cuenta? <a href="page-login.php"> Ingresa</a></p>
                                        </div>
                                    </form>
                                </div>
                                <div class="login-form vendedor" >
                                    <div class="titulo" id="tituloCliente">
                                        <button class="btn btn-primary btn-flat m-b-30 m-t-30 boton"><label>Registro para vendedor</label></button>
                                        <button class="btn btn-primary btn-flat m-b-30 m-t-30 boton" form="register"><label for="register">Registro para cliente</label> </button>
                                    </div>
                                    <form action="../../Controllers/registroVendedor.php" method="POST" id="formularioRegistroVendedor" >
                                    <h4>Registro de vendedor</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6">   
                                            <label>Documento</label>
                                            <input type="number" class="form-control" placeholder="Ej:102758694" name="documentoVendedor" id="documentoVendedor"> 
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" placeholder="Ej:Jonh" name="nombresVendedor" id="nombresVendedor">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" placeholder="Ej:Giglioli" name="apellidosVendedor" id="apellidosVendedor">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="emailVendedor" placeholder="Ej:carolahindiaz@gmail.com"
                                            id="emailVendedor">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Clave</label>
                                            <input type="password" class="form-control" name="claveVendedor"  placeholder="Ej:****" id="claveVendedor">
                                        </div>
                                        <div class="form-group col-md-6"">
                                            <label>Confirmar clave</label>
                                            <input type="password" class="form-control" name="cclaveVendedor"   placeholder="Ej:****" id="cclaveVendedor">
                                        </div>
                                        <!-- <div class="form-group col-md-6"">
                                            <label>Rol</label>
                                            <select name="rol" id="rol" class="form-control">
                                                <option>Seleccione una opcion</option>
                                                <option value="Cliente">Cliente</option>
                                            </select>
                                        </div> -->
                                        <!-- <div class="form-group col-md-6"">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" name="" placeholder="Ej:activo">
                                        </div> -->
                                        <div class="form-group col-md-6"">
                                            <label>Telefono</label>
                                            <input type="number" class="form-control" name="telefonoVendedor"   placeholder="Ej:3209925728" id="telefonoVendedor">
                                        </div>
                                        <button type="button" href="page-login.php" class="btn btn-primary btn-flat m-b-30 m-t-30" onclick="registroVendedor()"">Registrar</button>
                                        <div class="register-link m-t-15 text-center" style="margin: auto;" >
                                            <p>Ya tienes cuenta? <a href="page-login.php"> Ingresa</a></p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            
                        </div>
                        
                                
                        
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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