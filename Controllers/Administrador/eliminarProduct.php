<?php

    require_once("../../Models/conexion_db.php");
    require_once("../../Models/consultasAdmin.php");


    $id_pro = $_GET['id_pro'];

    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->eliminarProduct($id_pro);

?>