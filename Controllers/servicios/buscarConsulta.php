<?php   
// importamos las dependencias
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultasGlobal.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$id_consulta = $_GET["id_consulta"];

    $objConsultas = new Consultas();
    $result = $objConsultas->buscarConsulta($id_consulta);
    
?>