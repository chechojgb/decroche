<?php
define("KEY","decrocheunion");
define("COD","AES-128-ECB");
define("client_id","ARAgZvbnOMbYh6UwWrq4l-0faQnansft9HGJnHgjfHhCyut7cGvCGVf1bMdpKWBwMYqeUyE_aZweMggj");
class Conexion{

    public function get_conexion(){
        $user = "root";
        $pass = "";
        $host = "localhost";
        $dbname = "decroche";

        $conexion = new PDO("mysql:host=$host;dbname=$dbname;",$user, $pass);
        return $conexion;

    }
}


?>