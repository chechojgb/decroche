<?php

    function totalProducto(){
        $id_vendedor = $_SESSION['id'];
        $objConsultas = new ConsultasVendedor();
        $result = $objConsultas->valorTotalProducto($id_vendedor);

        if (!isset($result)) {
            echo "<h2> no hay productos vendidos </h2>";
        }else {
            foreach ($result as $f) {
                echo'
                <tr class="center-div-bar">
                    <td style="color: #000;">'.$f['nombre'].'</td>
                    <td style="color: #000;">'.$f['categoria'].'</td>
                    <td style="color: #000;">'.number_format($f['precio'], 0  ,'', '.').'</td>
                    <td style="color: #000;">'.number_format($f['ventas'], 0  ,'', '.').'</td>
                    <td style="color: #000; text-align:center;">'.number_format($f['total_vendido'], 0  ,'', '.').'</td>
                </tr>
                ';
            }
        }
    }
?>