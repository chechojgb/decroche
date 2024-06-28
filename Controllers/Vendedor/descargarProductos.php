<?php

    function descargarProductos(){
        $objConsultas = new ConsultasVendedor();
        $result = $objConsultas->consultarProduct();

        if (!isset($result)) {
            echo "<h2> no hay usuarios registrados </h2>";
        }else {
            foreach ($result as $f) {
                echo'
                <tr class="center-div-bar">
                    <td style="color: #000;">'.$f['nombre'].'</td>
                    <td style="color: #000;">'.$f['categoria'].'</td>
                    <td style="color: #000;">'.number_format($f['precio'], 0  ,'', '.').'</td>
                    <td style="color: #000;">'.$f['proveedor'].'</td>
                    <td style="color: #000; text-align:center;">'.$f['estado'].'</td>
                </tr>
                ';
            }
        }
    }
