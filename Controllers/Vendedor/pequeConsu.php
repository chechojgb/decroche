<?php

function cargarProductsPeque(){

    $id_vendedor = $_SESSION['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->consultarProductMini($id_vendedor);

    if (!isset($result)) {
        echo "<h2> no hay Productos registrados </h2>";
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
    $id_vendedor = $_SESSION['id'];
    $objConsultas = new Consultas();
    $result = $objConsultas->constularVentasMini($id_vendedor);

    if (!isset($result)) {
        echo "<h2> no hay Productos registrados </h2>";
    } else {
        foreach ($result as $f) {
            
            echo'
            <tr>
                <p style="color: #000;">'.$f['ventas'].'</td>
            </tr>
            ';
        }
    }
}

?>






