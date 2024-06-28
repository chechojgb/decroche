<?php   
// importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$id = $_POST["id"];
$rol = $_POST["rol"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$estado = $_POST["estado"];





// creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
$objConsultas = new ConsultasAdmin();
$result = $objConsultas->actualizarUsuario($id,$rol, $nombres,$apellidos, $email,$telefono,$estado );


?>