<?php

    function cargarProveedor(){
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->cargarProveedor();

        if (!isset($result)) {
            echo "<h2> no hay usuarios registrados </h2>";
        }else {
            foreach ($result as $f) {
                echo'
                <option>'.$f['nombres'].'</option>
                ';
            }
        }
    }

    
//style="background: #ffcdd4;//
?>
