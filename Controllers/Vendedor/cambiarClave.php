<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasVendedor.php");
require_once("../../Models/consultasVendedor.php");

// Verificar si se enviaron los datos para editar el usuario
    $id= $_POST['id'];
    $claveCrip = md5($_POST['old-clave']);
    $newClave = MD5($_POST['new-clave']);

    // Crear una instancia de la clase ConsultasAdmin
    $consultasAdmin = new ConsultasVendedor();
    // Llamar al método modificarUsers para editar el usuario
    $result = $consultasAdmin->cambiarClave($id, $newClave, $claveCrip);


?>

