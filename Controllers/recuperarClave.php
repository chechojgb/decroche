<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/generarClaveEmail.php");

    $email = $_POST["email"];

    $objClave = new generarClave();
    $result = $objClave->enviarNuevaClave($email);


?>