<?php
// importamos las dependencias
require_once("../Models/conexion_db.php");
require_once("../Models/consultasGlobal.php");
require_once("../Models/carrito.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$total=0;
$correo = $_POST['email'];
$clave_transaccion = uniqid();

foreach ($_SESSION['carrito'] as $indice=>$producto) {

    $total=$total+($producto['precio']*$producto['cantidad']);
}
if(count($_SESSION['carrito']) == 0){
    echo '<script>alert("No hay ningun producto registrado porfavor selecciona alguno de nuestro catalogo")</script>';
    echo '<script> location.href="../Views/extras/mostrarCarrito.php" </script>';
    
}else{
    // creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->procesarCompra($total, $clave_transaccion,$correo);
    echo '<form id="formTotal" action="../Views/extras/pagar.php" method="post">';
    echo '<input type="hidden" name="total" value="' . $total . '">';
    echo '</form>';
    echo '<script>document.getElementById("formTotal").submit();</script>';
}


?>