<?php


header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar si se proporciona un ID de usuario en la solicitud GET
    if(isset($_GET['id_pro'])) {
        // Obtener el ID de usuario de la solicitud GET
        $num_servicio = $_GET['num_servicio'];
        

        $estado = $_GET['estado'];
        $categoria = $_GET['categoria'];
        $precio = $_GET['precio'];
        $proveedor = $_GET['proveedor'];
        $estado = $_GET['estado'];
        


        try {
            // Obtener una conexión a la base de datos
            $conexion = get_conexion();

            // Preparar la consulta para actualizar los detalles del usuario por su ID
            $consulta = $conexion->prepare("UPDATE products SET  nombre = :nombre, categoria = :categoria, precio = :precio, proveedor = :proveedor, estado = :estado WHERE id_pro = :id_pro");


            // Asignar los valores de los campos a la consulta

            // Asignar los valores de los campos a la consulta
            $consulta->bindParam(':id_pro', $userId, PDO::PARAM_INT);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            $consulta->bindParam(':precio', $precio, PDO::PARAM_STR);
            $consulta->bindParam(':proveedor', $proveedor, PDO::PARAM_STR);
            $consulta->bindParam(':estado', $estado, PDO::PARAM_STR);
            // Ejecutar la consulta
            $consulta->execute();

            // Envía una respuesta JSON indicando el éxito del proceso
            echo json_encode(array("success" => true, "message" => "Cambios guardados exitosamente"));
        } catch(PDOException $e) {
            // Si ocurre un error durante la consulta, envía una respuesta JSON con el mensaje de error
            echo json_encode(array("success" => false, "message" => "Error al guardar cambios en la base de datos: " . $e->getMessage()));
        }
    } else {
        // Si no se proporciona un ID de usuario en la solicitud GET, devuelve un mensaje de error
        echo json_encode(array("success" => false, "message" => "ID de producto no especificado"));
    }
} else {
    // Si la solicitud no es de tipo GET, devuelve un mensaje de error
    echo json_encode(array("success" => false, "message" => "La solicitud no es de tipo GET"));
}
?>
