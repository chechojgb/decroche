<?php
// obtener_usuario.php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasAdmin.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

    $id_pro = $_GET["id_pro"];

    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->editarProducto($id_pro);
?>