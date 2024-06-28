<?php 

require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasGlobal.php");

$id_producto = $_GET['id'];
$calificacion = $_POST['valorOpinion'];
session_start();

$id_usuario = $_SESSION['id'];

$objConsultas = new Consultas();
$result = $objConsultas->cambiarOpinionProducto($id_producto,$calificacion,$id_usuario);

echo $id_producto.',';
echo $calificacion.',';
echo $id_usuario.',';


?>