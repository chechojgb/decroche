<?php

    function cargarVendedor(){
        $objConsultas = new ConsultasVendedor();
        $result = $objConsultas->cargarProveedor();

        if (!isset($result)) {
            echo "<h2> No hay Vendedor registrados </h2>";
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
