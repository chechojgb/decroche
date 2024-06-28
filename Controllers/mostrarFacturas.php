<?php 

function mostrarFacturas(){
    $id_usuario = $_SESSION['id'];

    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->facturasUser($id_usuario);

    // Check if $result is not null
    if ($result !== null) {
        $facturasAgrupadas = [];
        foreach ($result as $factura) {
            $id_factura = $factura['id_factura'];
            // Check if the invoice ID already exists in the grouped array
            if (!isset($facturasAgrupadas[$id_factura])) {
                // If not, create a new entry for this invoice ID
                $facturasAgrupadas[$id_factura] = [
                    'ciudad' => $factura['ciudad'],
                    'direccion' => $factura['direccion_facturacion'],
                    'celular' => $factura['numero_cel'],
                    'nombre' => $factura['nombre'],
                    'fecha_emision' => $factura['fecha_emision'],
                    'id_factura' => $factura['id_factura'],
                    'total' => $factura['total'],
                    'correo' => $factura['correo'],
                    'detalles' => [],
                ];
            }
            // Add the details of this product to the corresponding invoice ID
            $facturasAgrupadas[$id_factura]['detalles'][] = [
                'nombre_producto' => $factura['nombre_producto'],
                'cantidad' => $factura['cantidad'],
                'subtotal' => $factura['subtotal'],
            ];
        }

        // Loop through the grouped invoices and display them
        foreach ($facturasAgrupadas as $id_factura => $factura) {
            echo '
                <div id="invoice-POS">
                    <center id="top">
                        <div class="logo"></div>
                        <div class="info"> 
                            <h2>Factura N-'.$factura['id_factura'].'</h2>
                        </div><!--End Info-->
                    </center><!--End InvoiceTop-->
                    
                    <div id="mid">
                        <div class="info">
                            <h2>Información de factura</h2>
                            <p> 
                                Dirección: '.$factura['direccion'].'<br><br>
                                Ciudad: '.$factura['ciudad'].'<br><br>
                                Email: '.$factura['correo'].'<br><br>
                                Celular: '.$factura['celular'].'<br><br>
                                nombre: '.$factura['nombre'].' <br>
                            </p>
                        </div>
                    </div><!--End Invoice Mid-->
                    
                    <div id="bot">
                        <div id="table">
                            <table>
                                <tr class="tabletitle">
                                    <td class="item"><h2 style="font-size: 10px">Prod</h2></td>
                                    <td class="Hours">   <h2 style="font-size: 10px">Cant</h2></td>
                                    <td class="Rate"><h2 style="font-size: 10px">Sub Total</h2></td>
                                </tr>';

            // Loop through the details of this invoice and display them in the table
            foreach ($factura['detalles'] as $detalle) {
                echo '
                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext" style="font-size: 13px">'.$detalle['nombre_producto'].'</p></td>
                                    <td class="tableitem"><p class="itemtext" style="font-size: 13px">'.$detalle['cantidad'].'</p></td>
                                    <td class="tableitem"><p class="itemtext" style="font-size: 13px">'.number_format($detalle['subtotal'], 0  ,'', '.').'</p></td>
                                </tr>';
            }

            echo '

                                <tr class="tabletitle">
                                    <td></td>
                                    <td class="Rate"><h2>Total</h2></td>
                                    <td class="payment"><h2>$'.number_format($factura['total'], 0  ,'', '.').'</h2></td>
                                </tr>
                            </table>
                        </div><!--End Table-->

                        <button><a href="../../facturas/Factura_Nro_' . $factura["id_factura"] . '.pdf"  target="_blank">Descargar factura</a></button>
                        <div id="legalcopy">
                            <p class="legal">Gracias por comprar con DeCroche te esperamos en la siguente compra</p>
                        </div>
                    </div>
                </div>
            ';
        }
    } else {
        echo 'No se encontraron facturas para este usuario.';
    }
}
?>
