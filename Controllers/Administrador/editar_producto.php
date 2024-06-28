<?php   
// importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$id_pro = $_POST["id_pro"];
$nombre = $_POST["nombre"];
$estado = $_POST["estado"];
$categoria = $_POST["categoria"];
$precio = $_POST["precio"];
$proveedor = $_POST["proveedor"];




// creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
$objConsultas = new ConsultasAdmin();
$result = $objConsultas->actualizarProducto($id_pro, $nombre, $estado, $categoria, $precio, $proveedor );


?>