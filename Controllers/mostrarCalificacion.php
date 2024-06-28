<?php

function mostrarCalifaciones(){

    $objConsultas = new Consultas();
    $result = $objConsultas->calificarProducto();

    if(!isset($result)){
        echo "<h2>No hay productos registrados</h2>";
    } else {
        foreach ($result as $f) {
            $foto = substr($f['foto'], 6); // Elimina los primeros seis caracteres de la URL de la foto
            echo '
            <div class="product">
            <img src="'.$f['foto'].'" alt="Producto">
            <div class="details">
                <p class="status">Entregado</p>
                <p class="date">Llegó el '.$f['fecha_emision'].'</p>
                <p class="description">'.$f['nombre'].', '.$f['descripcion'].'...</p>
                <p class="seller">Compraste '.$f['cantidad_total']. ' unidades</p>
                <a href="#">Enviar mensaje</a>
            </div>
            <div class="actions">
                <a href="./opinion.php?id='.$f['id_pro'].'"><button >Dejar calificacion</button></a>
                <button class="actions-2">Ver producto</button>
            </div>
        </div>
            ';
        }
    }
}

function contadorCalifaciones(){

    $objConsultas = new Consultas();
    $result = $objConsultas->contarCalificaciones();

    if(!isset($result)){
        echo "<h2>No hay productos registrados</h2>";
    } else {
        foreach ($result as $f) {
            
            echo '
            <span>'.$f['cantidad_productos'].'</span>
            ';
        }
    }
}


function generarDetalleOpinion(){
    //capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos
    
        $id_producto = $_GET['id'];
    
    
     // creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
        $objConsultas = new Consultas();
        $result = $objConsultas->generarDetalleCalificacion($id_producto);
    
        if(!isset($result)){
            echo "<h2>No hay productos registrados</h2>";
        } else {
            foreach ($result as $f) {
                
                echo '
                        <div class="left-section">
            <div class="product-details">
                <h2>'.$f['nombre'].', '.$f['descripcion'].'...</h2>
                <a href="#">Ver detalle</a>
            </div>
            <div class="delivery-status">
                <div class="status-header">
                    <span class="status">Entregado</span>
                    <span class="date">Llegó el  '.$f['fecha_emision'].'⚡ FULL</span>
                </div>
                <p>Enviamos este producto a la dirección <strong>'.$f['direccion_facturacion'].'</strong>,'.$f['ciudad'].' </p>
                <a href="../extras/detalleProducto.php?id='.$id_producto.'"><button>Volver a comprar</button></a>
            </div>
            ';
            
            mostrarCalifacionProducto($id_producto);
            echo'

        </div>
        <div class="right-section">
            <div class="purchase-summary">
                <h3>Detalle de la compra</h3>
                <p>'.$f['fecha_emision'].' | #'.$f['numero_factura'].'</p>
                <div class="summary-item">
                    <span>Cantidad ('.$f['cantidad_total'].')</span>
                    <span>$'.number_format($f['total_precio'], 0, '', '.').'</span>
                </div>
                <div class="summary-item">
                    <span>Descuento</span>
                    <span class="discount">-$0.000</span>
                </div>
                <div class="summary-item">
                    <span>Envío</span>
                    <span>$0.000</span>
                </div>
                <div class="total">
                    <span>Total</span>
                    <span>$'.number_format($f['total_precio'], 0, '', '.').'</span>
                </div>
                <p class="payment-method">Visa Débito **** 3322</p>
            </div>
        </div>
                ';
            }
        }


}

