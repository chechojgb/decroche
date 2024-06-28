<?php

    require_once("../../Models/conexion_db.php");
    require_once("../../Models/consultasVendedor.php");


    $id_pro = $_GET['id_pro'];

    $objConsultas = new ConsultasVendedor();
    $result = $objConsultas->eliminarProduct($id_pro);

?>