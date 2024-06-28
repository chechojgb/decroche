<?php

// Importamos las dependencias
require_once("../Models/conexion_db.php");
require_once("../Models/correoFactura.php");
require '../vendor/autoload.php';

$status = $_GET['status'];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$codigoP = $_POST["codigoP"];
$ciudad = $_POST["ciudad"];
$celular = $_POST["celular"];
$correo = $_POST["correo"];

$objConsultas = new correoFactura();
$result = $objConsultas->pagoCompra($nombre, $apellido, $direccion, $codigoP, $ciudad, $celular, $correo);

// Generar script JavaScript para redireccionar a la página de facturas y a la factura específica
$id_factura = $result;

$pdfUrl = "../facturas/Factura_Nro_$id_factura.pdf";

echo '<script>';

echo'

window.open("' . $pdfUrl . '", "_blank");
';
echo'
window.location.href = "../Views/user/facturas.php";';

echo ' </script>';



?>
