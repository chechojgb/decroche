<?php

    function descargarUser(){
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->consultarUsers();

        if (!isset($result)) {
            echo "<h2> no hay usuarios registrados </h2>";
        }else {
            foreach ($result as $f) {
                echo'
                <tr class="center-div-bar">
                    <td style="color: #000;">'.$f['rol'].'</td>
                    <td style="color: #000;">'.$f['nombres'].'</td>
                    <td style="color: #000;">'.$f['apellidos'].'</td>
                    <td style="color: #000;">'.$f['email'].'</td>
                    <td style="color: #000;">'.$f['telefono'].'</td>
                    <td style="color: #000; text-align:center">'.$f['estado'].'</td>
                    
                </tr>
                ';
            }
        }
    }
