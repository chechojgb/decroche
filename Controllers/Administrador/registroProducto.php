<?php
// importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");

session_start();
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos
$id_vendedor = $_SESSION['id'];
$nombre = $_POST ["nombre"];
$categoria = $_POST ["categoria"];
$precio = $_POST ["precio"];
$proveedor = $_POST ["proveedor"];
$rutaFoto= "../../Uploads/users/".$_FILES['foto']['name'];
$mover= move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);
$rutaFoto2= "../../Uploads/users/".$_FILES['foto2']['name'];
$mover= move_uploaded_file($_FILES['foto2']['tmp_name'], $rutaFoto2); // Corrección
$rutaFoto3= "../../Uploads/users/".$_FILES['foto3']['name'];
$mover= move_uploaded_file($_FILES['foto3']['tmp_name'], $rutaFoto3);
$fecha_creacion = date("Y-m-d");
$estado = $_POST ['estado']; 


    // creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->registrarProduct($nombre, $categoria, $precio, $proveedor, $rutaFoto, $rutaFoto2, $rutaFoto3, $fecha_creacion,$estado, $id_vendedor);


?>