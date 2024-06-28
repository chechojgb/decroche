<?php
// importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$identificacion = $_POST ["documento"];
$nombres = $_POST ["nombres"];
$apellidos = $_POST ["apellidos"];
$email = $_POST ["email"];
$clave = $_POST ["documento"];
$rol = $_POST ["rol"];
$estado = $_POST ['estado']; 
$telefono = $_POST ["telefono"];
$fecha_creacion = date("Y-m-d");
$rutaFoto= "../../Uploads/users/".$_FILES['foto']['name'];
$mover= move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);

    //Encriptamos la clave
    $claveMD= md5($clave);
    // creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->registrarUser($identificacion,$nombres,$apellidos,$email,$claveMD,$rol,$estado,$telefono,$fecha_creacion,$rutaFoto);


?>