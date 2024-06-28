<?php

    function cargarPqr(){
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->consultarPqr();

        if (!isset($result)) {
            echo "<h2> no hay Pqr registrados </h2>";
        }else {
            foreach ($result as $f) {
                $estado = $f['estado'] === "Contestada" ? 'style="background-color: #4caf5057;
                color: #fff;
                text-align: center;
                line-height: 14px;
                padding: 2px;
                border-radius: 3px;"' : 'style="background-color: #e79c96;
                color: #000;
                text-align: center;
                line-height: 14px;
                padding: 2px;
                border-radius: 3px;"';
                echo'
                <tr class="center-div-bar">
                    
                    <td style="color: #000;">'.$f['num_servicio'].'</td>
                    <td style="color: #000;">'.$f['nombre'].'</td>
                    <td style="color: #000;">'.$f['email'].'</td>
                    <td style="color: #000;">'.$f['detalle'].'</td>
                    <td  ><p   '.$estado.'>'.$f['estado'].'</p></td>
                    <td style="color: #000;">'.$f['fecha'].'</td>
                    <td style="color: #000;">'.$f['tipo_servicio'].'</td>
                    <td style="color: #000;     text-align: center;"><button onclick="editarPqr('.$f['id_servicios'].');scrollToEnd()" class="btn btn-info">CONTESTAR</button></td>
                    
                </tr>
                ';
            }
        }
    }

    
//style="background: #ffcdd4;//
?>
