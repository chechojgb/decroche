<?php

    session_start();

    if (!isset($_SESSION['autenticado'])){
        echo'<script>alert("Por favor inicie sesión")</script>';
        echo"<script>location.href='../../Views/extras/page-login.html'</script>";
    }

?>