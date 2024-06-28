<?php

function cargarProducts(){
    $objConsultas = new ConsultasAdmin();
    $result = $objConsultas->consultarProduct();

    if (!isset($result)) {
        echo "<h2> no hay Productos registrados </h2>";
    } else {
        foreach ($result as $f) {
            $estado = $f['estado'] === "Activo" ? 'style="background-color: #4caf5057;
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
                <td><img src="'.$f['foto'].'" alt="Foto User" width="80px" height="80px"></td>
                <td style="color: #000 !important;">'.$f['nombre'].'</td>
                <td style="color: #000 !important;">'.$f['categoria'].'</td>
                <td style="color: #000 !important;">'.$f['precio'].'</td>
                <td style="color: #000 !important;">'.$f['proveedor'].'</td>
                <td id="estado" ><p '.$estado.'>'.$f['estado'].'</p></td>
                <td style="color: #000!important;text-align: center;"><button onclick="editarProducto('.$f['id_pro'].');scrollToEnd()" class="btn btn-info"style="display: ruby;"><i class="ti-pencil"></i><p style="margin: 0; color: #fff;">ㅤEDITAR</p></button></td>
                <td style="color: #000!important;text-align: center; font-family: Arial, Helvetica, sans-serif;" > <a href="../../Controllers/Administrador/eliminarProduct.php?id_pro='.$f['id_pro'].'" class="btn btn-danger" style="font-family: Arial, Helvetica, sans-serif; display: -webkit-inline-box;" ><i class="ti-trash"> </i><p style="margin: 0; color: #fff;">ㅤELIMINAR</p></a></td>
            </tr>
            ';
        }
    }
}

?>






