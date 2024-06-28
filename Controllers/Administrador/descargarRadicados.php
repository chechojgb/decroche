<?php

    function descargarRadicados(){
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->consultarPqr();

        if (!isset($result)) {
            echo "<h2> no hay usuarios registrados </h2>";
        }else {
            foreach ($result as $f) {
                echo'
                <tr class="center-div-bar">
                    <td style="color: #000;">'.$f['num_servicio'].'</td>
                    <td style="color: #000;">'.$f['nombre'].'</td>
                    <td style="color: #000;">'.$f['email'].'</td>
                    <td style="color: #000;">'.$f['motivo'].'</td>
                    <td style="color: #000;">'.$f['detalle'].'</td>
                    <td style="color: #000;">'.$f['estado'].'</td>
                    <td style="color: #000;">'.$f['tipo_servicio'].'</td>
                    <td style="color: #000; text-align:center;">'.$f['fecha'].'</td>
                    
                </tr>
                ';
            }
        }
    }
