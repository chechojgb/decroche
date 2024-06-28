<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../Models/consultasVendedor.php");

// Verificar si se enviaron los datos para editar el usuario
    $id= $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Crear una instancia de la clase ConsultasAdmin
    $consultasAdmin = new ConsultasVendedor();
    // Llamar al método modificarUsers para editar el usuario
    $result = $consultasAdmin->modificarUsers( $id, $nombres, $apellidos, $email, $telefono);
    

?>

