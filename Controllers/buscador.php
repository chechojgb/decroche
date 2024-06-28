<?php   
// importamos las dependencias
require_once("../Models/conexion_db.php");
require_once("../Models/consultasGlobal.php");
//capturamos en variables enviados desde el formulario a traves del metodo post y los nombres de los campos

$producto = $_POST["producto"];


    // creamos el objeto apartir de la clase consultas para enviar los datos a una funcion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->buscarProducto($producto);
    
    if(!isset($result)){
        echo "<h2 style='max-width: 342px;' >No se encontraron resultados con '$producto'</h2>";

        
    } else {
        foreach ($result as $f) {
            

            echo '
            <li>
                <div class="timeline-badge primary"><i class="ti-shopping-cart-full"></i></div>
                <div class="timeline-panel buscador-encuentro">
                    <a href="http://localhost/decroche/Views/extras/detalleProducto.php?id=' . $f['id_pro'] . '" "  style="width: 100%;">
                        <div class="timeline-heading">
                            <h5 class="timeline-title">'.$f['nombre'].'</h5>
                        </div>
                        <div class="timeline-body">
                            <p>categoria : '.$f['categoria'].'</p>
                        </div>
                    </a>
                </div>
            </li>
            
            
            ';
        }
    }



?>

