<?php   
// importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasGlobal.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$motivo = $_POST["motivo"];
$detalle = $_POST["detalle"];
$foto= "../../Uploads/servicios/".$_FILES['foto']['name'];
$mover= move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
$estado = "Sin contestar";
$fecha = date('Y-m-d');




    $objConsultas = new Consultas();
    $result = $objConsultas->registrarPeticion($nombre, $email, $motivo, $detalle, $foto, $estado, $fecha);
    

?>