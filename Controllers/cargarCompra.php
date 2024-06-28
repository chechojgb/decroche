<?php
$total = 0; // Declarar $total como variable global fuera de las funciones

function cargarCompra() {
    global $total; // Acceder a la variable global $total

    $_SESSION["pagoIniciado"] = False;

    if(!empty($_SESSION['carrito'])) {
        $total = 0; 
        foreach ($_SESSION['carrito'] as $producto) {   

            $subtotal = ($producto['precio'] * $producto['cantidad']);
            $total = $total + $subtotal; 
            echo '

                <td>
                    <p class="mb-0 mt-4">'.$producto['nombre'].'</p>
                </td>
                <td ">
                    <p class="mb-0 mt-4">'.number_format($producto['precio'], 0  ,'', '.').'</p>
                </td>
                <td>
                    <div class="input-group quantity mt-4" style="width: 100px;">
                        <div class="input-group-btn">
                        <form action="" method="post">
                            <input type="hidden" name="id_pro" value="' . openssl_encrypt($producto['id_pro'], COD, KEY) . '">
                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" name="accion" value="restar" type="submit">
                                <i class="fa fa-minus"></i>
                            </button>
                        </form>

                        </div>
                        <input type="text" class="form-control form-control-sm text-center border-0" value="'.$producto['cantidad'].'" readonly style="margin-bottom: 10px;">
                        <div class="input-group-btn">
                            <form action="" method="post">
                                <input type="hidden" name="id_pro" value="' . openssl_encrypt($producto['id_pro'], COD, KEY) . '">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border" name="accion" value="sumar" type="submit">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
                <td class="totalProducto">
                    <p class="mb-0 mt-4">' .number_format($subtotal, 0  ,'', '.'). '</p>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id_pro" value="' . openssl_encrypt($producto['id_pro'], COD, KEY) . '">
                        <button class="btn btn-md rounded-circle bg-light border mt-4" name="accion" value="eliminar" type="submit"><i class="fa fa-times text-danger"></i></button>
                    </form>
                </td>
            </tr>
            ';
        }
    } else {
        echo "<div class='alert alert-success' role='alert'> No hay productos en el carrito.</div>";
    }

    return $total;
}

function cargarTotal(){
    global $total; // Acceder a la variable global $total
    echo '<div class="row g-4 tick">
    <div class="col-8"></div>
    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4 ticket">
        <div class="bg-light rounded total-factura">
            <div class="p-4">
                <h1 class="display-6 mb-4">Total <span class="fw-normal">carrito</span></h1>
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="mb-0 me-4">Subtotal:</h5>
                    <p class="mb-0">$'.number_format($total, 0  ,'', '.').'</p>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="mb-0 me-4">Adicionales</h5>
                    <div class="">
                        <p class="mb-0">Iva: $0.00</p>
                    </div>
                </div>
                <p class="mb-0 text-end">Envios a toda Colombia.</p>
            </div>
            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                <h5 class="mb-0 ps-4 me-4">Total</h5>
                <p class="mb-0 pe-4">'.number_format($total, 0  ,'', '.').'</p>
            </div>
            
            <form id="formPago" action="../../Controllers/procesarCompra.php" method="post">
                <div class="alert alert-success" style="display: none;" >
                    <div class="form-group">
                        <label for="my-input">Correo de contacto:</label>
                        <input id="email" name="email" 
                        class="form-control" 
                        type="email"
                        placeholder="Porfavor escribe tú correo"
                        required>
                    </div>
                    <small id="emailHelp" 
                    class="form-text text-muted">
                    Los productos se enviarán a este correo.
                    </small>
                </div>

                <button  id="btnPagar" name="accion" value="proceder" type="submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceder al pago</button>
            </form>
        </div>
    </div>
</div>';
}

?>
