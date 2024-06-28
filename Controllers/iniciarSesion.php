<?php   
// importamos las dependencias
require_once("../Models/conexion_db.php");
require_once("../Models/consultasGlobal.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$email = $_POST ["email"];
$clave = md5($_POST ["clave"]);

 // creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->validarSesion($email,$clave);

?>