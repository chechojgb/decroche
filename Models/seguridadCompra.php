<?php 
if (!isset($_SESSION['autenticado'])){
    echo'<script>alert("Por favor inicie sesión")</script>';
    echo"<script>location.href='./page-login.html'</script>";
}

if (!isset($_SESSION['pagoIniciado']) || ($_SESSION['pagoIniciado']) == False){
    echo'<script>alert("No has terminado de realizar la selección de los productos")</script>';
    echo"<script>location.href='./mostrarCarrito.php'</script>";
}

if(empty($_SESSION['carrito'])) { 
    echo'<script>alert("No has terminado de realizar la selección de los productos")</script>';
    echo"<script>location.href='./mostrarCarrito.php'</script>";
}




?>