<?php

function cargarProductsPeque(){
    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->consultarProductMini();

    if (!isset($result)) {
        echo "<h2> No hay Productos registrados </h2>";
    } else {
        foreach ($result as $f) {
            
            echo'
            <tr>
                <p style="color: #000;">'.$f['total'].'</td>
            </tr>
            ';
        }
    }
}

function cargarVentasPeque(){
    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->constularVentasMini();

    if (!isset($result)) {
        echo "<h2> No hay Productos registrados </h2>";
    } else {
        foreach ($result as $f) {
            
            echo'
            <tr>
                <p style="color: #000;">'.$f['total'].'</td>
            </tr>
            ';
        }
    }
}
function cargarUsersPeque(){
    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->constularUsersMini();

    if (!isset($result)) {
        echo "<h2> No hay Productos registrados </h2>";
    } else {
        foreach ($result as $f) {
            
            echo'
            <tr>
                <p style="color: #000;">'.$f['total'].'</td>
            </tr>
            ';
        }
    }
}
?>






