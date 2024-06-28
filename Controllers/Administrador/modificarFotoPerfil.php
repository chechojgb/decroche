<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");

// Verificar si se enviaron los datos para editar el usuario
    $id= $_POST['id'];
    $foto= "../../Uploads/users/".$_FILES['foto']['name'];
    $mover= move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

    // Crear una instancia de la clase ConsultasAdmin
    $consultasAdmin = new ConsultasAdmin();
    // Llamar al método modificarUsers para editar el usuario
    $result = $consultasAdmin->cambiarFoto($id, $foto);


?>