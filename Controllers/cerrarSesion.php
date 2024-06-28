<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/consultasGlobal.php");


    $objConsultas = new Consultas();
    $result= $objConsultas->cerrrarSesion();
;?>