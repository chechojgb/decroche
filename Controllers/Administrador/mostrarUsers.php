<?php

    function cargarUsers(){
        $objConsultas = new ConsultasAdmin();
        $result = $objConsultas->consultarUsers();

        if (!isset($result)) {
            echo "<h2> no hay usuarios registrados </h2>";
        }else {
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
                    <td><img src="'.$f['foto'].'" alt="Foto User" style="width:80px;    height: 80px; object-fit: contain; ""></td>
                    <td style="color: #000;">'.$f['rol'].'</td>
                    <td style="color: #000;">'.$f['nombres'].'</td>
                    <td style="color: #000;">'.$f['apellidos'].'</td>
                    <td style="color: #000;">'.$f['email'].'</td>
                    <td style="color: #000;">'.$f['telefono'].'</td>
                    <td style="color: #000;"><p   '.$estado.'>'.$f['estado'].'</p></td>
                    <td style="color: #000; text-align: center;"><button onclick="editarUsuario(' . $f['id'] . '); scrollToEnd()" class="btn btn-info" style="display: ruby;"><i class="ti-pencil"> </i><p style="margin: 0; color: #fff;">ㅤEDITAR</p></button></td>
                    <td style="color: #000; text-align: center;"><a href="../../Controllers/Administrador/eliminarUser.php?id='.$f['id'].'" class="btn btn-danger" style=" display: -webkit-inline-box;"><i class="ti-trash"> </i><p style="margin: 0; color: #fff;">ㅤELIMINAR</p></a></td></td>
                </tr>
                ';
            }
        }
    }



    
//style="background: #ffcdd4;//
?>