function mostrarCalifacionProducto($id_producto){

    $objConsultas = new Consultas();
    $result = $objConsultas->verCalificacionProducto($id_producto);
    if(!isset($result)){
        echo '<div class="rating-section">
                <label>¿Qué te pareció tu producto?</label>

                <form action="../../Controllers/servicios/registrarOpinionProducto.php?id='.$id_producto.'" method="POST" id="formularioValorOpinion">
                    <input type="hidden" name="valorOpinion" id="valorOpinion">
                    <div class="faces">
                        <button type="button" class="no-class" onclick="enviarFormulario(1)"><div class="face face-1" name="1"></div></button>
                        <button type="button" class="no-class" onclick="enviarFormulario(2)"><div class="face face-2" name="2"></div></button>
                        <button type="button" class="no-class" onclick="enviarFormulario(3)"><div class="face face-3" name="3"></div></button>
                        <button type="button" class="no-class" onclick="enviarFormulario(4)"><div class="face face-4" name="4"></div></button>
                        <button type="button" class="no-class" onclick="enviarFormulario(5)"><div class="face face-5" name="5"></div></button>
                    </div>
                </form>
            </div>';
    } else {
        foreach ($result as $f) {
            if($f['calificacion'] == '1'){
                echo'
                <div class="rating-section" style="margin-top: 60px">
                <label class="califacion-succes">Tu calificacion hacia este producto: <div class="face face-1" name="1"></div></label>
                    <div class="width-button">
                        <button class="actions-2 padding-2" id="cambiarOpinion">Cambiar calificación</button>
                    </div>
                </div>
                ';
            
            }else if($f['calificacion'] == '2'){
                echo'
                <div class="rating-section" style="margin-top: 60px">
                <label class="califacion-succes">Tu calificacion hacia este producto: <div class="face face-2" name="2"></div></label>
                    <div class="width-button">
                        <button class="actions-2 padding-2" id="cambiarOpinion">Cambiar calificación</button>
                    </div>
                </div>
                ';
            }
            else if($f['calificacion'] == '3'){
                echo'
                <div class="rating-section" style="margin-top: 60px">
                <label class="califacion-succes">Tu calificacion hacia este producto: <div class="face face-3" name="3"></div></label>
                    <div class="width-button">
                        <button class="actions-2 padding-2" id="cambiarOpinion">Cambiar calificación</button>
                    </div>
                </div>
                ';
            }
            else if($f['calificacion'] == '4'){
                echo'
                <div class="rating-section" style="margin-top: 60px">
                <label class="califacion-succes">Tu calificacion hacia este producto: <div class="face face-4" name="4"></div></label>
                    <div class="width-button">
                        <button class="actions-2 padding-2" id="cambiarOpinion">Cambiar calificación</button>
                    </div>
                </div>
                ';
            }
            else if($f['calificacion'] == '5'){
               echo '
                <div class="rating-section" style="margin-top: 60px">
                    <label class="califacion-succes">Tu calificacion hacia este producto: <div class="face face-5" name="5"></div></label>
                    <div class="width-button">
                        <button class="actions-2 padding-2" id="cambiarOpinion">Cambiar calificación</button>
                    </div>
                </div>
            ';  
            }
            echo '
    <div class="rating-section" id="seccionOpinion" style="display: none;">
        <label>¿Qué te pareció tu producto?</label>
        <form action="../../Controllers/servicios/cambiarOpinion.php?id='.$id_producto.'" method="POST" id="formularioValorOpinion">
            <input type="hidden" name="valorOpinion" id="valorOpinion">
            <div class="faces">
                <button type="button" class="no-class" onclick="enviarFormulario(1)"><div class="face face-1" name="1"></div></button>
                <button type="button" class="no-class" onclick="enviarFormulario(2)"><div class="face face-2" name="2"></div></button>
                <button type="button" class="no-class" onclick="enviarFormulario(3)"><div class="face face-3" name="3"></div></button>
                <button type="button" class="no-class" onclick="enviarFormulario(4)"><div class="face face-4" name="4"></div></button>
                <button type="button" class="no-class" onclick="enviarFormulario(5)"><div class="face face-5" name="5"></div></button>
            </div>
        </form>
    </div>
';
        }
    }
}
?>
