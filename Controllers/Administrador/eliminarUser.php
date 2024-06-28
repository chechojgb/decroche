<?php

    require_once("../../Models/conexion_db.php");
    require_once("../../Models/consultasAdmin.php");


    $id = $_GET['id'];

    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->eliminarUser($id);

?>