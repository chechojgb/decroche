<?php

function descargarCompras(){
    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->consultarCompra();

    if (!isset($result)) {
        echo "<h2> No hay usuarios registrados </h2>";
    } else {
        $prev_id_factura = null; 
        foreach ($result as $f) {
          
            if ($f['id_factura'] != $prev_id_factura) {
                // Cerrar la fila anterior si existe
                if ($prev_id_factura !== null) {
                    echo '</td>';
                    echo '<td style="color: #000; text-align: center;"><button  class="btn btn-info"><a href="../../facturas/Factura_Nro_' . $prev_id_factura . '.pdf"  style="color:#fff;" target="_blank">Ver factura</a></button></td>';
                    echo '</tr>'; // Cerrar la fila anterior
                }
                // Abrir una nueva fila
                echo '<tr>'; 
                echo '<td style="color: #000; text-align: center;">'.$f['id_factura'].'</td>';
                echo '<td style="color: #000;">'.$f['nombre'].'</td>';
                echo '<td style="color: #000;">'.$f['fecha_emision'].'</td>';
                echo '<td style="color: #000;">'.$f['direccion_facturacion'].'</td>';
                echo '<td style="color: #000;">'.$f['correo'].'</td>';
                echo '<td style="color: #000;">'.$f['numero_cel'].'</td>';
                echo '<td style="color: #000;">'.$f['ciudad'].'</td>';
                echo '<td style="color: #000;">'; 
            }
            // Imprimir el nombre del producto
            echo $f['nombre_producto'] . ',   <br>'; 
            $prev_id_factura = $f['id_factura']; 
        }
        // Cerrar la última celda y fila
        echo '</td>';
        echo '<td style="color: #fff; text-align: center;"><button  class="btn btn-info"><a href="../../facturas/Factura_Nro_' . $prev_id_factura . '.pdf"  style="color:#fff;" target="_blank">Ver factura</a></button></td>';
        echo '</tr>'; 
    }
}

?>
