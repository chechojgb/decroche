<?php   
// importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$num_servicio = $_POST["num_servicio"];
$estado = $_POST["estado"];
$respuesta = $_POST["respuesta"];


// creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
$objConsultas = new ConsultasAdmin();
$result = $objConsultas->actualizarPqr($num_servicio ,$estado, $respuesta );


?>