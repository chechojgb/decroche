<?php   
// importamos las dependencias
require_once("../Models/conexion_db.php");
require_once("../Models/consultasGlobal.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$clave = $_POST["clave"];
$cclave = $_POST["cclave"];
$telefono = $_POST["telefono"];
$documento = $_POST["documento"];
$estado = "Pendiente";
$rol = "Vendedor";
$fecha_creacion = date('Y-m-d');


if ($clave == $cclave){
    $claveMD= md5($cclave);
    // creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->registrarVendedor($nombres,$apellidos,$email,$claveMD,$estado,$telefono,$fecha_creacion,$documento, $rol);

}
?>