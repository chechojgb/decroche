<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");

// Verificar si se enviaron los datos para editar el usuario
    $id= $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Crear una instancia de la clase ConsultasAdmin
    $consultasAdmin = new ConsultasAdmin();
    // Llamar al método modificarUsers para editar el usuario
    $result = $consultasAdmin->modificarUsers2( $id, $nombres, $apellidos, $email, $telefono);
    

?>

